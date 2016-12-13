<?php
/**
 * <b>MODEL</b> ServicoAdm 
 * Extentido da classe CI_Model.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ServicoAdm_model extends CI_Model {
    const Entity = 'cms_service';
    const Folder = 'servicos';
    
    //Colunas da base
    const IdColum = 'service_id';
    const ImgColum = 'service_picture';

    function __construct() {
        parent::__construct();
    }

    /**
     * <b>Save</b>: Metodo responsável por salvar um item na base de dados, 
     * retornando o ID do elemento que foi inserido.
     * @param type $data - Dados do form (Array)
     * @return type - Id da tupla inserida (Int)
     */
    public function Save($data) {
        $this->db->insert(self::Entity, $data);
        return $this->db->insert_id();
    }

    /**
     * <b>Update</b>: Metodo responsável por atualizar um item da tabela, a partir
     * de um ID enviado por parametro.
     * @param type $data - Dados do form (Array)
     * @param type $id - Id do item a ser editado (Int)
     * @return type
     */
    public function Update($data, $id) {
        $this->db->where(self::IdColum, $id);
        $result = $this->db->update(self::Entity, $data);
        return $result;
    }

    /**
     * <b>GetAll</b>: Metodo responsável por retornar todos as tuplas do banco.
     * @return result - Array com todos as tuplas.
     */
    public function GetAll() {
        $this->db->select('*')->from(self::Entity);
        $result = $this->db->get()->result();

        return $result;
    }

    /**
     * <b>GetById</b>: Metodo responsável por retornar um item do banco, a partir
     * de um ID enviado pelo Controller.
     * @param type $id
     * @return type
     */
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

    public function Delete($id) {
        if ($this->DeleteFile($id)) {
            $result = $this->db->delete(self::Entity, array(self::IdColum => $id));
            return $result;
        } else {
            return FALSE;
        }
    }

    public function DeleteFile($id) {
        $this->db->select(self::ImgColum)->from(self::Entity)->where(self::IdColum, $id);
        $image = $this->db->get()->result();
            
        if ($image[0]->service_picture != "") {
            if (file_exists(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->service_picture)) {
                return unlink(UPLOAD . self::Folder . DIRECTORY_SEPARATOR . $image[0]->service_picture);
            } else {
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }

}
