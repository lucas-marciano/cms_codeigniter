<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Empresa
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-building"></i>  Empresa
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <?php if ($this->session->flashdata('sucess') !== NULL) { ?>
                <div style="margin: 20px 0px;" class="alert alert-success shadow-box row" role="alert">
                    <div class="col-lg-11">
                        <?= $this->session->flashdata('sucess') ?>
                    </div>
                    <div class="col-lg-1 text-right">
                        <span style="color: #3C763D; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                </div>
                <?php $this->session->unset_tempdata('sucess'); ?>    
            <?php } else if ($this->session->flashdata('error') !== NULL) { ?>
                <div style="margin: 20px 0px;" class="alert alert-danger shadow-box row" role="alert">
                    <div class="col-lg-11">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                    <div class="col-lg-1 text-right">
                        <span style="color: #A94442; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                </div>
                <?php $this->session->unset_tempdata('error'); ?> 
            <?php } ?>

            <div class="col-lg-12" style="margin-bottom: 20px">
                <a title="Editar informações" class="btn btn-primary" href="<?= base_url('admin/editar-empresa/'). $empresa[0]->company_id ?>">Editar informações</a>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Imagens e logotipo</h3>
                    </div>
                    <div class="panel-body center center-block">
                        <img class="img-thumbnail center center-block" width="200" src="<?= base_url('uploads/empresa/') . $empresa[0]->company_logo ?>" alt="<?= $empresa[0]->company_name ?>" title="<?= $empresa[0]->company_name ?>">
                        <h3 style="text-align: center;"><?= $empresa[0]->company_name ?></h3>
                        <h4 style="text-align: center;"><?= $empresa[0]->company_slogan ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados de contato</h3>
                    </div>
                    <div class="panel-body">
                        <label>Telefone </label><?= $empresa[0]->company_phone ?><br>
                        <label>Email </label><?= $empresa[0]->company_email ?><br>
                        <label>Fax </label><?= $empresa[0]->company_fax ?><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Endereço</h3>
                    </div>
                    <div class="panel-body">
                        <label>Endereço </label><?= $empresa[0]->company_address ?><br>
                        <label>Cidade </label><?= $empresa[0]->company_city ?><br>
                        <label>Estado </label><?= $empresa[0]->company_state ?><br>
                        <label>Pais </label><?= $empresa[0]->company_country ?><br>
                        <label>CEP </label><?= $empresa[0]->company_postal_code ?><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Redes Sociais</h3>
                    </div>
                    <div class="panel-body">
                        <label <?= $empresa[0]->company_facebook == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-facebook-square"></i></label> <?= $empresa[0]->company_facebook == '' ? '' : $empresa[0]->company_facebook ?><br>
                        <label <?= $empresa[0]->company_instagram == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-instagram"></i></label> <?= $empresa[0]->company_instagram == '' ? '' : $empresa[0]->company_instagram ?><br>
                        <label <?= $empresa[0]->company_linkedin == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-linkedin-square"></i></label> <?= $empresa[0]->company_linkedin == '' ? '' : $empresa[0]->company_linkedin ?><br>
                        <label <?= $empresa[0]->company_twitter == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-twitter-square"></i></label> <?= $empresa[0]->company_twitter == '' ? '' : $empresa[0]->company_twitter ?><br>
                        <label <?= $empresa[0]->company_dribble == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-dribbble"></i></label> <?= $empresa[0]->company_dribble == '' ? '' : $empresa[0]->company_dribble ?><br>
                        <label <?= $empresa[0]->company_skype == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-skype"></i></label> <?= $empresa[0]->company_skype == '' ? '' : $empresa[0]->company_skype ?><br>
                        <label <?= $empresa[0]->company_gplus == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-google-plus-square"></i></label> <?= $empresa[0]->company_gplus == '' ? '' : $empresa[0]->company_gplus ?><br>
                        <label <?= $empresa[0]->company_tumbler == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-tumblr-square"></i></label> <?= $empresa[0]->company_tumbler == '' ? '' : $empresa[0]->company_tumbler ?><br>
                        <label <?= $empresa[0]->company_foursquare == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-foursquare"></i></label> <?= $empresa[0]->company_foursquare == '' ? '' : $empresa[0]->company_foursquare ?><br>
                        <label <?= $empresa[0]->company_youtube == '' ? 'class="label-inactive hint--right hint--warning" aria-label="Não cadastrado"' : '' ?>><i class="fa fa-youtube-square"></i></label> <?= $empresa[0]->company_youtube == '' ? '' : $empresa[0]->company_youtube ?><br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>