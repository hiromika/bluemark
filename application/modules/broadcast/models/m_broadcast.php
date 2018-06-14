<?php

/**
 * Description of m_topik
 *
 * @author edow@en3sys.com
 */
class M_broadcast extends CI_Model {
    
    public $auth;
    
    function __construct() {
        parent::__construct();
        $session = $this->authentication->getAuth();
        $this->auth = $session['id'];
    }

    public function getData($start = 0, $limit = 20, $sort = 'BCAST_DATE', $dir = 'DESC', $key = '') {
        
        $this->db->start_cache();
        $this->db->select(array(
            'BCAST_ID',
            'BCAST_DATE',
            'BCAST_MODULE',
            'BCAST_USER',
            'DATE_FORMAT (BCAST_DATE,\'%d-%m-%Y %H:%i:%s\') as BCAST_DATE',
            'BCAST_STATUS',
            'BCAST_STATUS_MESSAGE',
            'BCAST_TO',
            'BCAST_SUBJECT',
            'BCAST_CONTENT'
        ),FALSE);
        $this->db->from('pm_broadcast');
        
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

    function getByLimit($limit){

    	$q = "SELECT * 
    		  FROM pm_broadcast
    		  WHERE BCAST_USER = '".$this->auth."'
    		  ORDER BY BCAST_DATE LIMIT 0, ".$limit;

    	$this->db->start_cache();  

    	$query = $this->db->query($q)->result_array();

    	$this->db->stop_cache();
        $this->db->flush_cache();

        if(count($query) >= 1){
            return array('total' => count($query), 'data' => $query);
        }

        return array('total' => 0, 'data' => array());
    }

}//end of class