<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = ['title' => 'Home',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('home', $data);
        $this->load->view('clientes');
        $this->load->view('commons/footer');
    }

    public function Sobre() {
        $data = ['title' => 'Sobre',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];

        $this->load->view('sobre', $data);
    }

}
