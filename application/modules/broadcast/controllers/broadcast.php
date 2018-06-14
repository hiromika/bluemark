<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author edow | edow@en3sys.com
 */
class broadcast extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('m_broadcast','_broadcast');
        $this->layout->addStyle('/assets/'.strtolower(__CLASS__).'/css/style.css');
        $this->layout->addScript('/assets/'.strtolower(__CLASS__).'/js/jquery.BlockUI.js');
        $this->layout->addScript('/assets/'.strtolower(__CLASS__).'/js/script.js');
    }

    public function install() {

        $status = true;
        $msg = 'Successfull';
        
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }

    public function uninstall() {
        
        $status = true;
        $msg = "Gagal melakukan proses uninstall";
        if($status) $msg = "Berhasil melakukan uninstall module";
        return array("status"=>$status,"msg"=>$msg);
    }

    public function index(){

        $this->layout->set_header('Broadcast Email List');
        $content = $this->load->view('index',array(),true);
        $this->layout->set_content($content);
        
        $this->layout->render("index",__CLASS__);
    }

    public function navbarList(){
    	$data = $this->_broadcast->getByLimit(4);
    	$this->load->view('navbarlist', $data);
    }

    public function getData() {

        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        
        $result = $this->_broadcast->getData($start,$limit,$order,$direction,$key);
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }

    public function test(){
        bcastEmail('topik', array('hariardi@gmail.com'), 'Test', 'Test Message');
    }

} //end of class