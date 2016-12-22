<?php

class Servicos extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Site_model');
    }

    public function index() {
        $data['empresa'] = $this->Site_model->GetDadosEmpresa();
        $data['servicos'] = $this->Site_model->GetServicos();
        
        $data['title'] = $data['empresa']->company_name . ' | Serviço';
        $data['wordkeys'] = '';
        $data['meta_description'] = '';
        
        $this->load->view('servico', $data);
    }
}
