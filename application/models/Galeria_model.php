<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Galeria_model extends CI_Model {

    const Entity = 'cms_gallery';
    const Folder = 'galerias';
    const IdColum = 'gallery_id';

    function __construct() {
        parent::__construct();
    }

    public function GetAll() {
        $this->db->select('*')->from(self::Entity);
        $result = $this->db->get()->result();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function GetById($id) {
        $this->db->select('*')->from(self::Entity)->where(self::IdColum, $id);
        $result = $this->db->get()->result();
        if ($result) {
            return $result[0];
        } else {
            return FALSE;
        }
    }

    public function GetByName($name) {
        $this->db->select('*')->from(self::Entity)->where('gallery_nome', $name);
        $result = $this->db->get()->result();
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
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

    public function Delete($id, $name = null) {
        if (isset($name)) {
            if ($this->DeleteFile($id, $name)) {
                $result = $this->db->delete(self::Entity, array(self::IdColum => $id));
                return $result;
            } else {
                return FALSE;
            }
        } else {
            if ($this->DeleteFolder($id)) {
                $result = $this->db->delete(self::Entity, array(self::IdColum => $id));
                return $result;
            } else {
                return FALSE;
            }
        }
    }

    public static function DeleteFolder($dir) {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir($dir . DIRECTORY_SEPARATOR . $file)) ? delTree($dir . DIRECTORY_SEPARATOR . $file) : unlink($dir . DIRECTORY_SEPARATOR . $file);
        }
        return rmdir($dir);
    }

    private function DeleteFile($id, $name) {
        $this->db->select('*')->from(self::Entity)->where(self::IdColum, $id);
        $image = $this->db->get()->result();
        if ($image) {
            if (file_exists(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->gallery_folder . DIRECTORY_SEPARATOR . $name)) {
                return unlink(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->gallery_folder . DIRECTORY_SEPARATOR . $name);
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
