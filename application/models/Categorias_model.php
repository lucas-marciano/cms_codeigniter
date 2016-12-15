<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorias_model extends CI_Model {
    const Entity = 'cms_category';
    const IdColum = 'category_id';

    public function GetAll() {
        $this->db->select('*')->from(self::Entity);
        $result = $this->db->get()->result();
        return $result;
    }

    public function GetById($id) {
        $this->db->select('*')->from(self::Entity)->where(self::IdColum, $id);
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
        $this->db->where(self::IdColum, $id);
        $result = $this->db->update(self::Entity, $data);
        return $result;
    }

    public function Delete($id) {
            $result = $this->db->delete(self::Entity, array(self::IdColum => $id));
            return $result;
    }
}
