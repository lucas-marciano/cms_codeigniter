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
                        <i class="fa fa-cubes"></i>  <a><?= $title ?></a>
                    </li>
                </ol>
            </div>
        </div>

        <?php $this->load->view('admin/commons/mensagem') ?>

        <div class="row">
            <div class="col-lg-12">
                <a title="Novo Parceiro" class="btn btn-primary" href="<?= base_url('admin/novo-parceiro') ?>">Novo Parceiro</a>
                <a title="Ver Parceiros online" target="_blank" class="btn btn-info" href="<?= base_url('home#portfolio-div') ?>">Ver Parceiros online</a>
            </div>
        </div>

        <div class="row">
            <?php if (isset($parceiros) && $parceiros != NULL) { ?>
                <div class="col-lg-12">
                    <h2>Lista de Parceiros</h2>
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Parceiro</th>
                                    <th>Contato</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($parceiros as $parceiro) { ?>
                                    <tr class="<?= $parceiro->partners_active == 0 ? 'danger' : '' ?>">
                                        <td><?= $parceiro->partners_name ?></td>
                                        <td><?= $parceiro->partners_contact ?></td>
                                        <td>
                                            <a style="margin-right: 10px; font-size: 22px;" href="<?= base_url('admin/editar-parceiro/') . $parceiro->partners_id ?>" title="Editar Parceiro"><i class="fa fa-pencil"></i></a>
                                            <a style="margin-right: 10px; font-size: 22px; cursor: pointer;" onclick="deletar(<?= $parceiro->partners_id ?>)" title="Excluir Parceiro"><i class="fa fa-trash"></i></a>
                                            <a style="font-size: 22px; cursor: pointer;" href="<?= base_url('admin/active-parceiro/') . $parceiro->partners_id . '/' . $parceiro->partners_active ?>" title="Parceiro Ativo">
                                                <i class="<?= $parceiro->partners_active == 0 ? 'fa fa-eye-slash' : 'fa fa-eye' ?>"></i>
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
                        Não há parceiros cadastrados no sistema. Para cadastrar um novo parceiro clique no botão <strong>Novo Parceiro</strong> acima.
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function deletar(id) {
        var url = "<?= base_url('admin/delete-parceiro/') ?>";
        bootbox.confirm({
            size: "small",
            title: "ATENÇÃO",
            message: "Você deseja realmente deletar esse parceiro?",
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