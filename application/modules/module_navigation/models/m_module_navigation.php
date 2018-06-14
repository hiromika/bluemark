<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class m_module_navigation extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function get_all_navigation($start = 0, $limit = 20, $sort = 'NAVIGATION_ID', $dir = 'ASC', $key = '') {
        
        $this->db->start_cache();
        
        $this->db->select('bn.NAVIGATION_ID, bn.NAVIGATION_NAME, bn.NAVIGATION_CLS, bn.NAVIGATION_LINK, bn.NAVIGATION_PARENT, bn2.NAVIGATION_NAME as NAVIGATION_PARENT_NAME, bm.MODULE_NAME, bn.MODULE_ID',FALSE);
        $this->db->from('bama_navigation bn');
        $this->db->join('bama_modules bm', 'bm.MODULE_ID = bn.MODULE_ID');
        $this->db->join('bama_navigation bn2', 'bn2.NAVIGATION_ID = bn.NAVIGATION_PARENT','left');
        
        if(strlen($key) > 0){
            $this->db->like('bn.NAVIGATION_NAME',$key);
            $this->db->or_like('bn.NAVIGATION_LINK',$key);
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

    public function get_all_navigation_by($start = 0, $limit = 20, $sort = 'NAVIGATION_ID', $dir = 'ASC', $key = '', $module_id = '') {
        
        $this->db->start_cache();
        
        $this->db->select('bn.NAVIGATION_ID, bn.NAVIGATION_NAME, bn.NAVIGATION_CLS, bn.NAVIGATION_LINK, bn.NAVIGATION_PARENT, bn2.NAVIGATION_NAME as NAVIGATION_PARENT_NAME, bm.MODULE_NAME, bn.MODULE_ID',FALSE);
        $this->db->from('bama_navigation bn');
        $this->db->join('bama_modules bm', 'bm.MODULE_ID = bn.MODULE_ID');
        $this->db->join('bama_navigation bn2', 'bn2.NAVIGATION_ID = bn.NAVIGATION_PARENT', 'left');
        $this->db->where('bm.MODULE_ID', $module_id);

        if(strlen($key) > 0){
            $this->db->like('bn.NAVIGATION_NAME',$key);
            $this->db->or_like('bn.NAVIGATION_LINK',$key);
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

    public function get_parent_navigation() {
        $this->db->select('bn.NAVIGATION_ID, bn.MODULE_ID, bn.NAVIGATION_NAME, bn.NAVIGATION_PARENT, bn.NAVIGATION_CLS, bn.NAVIGATION_LINK',FALSE);
        $data = $this->db->where('bn.NAVIGATION_PARENT IS NULL')->get('bama_navigation bn');
        return $data->result_array();
    }

    public function get_all_navigation_parent() {
        $this->db->select('bn.NAVIGATION_ID, bn.NAVIGATION_NAME',FALSE);
        $data = $this->db->where('bn.NAVIGATION_PARENT IS NULL')->get('bama_navigation bn');
        return $data->result_array();  
    }

    public function get_child_navigation() {
        $this->db->select('bn.NAVIGATION_ID, bn.MODULE_ID, bn.NAVIGATION_NAME, bn.NAVIGATION_PARENT, bn.NAVIGATION_CLS, bn.NAVIGATION_LINK',FALSE);
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

    public function get_module_navigation( $data ) {
        if( array_key_exists('module_id', $data) ) $this->db->where('MODULE_ID', $data['module_id']);
        if( array_key_exists('navigation_id', $data) ) $this->db->where('NAVIGATION_ID', $data['navigation_id']);
        $data = $this->db->get('bama_navigation');
        return $data->result_array();
    }

    public function add_module_navigation( $data ) {
        $this->db->insert('bama_role_permission',array(
            'ROLE_ID' => $data['role_id'],
            'PERMISSION_ID' => $data['permission_id']
        ));
        
        return true;
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

    public function delete_navigation($id) {
        $this->db->where('NAVIGATION_ID',$id);
        $this->db->delete('bama_navigation');
    }
}
