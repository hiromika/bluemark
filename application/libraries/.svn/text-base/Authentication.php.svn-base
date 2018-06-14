<?php

/**
 * Description of Authentcation
 *
 * @author hariardi@gmail.com
 */
class Authentication {
    
    public $CI;
    public $session;
    
    public function __construct() {
        $this->CI =&get_instance();
        $this->CI->load->model('auth_model','_auth');
    }
    
    public function check() {
        return (count($this->CI->session->userdata('auth')) > 0)?true:false;
    }
    
    public function setAuth($user) {
        extract($this->CI->_auth->getUserDetail($user));
        $sess = array(
            'name'      => $user_name,
            'id'        => $user_id,
            'uid'        => $user_uid,
            'hash'      => $role,
            'default'   => $default
        );
        $this->CI->session->set_userdata('auth',$sess);
        $this->session = $this->CI->session->userdata('auth');
                
    }
    
    public function getAuth() {
        return $this->CI->session->userdata('auth');
    }
    
    public function destroyAuth() {
        $this->CI->session->sess_destroy();
    }
    
    public function doLogin($username,$password) {
        $login = $this->CI->_auth->doLogin($username,$password);
        if($login){
            $this->setAuth($username);
            
            return true;
        }
        
        return false;
    }
    
}
