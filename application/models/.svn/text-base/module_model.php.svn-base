<?php

/**
 * Description of module_model
 *
 * @author tuts.adiputra@gmail.com
 */
class module_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_module_by($key, $value, $column) {
        $this->db->select($column);
        $this->db->from('bama_modules');
        $this->db->where('MODULE_STATUS',1);
        $this->db->where($key,$value);
        $Q = $this->db->get();
        $result = array();
        if($Q->num_rows()){
            $result = $Q->row_array();
        }

        return $result;
    }
}
