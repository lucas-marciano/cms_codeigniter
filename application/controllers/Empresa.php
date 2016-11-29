<?php

class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->userdata('logged')) {
            $data = ['title' => 'Empresas',
                'wordkeys' => 'palavras chaves',
                'meta_description' => 'Meta Description'];
            $this->load->view('admin/empresas', $data);
        } else {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect('admin/login');
        }
    }

}
