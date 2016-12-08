<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Clientes
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-users"></i>  <a>Clientes</a>
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
            <div class="col-lg-12">
                <a title="Novo Cliente" class="btn btn-primary" href="<?= base_url('admin/novo-cliente') ?>">Novo cliente</a>
                <a title="Ver clientes online" target="_blank" class="btn btn-info" href="<?= base_url('home#portfolio-div') ?>">Ver clientes online</a>
            </div>
            <?php if (isset($clientes) && $clientes != NULL) { ?>
                <div class="col-lg-12">
                    <h2>Lista de Clientes</h2>
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Telefone</th>
                                    <th>Email</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clientes as $cliente) { ?>
                                    <tr class="<?= $cliente->clients_active == 0 ? 'danger' : '' ?>">
                                        <td><?= $cliente->clients_nome ?></td>
                                        <td><?= $cliente->clients_telefone ?></td>
                                        <td><?= $cliente->clients_email ?></td>
                                        <td>
                                            <a style="margin-right: 10px; font-size: 22px;" href="<?= base_url('admin/editar-cliente/') . $cliente->clients_id ?>" title="Editar Cliente"><i class="fa fa-pencil"></i></a>
                                            <a style="margin-right: 10px; font-size: 22px; cursor: pointer;" onclick="deletar(<?= $cliente->clients_id ?>)" title="Excluir Cliente"><i class="fa fa-trash"></i></a>
                                            <a style="font-size: 22px; cursor: pointer;" href="<?= base_url('admin/active-cliente/') . $cliente->clients_id . '/' . $cliente->clients_active ?>" title="Cliente Ativo"><i class="<?= $cliente->clients_active == 0 ? 'fa fa-eye-slash' : 'fa fa-eye' ?>"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else { ?>
                <div class="well">
                    <p>Não há clientes cadastrados no sistema. Para cadastrar um novo cliente clique no botão <strong>Novo Cliente</strong> acima.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function deletar(id) {
        var url = "<?= base_url('admin/delete-cliente/') ?>";
        bootbox.confirm({
            size: "small",
            title: "ATENÇÃO",
            message: "Você deseja realmente deletar esse cliente?",
            buttons: {
                confirm: {
                    label: 'Fechar',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Deletar',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (!result)
                    window.location = url + id;
            }
        });
    }
</script>
<?php $this->load->view('admin/commons/footer') ?>