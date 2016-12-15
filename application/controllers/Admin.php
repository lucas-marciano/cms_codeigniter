<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Painel_model');
        $this->load->library(array('form_validation'));
    }

    public function Login() {
        if ($this->session->userdata('logged')) {
            redirect('admin/painel', 'location', 301);
        } else {
            $this->form_validation->set_rules('user_email', 'Email', 'required|min_length[4]|valid_email|trim');
            $this->form_validation->set_rules('user_password', 'Senha', 'required|min_length[6]|trim');
            if ($this->form_validation->run() == FALSE) {
                $data['error'] = validation_errors();
            } else {
                $dataLogin = $this->input->post();
                $res = $this->User_model->Login($dataLogin);
                if ($res) {
                    foreach ($res as $result) {
                        if (password_verify($dataLogin['user_password'], $result->user_password)) {
                            $data['error'] = null;
                            $this->session->set_userdata('logged', true);
                            $this->session->set_userdata('user_email', $result->user_email);
                            $this->session->set_userdata('user_name', $result->user_name);
                            $this->session->set_userdata('user_id', $result->user_id);
                            redirect('admin/painel', 'location', 301);
                        } else {
                            $data['error'] = "Ops! Parece que a senha está incorreta.";
                        }
                    }
                } else {
                    $data['error'] = "Ops! O usuário não está cadastrado.";
                }
            }
        }

        $this->load->view('admin/login', $data);
    }

    public function Logout() {
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_id');
        redirect('admin/login');
    }

    public function Register() {
        $this->form_validation->set_rules('user_name', 'Nome', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('user_email', 'Email', 'required|min_length[1]|valid_email|trim');
        $this->form_validation->set_rules('user_password', 'Senha', 'required|min_length[6]|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $dataRegister = $this->input->post();
            $res = $this->User_model->Save($dataRegister);
            if ($res) {
                $data['error'] = null;
            } else {
                $data['error'] = "Não foi possível criar o usuário.";
            }
        }
        if ($data['error'])
            $this->load->view('login', $data);
        else {
            redirect();
        }
    }

    public function UpdatePassw() {
        $data['success'] = null;
        $data['error'] = null;
        $this->form_validation->set_rules('user_password', 'Senha', 'required|min_length[6]|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $data = $this->input->post();
            $this->User_model->Update($data);
            $data['success'] = "Senha alterada com sucesso!";
            $data['error'] = null;
        }
        $data['user'] = $this->User_model->GetUser($this->session->userdata('id'));
        $this->load->view('alterar-senha', $data);
    }

    public function Painel() {
        if ($this->session->userdata('logged')) {
            $data['title'] = 'Dashboard';
            $data['wordkeys'] = 'Dashboard';
            $data['meta_description'] = 'Dashboard';
            $data['clientes'] = $this->Painel_model->GetCountRows('cms_clients', 'clients_active');
            $data['parceiros'] = $this->Painel_model->GetCountRows('cms_partners', 'partners_active');
            $data['projetos'] = $this->Painel_model->GetCountRows('cms_projects', 'projects_active');
            $data['contatos'] = $this->Painel_model->GetContacts();
            $this->load->view('admin/painel', $data);
        } else {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect(base_url('login'), 'location', 301);
        }
    }

    public function Perfil() {
        $data = ['title' => 'Perfil',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('admin/perfil', $data);
    }

    public function Configuracao() {
        $data = ['title' => 'Configurações do Sistema',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('admin/configuracoes', $data);
    }

    public function Mensagens() {
        $data = ['title' => 'Mensagens',
            'wordkeys' => 'palavras chaves',
            'meta_description' => 'Meta Description'];
        $this->load->view('admin/mensagens', $data);
    }

}
