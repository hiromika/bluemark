<?php

/**
 * Description of bcast_model
 *
 * @author en3.webmaster@gmail.com
 */
class Dashboard_Model extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    function get_all_dashboard_content(){
    	$data = array();

    	//count users
    	$this->db->select('COUNT(USER_ID) AS user_count');
    	$CU = $this->db->get_where('bama_user', array('USER_STATUS'=>1))->row_array();
    	$data['active_user_count'] = $CU['user_count'];
    	// $CU->free_result();

    	return $data;
    }

   
}//end of class