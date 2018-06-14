<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {
    
    function __Construct(){
        parent::__Construct();
    }
    
    public function theme_view($theme = 'default', $view='index.php', $vars = array(), $return = FALSE) {
        $this->_ci_view_paths = array(FCPATH . 'themes' . DIRECTORY_SEPARATOR . $theme . DIRECTORY_SEPARATOR => TRUE);
        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }
    
    public function ext_view($directory, $view, $vars = array(), $return = FALSE) {
        $this->_ci_view_paths = array($directory => TRUE) + $this->_ci_view_paths;
        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }
    
    public function content($view, $vars = array(), $return = FALSE) {
        list($path, $_view) = Modules::find($view, $this->_module, 'views' . DIRECTORY_SEPARATOR);
	
        if ($path != FALSE) {
            $this->_ci_view_paths = array($path => TRUE) + $this->_ci_view_paths;
            
            $view = $_view;
        }
        if($return){
            $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
            return $this->output->get_output();
        }
        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }
}