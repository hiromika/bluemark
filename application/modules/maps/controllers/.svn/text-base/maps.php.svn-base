<?php 

class Maps extends MY_Controller {

    public function __construct() {

        parent::__construct();
        // $this->load->model('m_notifikasi','_notifikasi');       
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
        $this->layout->set_header('Pemetaan');

        $content = $this->load->view('index',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

}//end of class