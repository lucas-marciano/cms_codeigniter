<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Projetos
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-terminal"></i>  <a>Projetos</a>
                    </li>
                </ol>
            </div>
        </div>

        <?php $this->load->view('admin/commons/mensagem') ?>
        
        <div class="row">
            <div class="col-lg-12">
                <a title="Novo Projeto" class="btn btn-primary" href="<?= base_url('admin/novo-projeto') ?>">Novo Projeto</a>
                <a title="Ver Projetos online" target="_blank" class="btn btn-info" href="<?= base_url('home') ?>">Ver projetos online</a>
            </div>
            <?php if (isset($projetos) && $projetos != NULL) { ?>
                <div class="col-lg-12">
                    <h2>Lista de Projetos</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Categorias</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projetos as $projeto) { ?>
                                    <tr class="<?= $projeto->projects_active == 0 ? 'danger' : '' ?>">
                                        <td><?= $projeto->projects_name ?></td>
                                        <td></td>
                                        <td>
                                            <a style="margin-right: 10px; font-size: 22px;" href="<?= base_url('admin/editar-projeto/') . $projeto->projects_id ?>" title="Editar Projeto"><i class="fa fa-pencil"></i></a>
                                            <a style="margin-right: 10px; font-size: 22px; cursor: pointer;" onclick="deletar(<?= $projeto->projects_id ?>)" title="Excluir Projeto"><i class="fa fa-trash"></i></a>
                                            <a style="font-size: 22px; cursor: pointer;" href="<?= base_url('admin/active-projeto/') . $projeto->projects_id . '/' . $projeto->projects_active ?>"><i class="<?= $projeto->projects_active == 0 ? 'fa fa-eye-slash' : 'fa fa-eye' ?>"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-12" style="margin-top: 20px;">
                    <div class="well">
                        Não há projetos cadastrados no sistema. Para cadastrar um novo projeto clique no botão <strong>Novo Projeto</strong>.
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function deletar(id) {
        var url = "<?= base_url('admin/delete-projeto/') ?>";
        bootbox.confirm({
            size: "small",
            title: "ATENÇÃO",
            message: "Você deseja realmente deletar esse projeto?",
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