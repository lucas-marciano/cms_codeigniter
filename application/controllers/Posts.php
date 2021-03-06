<?php

class Posts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged')) {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect('admin/login');
        }
    }

    public function ListaPosts(){
        $data = ['title' => 'Posts',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('admin/posts', $data);
    }
    
    public function ComentarioPosts(){
        $data = ['title' => 'Comentários',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('admin/comentarios', $data);
    }
    
    public function CategoriaPosts(){
        $data = ['title' => 'Categorias',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('admin/categorias', $data);
    }
    
}
