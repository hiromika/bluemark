<?php

/**
 * Description of m_contoh
 *
 * @author hariardi@gmail.com
 */
class m_contoh extends CI_Model {
    
    public $auth;
    
    function __construct() {
        parent::__construct();
    }
    
    public function getData() {
        $Q = $this->db->get('todo');
        if($Q->num_rows() > 0){
            return $Q->result_array();
        }
        
        return false;
    }
    
    public function getDataById($id) {
        $this->db->where('id',$id);
        $Q = $this->db->get('todo');
        if($Q->num_rows() > 0){
            return $Q->row_array();
        }
        
        return false;
    }
    
    public function add($data) {
        
        $this->db->insert('todo',array(
            'nama'      => $data['nama'],
            'deskripsi' => $data['deskripsi']
        ));
        
        return true;
    }
    
    public function edit($data) {
        
        $this->db->where('id',$data['id']);
        
        $this->db->update('todo',array(
            'nama'      => $data['nama'],
            'deskripsi' => $data['deskripsi']
        ));
        
        return true;
    }
    
    public function delete($id) {
        
        $this->db->where('id',$id);
        $this->db->delete('todo');
        
        return true;
    }

}
