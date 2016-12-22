<?php

class Contatos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper('captcha');
        $this->load->model('Site_model');
    }

    public function index() {
        $data['empresa'] = $this->Site_model->GetDadosEmpresa();
        $data['title'] = $data['empresa']->company_name . ' | Contato';
        $data['wordkeys'] = 'contato, email';
        $data['meta_description'] = 'Tela com o formulário de contato com a empresa.';
        
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]', array('required' => 'Informe o seu nome, por favor.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Informe o seu email, por favor.'));
        $this->form_validation->set_rules('assunto', 'Assunto', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required|min_length[30]');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $formData = $this->input->post();
            $emailStatus = $this->SendEmailToAdmin(
                    $formData['email'], $formData['nome'], "marciano@cafecomandroid.com.br", "Contato | Café com Android", $formData['assunto'], $formData['mensagem'], $formData['email'], $formData['nome']);

            if ($emailStatus) {
                unset($formData['action-submit']);
                if($this->Site_model->saveContato($formData)){
                    
                }
                $this->session->set_flashdata('success', 'Contato recebido com sucesso!');
            } else {
                $data['formErrors'] = "Desculpe! Não foi possível enviar o seu contato. tente novamente mais tarde.";
            }
        }
        
        $this->load->view('contato', $data);
    }

    public function TrabalheConosco() {
        $data['empresa'] = $this->Site_model->GetDadosEmpresa();
        $data['title'] = $data['empresa']->company_name . ' | Trabalhe Conosco';
        $data['wordkeys'] = 'trabalhe conosco';
        $data['meta_description'] = 'Tela para envio de formulário para trabalhar conosco.';

        $this->load->view('trabalhe-conosco', $data);
    }
    
    /**
     * <b>SendEmailToAdmin</b>: Metodo de envio de email, usando protocolo SMTP.
     * @param $from - Remetente
     * @param $fromName - Remetente nome
     * @param $to - Destinatário
     * @param $toName - Destinatário nome
     * @param $subject - Assunto do email
     * @param $message - Mensagem do email
     * @param null $reply - Encaminha o email caso o email seja respondido
     * @param null $replyName - Nome do destinatario da resposta
     * @return bool - Retorno informando se o email foi enviado ou não.
     */
    private function SendEmailToAdmin($from, $fromName, $to, $toName, $subject, $message, $reply = null, $replyName = null, $attach = null) {

        $this->load->library('email');
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.seudominio.com.br';
        $config['smtp_user'] = 'user@seudominio.com.br';
        $config['smtp_pass'] = 'suasenha';
        $config['newline'] = '\r\n';

        $this->email->initialize($config);
        $this->email->from($from, $fromName);
        /* O método to() permite enviar o e-mail para vários destinatários em uma única chamada.
          Para isso, basta separar os e-mails com uma vírgula (,). */
        $this->email->to($to, $toName);

        if ($reply) {
            $this->email->reply_to($reply, $replyName);
        }

        if ($attach) {
            $this->email->attach($attach);
        }

        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * <b>UploadFile</b>: Metodo responsável pelo upload do curriculo do formulário Trabalhe Conosco.
     * @param $inputFileName - Nome do arquivo
     */
    private function UploadFile($inputFileName) {
        $this->load->library('upload');
        $path = "../curriculos";
        $config['upload_path'] = $path;
        $config['file_name'] = 'nome_do_arquivo';
        $config['remove_spaces'] = 'nome_do_arquivo'; //Se TRUE , os espaços no nome do arquivo serão convertidos em underscore
        $config['overwrite'] = true; // Se o arquivo tiver o mesmo nome ele é substituído
        $config['allowed_types'] = 'doc|docx|pdf|zip|rar';
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
