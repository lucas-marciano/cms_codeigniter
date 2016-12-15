<?php

class Categorias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged')) {
            $this->load->model('Categorias_model');
            $this->load->helper('string');
            $this->load->library(array('form_validation', 'pagination', 'session'));
        } else {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect('admin/login');
        }
    }

    public function index() {
        $data['title'] = 'Categorias';
        $data['wordkeys'] = 'wordkeys';
        $data['meta_description'] = 'meta_description';
        $data['categorias'] = $this->Categorias_model->GetAll();

        $this->load->view('admin/categorias', $data);
    }

    public function NovoCategoria() {
        $this->form_validation->set_rules('category_name', 'Categoria', 'required|min_length[5]|max_length[1000]|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('warning', validation_errors());
        } else {
            $form_data = $this->input->post();
            unset($form_data['action-submit']);

            if ($this->Categorias_model->Save($form_data)) {
                $this->session->set_flashdata('sucess', '<strong>Parabéns!</strong> A categoria foi cadastrado com sucesso!');
            } else {
                $this->session->set_flashdata('error', '<strong>Erro!</strong> Não foi possível cadastrar a categoria!');
            }
        }

        redirect(base_url('admin/categorias'));
    }

    public function DeleteCategoria() {
        $id = $this->uri->segment(3);
        if ($this->Categorias_model->Delete($id)) {
            $this->session->set_flashdata('sucess', '<string>Parabéns! </string>A categoria foi deletado com sucesso!');
        } else {
            $this->session->set_flashdata('error', '<string>Desculpe! </string>Ocorreu um erro ao tentar deletar a categoria, tente novamente.');
        }
        redirect(base_url('admin/categorias'));
    }

}
