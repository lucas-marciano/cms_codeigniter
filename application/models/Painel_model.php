<?php

class Painel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetCountRows($tabela, $active = null) {
        if ($active)
            $this->db->select('*')->from($tabela)->where($active, 1);
        else
            $this->db->select('*')->from($tabela);

        return $this->db->get()->num_rows();
    }

    public function GetContacts() {
        $this->db->select('*')->from('cms_contato')->where('contato_lido', 0);
        return $this->db->get()->num_rows();
    }

}
