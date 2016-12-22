<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?= $meta_description ?>">
        <meta name="keywords" content="<?= $wordkeys ?>">
        <meta name="author" content="Lucas Marciano">

        <title><?= $title ?></title>
        <link rel="icon" href="<?= base_url('_assets/www/img/favicon.png') ?>" type="image/x-icon">

        <link href="<?= base_url('_assets/www/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('_assets/www/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('_assets/www/css/style.css') ?>" rel="stylesheet">
        <script href="<?= base_url('_assets/www/js/modernizr.js') ?>"></script>

    </head>
    <body>

        <!-- Preloader -->
        <div id="preloader">
            <div class="pre-container">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- end Preloader -->

        <div>
            <!-- box header -->
            <header class="box-header">
                <div class="box-logo">
                    <a href="<?= base_url() ?>"><img src="<?= base_url('_assets/www/img/logo.png') ?>" width="80" alt="Nome da empresa"></a>
                </div>
                <!-- box-nav -->
                <a class="box-primary-nav-trigger" href="#0">
                    <span class="box-menu-text">Menu</span><span class="box-menu-icon"></span>
                </a>
                <!-- box-primary-nav-trigger -->
            </header>
            <!-- end box header -->

            <!-- nav -->
            <nav>
                <ul class="box-primary-nav">
                    <?php $this->load->view('commons/menu') ?>
                </ul>
            </nav>
            <!-- end nav -->