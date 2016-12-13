<?php

class Projeto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged')) {
            $this->load->model('Projeto_model');
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
        $config['base_url'] = base_url('admin/projetos');
        $config['total_rows'] = $this->db->select('*')->from('cms_projects')->count_all_results();
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

        $data['projetos'] = $this->Projeto_model->GetAllByPage($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();

        $data['title'] = 'Projetos';
        $data['wordkeys'] = '';
        $data['meta_description'] = '';
        $this->load->view('admin/projetos', $data);
    }

    public function NovoProjeto() {
        $data['title'] = 'Novo Projeto';
        $data['wordkeys'] = 'projetos';
        $data['meta_description'] = 'meta_description';
        $data['gallery'] = $this->Projeto_model->GetAllGallery();
        $data['categories'] = $this->Projeto_model->GetAllCategories();

        $this->form_validation->set_rules('projects_name', 'Nome', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('projects_description', 'Email', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('projects_dimension', 'Dimensão', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            if ($_FILES['projects_capa']['name'] != "")
                $uploadImage = $this->UploadFile('projects_capa');

            if ($uploadImage != NULL && $uploadImage['error']) {
                $data['error'] = $uploadImage['message'];
            } else {
                $form_data = $this->input->post();
                unset($form_data['project-submit']);

                if ($uploadImage != NULL)
                    $form_data['projects_capa'] = $uploadImage['fileData']['full_path'];

                if (isset($form_data['projects_active'])) {
                    $form_data['projects_active'] = 1;
                } else {
                    $form_data['projects_active'] = 0;
                }
                if (isset($form_data['categoria_project']))
                    $checks = $form_data['categoria_project'];

                unset($form_data['categoria_project']);
                $res = $this->Projeto_model->Save($form_data);

                if ($res) {
                    $this->session->set_flashdata('sucess', '<strong>Parabéns!</strong> O Projeto foi cadastrado com sucesso!');
                    if (isset($checks)) {
                        if (!$this->Projeto_model->SaveCategoria($checks, $res['projects_id'])) {
                            $this->session->unset_tempdata('sucess');
                            $this->session->set_flashdata('error', '<strong>Erro grave nas categorias!</strong> Entre em contato com o suporte!');
                        }
                    }
                    redirect(base_url('admin/projetos'));
                } else {
                    $data['error'] = '<strong>Erro!</strong> Não foi possível cadastrar o Projeto!';
                }
            }
        }
        $this->load->view('admin/novo-projeto', $data);
    }

    public function EditeProjeto() {
        $data['title'] = 'Editar Projeto';
        $data['wordkeys'] = 'wordkeys';
        $data['meta_description'] = 'meta_description';

        $id = $this->uri->segment(3);
        $data['projetos'] = $this->Projeto_model->GetProjetoId($id);
        $data['ctg_selecionadas'] = $this->Projeto_model->GetCategoriasProjectId($id);
        $data['gallery'] = $this->Projeto_model->GetAllGallery();
        $data['categories'] = $this->Projeto_model->GetAllCategories();
        $this->form_validation->set_rules('projects_name', 'Nome', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('projects_description', 'Email', 'required|min_length[5]|max_length[1000]|trim');
        $this->form_validation->set_rules('projects_dimension', 'Dimensão', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            if ($_FILES['name'] != '')
                $uploadImage = $this->UploadFile('projects_capa');
            else
                $uploadImage['error'] = FALSE;

            if ($uploadImage['error']) {
                $data['error'] = $uploadImage['message'];
            } else {
                $form_data = $this->input->post();
                unset($form_data['projetos-submit']);
                $form_data['projects_capa'] = $uploadImage['fileData']['full_path'];
                if ($form_data['projects_active'] == 'on') {
                    $form_data['projects_active'] = 1;
                } else {
                    $form_data['projects_active'] = 0;
                }
                $res = $this->Projeto_model->Update($form_data, $id);

                if ($res) {
                    $this->session->set_flashdata('sucess', '<strong>Parabéns!</strong> O Projeto foi editado com sucesso!');
                    redirect(base_url('admin/projetos'));
                } else {
                    $data['error'] = '<strong>Erro!</strong> Não foi possível editar o Projeto!';
                }
            }
        }

        $this->load->view('admin/editar-projeto', $data);
    }

    /**
     * <b>DeleteProjeto</b>: Metodo responsável por deletar um projeto especifico, passado por parametro pela url.
     */
    public function DeleteProjeto() {
        $id = $this->uri->segment(3);
        $res = $this->Projeto_model->Delete($id);
        if ($res) {
            $this->session->set_flashdata('sucess', '<string>Parabéns! </string>O projeto foi deletado com sucesso!');
        } else {
            $this->session->set_flashdata('error', '<string>Desculpe! </string>Ocorreu um erro ao tentar deletar o projeto, tente novamente.');
        }
        redirect(base_url('admin/projetos'));
    }

    public function AtivarProjeto() {
        $id = $this->uri->segment(3);
        $active = $this->uri->segment(4);
        if ($active == 1)
            $data['projects_active'] = 0;
        else
            $data['projects_active'] = 1;

        $res = $this->Projeto_model->Update($data, $id);
        if ($res) {
            $this->session->set_flashdata('sucess', '<string>Parabéns! </string>Alteração realizada com sucesso!');
        } else {
            $this->session->set_flashdata('error', '<string>Desculpe! </string>Ocorreu um erro ao tentar editar o projeto, tente novamente.');
        }
        redirect(base_url('admin/projetos'));
    }

    /**
     * <b>UploadFile</b>: Metodo responsável pelo upload do curriculo do formulário Cadastro de novo Cliente.
     * @param $inputFileName - Nome do arquivo
     */
    private function UploadFile($inputFileName) {
        $this->load->library('upload');
        $path = UPLOAD . "projetos";
        $config['upload_path'] = $path;
        $config['file_name'] = $inputFileName;
        $config['remove_spaces'] = TRUE; //Se TRUE , os espaços no nome do arquivo serão convertidos em underscore
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
