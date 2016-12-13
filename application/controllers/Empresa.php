<?php

class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged')) {
            $this->load->model('Empresa_model');
            $this->load->helper('string');
            $this->load->library(array('form_validation', 'session'));
        } else {
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_id');
            redirect('admin/login');
        }
    }

    public function index() {
        $data['title'] = 'Empresa';
        $data['wordkeys'] = 'palavras chaves';
        $data['meta_description'] = 'Meta Description';
        $data['empresa'] = $this->Empresa_model->IsNovaEmpresa();

        if ($data['empresa'])
            $this->load->view('admin/empresas', $data);
        else {
            redirect(base_url('admin/nova-empresa'));
        }
    }

    public function NovaEmpresa() {
        $data['title'] = 'Nova Empresa';
        $data['wordkeys'] = 'palavras chaves';
        $data['meta_description'] = 'Meta Description';

        $this->form_validation->set_rules('company_name', 'Nome da Empresa', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('company_address', 'Endereço', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('company_city', 'Cidade', 'required|trim|min_length[5]|trim');
        $this->form_validation->set_rules('company_state', 'Estado', 'required|trim');
        $this->form_validation->set_rules('company_postal_code', 'CEP', 'required|trim');
        $this->form_validation->set_rules('company_postal_code', 'CEP', 'required|trim');
        $this->form_validation->set_rules('company_email', 'Email', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {

            $uploadImage = $this->UploadFile('company_logo');
            if ($uploadImage['error']) {
                $data['error'] = $uploadImage['message'];
            } else {
                $form_data = $this->input->post();
                unset($form_data['action-submit']);

                $form_data['company_logo'] = $uploadImage['fileData']['file_name'];
                $res = $this->Empresa_model->Save($form_data);
                if ($res) {
                    $this->session->set_flashdata('sucess', '<strong>Parabéns!</strong> Os dados da sua empresa foram cadastrados com sucesso!');
                    redirect(base_url('admin/empresas'));
                } else {
                    $data['error'] = '<strong>Erro!</strong> Não foi possível cadastrar a sua empresa!';
                }
            }
        }
        $this->load->view('admin/nova-empresa', $data);
    }

    public function EditarEmpresa() {
        $data['title'] = 'Editar Empresa';
        $data['wordkeys'] = 'palavras chaves';
        $data['meta_description'] = 'Meta Description';
        $id = $this->uri->segment(3);

        $data['empresa'] = $this->Empresa_model->GetEmpresaId($id);

        $this->form_validation->set_rules('company_name', 'Nome da Empresa', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('company_address', 'Endereço', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('company_city', 'Cidade', 'required|trim|min_length[5]|trim');
        $this->form_validation->set_rules('company_state', 'Estado', 'required|trim');
        $this->form_validation->set_rules('company_postal_code', 'CEP', 'required|trim');
        $this->form_validation->set_rules('company_postal_code', 'CEP', 'required|trim');
        $this->form_validation->set_rules('company_email', 'Email', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            if ($_FILES['name'] != '')
                $uploadImage = $this->UploadFile('company_logo');
            else
                $uploadImage['error'] = FALSE;

            if ($uploadImage['error']) {
                $data['error'] = $uploadImage['message'];
            } else {
                $form_data = $this->input->post();
                unset($form_data['action-submit']);

                if ($uploadImage['fileData']['file_name'] != "")
                    $form_data['company_logo'] = $uploadImage['fileData']['file_name'];

                $res = $this->Empresa_model->Update($form_data, $id);

                if ($res) {
                    $this->session->set_flashdata('sucess', '<strong>Parabéns!</strong> Os dados da sua empresa foram editados com sucesso!');
                    redirect(base_url('admin/empresas'));
                } else {
                    $data['error'] = "<strong>Erro!</strong> Não foi possível editar os dados, por favor tente novamente!";
                }
            }
        }

        $this->load->view('admin/editar-empresa', $data);
    }

    /**
     * <b>UploadFile</b>: Metodo responsável pelo upload do curriculo do formulário Cadastro de novo Cliente.
     * @param $inputFileName - Nome do arquivo
     */
    private function UploadFile($inputFileName) {
        $this->load->library('upload');
        $path = UPLOAD . "empresa";
        $config['upload_path'] = $path;
        $config['file_name'] = $inputFileName;
        $config['remove_spaces'] = TRUE; //Se TRUE , os espaços no nome do arquivo serão convertidos em underscore
        $config['overwrite'] = TRUE; // Se o arquivo tiver o mesmo nome ele é substituído
        $config['allowed_types'] = 'gif|jpg|png';
        $config['detect_mime'] = TRUE; // Detecção do mime type do lado do servidor, evitando assim injeção de código malicioso
        $config['max_size'] = '5120';
        $config['encrypt_name'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        if (!is_dir($path))
            mkdir($path, 0777, $recursive = TRUE);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($inputFileName)) {
            $data['error'] = TRUE;
            $data['message'] = $this->upload->display_errors();
        } else {
            $data['error'] = FALSE;
            $data['fileData'] = $this->upload->data();
        }
        return $data;
    }

}
