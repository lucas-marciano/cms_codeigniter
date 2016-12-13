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
                        <i class="fa fa-suitcase"></i>  <a><?= $title ?></a>
                    </li>
                </ol>
            </div>
        </div>

        <?php $this->load->view('admin/commons/mensagem') ?>

        <div class="row">
            <div class="col-lg-12">
                <a title="Novo serviço" class="btn btn-primary" href="<?= base_url('admin/novo-servico') ?>">Novo Serviço</a>
                <a title="Ver Serviços online" target="_blank" class="btn btn-info" href="<?= base_url('servicos') ?>">Ver Serviços online</a>
            </div>
        </div>

        <div class="row">
            <?php if (isset($servicos) && $servicos != NULL) { ?>
                <div class="col-lg-12">
                    <h2>Lista de Serviços</h2>
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($servicos as $servico) { ?>
                                    <tr class="<?= $servico->service_active == 0 ? 'danger' : '' ?>">
                                        <td><?= $servico->service_nome ?></td>
                                        <td>
                                            <a style="margin-right: 10px; font-size: 22px;" href="<?= base_url('admin/editar-servico/') . $servico->service_id ?>" title="Editar Serviço"><i class="fa fa-pencil"></i></a>
                                            <a style="margin-right: 10px; font-size: 22px; cursor: pointer;" onclick="deletar(<?= $servico->service_id ?>)" title="Excluir Serviço"><i class="fa fa-trash"></i></a>
                                            <a style="font-size: 22px; cursor: pointer;" href="<?= base_url('admin/active-servico/') . $servico->service_id . '/' . $servico->service_active ?>" title="Serviço Ativo">
                                                <i class="<?= $servico->service_active == 0 ? 'fa fa-eye-slash' : 'fa fa-eye' ?>"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-12">
                    <div class="well" style="margin-top: 20px">
                        Não há serviços cadastrados no sistema. Para cadastrar um novo serviço clique no botão <strong>Novo Serviço</strong> acima.
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function deletar(id) {
        var url = "<?= base_url('admin/delete-servico/') ?>";
        bootbox.confirm({
            size: "small",
            title: "ATENÇÃO",
            message: "Você deseja realmente deletar esse serviço?",
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