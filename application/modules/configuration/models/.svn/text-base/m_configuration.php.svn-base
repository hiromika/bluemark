<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class m_configuration extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function get_all_configuration($start = 0, $limit = 20, $sort = 'CONFIG_ID', $dir = 'ASC', $key = '') {
        
        $this->db->start_cache();
        
        $this->db->select('bc.CONFIG_ID, bc.CONFIG_NAME, bc.CONFIG_SLUG, bc.CONFIG_VALUE',FALSE);
        $this->db->from('bama_configuration bc');
        
        if(strlen($key) > 0){
            $this->db->like('bc.CONFIG_NAME',$key);
            $this->db->or_like('bc.CONFIG_VALUE',$key);
            $this->db->or_like('bc.CONFIG_SLUG',$key);
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

    public function add_config($data) {
        
        $this->db->insert('bama_configuration',array(
            'CONFIG_SLUG' => $data['CONFIG_SLUG'],
            'CONFIG_NAME' => $data['CONFIG_NAME'],
            'CONFIG_VALUE' => $data['CONFIG_VALUE']
        ));

        $id = $this->db->insert_id();
        
        return $id;
    }
    
    public function edit_config($data) {
        
        $this->db->where('CONFIG_ID',$data['CONFIG_ID']);
        
        $this->db->update('bama_configuration',array(
            'CONFIG_SLUG' => $data['CONFIG_SLUG'],
            'CONFIG_NAME' => $data['CONFIG_NAME'],
            'CONFIG_VALUE' => $data['CONFIG_VALUE']
        ));
        
        return true;
    }

    public function delete_config($id) {
        $this->db->where('CONFIG_ID',$id);
        $this->db->delete('bama_configuration');
        return true;
    }
}
