<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Repair extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_repair','_repair');
    }
   
    public function get_data_combo_customer() {
        
        echo json_encode($this->_repair->getDataComboCustomer());
    }
    
    public function get_data_combo_model() {
        
        echo json_encode($this->_repair->getDataComboModel());
    }
    
    public function get_data_combo_province() {
        
        echo json_encode($this->_repair->getDataComboProvince());
    }
    
    public function loadCustomer($id) {
        
        echo json_encode($this->_repair->getCustomer($id));
    }
    
    public function loadModel($id) {
        
        echo json_encode($this->_repair->getModel($id));
    }
    
    /**
     * CRUD Repair Order
     */
    
    public function save_ro() {
        
        echo $this->_repair->add($this->input->post());
    }
}