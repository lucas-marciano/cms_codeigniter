<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?= $wordkeys ?>">
        <meta name="description" content="<?= $meta_description ?>">
        <meta name="author" content="Lucas Marciano">

        <title><?= $title ?> | CMS Codeigniter</title>
        <link rel="icon" href="<?= base_url('_assets/www/img/favicon.png') ?>" type="image/x-icon">
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url('_assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url('_assets/admin/css/sb-admin.css') ?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?= base_url('_assets/admin/css/plugins/morris.css') ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url('_assets/admin/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

        <!-- File input -->
        <link href="<?= base_url('_assets/admin/css/plugins/kartik-v/fileinput.min.css') ?>" rel="stylesheet" type="text/css">
        
        <!-- Hint.css -->
        <link href="<?= base_url('_assets/admin/css/plugins/hintcss/hint.min.css') ?>" rel="stylesheet" type="text/css">
        
        <!-- Animate.css -->
        <link href="<?= base_url('_assets/libs/css/animatecss/animate.min.css') ?>" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('admin/painel') ?>">CMS Admin</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li><a href="#">Alert Name <span class="label label-default">Alert Badge</span></a></li>
                            <li><a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a></li>
                            <li><a href="#">Alert Name <span class="label label-success">Alert Badge</span></a></li>
                            <li><a href="#">Alert Name <span class="label label-info">Alert Badge</span></a></li>
                            <li><a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a></li>
                            <li><a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a></li>
                            <li class="divider"></li>
                            <li><a href="#">View All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url('home') ?>" target="_blank">Ver Site</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $this->session->userdata('user_name') ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= base_url('admin/perfil') ?>"><i class="fa fa-fw fa-user"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/mensagens') ?>"><i class="fa fa-fw fa-envelope"></i> Mensagens</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/configuracoes') ?>"><i class="fa fa-fw fa-gear"></i> Configurações</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= base_url('admin/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <?php $this->load->view('admin/commons/menu') ?>
                <!-- /.navbar-collapse -->
            </nav>