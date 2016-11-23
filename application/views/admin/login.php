<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Lucas Marciano">

        <title>Login | CMS</title>
        <link href="<?= base_url('_assets/www/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link rel="icon" href="<?= base_url('_assets/www/img/favicon.png') ?>" type="image/x-icon">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url('_assets/admin/css/login.css') ?>">


    </head>
    <body>
        <style>
            .shadow-box{
                margin: 0px 40px;
                -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.64);
                -moz-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.64);
                box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.64);
                border: 0px;
            }
        </style>
        <div class="container">
            <div class="row">
                <header style="padding: 10px; text-align: center; color: #fff" class="col-md-6 col-md-offset-3">
                    <!--<img alt="CMS Codeigniter" title="CMS Codeigniter" src="<?= base_url('_assets/www/img/logo.png') ?>">-->
                    <h1>CMS Codeigniter</h1>
                </header>
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-body">
                            <div class="row">
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger shadow-box" role="alert"><?= $error ?></div>
                                <?php } ?>
                                <div class="col-lg-12">
                                    <form id="login-form" action="<?= base_url('login') ?>" method="post" role="form" style="display: block;">
                                        <h2>Acesse o sistema</h2>
                                        <div class="form-group">
                                            <input type="email" name="user_email" id="user_email" 
                                                   class="form-control" placeholder="Email" value="">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="user_password" id="user_password" 
                                                   class="form-control" placeholder="Senha">
                                        </div>

                                        <div class="col-xs-12 form-group">     
                                            <input type="submit" name="login-submit" id="login-submit" 
                                                   class="form-control btn btn-login" value="Entrar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="col-md-12 text-center">
                    <h6 style="font-size:14px;font-weight:100;color: #fff;">Todos os direitos reservados a 
                        <a target="_blank" href="http://cafecomandroid.com.br" title="Café com Android">Café com Android</a>. <?= date('Y') ?></h6>
                </div>   
            </div>
        </footer>
        <script src="<?= base_url('_assets/www/js/jquery-2.1.1.js') ?>"></script>
        <script src="<?= base_url('_assets/admin/js/script.js') ?>"></script>
    </body>
</html>