<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Site_model');
    }

    public function index() {
        $data['clientes'] = $this->Site_model->GetClientes();
        $data['empresa'] = $this->Site_model->GetDadosEmpresa();
        $data['parceiros'] = $this->Site_model->GetParceiros();
        $data['title'] = $data['empresa']->company_name . ' | Home';
        $data['wordkeys'] = '';
        $data['meta_description'] = '';
        
        $this->load->view('home', $data);
    }

    public function Sobre() {
        $data['empresa'] = $this->Site_model->GetDadosEmpresa();
        $data['title'] = $data['empresa']->company_name . ' | Sobre';
        $data['wordkeys'] = '';
        $data['meta_description'] = '';

        $this->load->view('sobre', $data);
    }

}
