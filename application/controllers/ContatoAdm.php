<?php

class ContatoAdm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged')) {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect('admin/login');
        }
    }

    public function index() {
        $data = ['title' => 'Contatos da Empresa',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('admin/contatos', $data);
    }

    public function TrabelheConosco() {
        $data = ['title' => 'Trabalhe Conosco',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('admin/trabalhe-conosco', $data);
    }

}
