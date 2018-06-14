<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class m_role_navigation extends CI_Model {
    
    function __construct() {
        parent::__construct();
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
    
    public function get_all_role() {
        $data = $this->db->get('bama_role');
        return $data->result_array();
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

    public function get_all_module() {
        $this->db->select('bm.MODULE_ID,bm.MODULE_NAME,bm.MODULE_SLUG,bm.MODULE_DESC, bm.MODULE_STATUS, IF(bm.MODULE_STATUS = 1,"INSTALLED","NOT INSTALLED") AS MODULE_STATUS_LABEL, bm.MODULE_ENABLED, IF(bm.MODULE_ENABLED = 1,"ENABLED","DISABLED") AS MODULE_ENABLED_LABEL',FALSE);
        $data = $this->db->get('bama_modules bm');
        return $data->result_array();
    }

    public function get_all_module_select() {
        $this->db->select('bm.MODULE_ID, bm.MODULE_NAME',FALSE);
        $this->db->from('bama_modules bm');
        $data = $this->db->get();
        $result = $data->result_array();

        return $result;
    }

    public function get_all_navigation_parent() {
        $this->db->select('bn.NAVIGATION_ID, bn.NAVIGATION_NAME',FALSE);
        $data = $this->db->where('bn.NAVIGATION_PARENT IS NULL')->get('bama_navigation bn');
        return $data->result_array();  
    }

    public function get_parent_navigation() {
        $this->db->select('bn.NAVIGATION_ID, bn.MODULE_SLUG, bn.NAVIGATION_NAME, bn.NAVIGATION_PARENT, bn.NAVIGATION_CLS, bn.NAVIGATION_LINK',FALSE);
        $data = $this->db->where('bn.NAVIGATION_PARENT IS NULL')->get('bama_navigation bn');
        return $data->result_array();
    }

    public function get_child_navigation() {
        $this->db->select('bn.NAVIGATION_ID, bn.MODULE_SLUG, bn.NAVIGATION_NAME, bn.NAVIGATION_PARENT, bn.NAVIGATION_CLS, bn.NAVIGATION_LINK',FALSE);
        $data = $this->db->where('bn.NAVIGATION_PARENT IS NOT NULL')->get('bama_navigation bn');
        return $data->result_array();
    }

    public function get_navigation_by( $key, $value, $select='' ) {
        if($select != '') {
            $this->db->select($select);
        }
        $this->db->where($key,$value);
        $data = $this->db->get('bama_navigation');
        return $data->result_array();
    }

    public function get_role_navigation_by($key, $value, $select='') {
        if($select != '') {
            $this->db->select($select);
        }
        $this->db->where($key,$value);
        $data = $this->db->get('bama_role_navigation');
        return $data->result_array();
    }

    public function get_role_navigation( $data ) {
        if( array_key_exists('navigation_id', $data) ) $this->db->where('NAVIGATION_ID', $data['navigation_id']);
        if( array_key_exists('role_id', $data) ) $this->db->where('ROLE_ID', $data['role_id']);
        $data = $this->db->get('bama_role_navigation');
        return $data->result_array();
    }

    public function add_role_navigation($data) {
        $this->db->insert('bama_role_navigation',array(
            'ROLE_ID' => $data['role_id'],
            'NAVIGATION_ID' => $data['navigation_id']
        ));
        
        return true;
    }

    public function remove_role_navigation($data) {
        $this->db->where('NAVIGATION_ID', $data['navigation_id']);
        $this->db->where('ROLE_ID', $data['role_id']);
        $this->db->delete('bama_role_navigation');
    }

    public function delete_navigation($id) {
        $this->db->where('NAVIGATION_ID',$id);
        $this->db->delete('bama_navigation');
    }

    public function add_navigation( $data ) {
        $navigation_parent = $data['NAVIGATION_PARENT'];
        if($data['NAVIGATION_PARENT'] == "" || $data['NAVIGATION_PARENT']==0) $navigation_parent = null;
        $this->db->insert('bama_navigation',array(
            'MODULE_ID' => $data['MODULE_ID'],
            'NAVIGATION_NAME' => $data['NAVIGATION_NAME'],
            'NAVIGATION_LINK' => $data['NAVIGATION_LINK'],
            'NAVIGATION_PARENT' => $navigation_parent,
            'NAVIGATION_CLS' => $data['NAVIGATION_CLS']
        ));

        return true;
    }

    public function edit_navigation( $data ) {
        $this->db->where('NAVIGATION_ID',$data['NAVIGATION_ID']);
        $navigation_parent = $data['NAVIGATION_PARENT'];
        if($data['NAVIGATION_PARENT'] == "" || $data['NAVIGATION_PARENT']==0) $navigation_parent = null;
        $this->db->update('bama_navigation',array(
            'MODULE_ID' => $data['MODULE_ID'],
            'NAVIGATION_NAME' => $data['NAVIGATION_NAME'],
            'NAVIGATION_LINK' => $data['NAVIGATION_LINK'],
            'NAVIGATION_PARENT' => $navigation_parent,
            'NAVIGATION_CLS' => $data['NAVIGATION_CLS']
        ));
        
        return true;
    }
    
    public function getActiveRole() {
        $this->db->select('ROLE_ID,ROLE_NAME');
        $this->db->from('bama_role');
        $this->db->where('ROLE_STATUS',1);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            return $Q->result_array();
        }
        return false;
    }
    
    public function getPermissionValue($permission,$role) {
        
        $val = false;
        $this->db->select('ROLE_NAVIGATION_ID');
        $this->db->from('bama_role_navigation');
        $this->db->where('NAVIGATION_ID',$permission);
        $this->db->where('ROLE_ID',$role);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $row = $Q->row();
            $val = $row->ROLE_NAVIGATION_ID;
        }
        
        return array('role' => $role, 'permission' => $permission, 'value' => $val);
    }
    
    public function savePermission($data) {
        
        foreach ($data as $key => $value) {
            
            if($value['value'] == null){
                $this->remove_role_navigation($value);
            }
            
            if($value['value'] == true){
                $this->add_role_navigation($value);
            }
        }
        
        if(!$this->db->_error_number()){
            return "Success update permission...";
        }
        
        return "Failed update permission...";
    }
}
