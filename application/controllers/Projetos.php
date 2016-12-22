<?php

class Projetos extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Site_model');
    }

    public function index() {
        $data['projetos'] = $this->Site_model->GetProjetos();
        $data['pro_cat'] = $this->Site_model->GetCatgProj();
        $data['categorias'] = $this->Site_model->GetCategorias();
        $data['empresa'] = $this->Site_model->GetDadosEmpresa();
        $data['title'] = $data['empresa']->company_name . ' | Projetos';
        $data['wordkeys'] = '';
        $data['meta_description'] = '';
        $this->load->view('projetos', $data);
    }
    
    public function Projeto() {
        
    }
}
