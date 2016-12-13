<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    const Entity = 'cms_clients';
    const Folder = 'clientes';

    function __construct() {
        parent::__construct();
    }

    public function GetAll() {
        $this->db->select('*')->from(self::Entity);
        $result = $this->db->get()->result();
        return $result;
    }

    public function GetClienteId($id) {
        $this->db->select('*')->from(self::Entity)->where('clients_id', $id);
        $result = $this->db->get()->result();
        return $result;
    }

    public function GetAllByPage($limit, $offset) {
        $this->db->select('*')->from(self::Entity)->limit($limit, $offset);
        $result = $this->db->get()->result();
        return $result;
    }

    public function Save($data) {
        $this->db->insert(self::Entity, $data);
        return $this->db->insert_id();
    }

    public function Update($data, $id) {
        $this->db->where('clients_id', $id);
        $result = $this->db->update(self::Entity, $data);
        return $result;
    }

    public function Delete($id) {
        if ($this->DeleteFile($id)) {
            $result = $this->db->delete(self::Entity, array('clients_id' => $id));
            return $result;
        } else {
            return FALSE;
        }
    }

    public function DeleteFile($id) {
        $this->db->select('clients_capa')->from(self::Entity)->where('clients_id', $id);
        $image = $this->db->get()->result();
        if ($image) {
            if (file_exists(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->clients_capa)) {
                return unlink(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->clients_capa);
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
