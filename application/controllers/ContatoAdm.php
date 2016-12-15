<?php

class ContatoAdm extends CI_Controller {

    const Entity = 'cms_contato';

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged')) {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect('admin/login');
        } else {
            $this->load->model('Contato_model');
            $this->load->helper('string');
            $this->load->library(array('form_validation', 'pagination', 'session'));
        }
    }

    public function index() {
        $config['base_url'] = base_url('admin/contatos');
        $config['total_rows'] = $this->Contato_model->ContTuplas('contato_tipo', 0);
        $config['per_page'] = 10;
        $config['uri_segment'] = 2;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = "<nav><ul class='pagination'>";
        $config['full_tag_close'] = "</ul></nav>";
        $config['first_link'] = "Primeira";
        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_link'] = "Última";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";
        $config['next_link'] = "Próxima";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_link'] = "Anterior";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";

        $this->pagination->initialize($config);

        if ($this->uri->segment(3)) {
            $offset = ($this->uri->segment(2) - 1) * $config['per_page'];
        } else {
            $offset = 0;
        }

        $contatos = $this->Contato_model->GetAllByPageContato($config['per_page'], $offset);

        $data['contatos'] = $contatos;
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Contatos da Empresa';
        $data['wordkeys'] = 'Contatos da Empresa';
        $data['meta_description'] = 'Contatos da Empresa';

        $this->load->view('admin/contatos', $data);
    }

    public function TrabelheConosco() {
        $config['base_url'] = base_url('admin/trabalhe-conosco');
        $config['total_rows'] = $this->Contato_model->ContTuplas('contato_tipo', 1);
        $config['per_page'] = 10;
        $config['uri_segment'] = 2;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = "<nav><ul class='pagination'>";
        $config['full_tag_close'] = "</ul></nav>";
        $config['first_link'] = "Primeira";
        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_link'] = "Última";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";
        $config['next_link'] = "Próxima";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_link'] = "Anterior";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";

        $this->pagination->initialize($config);

        if ($this->uri->segment(3)) {
            $offset = ($this->uri->segment(2) - 1) * $config['per_page'];
        } else {
            $offset = 0;
        }

        $contatos = $this->Contato_model->GetAllByPageTrabalheConosco($config['per_page'], $offset);

        $data['contatos'] = $contatos;
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Trabalhe Conosco';
        $data['wordkeys'] = 'Trabalhe Conosco';
        $data['meta_description'] = 'Trabalhe Conosco';

        $this->load->view('admin/trabalhe-conosco', $data);
    }

    public function EditeContato() {
        $id = $this->uri->segment(3);
        $active = $this->uri->segment(4);
        if ($active == 1)
            $data['contato_lido'] = 0;
        else
            $data['contato_lido'] = 1;

        if (!$this->Contato_model->Update($data, $id)) {
            $this->session->set_flashdata('error', '<string>Desculpe! </string>Ocorreu um erro, tente novamente.');
        }
        redirect(base_url('admin/contatos'));
    }

    public function DeleteContato() {
        $id = $this->uri->segment(3);
        if ($this->Contato_model->DeleteContato($id)) {
            $this->session->set_flashdata('sucess', '<string>Parabéns! </string> O contato foi deletada!');
        } else {
            $this->session->set_flashdata('error', '<string>Desculpe! </string>Ocorreu um erro, tente novamente.');
        }
        redirect(base_url('admin/contatos'));
    }
    
    public function DeleteTrabalheConosco() {
        $id = $this->uri->segment(3);
        if ($this->Contato_model->DeleteTrabalheConosco($id)) {
            $this->session->set_flashdata('sucess', '<string>Parabéns! </string> O contato foi deletada!');
        } else {
            $this->session->set_flashdata('error', '<string>Desculpe! </string>Ocorreu um erro, tente novamente.');
        }
        redirect(base_url('admin/contatos'));
    }

}
