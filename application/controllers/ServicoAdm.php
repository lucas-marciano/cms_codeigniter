<?php

class ServicoAdm extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        if ($this->session->userdata('logged')) {
            $data = ['title' => 'Serviços Prestados',
                'wordkeys' => 'palavras chaves',
                'meta_description' => 'Meta Description'];
            $this->load->view('admin/servicos', $data);
        } else {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect('admin/login');
        }
    }
}
