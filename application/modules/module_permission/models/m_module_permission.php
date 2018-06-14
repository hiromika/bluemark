<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class m_module_permission extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function get_all_module() {
        $this->db->select('bm.MODULE_ID,bm.MODULE_NAME,bm.MODULE_SLUG,bm.MODULE_DESC, bm.MODULE_STATUS, IF(bm.MODULE_STATUS = 1,"INSTALLED","NOT INSTALLED") AS MODULE_STATUS_LABEL, bm.MODULE_ENABLED, IF(bm.MODULE_ENABLED = 1,"ENABLED","DISABLED") AS MODULE_ENABLED_LABEL',FALSE);
        $data = $this->db->get('bama_modules bm');
        return $data->result_array();
    }

    public function get_all_permission($start = 0, $limit = 20, $sort = 'PERMISSION_ID', $dir = 'ASC', $key = '') {
        
        $this->db->select('bp.PERMISSION_ID, bp.MODULE_ID, bp.PERMISSION_NAME, bp.PERMISSION_SLUG, bp.PERMISSION_DESC, bm.MODULE_NAME',FALSE);
        $this->db->from('bama_permission bp');
        $this->db->join('bama_modules bm', 'bm.MODULE_ID = bp.MODULE_ID');
        
        if(strlen($key) > 0){
            $this->db->like('bp.PERMISSION_NAME',$key);
            $this->db->or_like('bp.PERMISSION_DESC',$key);
            $this->db->or_like('bp.PERMISSION_SLUG',$key);
        }

        $total = $this->db->_compile_select();

        $total = $this->db->query($total)->num_rows();
        
        //$this->db->limit($limit,$start);
        
        $data = $this->db->get();
        
        if($total){
            $result = $data->result_array();
            $role = $this->getActiveRole();
            foreach ($result as $keys => $value) {
                foreach ($role as $rkey => $rvalue) {
                    $result[$keys][$rvalue['ROLE_ID']] = json_encode($this->getPermissionValue($value['PERMISSION_ID'],$rvalue['ROLE_ID']));
                }
            }
            
            return array('total' => $total, 'data' => $result);
        }
        
        return array('total' => 0, 'data' => array());
    }

    public function get_all_module_select() {
        $this->db->select('bm.MODULE_ID, bm.MODULE_NAME',FALSE);
        $this->db->from('bama_modules bm');
        $data = $this->db->get();
        $result = $data->result_array();

        return $result;
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

    public function add_module_permission($data) {

        $this->db->insert('bama_role_permission',array(
            'ROLE_ID' => $data['role_id'],
            'PERMISSION_ID' => $data['permission_id']
        ));
        
        return true;
    }

    public function remove_module_permission($data) {
        $this->db->where('PERMISSION_ID', $data['permission_id']);
        $this->db->where('ROLE_ID', $data['role_id']);
        $this->db->delete('bama_role_permission');
    }

    public function get_module_permission($data) {
        if( array_key_exists('permission_id', $data) ) $this->db->where('PERMISSION_ID', $data['permission_id']);
        if( array_key_exists('module_id', $data) ) $this->db->where('MODULE_ID', $data['module_id']);
        $data = $this->db->get('bama_permission');
        return $data->result_array();
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
    
    private function getPermissionValue($permission,$role) {
        
        $val = false;
        $this->db->select('ROLE_PERMISSION_ID');
        $this->db->from('bama_role_permission');
        $this->db->where('PERMISSION_ID',$permission);
        $this->db->where('ROLE_ID',$role);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $row = $Q->row();
            $val = $row->ROLE_PERMISSION_ID;
        }
        
        return array('role' => $role, 'permission' => $permission, 'value' => $val);
    }
    
    public function savePermission($data) {
        
        foreach ($data as $key => $value) {
            
            if($value['value'] == null){
                $this->remove_module_permission($value);
            }
            
            if($value['value'] == true){
                $this->add_module_permission($value);
            }
        }
        
        if(!$this->db->_error_number()){
            return "Success update permission...";
        }
        
        return "Failed update permission...";
    }

}
