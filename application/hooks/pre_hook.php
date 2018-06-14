<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of layout
 *
 * @author rune
 */
class AccessControl {
    
    public $CI;
	protected $reserved = array('application','assets','repair');
	
    function __construct() {
        $this->CI =& get_instance();
    }


    public function modulecheck() {
        $class = $this->CI->router->fetch_class();
		$method = $this->CI->router->fetch_method();
		
		if(!in_array($class,$this->reserved) && $method != 'install'){
			$this->CI->db->select('MODULE_STATUS');
			$this->CI->db->from('bama_modules');
			$this->CI->db->where('MODULE_SLUG',$class);
			$Q = $this->CI->db->get();
			if($Q->num_rows() > 0){
				$row = $Q->row();
				if((int)$row->MODULE_STATUS === 1){
					return;
				}
			}
			
			$this->CI->output->set_status_header('404');
			die;
		}
    }
	
	private function _checkACL($class,$method) {
		
	}
}
