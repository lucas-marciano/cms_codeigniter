<?php

class Galeria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged')) {
            $this->load->model('Galeria_model');
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
        // Configurações de paginação \\
        $config['base_url'] = base_url('admin/galerias');
        $config['total_rows'] = $this->db->select('*')->from('cms_gallery')->count_all_results();
        $config['per_page'] = 5;
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

        // Configuração de form \\
        $this->form_validation->set_rules('gallery_nome', 'Titulo da galeria', 'required|min_length[5]|max_length[1000]|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
        } else {
            $form_data = $this->input->post();
            $uploadImage = $this->UploadFile('gallery_folder', $form_data['gallery_nome']);
            if ($uploadImage['error']) {
                $data['error'] = $uploadImage['message'];
            } else {
                unset($form_data['cliente-submit']);
                $form_data['gallery_folder'] = $uploadImage['fileData']['file_name'];
                
                $res = $this->Galeria_model->Save($form_data);

                if ($res) {
                    $this->session->set_flashdata('sucess', '<strong>Parabéns!</strong> A galeria foi cadastrado com sucesso!');
                    redirect(base_url('admin/cliente'));
                } else {
                    $data['error'] = '<strong>Erro!</strong> Não foi possível cadastrar a galeria!';
                }
            }
        }
        
        $data['galerias'] = $this->Galeria_model->GetAllByPage($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Galeria';
        $data['wordkeys'] = 'Galeria';
        $data['meta_description'] = 'Galeria';

        $this->load->view('admin/galerias', $data);
    }

    public function NovaGaleria() {
        
    }

    public function DeletarGallery() {
        
    }

    public function DeletarPorImagem() {
        
    }

    /**
     * <b>UploadFile</b>: Metodo responsável pelo upload do curriculo do formulário Cadastro de novo Cliente.
     * @param $inputFileName - Nome do arquivo
     */
    private function UploadFile($inputFileName, $nomePasta) {
        $this->load->library('upload');
        $path = UPLOAD . 'galerias/' . $nomePasta;
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
