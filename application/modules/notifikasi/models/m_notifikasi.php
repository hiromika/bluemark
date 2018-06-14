<?php

/**
 * Description of m_topik
 *
 * @author hariardi@gmail.com
 */
class m_notifikasi extends CI_Model {
    
    public $auth;
    
    public function __construct() {
        parent::__construct();
        $session = $this->authentication->getAuth();
        $this->auth = $session['id'];
    }

    function getUID($name){

    	$this->db->start_cache();    
    	$this->db->select('USER_ID');
    	$this->db->where('USER_LOGIN', $name);
		$query = $this->db->get('bama_user')->row_array();
    	$this->db->stop_cache();
        $this->db->flush_cache();

        return $query['USER_ID'];
    }

    public function getAll(){

    	$uid = $this->getUID($this->auth);
    	$q = "SELECT * FROM pm_notifikasi WHERE NOTIF_USER = '".$uid."' AND NOTIF_DATE = '".date('Y-m-d')."' ORDER BY NOTIF_TIME DESC";

    	$this->db->start_cache();    
    	$query = $this->db->query($q)->result_array();
    	$this->db->stop_cache();
        $this->db->flush_cache();

    	if(count($query) >= 1){
            return array('total' => count($query), 'data' => $query);
        }

        return array('total' => 0, 'data' => array());

    }

    public function updateByID($nid, $data){

        $this->db->start_cache();    
        $this->db->where('NOTIF_ID', $nid);
        $this->db->update('pm_notifikasi', $data); 
        $this->db->stop_cache();
        $this->db->flush_cache();

        return TRUE;
    }

} //end of class