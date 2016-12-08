<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    const Entity = 'cms_clients';

    function __construct() {
        parent::__construct();
    }

    public function GetAll() {
        $this->db->select('*')->from(self::Entity);
        $result = $this->db->get()->result();

        if ($result)
            return $result;
        else
            return FALSE;
    }

    public function GetClienteId($id) {
        $this->db->select('*')->from(self::Entity)->where('clients_id', $id);
        $result = $this->db->get()->result();
        if ($result)
            return $result;
        else
            return FALSE;
    }

    public function GetAllByPage($limit, $offset) {
        $this->db->select('*')->from(self::Entity)->limit($limit, $offset);
        $result = $this->db->get()->result();
        if ($result)
            return $result;
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
        $this->db->where('clients_id', $id);
        $result = $this->db->update(self::Entity, $data);
        if ($result)
            return TRUE;
        else
            return FALSE;
    }

    
    
    public function Delete($id) {
        if ($this->DeleteFile($id)) {
            $result = $this->db->delete(self::Entity, array('clients_id' => $id));
            if ($result)
                return TRUE;
            else
                return FALSE;
        } else {
            return FALSE;
        }
    }

    public function DeleteFile($id) {
        $this->db->select('clients_capa')->from(self::Entity)->where('clients_id', $id);
        $image = $this->db->get()->result();

        if ($image) {
            if (file_exists($image[0]->clients_capa)) {
                if (unlink($image[0]->clients_capa))
                    return TRUE;
                else
                    return FALSE;
            }else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
