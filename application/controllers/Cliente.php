<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged')) {
            $this->load->model('Clientes_model');
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
        $config['base_url'] = base_url('admin/clientes');
        $config['total_rows'] = $this->db->select('*')->from('cms_clients')->count_all_results();
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

        if ($this->uri->segment(3))
            $offset = ($this->uri->segment(2) - 1) * $config['per_page'];
        else
            $offset = 0;

        $clientes = $this->Clientes_model->GetAllByPage($config['per_page'], $offset);
        $data['clientes'] = $clientes;
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Clientes';
        $data['wordkeys'] = 'wordkeys';
        $data['meta_description'] = 'meta_description';


        $this->load->view('admin/clientes', $data);
    }

    public function NovoCliente() {
        $data['title'] = 'Novo Cliente';
        $data['wordkeys'] = 'wordkeys';
        $data['meta_description'] = 'meta_description';

        $this->form_validation->set_rules('clients_nome', 'Nome', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('clients_email', 'Email', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('clients_telefone', 'Telefone', 'required|trim');
        $this->form_validation->set_rules('clients_cnpj', 'CNPJ', 'required|trim');
        $this->form_validation->set_rules('clients_dimension', 'Dimensão', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $uploadImage = $this->UploadFile('clients_capa');
            if ($uploadImage['error']) {
                $data['error'] = $uploadImage['message'];
            } else {
                $form_data = $this->input->post();
                unset($form_data['cliente-submit']);
                $form_data['clients_capa'] = $uploadImage['fileData']['file_name'];
                if ($form_data['clients_active'] == 'on') {
                    $form_data['clients_active'] = 1;
                } else {
                    $form_data['clients_active'] = 0;
                }
                $res = $this->Clientes_model->Save($form_data);

                if ($res) {
                    $this->session->set_flashdata('sucess', '<strong>Parabéns!</strong> O cliente foi cadastrado com sucesso!');
                    redirect(base_url('admin/cliente'));
                } else {
                    $data['error'] = '<strong>Erro!</strong> Não foi possível cadastrar o cliente!';
                }
            }
        }
        $this->load->view('admin/novo-cliente', $data);
    }

    public function EditeCliente() {
        $data['title'] = 'Editar Cliente';
        $data['wordkeys'] = 'wordkeys';
        $data['meta_description'] = 'meta_description';

        $id = $this->uri->segment(3);
        $data['clientes'] = $this->Clientes_model->GetClienteId($id);

        $this->form_validation->set_rules('clients_nome', 'Nome', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('clients_email', 'Email', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('clients_telefone', 'Telefone', 'required|trim');
        $this->form_validation->set_rules('clients_cnpj', 'CNPJ', 'required|trim');
        $this->form_validation->set_rules('clients_dimension', 'Dimensão', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            if ($_FILES['name'] != '')
                $uploadImage = $this->UploadFile('clients_capa');
            else
                $uploadImage['error'] = FALSE;

            if ($uploadImage['error']) {
                $data['error'] = $uploadImage['message'];
            } else {
                $form_data = $this->input->post();
                unset($form_data['cliente-submit']);

                if ($uploadImage['fileData']['file_name'] != "")
                    $form_data['clients_capa'] = $uploadImage['fileData']['file_name'];

                $res = $this->Clientes_model->Update($form_data, $id);

                if ($res) {
                    $this->session->set_flashdata('sucess', '<strong>Parabéns!</strong> O cliente foi editado com sucesso!');
                    redirect(base_url('admin/cliente'));
                } else {
                    $data['error'] = '<strong>Erro!</strong> Não foi possível editar o cliente!';
                }
            }
        }

        $this->load->view('admin/editar-cliente', $data);
    }

    /**
     * <b>DeleteCliente</b>: Metodo responsável por deletar um cliente especifico, passado por parametro pela url.
     */
    public function DeleteCliente() {
        $id = $this->uri->segment(3);
        $res = $this->Clientes_model->Delete($id);
        if ($res) {
            $this->session->set_flashdata('sucess', '<string>Parabéns! </string>O cliente foi deletado com sucesso!');
        } else {
            $this->session->set_flashdata('error', '<string>Desculpe! </string>Ocorreu um erro ao tentar deletar o cliente, tente novamente.');
        }
        redirect(base_url('admin/cliente'));
    }

    public function AtivarCliente() {
        $id = $this->uri->segment(3);
        $active = $this->uri->segment(4);
        if ($active == 1)
            $data['clients_active'] = 0;
        else
            $data['clients_active'] = 1;

        $res = $this->Clientes_model->Update($data, $id);
        if ($res) {
            $this->session->set_flashdata('sucess', '<string>Parabéns! </string>Alteração realizada com sucesso!');
        } else {
            $this->session->set_flashdata('error', '<string>Desculpe! </string>Ocorreu um erro ao tentar editar o projeto, tente novamente.');
        }
        redirect(base_url('admin/cliente'));
    }

    /**
     * <b>UploadFile</b>: Metodo responsável pelo upload do curriculo do formulário Cadastro de novo Cliente.
     * @param $inputFileName - Nome do arquivo
     */
    private function UploadFile($inputFileName) {
        $this->load->library('upload');
        $path = UPLOAD . "clientes";
        $config['upload_path'] = $path;
        $config['file_name'] = $inputFileName;
        $config['remove_spaces'] = 'nome_do_arquivo'; //Se TRUE , os espaços no nome do arquivo serão convertidos em underscore
        $config['overwrite'] = true; // Se o arquivo tiver o mesmo nome ele é substituído
        $config['allowed_types'] = 'gif|jpg|png';
        $config['detect_mime'] = true; // Detecção do mime type do lado do servidor, evitando assim injeção de código malicioso
        $config['max_size'] = '5120';
        $config['encrypt_name'] = true;
        $config['file_ext_tolower'] = true;
        if (!is_dir($path))
            mkdir($path, 0777, $recursive = true);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($inputFileName)) {
            $data['error'] = true;
            $data['message'] = $this->upload->display_errors();
        } else {
            $data['error'] = false;
            $data['fileData'] = $this->upload->data();
        }
        return $data;
    }

}
