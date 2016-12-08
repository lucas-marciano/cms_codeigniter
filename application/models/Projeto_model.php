<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projeto_model extends CI_Model {

    const Entity = 'cms_projects';

    function __construct() {
        parent::__construct();
    }

    public function Save($data) {
        $this->db->insert(self::Entity, $data);

        if ($this->db->insert_id())
            return TRUE;
        else
            return FALSE;
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
        if ($result)
            return TRUE;
        else
            return FALSE;
    }

    public function GetAll() {
        $this->db->select('*')->from(self::Entity);
        $result = $this->db->get()->result();

        if ($result)
            return $result;
        else
            return FALSE;
    }

    public function GetProjetoId($id) {
        $this->db->select('*')->from(self::Entity)->where('projects_id', $id);
        $result = $this->db->get()->result();
        if ($result)
            return $result;
        else
            return FALSE;
    }
    
    public function GetCategoriasProjectId($id){
        $this->db->select('*')->from('projeto-categoria')->where('projects_id', $id);
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

    public function GetAllGallery($id = null) {
        if (isset($id))
            $this->db->select('*')->from('cms_gallery');
        else
            $this->db->select('*')->from('cms_gallery')->where('gallery_id', $id);

        $result = $this->db->get()->result();
        if ($result)
            return $result;
        else
            return FALSE;
    }

    public function GetAllCategories($id = null) {
        if (isset($id))
            $this->db->select('*')->from('cms_category');
        else
            $this->db->select('*')->from('cms_category')->where('category_id', $id);

        $result = $this->db->get()->result();
        if ($result)
            return $result;
        else
            return FALSE;
    }

    public function Delete($id) {
        if ($this->DeleteFile($id)) {
            $result = $this->db->delete(self::Entity, array('projects_id' => $id));
            if ($result)
                return TRUE;
            else
                return FALSE;
        } else {
            return FALSE;
        }
    }

    public function DeleteFile($id) {
        $this->db->select('projects_capa')->from(self::Entity)->where('projects_id', $id);
        $image = $this->db->get()->result();
        if ($image[0]->projects_capa != "") {
            if (file_exists($image[0]->projects_capa)) {
                if (unlink($image[0]->projects_capa))
                    return TRUE;
                else
                    return FALSE;
            }else {
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }

}
