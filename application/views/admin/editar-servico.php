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
                    <li>
                        <i class="fa fa-suitcase"></i>  <a href="<?= base_url('admin/servicos') ?>">Serviços Prestados</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-suitcase"></i>  <?= $title ?>
                    </li>
                </ol>
            </div>
        </div>

        <?php $this->load->view('admin/commons/mensagem_new') ?>

        <div class="row">
            <?php foreach ($servicos as $servico) { ?>
                <?= form_open_multipart(base_url('admin/editar-servico/') . $servico->service_id, array("method" => "POST")); ?>
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
                                       value="<?= $servico->service_nome ?>"
                                       class="form-control">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Descrição <small style="color: red">*</small></span>
                                <textarea name="service_description" rows="7" style="resize: none;"
                                          class="form-control"><?= $servico->service_description ?></textarea>
                            </div>
                            <div class="form-group">
                                <small><span style="color: red">*</span> Campos obrigatórios</small>
                            </div>
                        </div>
                    </div>
                </div> <!-- fim bloco de informações -->

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-file-image-o" aria-hidden="true"></i> Imagens <small>Use uma imagem de proporção igual</small>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <?= form_upload(array("name" => "service_picture", "id" => "service_picture"), $servico->service_picture, array("class" => "input-file")); ?>
                            </div>
                            <div style="display: block; width: 100%; text-align: center;"> -- OU -- </div>
                            <br>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Icone</span>
                                <input id="service_icon" type="text" name="service_icon" value="<?= $servico->service_icon ?>" class="form-control" placeholder="ion-android-favorite-outline">
                            </div>
                            <div class="form-group">
                                <small>Os icones estão disponiveis <a href="http://ionicons.com/" target="_blank">aqui.</a></small><br>
                                <small>A escolha de um alunara a outra. Preencha apenas uma.</small>
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
                                            <input name="service_active" <?= $servico->service_active == 1 ? 'checked' : '' ?> type="checkbox">Mostrar esse serviço?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- fim bloco imagens e visualização -->

                <div class="col-lg-12" style="margin-top: 30px; margin-bottom: 30px">
                    <button style="padding: 6px 41px;" type="submit" name="action-submit" class="btn btn-success">Editar serviço</button>
                    <button type="reset" style="padding: 6px 34px;" class="btn btn-warning">Limpar Campos</button>
                </div>
                <?= form_close(); ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>