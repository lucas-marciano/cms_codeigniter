<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresa_model extends CI_Model {

    const Entity = 'cms_company';

    function __construct() {
        parent::__construct();
    }

    public function IsNovaEmpresa() {
        $this->db->select('*')->from(self::Entity);
        $resposta = $this->db->get()->result();

        if ($resposta)
            return $resposta;
        else
            return FALSE;
    }

    public function Save($data) {
        $this->db->insert(self::Entity, $data);

        if ($this->db->insert_id())
            return TRUE;
        else
            return FALSE;
    }

    public function Update($data, $id) {
        $this->db->where('company_id', $id);
        $result = $this->db->update(self::Entity, $data);
        if ($result)
            return TRUE;
        else
            return FALSE;
    }

    public function GetEmpresaId($id) {
        $this->db->select('*')->from(self::Entity)->where('company_id', $id);
        $result = $this->db->get()->result();
        
        if ($result)
            return $result[0];
        else
            return FALSE;
    }

}
