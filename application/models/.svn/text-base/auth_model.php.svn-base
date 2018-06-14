<?php

/**
 * Description of theme_model
 *
 * @author hariardi@gmail.com
 */
class auth_model extends CI_Model {
    
    private $auth = false;
            
    function __construct() {
        parent::__construct();
    }
    
    public function getUserDetail($user) {
        
        $this->db->select('USER_ID,USER_LOGIN,USER_FULLNAME,bama_user.ROLE_ID,ROLE_DEFAULT_PAGE');
        $this->db->from('bama_user');
        $this->db->join('bama_role','bama_role.ROLE_ID=bama_user.ROLE_ID','left');
        $this->db->where('USER_LOGIN',$user);
        $row = $this->db->get()->row_array();
        if(count($row) > 0){
            return array(
                'user_name' => $row['USER_FULLNAME'],
                'user_id'   => $row['USER_ID'],
                'user_uid'   => $row['USER_LOGIN'],
                'role'      => $row['ROLE_ID'],
                'default'   => $row['ROLE_DEFAULT_PAGE']
            );
        }
        return false;
    }
    
    public function doLogin($user,$pwd) {
        $this->db->select('USER_PWD,USER_STATUS');
        $this->db->from('bama_user');
        $this->db->where('USER_LOGIN',$user);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $row = $Q->row();
            if($row->USER_PWD == md5($pwd) && $row->USER_STATUS == 1){
                return true;
            }
        }
        
        return false;
    }
   
}
