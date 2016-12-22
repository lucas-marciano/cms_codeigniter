<?php $this->load->view('commons/header') ?>

<!-- top bar -->
<div class="top-bar">
    <h1>Projetos</h1>
    <p><a href="<?= base_url() ?>">Home</a> / Projetos</p>
</div>
<!-- end top bar -->

<!-- main container -->
<div class="main-container portfolio-inner clearfix" style="margin-bottom: 100px">
    <!-- portfolio div -->
    <div class="portfolio-div">
        <div class="portfolio">
            <!-- portfolio_filter -->
            <div class="categories-grid wow fadeInLeft">
                <nav class="categories text-center">
                    <ul class="portfolio_filter">
                        <li><a href="" class="active" data-filter="*">Todos</a></li>
                        <?php foreach ($categorias as $categoria) { ?>
                            <li><a href="" data-filter=".categoria-<?= $categoria->category_id ?>"><?= $categoria->category_name ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <!-- portfolio_filter -->

            <!-- portfolio_container -->
            <div class="no-padding portfolio_container clearfix">
                <?php
                foreach ($projetos as $projeto) {
                    $class = "";
                    foreach ($pro_cat as $aux) {
                        if ($projeto->projects_id == $aux->projects_id) {
                            $class = "categoria-" . $aux->category_id;
                        }else{
                            $class = "";
                        }
                    }
                    ?>
                    <!-- single work -->
                    <div class="col-md-4 col-sm-6  <?= $class ?>">
                        <a href="single-project.html" class="portfolio_item">
                            <img src="http://placehold.it/1000x1000" alt="image" class="img-responsive" />
                            <div class="portfolio_item_hover">
                                <div class="portfolio-border clearfix">
                                    <div class="item_info">
                                        <span>Mockups in seconds</span>
                                        <em>Fashion / Logo</em>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end single work -->
                <?php } ?>
            </div>
            <!-- end portfolio_container -->
        </div>
        <!-- portfolio -->
    </div>
    <!-- end portfolio div -->
</div>
<!-- end main container -->

<?php $this->load->view('commons/footer') ?>