<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Clientes_model');
        $this->load->library(array('form_validation'));
    }

    public function index() {
        if ($this->session->userdata('logged')) {
            $data = ['title' => 'Clientes',
                'wordkeys' => 'palavras chaves',
                'meta_description' => 'Meta Description'];

            $this->load->view('admin/clientes', $data);
        } else {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect('admin/login');
        }
    }
    
    public function NovoCliente() {
        $data = ['title' => 'Novo Clientes',
                'wordkeys' => 'palavras chaves',
                'meta_description' => 'Meta Description'];
        
        $this->load->view('admin/novo-cliente', $data);
    }

}
