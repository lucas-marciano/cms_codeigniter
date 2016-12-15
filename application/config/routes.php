<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// ================== WWW ROUTES ==================

$route['default_controller'] = 'Home';
$route['sobre'] = "Home/Sobre";
$route['servicos'] = "Servicos";
$route['projetos'] = "Projetos";
$route['projetos/(:num)'] = "Projetos/projetos/$1";
$route['contatos'] = "Contatos/index";
$route['trabalhe-conosco'] = "Contatos/TrabalheConosco";

// ================== ADMIN ROUTES ==================

$route['login'] = "Admin/Login";
$route['painel'] = "Admin/Painel";
$route['admin/perfil'] = "Admin/Perfil";
$route['admin/configuracoes'] = "Admin/Configuracao";
$route['admin/mensagens'] = "Admin/Mensagens";

// Admin dos clientes
$route['admin/cliente'] = "Cliente";
$route['admin/novo-cliente'] = "Cliente/NovoCliente";
$route['admin/editar-cliente/(:num)'] = "Cliente/EditeCliente/$1";
$route['admin/delete-cliente/(:num)'] = "Cliente/DeleteCliente/$1";
$route['admin/active-cliente/(:num)/(:num)'] = "Cliente/AtivarCliente/$1/$1"; //id/estatus atual

// Admin dos projetos
$route['admin/projetos'] = "Projeto";
$route['admin/novo-projeto'] = "Projeto/NovoProjeto";
$route['admin/editar-projeto/(:num)'] = "Projeto/EditeProjeto/$1";
$route['admin/delete-projeto/(:num)'] = "Projeto/DeleteProjeto/$1";
$route['admin/active-projeto/(:num)/(:num)'] = "Projeto/AtivarProjeto/$1/$1"; //id/estatus atual

// Admin dos empresa
$route['admin/empresas'] = "Empresa";
$route['admin/nova-empresa'] = "Empresa/NovaEmpresa";
$route['admin/editar-empresa/(:num)'] = "Empresa/EditarEmpresa/$1";

// Admin dos parceiros
$route['admin/parceiros'] = "Parceiro";
$route['admin/novo-parceiro'] = "Parceiro/NovoParceiro";
$route['admin/editar-parceiro/(:num)'] = "Parceiro/EditeParceiro/$1";
$route['admin/delete-parceiro/(:num)'] = "Parceiro/DeleteParceiro/$1";
$route['admin/active-parceiro/(:num)/(:num)'] = "Parceiro/AtivarParceiro/$1/$1"; //id/estatus atual

// Admin dos Servicos
$route['admin/servicos'] = "ServicoAdm";
$route['admin/novo-servico'] = "ServicoAdm/NovoServico";
$route['admin/editar-servico/(:num)'] = "ServicoAdm/EditeServico/$1";
$route['admin/delete-servico/(:num)'] = "ServicoAdm/DeleteServico/$1";
$route['admin/active-servico/(:num)/(:num)'] = "ServicoAdm/AtivarServico/$1/$1"; //id/estatus atual

//Contatos feitos pelo site
$route['admin/contatos'] = "ContatoAdm/index";
$route['admin/trabalhe-conosco'] = "ContatoAdm/TrabelheConosco";
$route['admin/edite-contato/(:num)/(:num)'] = "ContatoAdm/EditeContato/$1/$1";
$route['admin/delete-contato/(:num)'] = "ContatoAdm/DeleteContato/$1";
$route['admin/delete-trabalhe-conosco/(:num)'] = "ContatoAdm/DeleteTrabalheConosco/$1";

//Admin da galeria
$route['admin/galerias'] = "Galeria";
$route['admin/nova-galeria'] = "Galeria/NovaGaleria";
$route['admin/deletar-galeria/(:num)'] = "Galeria/DeletarGallery/$1";
$route['admin/delatar-image-galeria/(:num)/(:any)'] = "Galeria/DeletarPorImagem/$1/$2";

//Posts
$route['admin/posts'] = "Posts/ListaPosts";
$route['admin/comentarios'] = "Posts/ComentarioPosts";

//Admin da Cateogiras
$route['admin/categorias'] = "Categorias/index";
$route['admin/delete-categoria/(:num)'] = "Categorias/DeleteCategoria/$1";
$route['admin/novo-categoria'] = "Categorias/NovoCategoria";

//$route['(:any)'] = "Urls/Go";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;