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
                        <i class="fa fa-paper-plane"></i> Contatos
                    </li>
                    <li class="active">
                        <i class="fa fa-paper-plane"></i>  <?= $title ?>
                    </li>
                </ol>
            </div>
        </div>

        <?php $this->load->view('admin/commons/mensagem') ?>

        <div class="row">
            <?php if ($contatos) { ?>
                <div class="col-lg-12">
                    <div class="list-group">
                        <?php foreach ($contatos as $contato) { ?>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h4 class="list-group-item-heading"><?= $contato->contato_nome ?> | <?= $contato->contato_email ?> | <?= $contato->contato_telefone ?></h4>
                                        <p class="list-group-item-text"><?= $contato->contato_mensagem ?></p>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <a style="font-size: 28px; margin-right: 10px;" href="mailto: <?= $contato->contato_email ?>" class="hint--top-left hint--info" aria-label="Responder via email" ><i class="fa fa-paper-plane"></i></a>
                                        <a style="font-size: 32px; margin-right: 10px;" href="<?= base_url('admin/delete-trabalhe-conosco/') . $contato->contato_id ?>" class="hint--top hint--info" aria-label="Apagar contato"><i class="fa fa-trash"></i></a>
                                        <a style="font-size: 32px" href="<?= base_url('admin/edite-contato/') . $contato->contato_id . '/' . $contato->contato_lido ?>" class="hint--top-right hint--info" aria-label="Alterar status"><i class="<?= $contato->contato_lido == 0 ? 'fa fa-envelope' : 'fa fa-envelope-open' ?>"></i></a>
                                        <a style="font-size: 32px" href="<?= UPLOAD . 'trabalhe-conosco/' . $contato->contato_anexo ?>" class="hint--top-right hint--info" aria-label="Baixar arquivo"><i class="fa fa-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-12">
                    <div class="well" style="margin-top: 20px">
                        Não há Currículos registrados.
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>