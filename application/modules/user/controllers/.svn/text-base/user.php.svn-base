<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author tuts.adiputra@gmail.com
 */
class user extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_user','_user_model');
        
    }
    
    public function index() {
        
        $this->layout->set_header('User Management');
        $data_role = $this->_user_model->get_all_role();
        $content = $this->load->view('index',array('data_role'=>$data_role),true);
        $this->layout->set_content($content);
        
        $this->layout->render("", __CLASS__);
    }
    
    public function get() {
        
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        
        $result = $this->_user_model->getAllUser($start,$limit,$order,$direction,$key);
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }

    public function getRole() {

        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        
        $result = $this->_user_model->getAllRole($start,$limit,$order,$direction,$key);
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }
    
    public function save() {
        if(strlen($this->input->post('USER_ID')) > 0){
            $this->_user_model->edit($this->input->post());
        } else {
            $this->_user_model->add($this->input->post());
        }
    }

    public function save_role() {
        if(strlen($this->input->post('ROLE_ID')) > 0){
            $this->_user_model->edit_role($this->input->post());
        } else {
            $this->_user_model->add_role($this->input->post());
        }
    }
    
    public function delete($id) {
        
        if((int)$id  == 0){
            throw new Exception;
        }
        
        $this->_user_model->delete($id);
    }

    public function delete_role($id) {
        
        if((int)$id  == 0){
            throw new Exception;
        }
        
        $this->_user_model->delete_role($id);
    }
}
