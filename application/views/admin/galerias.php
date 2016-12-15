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
                        <i class="fa fa-picture-o"></i> <?= $title ?>
                    </li>
                </ol>
            </div>
        </div>

        <?php $this->load->view('admin/commons/mensagem') ?>

        <div class="row">
            <div class="col-lg-12">
                <h3>Nova galeria</h3>
            </div>
            <?= form_open_multipart(base_url('admin/nova-galeria'), array("method" => "POST")); ?>
            <div class="col-lg-9">
                <div class="form-group input-group">
                    <span class="input-group-addon">Titulo da galeria</span>
                    <input id="gallery_nome" name="gallery_nome" class="form-control" type="text">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group input-group">
                    <input id="gallery_folder" name="gallery_folder[]" type="file" multiple class="file-loading">
                    <div id="errorBlock" class="help-block"></div>
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" style="padding: 6px 50px" name="action-submit" class="btn btn-success">Salvar</button>
                <button type="reset" style="padding: 6px 21px" class="btn btn-warning">Limpar Campos</button>
            </div>
            <?= form_close(); ?>
        </div>
        <hr>
        <div class="row">
            <?php if ($galerias) { ?>
                <div class="col-lg-12">
                    <h3>Galerias</h3>
                </div>
                <?php foreach ($galerias as $galeria) { ?>
                    <div class="col-lg-12">
                        <h4><?= $galerias->gallery_nome ?>  <a href="<?= base_url('admin/deletar-galeria/') . $galerias->gallery_id ?>" class="btn btn-xs btn-danger">Apagar</a> </h4> 
                        <div class="flex-container">
                            <img class="flex-item" src="http://placehold.it/200x200" alt="">
                            <img class="flex-item" src="http://placehold.it/200x200" alt="">
                            <img class="flex-item" src="http://placehold.it/200x200" alt="">
                            <img class="flex-item" src="http://placehold.it/200x200" alt="">
                            <img class="flex-item" src="http://placehold.it/200x200" alt="">
                            <img class="flex-item" src="http://placehold.it/200x200" alt="">
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="col-lg-12">
                    <div class="well" style="margin-top: 20px">
                        Não há galerias cadastradas.
                    </div>
                </div>
            <?php } ?>
        </div>



    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>