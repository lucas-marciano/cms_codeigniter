<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function GetClients() {
        $this->db->select('*')->from('cms_clients');
        $result = $this->db->get()->result();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
