<?php

class Servicos extends CI_Controller{
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = ['title' => 'Serviços', 
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('servico', $data);
    }
}
