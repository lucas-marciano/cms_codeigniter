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
                        <i class="fa fa-check-square-o"></i> <?= $title ?>
                    </li>
                </ol>
            </div>
        </div> <!-- fim cabeçalho -->

        <?php $this->load->view('admin/commons/mensagem') ?>

        <div class="row">
            <?= form_open(base_url('admin/novo-categoria'), array("method" => "POST")); ?>
            <div class="col-lg-8">
                <div class="form-group input-group">
                    <span class="input-group-addon">Categoria</span>
                    <input name="category_name" type="text" 
                           value="<?= set_value('category_name'); ?>"
                           class="form-control">
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <select name="category_parent" class="form-control">
                        <option selected disabled>Categoria Pai</option>
                        <?php foreach ($categorias as $categoria) { ?>
                            <option <?= set_value('category_parent') == $categoria->category_id ? 'selected' : '' ?> value="<?= $categoria->category_id ?>"><?= $categoria->category_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-lg-2">
                <button style="width: 100%" type="submit" name="action-submit" class="btn btn-success">Salvar</button>
            </div>
            <?= form_close() ?>
        </div> <!-- fim de form de cadastro -->

        <div class="row">
            <div class="col-lg-12">
                <p>Esse icone <i class="fa fa-level-down"></i> indica que a categoria é uma subcategria.</p>
            </div>
            <div class="col-lg-12">
                <div class="flex-container">
                    <?php foreach ($categorias as $categoria) { ?>
                        <a onclick="deletar(<?= $categoria->category_id ?>)" style="cursor: pointer" 
                           class="hint--top-right hint--bounce btn btn-info flex-item" aria-label="Clique para apagar">
                            <?= $categoria->category_parent == NULL ? '' : '<i class="fa fa-level-down"></i>' ?> 
                            <?= $categoria->category_name ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div> <!-- fim lista de palavras chaves -->
        <?php if ($categorias) { ?>
            <script>
                function deletar(id) {
                    var url = "<?= base_url('admin/delete-categoria/') ?>";
                    bootbox.confirm({
                        size: 'small',
                        title: 'Atenção',
                        message: "Você deseja realmente deletar essa categoria? \n\
                        Isso vai alterar os itens relacionados a essa categoria.",
                        buttons: {
                            confirm: {
                                label: 'Fechar',
                                className: 'btn btn-success'
                            },
                            cancel: {
                                label: 'Deletar',
                                className: 'btn btn-danger'
                            }
                        },
                        callback: function (result) {
                            if (!result)
                                window.location = url + id;
                        }
                    });
                }
            </script>
        <?php } ?>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>