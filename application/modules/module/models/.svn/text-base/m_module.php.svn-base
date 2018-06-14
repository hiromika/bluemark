<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class m_module extends MY_Model {
    
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
            'MODULE_STATUS' => 1,
            'MODULE_ENABLED' => 1
        ));

        $id = $this->db->insert_id();
        
        return $id;
    }
    
    public function edit($data) {
        
        $this->db->where('MODULE_ID',$data['MODULE_ID']);
        
        $this->db->update('bama_modules',array(
            'MODULE_NAME' => $data['MODULE_NAME'],
            'MODULE_DESC' => $data['MODULE_DESC']
        ));
        
        return true;
    }

    public function update_data($id, $data) {
        $this->db->where('MODULE_ID',$id);
        $this->db->update('bama_modules',$data);
        return true;
    }

    public function update_data_by($key, $value, $data) {
        $this->db->where($key,$value);
        $this->db->update('bama_modules',$data);
        return true;
    }
    
    public function delete($slug) {
        
        $this->db->where('MODULE_SLUG',$slug);
        $this->db->delete('bama_modules');
        
    }

    public function get_all_module() {
        $this->db->select('bm.MODULE_ID,bm.MODULE_NAME,bm.MODULE_SLUG,bm.MODULE_DESC, bm.MODULE_STATUS, IF(bm.MODULE_STATUS = 1,"INSTALLED","NOT INSTALLED") AS MODULE_STATUS_LABEL, bm.MODULE_ENABLED, IF(bm.MODULE_ENABLED = 1,"ENABLED","DISABLED") AS MODULE_ENABLED_LABEL',FALSE);
        $data = $this->db->get('bama_modules bm');
        return $data->result_array();
    }
}
