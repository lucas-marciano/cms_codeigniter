<?php $this->load->view('commons/header') ?>
<!-- box-intro -->
<section class="box-intro">
    <div class="table-cell">
        <h1 class="box-headline letters rotate-2">
            <span class="box-words-wrapper">
                <b class="is-visible"><?= $empresa->company_name ?></b>
                <b>Um texto</b>
                <b>outro texto</b>
            </span>
        </h1>
        <h5><?= $empresa->company_slogan ?></h5>
    </div>

    <div class="mouse">
        <div class="scroll"></div>
    </div>
</section>


<div id="portfolio-div" class="portfolio-div">
    <div class="portfolio">
        <div class="no-padding portfolio_container">
            <?php foreach ($clientes as $cliente) { ?>
                <div class="<?= $cliente->clients_dimension ?> col-sm-12  fashion logo">
                    <a href="single-project.html" class="portfolio_item">
                        <img src="http://placehold.it/1000x1000" alt="image" class="img-responsive" />
                        <div class="portfolio_item_hover">
                            <div class="portfolio-border clearfix">
                                <div class="item_info">
                                    <span><?= $cliente->clients_nome ?></span>
                                    <!--<em>Fashion / Logo</em>-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <!-- end single work -->
        </div>
        <!-- end portfolio_container -->
    </div>
    <!-- portfolio -->
</div>

<?php $this->load->view('parceiros'); ?>
<?php $this->load->view('commons/footer'); ?>
