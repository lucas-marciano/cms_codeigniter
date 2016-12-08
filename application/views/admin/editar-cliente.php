<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Editar Cliente
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-users"></i>  <a href="<?= base_url('admin/cliente') ?>">Clientes</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-users"></i> Editar Cliente
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($error) && $error != "") { ?>
                    <div style="margin: 20px 0px;" class="alert alert-danger shadow-box row" role="alert">
                        <div class="col-lg-11">
                            <?= $error ?>
                        </div>
                        <div class="col-lg-1 text-right">
                            <span style="color: #A94442; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                <?php } else if (isset($sucess) && $sucess != '') { ?>
                    <div style="margin: 20px 0px;" class="alert alert-success shadow-box row" role="alert">
                        <div class="col-lg-11">
                            <?= $sucess ?>
                        </div>
                        <div class="col-lg-1 text-right">
                            <span style="color: #3C763D; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <?php foreach ($clientes as $cliente) { ?>
                <?= form_open_multipart(base_url('admin/editar-cliente/') . $cliente->clients_id, array("method" => "POST")); ?>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-address-book-o" aria-hidden="true"></i> Informações do cliente
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Nome</span>
                                <input name="clients_nome" type="text" 
                                       value="<?= $cliente->clients_nome ?>"
                                       class="form-control" placeholder="O nome do cliente">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Email</span>
                                <input name="clients_email" type="email" 
                                       value="<?= $cliente->clients_email ?>"
                                       class="form-control" placeholder="email@dominio.com">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">Telefone</span>
                                <input name="clients_telefone" type="text" 
                                       value="<?= $cliente->clients_telefone ?>"
                                       class="form-control mask-telefone" placeholder="(00) 00000-0000">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">CNPJ</span>
                                <input name="clients_cnpj" type="text" 
                                       value="<?= $cliente->clients_cnpj ?>"
                                       class="form-control mask-cnpj" placeholder="00.000.000/0000-00">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-file-image-o" aria-hidden="true"></i> Imagens do cliente
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <?= form_upload(array("name" => "clients_capa", "id" => "clients_capa"), $cliente->clients_capa, array("class" => "input-file")); ?>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label></label>
                                    <select name="clients_dimension" class="form-control">
                                        <option selected disabled>Tamanho da box de apresentação</option>
                                        <option <?= $cliente->clients_dimension == 200 ? 'selected' : '' ?> value="200">Grande [200x200]</option>
                                        <option <?= $cliente->clients_dimension == 100 ? 'selected' : '' ?> value="100">Média  [100x100]</option>
                                        <option <?= $cliente->clients_dimension == 50 ? 'selected' : '' ?> value="50">Grande [50x50]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 pull-right" style="margin-top: 30px; margin-bottom: 30px">
                    <button type="submit" style="padding: 6px 34px;" name="cliente-submit" class="btn btn-success">Editar clinte</button>
                    <button type="reset" style="padding: 6px 34px;" class="btn btn-warning">Limpar Campo</button>
                </div>
                <?= form_close(); ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>