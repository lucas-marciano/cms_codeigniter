<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Save($data) {
        $data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT);
        $this->db->insert('cms_user', $data);
        $userID = $this->db->insert_id();
        if ($userID) {
            return $this->GetUser($userID);
        } else {
            return false;
        }
    }

    public function Update($data) {
        $data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $data);
    }

    public function Login($data) {
        $this->db->select('*')->from('cms_user')->where('user_email', $data['user_email']);
        $results = $this->db->get()->result();

        return $results;
    }

    public function GetUser($id) {
        $this->db->select('*')->from('cms_user')->where('user_id', $id);
        $result = $this->db->get()->result();

        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

}
