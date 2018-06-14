<?php

class Finance extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
        $this->load->model('model', '_model');
        $this->layout->addStyle('/assets/' . strtolower(__CLASS__) . '/css/style.css');
        $this->layout->addScript('/assets/' . strtolower(__CLASS__) . '/js/jquery.BlockUI.js');
        $this->layout->addScript('/assets/' . strtolower(__CLASS__) . '/js/script.js');
    }

    public function install() {

        $status = true;
        $msg = 'Successfull';
        
        //nambah navigasi
        add_navigation(__CLASS__, NULL, 'Finance', 'Finance', 'fa fa-book', '');
        add_navigation(__CLASS__, 'Finance', 'Transaksi', 'Transaksi', '', '/finance');
        add_navigation(__CLASS__, 'Finance', 'Rekap', 'Rekap', '', '/finance/rekap');
        add_navigation(__CLASS__, 'Finance', 'Data Master', 'Data Master', '', '/finance/master');

        echo json_encode(array("status" => $status, "msg" => $msg));
    }

    public function uninstall() {

        $status = true;
        $msg = "Gagal melakukan proses uninstall";
        if ($status)
            $msg = "Berhasil melakukan uninstall module";
        return array("status" => $status, "msg" => $msg);
    }

    public function index() {
        $this->layout->set_header('CashFlow');
        $data = array(
            'cashFlow'          => $this->_model->getFlow(),
            'kd_akun'           => $this->_model->getAkun(),
            'kd_kator'          => $this->_model->getKator(),
            'kd_kom'            => $this->_model->getKom(),
	        'max_transaksi_id'  => $this->_model->select_transaksi_max_id(),
            'client'            => $this->_model->getClient()
            );
        $content = $this->load->view('content',$data,true);
        $this->layout->set_content($content);
        $this->layout->render("index", __CLASS__);
    }

  
/*MASTER*/
    public function master() {
        $data = array(
            'cashFlow'          => $this->_model->getFlow(),
            'kd_akun'           => $this->_model->getAkun(),
            'kd_kator'          => $this->_model->getKator(),
            'kd_kom'            => $this->_model->getKom(),
            'client'            => $this->_model->getClient(),
            'group'             => $this->_model->getGroup(),
            'max_transaksi_id'  => $this->_model->select_transaksi_max_id()
            );
        $content = $this->load->view('master',$data,true);
        $this->layout->set_content($content);
        $this->layout->render("index", __CLASS__);
    }

    public function m_akun(){
        $akun = $this->_model->gakun();
        echo json_encode(array('data' => $akun));
    }

    public function m_kator(){
        $kator = $this->_model->gkator();
        echo json_encode(array('data' => $kator));
    }

    public function m_kom(){
        $kom = $this->_model->gkom();
        echo json_encode(array('data' => $kom));
    }

    public function m_client(){
        $client = $this->_model->gclient();
        echo json_encode(array('data' => $client));
    }


    public function saveAkun(){
        $data = $this->input->post();
        $akun = array(
            'kode_akun'     => $data['kode_akun'],
            'nama_akun'     => $data['nama_akun'],
            'kode_group'    => $data['kode_group']
        );

       $add = $this->_model->addAKun($akun);
       if ($add!= 0) {
        echo json_encode(array('success' => true));
       }else{
        echo json_encode(array('success' => false));
       }
    }

    public function updateAkun(){
        $data = $this->input->post();
        $data2 = array(
            'kode_akun'     => $data['kode_akun'],
            'nama_akun'     => $data['nama_akun'],
            'kode_group'    => $data['kode_group']
            );
        $edit = $this->_model->editAkun($data2,$data['id_akun']);
        
       if ($edit!= 0) {
        echo json_encode(array('success' => true));
       }else{
        echo json_encode(array('success' => false));
       }
    }

    public function deleteAkun(){
        $id = $this->input->post('id_akun');

        $del = $this->_model->delAkun($id);

        echo json_encode(array('success' => true));

    }

    public function saveKator(){
        $data = $this->input->post();
        $kategori = array(
            'kode_kategori'  => $data['kode_kategori'],
            'nama_kategori'  => $data['nama_kategori']
        );

       $add = $this->_model->addKator($kategori);
       if ($add!= 0) {
        echo json_encode(array('success' => true));
       }else{
        echo json_encode(array('success' => false));
       }
    }

    public function updateKator(){
        $data = $this->input->post();
        $data2 = array(
            'kode_kategori'     => $data['kode_kategori'],
            'nama_kategori'     => $data['nama_kategori']
            );
        $edit = $this->_model->editKator($data2,$data['id']);
        
       if ($edit!= 0) {
        echo json_encode(array('success' => true));
       }else{
        echo json_encode(array('success' => false));
       }
    }

    public function deleteKator(){
        $id = $this->input->post('id');

        $del = $this->_model->delKator($id);

        echo json_encode(array('success' => true));
    }



    public function saveKom(){
        $data = $this->input->post();
        $komponen = array(
            'kode_komponen'     => $data['kode_komponen'],
            'nama_komponen'     => $data['nama_komponen'],
            'kode_kategori_kmp' => $data['kode_kategori_kmp']
        );

       $add = $this->_model->addKom($komponen);
       if ($add!= 0) {
        echo json_encode(array('success' => true));
       }else{
        echo json_encode(array('success' => false));
       }
    }
    public function updateKom(){
        $data = $this->input->post();
        $data2 = array(
            'kode_komponen'     => $data['kode_komponen'],
            'nama_komponen'     => $data['nama_komponen'],
            'kode_kategori_kmp' => $data['kode_kategori_kmp']
            );
        $edit = $this->_model->editKom($data2,$data['id']);
        
       if ($edit!= 0) {
        echo json_encode(array('success' => true));
       }else{
        echo json_encode(array('success' => false));
       }
    }

    public function deleteKom(){
        $id = $this->input->post('id');

        $del = $this->_model->delKom($id);

        echo json_encode(array('success' => true));

    }


    public function saveClient(){
        $data = $this->input->post();
        $client = array(
            'nama_client'    => $data['nama_client']
        );

       $add = $this->_model->addClient($client);
       if ($add!= 0) {
        echo json_encode(array('success' => true));
       }else{
        echo json_encode(array('success' => false));
       }
    }

    public function updateClient(){
        $data = $this->input->post();
        $data2 = array(
            'nama_client' => $data['nama_client'],
            );
        $edit = $this->_model->editClient($data2,$data['id']);
        
       if ($edit!= 0) {
        echo json_encode(array('success' => true));
       }else{
        echo json_encode(array('success' => false));
       }
    }


    public function deleteClient(){
        $id = $this->input->post('id');

        $del = $this->_model->delClient($id);

        echo json_encode(array('success' => true));

    }









    public function income() {
      $in = $this->_model->_income($this->input->post());

        if ($in) {
        redirect('/finance');
        }
    }
    public function expense() {
      $ex = $this->_model->_expense($this->input->post());
      
        if ($ex) {
            redirect('/finance');
        }
    }      

    public function transfer(){
        $tr = $this->_model->_transfer1($this->input->post());
        if ($tr) {
             $tr2 = $this->_model->_transfer2($this->input->post());
        }
       
            redirect('/finance');

    }

    public function delete($id) {
        if ((int) $id == 0) {
            throw new Exception;
        }

        $this->_model->_delete($id);

        redirect('/finance');
    }

    public function update() {
        $this->_model->_update($this->input->post());
         redirect('/finance');
    }



   
    public function inAkun(){
        $this->_model->addAkun($this->post->post());

    }


    public function akun_detail(){

        $this->layout->set_header('Acount Detail');
        $data = array(
            'talal'     => $this->_model->totalSaldo(),
            'akun'      => $this->_model->detail_akun(),
            );
        $content = $this->load->view('akun_detail',$data,true);

        $this->layout->set_content($content);
        $this->layout->render("index", __CLASS__);
    }
     public function total_Akun($kode_akun){

        $data = $this->_model->totalAkun($kode_akun);

        echo json_encode(array('data' => $data));

    }

    public function dataAkun($kode_akun){
        
        $data = $this->_model->data_akun($kode_akun);

        echo json_encode(array('data' => $data));

    }

   

    /*KATEGORI*/

    public function project_service(){
        $this->layout->set_header('Project and Service');
        $data = array(
            'kator'  => $this->_model->getKator(),
            );
        $content = $this->load->view('project_service',$data,true);

        $this->layout->set_content($content);
        $this->layout->render("index", __CLASS__);
    }
    
    public function kategori($kode_kategori){
        
        $data = $this->_model->Kategori($kode_kategori);
    
        echo json_encode(array('data' => $data));
     

    }

    public function saldoKator($kode_kategori){

        $data = $this->_model->salKator($kode_kategori);

        echo json_encode(array('data' => $data));
    }


// REKAP

      public function rekap(){
        $this->layout->set_header('Rekap');
        $data= array(
            'data' => array(),
            'tgl'  => array()
            );
        $content = $this->load->view('rekap',$data,true);
        $this->layout->set_content($content);
        $this->layout->render("index", __CLASS__);
    }


    public function cariRekap(){
        $arr = explode('-', $this->input->post('tgl'));
        $data = array(
            'start' => $arr[0],
            'end'   => $arr[1]
         );
        $load = $this->_model->cariRek($data);
       if ($load) {
        $this->layout->set_header('Rekap');
        $data= array(
            'data' => $load,
            'tgl'  => $data,
            );
        $content = $this->load->view('rekap',$data,true);
        $this->layout->set_content($content);
        $this->layout->render("index", __CLASS__);
       }else{
        redirect('finance/rekap','refresh');
       }
    }

    public function printRekap(){
        $arr = explode('-', $this->input->post('tgl'));
        $data = array(
            'start' => $arr[0],
            'end'   => $arr[1]
        );
        $load = $this->_model->cariRek($data);
        $this->layout->set_header('Print');
        $data= array(
            'data' => $load,
            'tgl'  => $data,
            );
        $content = $this->load->view('print',$data,true);
        $this->layout->set_content($content);
        $this->layout->render("index", __CLASS__);
    }


}
