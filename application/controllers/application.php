<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Application extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->layout->render();
    }
    
    public function login() {
        
        $logon = $this->authentication->doLogin($this->input->post('username'),$this->input->post('password'));
        if($logon){
            echo json_encode(array('success' => true));
            return;
        }
        echo json_encode(array('success' => false, 'msg' => 'Authetication Failed'));
    }
    
    public function logout() {
        $this->authentication->destroyAuth();
        redirect();
    }

    /* =======================
    *   Dashboard
    *  ======================= */

    public function dashboard_ct_tree(){
        $this->load->model('dashboard_model', '_dm');
        $treedata = $this->_dm->get_content_type_tree();

        echo json_encode($treedata['items']);
    }

    /* =======================
    *   End of Dashboard
    *  ======================= */

}