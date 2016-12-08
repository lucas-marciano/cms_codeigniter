<?php $this->load->view('admin/commons/header') ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Editar Projeto
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($error) && $error != "") { ?>
                    <div style="margin: 20px 0px;" class="alert alert-danger shadow-box row" role="alert">
                        <div class="col-lg-11">
                            <?= $error ?>
                        </div>
                        <div class="col-lg-1 text-right">
                            <span style="color: #A94442; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                <?php } else if (isset($sucess) && $sucess != '') { ?>
                    <div style="margin: 20px 0px;" class="alert alert-success shadow-box row" role="alert">
                        <div class="col-lg-11">
                            <?= $sucess ?>
                        </div>
                        <div class="col-lg-1 text-right">
                            <span style="color: #3C763D; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <?php foreach ($projetos as $projeto) { ?>
                <?= form_open_multipart(base_url('admin/editar-projeto'), array("method" => "POST")); ?>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-address-book-o" aria-hidden="true"></i> Informações do projeto
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group input-group">
                                <span class="input-group-addon" style="padding-right: 39px;">Nome</span>
                                <input name="projects_name" type="text" 
                                       value="<?= $projeto->projects_name ?>"
                                       class="form-control">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Descrição</span>
                                <textarea name="projects_description" rows="7" style="resize: none;"
                                          class="form-control"><?= $projeto->projects_description ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> <!-- fim bloco de informações -->

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-file-image-o" aria-hidden="true"></i> Imagens de capa <small>  Use uma imagem de proporção igual</small>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <?= form_upload(array("name" => "projects_capa", "id" => "projects_capa"), set_value('projects_capa'), array("class" => "input-file")); ?>
                            </div>
                            <div class="form-group">
                                <select name="projects_dimension" class="form-control">
                                    <option selected disabled>Tamanho da box de apresentação</option>
                                    <option <?= $projeto->projects_dimension == 200 ? 'selected' : '' ?> value="200">Grande [200x200]</option>
                                    <option <?= $projeto->projects_dimension == 100 ? 'selected' : '' ?> value="100">Média  [100x100]</option>
                                    <option <?= $projeto->projects_dimension == 50 ? 'selected' : '' ?> value="50">Grande [50x50]</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-eye"></i> Visualização
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input name="projects_active" <?= $projeto->projects_active == 1 ? 'checked' : '' ?> type="checkbox">Mostrar projeto?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- fim bloco imagens e visualização -->

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-file-image-o"></i> Selecione uma Galeria <small>Opcional</small>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="form-group">
                                        <?php
                                        if ($gallery != NULL) {
                                            foreach ($gallery as $gal) {
                                                ?>
                                                <label>
                                                    <input name="projects_gallery" value="<?= $gal->gallery_id ?>" checked="<?= $projeto->projects_gallery == $gal->gallery_id ? 'true' : '' ?>" type="radio">
                                                    <div class="well"><?= $gal->gallery_nome ?></div>
                                                </label>
                                                <?php
                                            }
                                        } else {
                                            echo "<div class='well'>
                                            Não há <a href='" . base_url('admin/galerias') . "'>Galerias</a> cadastradas no sistema.
                                          </div>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- fim da galeria -->

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-check-square-o"></i> Categorias <small>Opcional</small>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <?php
                                    if ($categories != NULL) {
                                        foreach ($categories as $categ) {
                                            foreach ($ctg_selecionadas as $select) {
                                                if ($categ->category_id == $select->category_id) {
                                                    ?>
                                                    <label class="checkbox-inline">
                                                        <input checked="true" type="checkbox" value="<?= $categ->category_id ?>" name="categoria_project[]"><?= $categ->category_name ?>
                                                    </label>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <label class="checkbox-inline">
                                                        <input checked="false" type="checkbox" value="<?= $categ->category_id ?>" name="categoria_project[]"><?= $categ->category_name ?>
                                                    </label>
                                                    <?php
                                                }
                                            }
                                        }
                                    } else {
                                        echo "<div class='well'>
                                            Não há <a href='" . base_url('admin/categorias') . "'>Categorias</a> cadastradas no sistema.
                                          </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- fim da seleção de categorias -->

                <div class="col-lg-12" style="margin-top: 30px; margin-bottom: 30px">
                    <button type="submit" name="project-submit" class="btn btn-success">Cadastrar novo projeto</button>
                    <button type="reset" style="padding: 6px 34px;" class="btn btn-warning">Limpar Campo</button>
                </div>
                <?= form_close(); ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php $this->load->view('admin/commons/footer') ?>