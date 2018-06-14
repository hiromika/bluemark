<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class m_user extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function getAllUser($start = 0, $limit = 20, $sort = 'USER_LOGIN', $dir = 'ASC', $key = '') {
        
        $this->db->start_cache();
        
        $this->db->select('bu.USER_ID,bu.USER_LOGIN,bu.ROLE_ID,bu.USER_FULLNAME, br.ROLE_NAME, IF(bu.USER_STATUS = 1,"Active","Inactive") AS USER_STATUS',FALSE);
        $this->db->from('bama_user bu');
        $this->db->join('bama_role br', 'br.ROLE_ID = bu.ROLE_ID');
        
        if(strlen($key) > 0){
            $this->db->like('USER_LOGIN',$key);
            $this->db->or_like('USER_FULLNAME',$key);
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
    
    public function add($data) {
        
        $this->db->insert('bama_user',array(
            'USER_LOGIN'    => $data['USER_LOGIN'],
            'USER_PWD'      => md5($data['USER_PWD']),
            'USER_FULLNAME' => $data['USER_FULLNAME'],
            'ROLE_ID'       => $data['ROLE_ID']
        ));
        
        return true;
    }
    
    public function edit($data) {
        
        $password = (strlen($data['USER_PWD']) > 0)?md5($data['USER_PWD']):NULL;
        
        $this->db->where('USER_ID',$data['USER_ID']);
        
        $this->db->update('bama_user',array(
            'USER_LOGIN'    => $data['USER_LOGIN'],
            'USER_PWD'      => $password,
            'USER_FULLNAME' => $data['USER_FULLNAME'],
            'USER_STATUS'   => $data['USER_STATUS'],
            'ROLE_ID'       => $data['ROLE_ID']
        ));
        
        return true;
    }
    
    public function delete($id) {
        
        $this->db->where('USER_ID',$id);
        $this->db->delete('bama_user');
        
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
}
