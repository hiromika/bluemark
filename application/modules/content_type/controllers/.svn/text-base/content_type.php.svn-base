<?php 

class Content_type extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('m_content_type','_mct');       
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
        $this->layout->set_header('Tipe Konten');

        $content = $this->load->view('index',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function update($id){
        $vdata = array();

        if($id > 0){
            $get = $this->_mct->get_content_type_by_id($id);
            
            if($get['total'] >= 1){
                $vdata['dt'] = $get['items'];
            }else{
                show_404();
                exit();
            }
        }else{
            header('Location : /content_type');
            exit();
        }

        $this->layout->set_header('Tipe Konten');

        $content = $this->load->view('update',$vdata,true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function add(){
        $this->layout->set_header('Tipe Konten');

        $content = $this->load->view('add',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function get_content_type_treedata(){
        $treedata = $this->_mct->get_content_type_tree();

        // echo '<pre>';
        echo json_encode($treedata['items']);
        // echo '</pre>';
    }

    public function get_form_ct_parent_item(){
        $id = 0;
        $id = $this->input->post('ctid');
        $select = $this->input->post('slct');

        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'id, name';
        $where ='';

        if($id > 0){ $where = 'id != ' . $id; }

        $data = $this->_mct->get_ct_parent_item($fields, $where, $select);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }

    public function get_form_tx_parent_item(){
        $id = 0;
        $id = $this->input->post('tid');
        $select = $this->input->post('slct');

        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'id, name';
        $where ='';

        if($id > 0){ $where = 'id != ' . $id; }

        $data = $this->_mct->get_tx_parent_item($fields, $where, $select);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }

    public function save(){
        if(strlen($this->input->post('ct_id')) > 0){
            $save = $this->_mct->update($this->input->post());
        }else{
            $save = $this->_mct->add($this->input->post());
        }

        echo $save;
        // header('Location: /content_type');
        // exit();
        //print_r($_POST);
    }

    public function delete_content_type($id){
        if((int)$id  == 0){
            throw new Exception;
        }

        // echo $tid;
        $try = $this->_mct->delete_ct($id);

        echo $try;
    }

    public function delete_attribute($id){
        if((int)$id  == 0){
            throw new Exception;
        }

        // echo $tid;
        $try = $this->_mct->delete_attr($id);

        echo $try;
    }

    //TODO: remove this function
    public function jalan(){
        $this->layout->set_header('Tipe Konten');

        $content = $this->load->view('jalan',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }


}//end of class