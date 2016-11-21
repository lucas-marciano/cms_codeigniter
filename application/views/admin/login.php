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
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="#" method="post" role="form" style="display: block;">
                                        <h2>CMS | Codeigniter</h2>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" 
                                                   class="form-control" placeholder="Email" value="">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" 
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
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h6 style="font-size:14px;font-weight:100;color: #fff;">Café com Android</h6>
                </div>   
            </div>
        </footer>
    </body>
</html>