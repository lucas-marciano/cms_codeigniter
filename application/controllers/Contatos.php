<?php

class Contatos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper('captcha');
    }

    public function index() {
        $data = ['title' => 'Contatos',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('contato', $data);
    }

    public function TrabalheConosco() {
        $data = ['title' => 'Trabalhe Conosco',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        
        $this->load->view('trabalhe-conosco', $data);
    }

}
