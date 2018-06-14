<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class m_theme extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function getAllModule($start = 0, $limit = 20, $sort = 'USER_LOGIN', $dir = 'ASC', $key = '') {
        
        $this->db->start_cache();
        
        $this->db->select('bm.MODULE_ID,bm.MODULE_NAME,bm.MODULE_SLUG,bm.MODULE_DESC, IF(bm.MODULE_STATUS = 1,"Installed","Not Installed") AS MODULE_STATUS',FALSE);
        $this->db->from('bama_modules bm');
        
        if(strlen($key) > 0){
            $this->db->like('MODULE_NAME',$key);
            $this->db->or_like('MODULE_DESC',$key);
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
        
        $this->db->insert('bama_modules',array(
            'MODULE_NAME' => $data['MODULE_NAME'],
            'MODULE_SLUG' => $data['MODULE_SLUG'],
            'MODULE_DESC' => $data['MODULE_DESC'],
            'MODULE_STATUS' => $data['MODULE_STATUS']
        ));
        
        return true;
    }
    
    public function edit($data) {
        
        $password = (strlen($data['USER_PWD']) > 0)?md5($data['USER_PWD']):NULL;
        
        $this->db->where('USER_ID',$data['USER_ID']);
        
        $this->db->update('bama_modules',array(
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

    public function get_all_module() {
        $data = $this->db->get('bama_modules');
        return $data->result_array();
    }

    public function install_module($data) {
        $this->db->insert('bama_modules',array(
            'MODULE_NAME' => $data['MODULE_NAME'],
            'MODULE_SLUG' => $data['MODULE_SLUG'],
            'MODULE_DESC' => $data['MODULE_DESC'],
            'MODULE_STATUS' => $data['MODULE_STATUS'],
            'MODULE_ENABLED' => $data['MODULE_ENABLED']
        ));
        
        return true;
    }

    public function uninstall_module($id, $data) {
        $this->db->where('MODULE_ID',$id);
        $this->db->update('bama_modules',$data);
        return true;
    }
}
