<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $title ?>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-users"></i>  <a href="<?= base_url('admin/parceiro') ?>">Parceiro</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-users"></i> <?= $title ?>
                    </li>
                </ol>
            </div>
        </div>

        <?php $this->load->view('admin/commons/mensagem_new') ?>

        <div class="row">
            <?= form_open_multipart(base_url('admin/novo-parceiro'), array("method" => "POST")); ?>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-address-book-o" aria-hidden="true"></i> Informações
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group input-group">
                            <span class="input-group-addon">Nome <small style="color: red">*</small></span>
                            <input name="partners_name" type="text" 
                                   value="<?= set_value('partners_name'); ?>"
                                   class="form-control" placeholder="O nome do parceiro">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">Email <small style="color: red">*</small></span>
                            <input name="partners_contact" type="text" 
                                   value="<?= set_value('partners_contact'); ?>"
                                   class="form-control" placeholder="email@dominio.com">
                        </div>
                        <div class="form-group">
                            <small><span style="color: red">*</span> Campos obrigatórios</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i> Imagem do Parceiro <small>* Use uma imagem de proporção igual</small>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input id="partners_avatar" type="file" name="partners_avatar" value="<?= set_value('partners_avatar') ?>" class="input-file" data-show-preview="false">
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-eye"></i> Visualização 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input name="partners_active" <?= set_value('partners_active') == 1 ? 'checked' : '' ?> type="checkbox">Mostrar parceiro?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 pull-right" style="margin-top: 30px; margin-bottom: 30px">
                <button type="submit" name="action-submit" class="btn btn-success">Cadastrar novo parceiro</button>
                <button type="reset" style="padding: 6px 34px;" class="btn btn-warning">Limpar Campo</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>