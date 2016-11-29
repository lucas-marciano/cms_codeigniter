<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?php $title ?> <small><time><?= date('d/m/Y') ?></time></small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a title="Novo Cliente" class="btn btn-link" href="<?= base_url('admin/novo-cliente') ?>">Novo cliente</a>
            </div>
            <div class="col-lg-12">
                <h2>Contextual Classes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Sobre</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cliente A</td>
                                <td>Informações</td>
                                <td>

                                </td>
                            </tr>

                            <tr class="danger">
                                <td>Cliente B</td>
                                <td>Informações</td>
                                <td>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>