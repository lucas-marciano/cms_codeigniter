<?php

class Site_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetDadosEmpresa() {
        $this->db->select('*')->from('cms_company');
        return $this->db->get()->result()[0];
    }
    
    public function GetClientes() {
        $this->db->select('*')->from('cms_clients')->where('clients_active', 1);
        return $this->db->get()->result();
    }
    
    public function GetParceiros() {
        $this->db->select('*')->from('cms_partners')->where('partners_active', 1);
        return $this->db->get()->result();
    }
    
    public function GetServicos() {
        $this->db->select('*')->from('cms_service')->where('service_active', 1);
        return $this->db->get()->result();
    }
    
    public function GetCategorias() {
        $this->db->select('*')->from('view_categoria_usada');
        return $this->db->get()->result();
    }
    
    public function GetProjetos() {
        $this->db->select('*')->from('cms_projects')->where('projects_active', 1);
        return $this->db->get()->result();
    }
    
    public function GetCatgProj(){
        $this->db->select('*')->from('projeto-categoria');
        return $this->db->get()->result();
    }
    
    public function saveContato($data){
        
    }
    
    public function saveTrabalheConosco($data){
        
    }
}
