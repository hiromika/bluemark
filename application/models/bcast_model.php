<?php

/**
 * Description of bcast_model
 *
 * @author hariardi@gmail.com
 */
class bcast_model extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    public function save($module, $user, $address, $subject, $message, $status, $status_message){
    	$data = array(
    			'BCAST_MODULE' => $module,
    			'BCAST_USER' => $user,
    			'BCAST_DATE' => date('Y-m-d H:i:s'),
    			'BCAST_STATUS' => $status,
                'BCAST_STATUS_MESSAGE' => $status_message,
                'BCAST_TO' => $address,
    			'BCAST_SUBJECT' => $subject,
    			'BCAST_CONTENT' => $this->db->escape_str($message)
    		);
        $this->db->insert('pm_broadcast', $data); 
    }
}