<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class m_role_permission extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function get_all_module() {
        $data = $this->db->get('bama_modules');
        return $data->result_array();
    }

    public function getAllRole($start = 0, $limit = 20, $sort = 'ROLE_NAME', $dir = 'ASC', $key = '') {
        
        $this->db->start_cache();
        
        $this->db->select('ROLE_ID,ROLE_NAME,IF(ROLE_STATUS = 1,"Active","Inactive") AS ROLE_STATUS',FALSE);
        $this->db->from('bama_role');
        
        if(strlen($key) > 0){
            $this->db->like('ROLE_NAME',$key);
        }
        
        $this->db->stop_cache();
        
        $total = $this->db->get()->num_rows();
        
        $this->db->limit($limit,$start);
        
        $data = $this->db->get();
        
        if($total){
            $result = $data->result_array();
            
            return array('total' => $total, 'data' => $result);
        }
        
        return array('total' => 0, 'data' => array());
    }

    public function add_role($data) {
        
        $this->db->insert('bama_role',array(
            'ROLE_NAME'     => $data['ROLE_NAME'],
            'ROLE_STATUS'   => $data['ROLE_STATUS']
        ));
        
        return true;
    }
    
    public function edit_role($data) {
        $this->db->where('ROLE_ID',$data['ROLE_ID']);
        
        $this->db->update('bama_role',array(
            'ROLE_NAME'     => $data['ROLE_NAME'],
            'ROLE_STATUS'   => $data['ROLE_STATUS']
        ));
        
        return true;
    }
    
    public function delete_role($id) {
        
        $this->db->where('ROLE_ID',$id);
        $this->db->delete('bama_role');
        
    }

    public function get_all_module_select() {
        $this->db->select('bm.MODULE_ID, bm.MODULE_NAME',FALSE);
        $this->db->from('bama_modules bm');
        $data = $this->db->get();
        $result = $data->result_array();

        return $result;
    }

    public function get_all_permission($start = 0, $limit = 20, $sort = 'PERMISSION_ID', $dir = 'ASC', $key = '', $module_id = '') {
        
        $this->db->start_cache();
        
        $this->db->select('bp.PERMISSION_ID, bp.MODULE_ID, bp.PERMISSION_NAME, bp.PERMISSION_SLUG, bp.PERMISSION_DESC, bm.MODULE_NAME',FALSE);
        $this->db->from('bama_permission bp');
        $this->db->join('bama_modules bm', 'bm.MODULE_ID = bp.MODULE_ID');
        
        if(strlen($key) > 0){
            $this->db->like('bp.PERMISSION_NAME',$key);
            $this->db->or_like('bp.PERMISSION_DESC',$key);
        }

        if(strlen($module_id) > 0) {
            $this->db->where('bp.MODULE_ID', $module_id);
        }
        
        $this->db->stop_cache();
        
        $total = $this->db->get()->num_rows();
        
        $this->db->limit($limit,$start);
        
        $data = $this->db->get();
        
        if($total){
            $result = $data->result_array();
            
            return array('total' => $total, 'data' => $result);
        }
        
        return array('total' => 0, 'data' => array());
    }

    public function edit_item_permission($data) {

        $this->db->where('PERMISSION_ID',$data['PERMISSION_ID']);
        
        $this->db->update('bama_permission',array(
            'PERMISSION_NAME' => $data['PERMISSION_NAME'],
            'PERMISSION_SLUG' => $data['PERMISSION_SLUG'],
            'PERMISSION_DESC' => $data['PERMISSION_DESC'],
            'MODULE_ID' => $data['MODULE_ID']
        ));
        
        return true;
    }

    public function add_item_permission($data) {
        
        $this->db->insert('bama_permission',array(
            'PERMISSION_NAME' => $data['PERMISSION_NAME'],
            'PERMISSION_SLUG' => $data['PERMISSION_SLUG'],
            'PERMISSION_DESC' => $data['PERMISSION_DESC'],
            'MODULE_ID' => $data['MODULE_ID']
        ));
        
        return true;
    }

    public function delete_item_permission($id) {
        $this->db->where('PERMISSION_ID',$id);
        $this->db->delete('bama_permission');
    }

    public function add_role_permission($data) {

        $this->db->insert('bama_role_permission',array(
            'ROLE_ID' => $data['role_id'],
            'PERMISSION_ID' => $data['permission_id']
        ));
        
        return true;
    }

    public function remove_role_permission($data) {
        $this->db->where('PERMISSION_ID', $data['permission_id']);
        $this->db->where('ROLE_ID', $data['role_id']);
        $this->db->delete('bama_role_permission');
    }

    public function get_role_permission($data) {
        if( array_key_exists('permission_id', $data) ) $this->db->where('PERMISSION_ID', $data['permission_id']);
        if( array_key_exists('role_id', $data) ) $this->db->where('ROLE_ID', $data['role_id']);
        $data = $this->db->get('bama_role_permission');
        return $data->result_array();
    }

}
