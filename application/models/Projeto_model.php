<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projeto_model extends CI_Model {

    const Entity = 'cms_projects';
    const Folder = 'projetos';

    function __construct() {
        parent::__construct();
    }

    public function Save($data) {
        $this->db->insert(self::Entity, $data);
        return $this->db->insert_id();
    }

    public function SaveCategoria($checks, $id) {
        foreach ($checks as $data) {
            $arr = ['projects_id' => $id, 'category_id' => $data];
            $this->db->insert('projeto-categoria', $arr);
            if (!$this->db->insert_id())
                return FALSE;
        }
        return TRUE;
    }

    public function Update($data, $id) {
        $this->db->where('projects_id', $id);
        $result = $this->db->update(self::Entity, $data);
        return $result;
    }

    public function GetAll() {
        $this->db->select('*')->from(self::Entity);
        $result = $this->db->get()->result();

        return $result;
    }

    public function GetProjetoId($id) {
        $this->db->select('*')->from(self::Entity)->where('projects_id', $id);
        $result = $this->db->get()->result();
        return $result;
    }

    public function GetCategoriasProjectId($id) {
        $this->db->select('*')->from('projeto-categoria')->where('projects_id', $id);
        $result = $this->db->get()->result();
        return $result;
    }

    public function GetAllByPage($limit, $offset) {
        $this->db->select('*')->from(self::Entity)->limit($limit, $offset);
        $result = $this->db->get()->result();
        return $result;
    }

    public function GetAllGallery($id = null) {
        if (isset($id))
            $this->db->select('*')->from('cms_gallery');
        else
            $this->db->select('*')->from('cms_gallery')->where('gallery_id', $id);

        $result = $this->db->get()->result();
        return $result;
    }

    public function GetAllCategories() {
        $this->db->select('*')->from('cms_category');
        return $this->db->get()->result();
    }

    public function Delete($id) {
        if ($this->DeleteFile($id)) {
            $result = $this->db->delete(self::Entity, array('projects_id' => $id));
            $this->db->delete('projeto-categoria', array('projects_id' => $id));
            return $result;
        } else {
            return FALSE;
        }
    }

    public function DeleteFile($id) {
        $this->db->select('projects_capa')->from(self::Entity)->where('projects_id', $id);
        $image = $this->db->get()->result();
        if ($image) {
            if (file_exists(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->projects_capa)) {
                return unlink(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->projects_capa);
            } else {
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }

}
