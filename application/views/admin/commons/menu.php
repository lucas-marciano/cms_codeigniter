<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li <?=($this->router->fetch_class() == 'admin' && $this->router->fetch_method() == 'painel') ? 'class="active"' : null; ?> >
            <a href="<?= base_url('admin/painel') ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li <?=($this->router->fetch_class() == 'Posts') ? 'class="active"' : null; ?>>
            <a href="<?= base_url('admin/posts') ?>"><i class="fa fa-bookmark"></i> Posts</a>
        </li>
        <li <?=($this->router->fetch_class() == 'Empresa') ? 'class="active"' : null; ?>>
            <a href="<?= base_url('admin/empresas') ?>"><i class="fa fa-building"></i> Empresa</a>
        </li>
        <li <?=($this->router->fetch_class() == 'Cliente') ? 'class="active"' : null; ?>>
            <a href="<?= base_url('admin/cliente') ?>"><i class="fa fa-users"></i> Clientes</a>
        </li>
        <li <?=($this->router->fetch_class() == 'Projeto') ? 'class="active"' : null; ?>>
            <a href="<?= base_url('admin/projetos') ?>"><i class="fa fa-terminal"></i> Projetos</a>
        </li>       
        <li <?=($this->router->fetch_class() == 'Galeria' && $this->router->fetch_method() == 'index') ? 'class="active"' : null; ?>>
            <a href="<?= base_url('admin/galerias') ?>"><i class="fa fa-picture-o"></i> Galeria</a>
        </li>
        <li <?=($this->router->fetch_class() == 'Parceiro' && $this->router->fetch_method() == 'index') ? 'class="active"' : null; ?>>
            <a href="<?= base_url('admin/parceiros') ?>"><i class="fa fa-cubes"></i> Parceiros</a>
        </li>
        <li <?=($this->router->fetch_class() == 'ServicoAdm') ? 'class="active"' : null; ?>>
            <a href="<?= base_url('admin/servicos') ?>"><i class="fa fa-suitcase"></i> Serviços Prestados</a>
        </li>
        <li <?=($this->router->fetch_class() == 'Contato') ? 'class="active"' : null; ?>>
            <a href="javascript:;" data-toggle="collapse" data-target="#contato"><i class="fa fa-paper-plane"></i> Contatos 
                <i class="fa fa-chevron-down"></i></a>
            <ul id="contato" class="collapse">
                <li>
                    <a href="<?= base_url('admin/contatos') ?>">Contatos da empresa</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/trabalhe-conosco') ?>">Trabalhe conosco</a>
                </li>
            </ul>
        </li>
         <li <?=($this->router->fetch_class() == 'Categorias') ? 'class="active"' : null; ?>>
            <a href="<?= base_url('admin/categorias') ?>"><i class="fa fa-check-square-o"></i> Categorias</a>
        </li>
    </ul>
</div>