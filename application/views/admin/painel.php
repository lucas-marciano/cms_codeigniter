<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small><time><?= date('d/m/Y') ?></time></small>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-terminal fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $projetos ?></div>
                                <div>Projetos</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/projetos') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Mais informações</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-cubes fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $parceiros ?></div>
                                <div>Parceiros</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/parceiros') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Mais informações</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $clientes ?></div>
                                <div>Clientes</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/cliente') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Mais informações</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-paper-plane fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= count($contatos) ?></div>
                                <div>Contatos aguardando</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/contatos') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Mais informações</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bookmark fa-fw"></i> Posts mais acessados</h3>
                    </div>
                    <div class="panel-body">
                        <a href="#" class="list-group-item">
                            <span class="badge">just now</span>
                            <i class="fa fa-fw fa-calendar"></i> Calendar updated
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-paper-plane fa-fw"></i> Contatos recentes</h3>
                    </div>
                    <div class="panel-body">
                        <?php foreach ($contatos as $contato) { ?>
                            <a class="list-group-item">
                                <span class="label label-success" style="margin-right: 20px">
                                    <?= date('d/m/Y', strtotime($contato->contato_data)) ?>
                                </span>
                                <i class="fa fa-paper-plane-o"></i> <?= $contato->contato_nome ?> | <?= $contato->contato_email ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php $this->load->view('admin/commons/footer') ?>