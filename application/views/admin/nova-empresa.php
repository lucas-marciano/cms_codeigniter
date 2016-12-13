<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $title ?>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-building"></i>  <a href="<?= base_url('admin/empresas') ?>">Empresa</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-building"></i>  <?= $title ?>
                    </li>
                </ol>
            </div>
        </div> <!-- .row breadcrunbs -->
        
        <?php $this->load->view('admin/commons/mensagem_new') ?>
        
        <div class="row">
            <div class="col-lg-12">
                <?= form_open_multipart(base_url('admin/nova-empresa'), array("method" => "POST")); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-building"></i> Dados da empresa</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="form-group input-group">
                                    <span class="input-group-addon ">Nome da empresa <small style="color: red">*</small></span>
                                    <input name="company_name" type="text" value="<?= set_value('company_name'); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Endereço  <small style="color: red">*</small></span>
                                    <input name="company_address" type="text" value="<?= set_value('company_address'); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Cidade  <small style="color: red">*</small></span>
                                    <input name="company_city" type="text" value="<?= set_value('company_city'); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Estado  <small style="color: red">*</small></span>
                                    <input name="company_state" type="text" value="<?= set_value('company_state'); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">CEP  <small style="color: red">*</small></span>
                                    <input name="company_postal_code" type="text" value="<?= set_value('company_postal_code'); ?>" class="form-control mask-cep">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Telefone</span>
                                    <input name="company_phone" type="text" value="<?= set_value('company_phone'); ?>" class="form-control mask-telefone">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Fax</span>
                                    <input name="company_fax" type="text" value="<?= set_value('company_fax'); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Email  <small style="color: red">*</small></span>
                                    <input name="company_email" type="email" value="<?= set_value('company_email'); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <small><span style="color: red">*</span> Campos obrigatórios</small>
                            </div>
                            <!-- --------------------------------- REDES SOCIAIS --------------------------------- -->
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-picture-o"></i> Logotipo e Slogan</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?= form_upload(array("name" => "company_logo", "id" => "company_logo", 'placeholder' => 'Logotipo da Empresa'), set_value('company_logo'), array("class" => "input-file")); ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Slogan</span>
                                    <input name="company_slogan" type="text" value="<?= set_value('company_slogan'); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-share-alt"></i> Redes Sociais</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook-square"></i></span>
                                    <input name="company_facebook" type="text" value="<?= set_value('company_facebook'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                    <input name="company_instagram" type="text" value="<?= set_value('company_instagram'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-linkedin-square"></i></span>
                                    <input name="company_linkedin" type="text" value="<?= set_value('company_linkedin'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
                                    <input name="company_twitter" type="text" value="<?= set_value('company_twitter'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                                    <input name="company_dribble" type="text" value="<?= set_value('company_dribble'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-skype"></i></span>
                                    <input name="company_skype" type="text" value="<?= set_value('company_skype'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-google-plus-square"></i></span>
                                    <input name="company_gplus" type="text" value="<?= set_value('company_gplus'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tumblr-square"></i></span>
                                    <input name="company_tumbler" type="text" value="<?= set_value('company_tumbler'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-foursquare"></i></span>
                                    <input name="company_foursquare" type="text" value="<?= set_value('company_foursquare'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-youtube-square"></i></span>
                                    <input name="company_youtube" type="text" value="<?= set_value('company_youtube'); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------ BOTÕES --------------------------------------- -->
                <div class="col-lg-12" style="margin-top: 30px; margin-bottom: 30px">
                    <button type="submit" style="padding: 6px 50px" name="action-submit" class="btn btn-success">Salvar</button>
                    <button type="reset" style="padding: 6px 21px" class="btn btn-warning">Limpar Campos</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div> <!-- .row content form -->
    </div> <!-- .container-fluid -->
</div><!-- .page-wrapper -->
<?php $this->load->view('admin/commons/footer') ?>