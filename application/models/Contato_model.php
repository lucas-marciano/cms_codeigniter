<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contato_model extends CI_Model {

    const Entity = 'cms_contato';
    const Folder = 'contato';
    const IdColum = 'contato_id';

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

    public function GetAllByPageContato($limit, $offset) {
        $this->db->select('*')->from(self::Entity)->where('contato_tipo', 0)->limit($limit, $offset);
        $result = $this->db->get()->result();
        return $result;
    }

    public function GetAllByPageTrabalheConosco($limit, $offset) {
        $this->db->select('*')->from(self::Entity)->where('contato_tipo', 1)->limit($limit, $offset);
        $result = $this->db->get()->result();
        return $result;
    }

    public function ContTuplas($param, $valor) {
        return $this->db->select('*')->from(self::Entity)->where($param, $valor)->count_all_results();
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

    public function DeleteContato($id) {
        $result = $this->db->delete(self::Entity, array(self::IdColum => $id));
        return $result;
    }

    public function DeleteTrabalheConosco($id) {
        if ($this->DeleteFile($id)) {
            $result = $this->db->delete(self::Entity, array(self::IdColum => $id));
            return $result;
        } else {
            return FALSE;
        }
    }

    public function DeleteFile($id) {
        $this->db->select('contato_anexo')->from(self::Entity)->where(self::IdColum, $id);
        $image = $this->db->get()->result();
        if ($image) {
            if (file_exists(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->contato_anexo)) {
                return unlink(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->contato_anexo);
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
