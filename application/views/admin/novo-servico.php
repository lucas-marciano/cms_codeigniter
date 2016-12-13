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
                        <i class="fa fa-suitcase"></i>  <a href="<?= base_url('admin/servicos') ?>">Serviços Prestados</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-suitcase"></i> <?= $title ?>
                    </li>
                </ol>
            </div>
        </div>

        <?php $this->load->view('admin/commons/mensagem_new') ?>

        <div class="row">
            <?= form_open_multipart(base_url('admin/novo-servico'), array("method" => "POST")); ?>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-address-book-o" aria-hidden="true"></i> Informações
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group input-group">
                            <span class="input-group-addon">Serviço <small style="color: red">*</small></span>
                            <input name="service_nome" type="text" 
                                   value="<?= set_value('service_nome'); ?>"
                                   class="form-control" placeholder="A identificação do serviço">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">Descrição <small style="color: red">*</small></span>
                            <textarea name="service_description" type="text" rows="9" style="resize: none;"
                                      class="form-control"><?= set_value('service_description'); ?></textarea>
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
                            <i class="fa fa-file-image-o" aria-hidden="true"></i> Imagem <small>* Use uma imagem de proporção igual</small>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input id="service_picture" type="file" name="service_picture" value="<?= set_value('service_picture') ?>" class="input-file" data-show-preview="false">
                        </div>
                        <div style="display: block; width: 100%; text-align: center;"> -- OU -- </div>
                        <br>
                        <div class="form-group input-group">
                            <span class="input-group-addon">Icone</span>
                            <input id="service_icon" type="text" name="service_icon" value="<?= set_value('service_icon') ?>" class="form-control" placeholder="ion-android-favorite-outline">
                        </div>
                        <div class="form-group">
                            <small>Os icones estão disponiveis <a href="http://ionicons.com/" target="_blank">aqui.</a></small><br>
                            <small>A escolha de um anula a outra. Preencha apenas uma.</small>
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
                                        <input name="service_active" <?= set_value('service_active') == 1 ? 'checked' : '' ?> type="checkbox">Mostrar esse serviço?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 pull-right" style="margin-top: 30px; margin-bottom: 30px">
                <button type="submit" name="action-submit" class="btn btn-success">Cadastrar novo serviço</button>
                <button type="reset" style="padding: 6px 34px;" class="btn btn-warning">Limpar Campos</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>