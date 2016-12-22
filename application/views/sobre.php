<?php $this->load->view('commons/header') ?>

<!-- Top bar -->
<div class="top-bar">
    <h1>Sobre</h1>
    <p><a href="<?= base_url() ?>">Home</a> / Sobre</p>
</div>
<!-- end Top bar -->

<!-- Main container -->
<div class="container main-container clearfix"> 
    <div class="col-md-6">
        <img src="<?= base_url('_assets/www/img/sobre.jpg') ?>" class="img-responsive" alt="" />
    </div>
    <div class="col-md-6">
        <h3 class="uppercase"><?= $empresa->company_name ?></h3>
        <h5><?= $empresa->company_slogan ?></h5>
        <div class="h-30"></div>
        <p><?= $empresa->company_sobre ?></p>
        <div class="h-10"></div>
        <ul class="social-ul">
            <?php if (!empty($empresa->company_facebook)) { ?>
                <li class="box-social">
                    <a target="_blank" href="http://facebook.com/<?= $empresa->company_facebook ?>">
                        <i class="ion-social-facebook"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_instagram)) { ?>
                <li class="box-social">
                    <a target="_blank" href="http://instagram.com/<?= $empresa->company_instagram ?>">
                        <i class="ion-social-instagram"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_twitter)) { ?>
                <li class="box-social">
                    <a target="_blank" href="http://twitter.com/<?= $empresa->company_twitter ?>">
                        <i class="ion-social-twitter"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_linkedin)) { ?>
                <li class="box-social">
                    <a target="_blank" href="http://lekedin.com/<?= $empresa->company_linkedin ?>">
                        <i class="ion-social-linkedin"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_dribble)) { ?>
                <li class="box-social">
                    <a target="_blank" href="https://dribbble.com/<?= $empresa->company_dribble ?>">
                        <i class="ion-social-dribbble"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_skype)) { ?>
                <li class="box-social"><a target="_blank" href="https://skype.com/<?= $empresa->company_skype ?>">
                        <i class="ion-social-skype"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_gplus)) { ?>
                <li class="box-social">
                    <a target="_blank" href="https://plus.google.com/+<?= $empresa->company_gplus ?>">
                        <i class="ion-social-googleplus"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_tumbler)) { ?>
                <li class="box-social">
                    <a target="_blank" href="<?= $empresa->company_tumbler ?>.tumblr.com">
                        <i class="ion-social-tumblr"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_foursquare)) { ?>
                <li class="box-social">
                    <a target="_blank" href="https://pt.foursquare.com/v/<?= $empresa->company_foursquare ?>">
                        <i class="ion-social-foursquare"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($empresa->company_youtube)) { ?>
                <li class="box-social">
                    <a target="_blank" href="https://youtube.com.br/<?= $empresa->company_youtube ?>">
                        <i class="ion-social-youtube"></i>
                    </a>
                </li>
            <?php } ?>
        </ul>


    </div>
</div>
<!-- end Main container -->

<?php $this->load->view('commons/footer') ?>