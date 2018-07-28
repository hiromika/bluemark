<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('user')) {
				redirect('dashboard','refresh');
			}else{
			$this->load->model('model_admin','_model');
			}
		}

	public function index(){
		$idf 	= $this->_model->getForumLast();
		$jml 	= array();
		$cekv	= array();
		foreach ($idf as $key => $value) {
			$jml[] = array(
				'jmlrep' 	=> $this->_model->repKomen($value['idf']),
				);
			$cekv[] = array(
				'vForum'	=> $this->_model->getView($value['idf']),
				);
		}
		
		$data = array(
			'forum'		=> 	$this->_model->getForumLast(),
			'replies'	=> 	$jml,
			'viewer'	=>	$cekv,
			'event' 	=> 	$this->_model->getEvents(),
			'jad_today'	=>	$this->_model->getJadTo(),
			'jad_soon'	=>	$this->_model->getJadSo(),
			'view'		=>	'admin/admin',
			);
			
			$this->load->view('index', $data, FALSE);
	

	}

	public function menUser(){
		$data= array(
			'dtuser'	=> $this->_model->getuser(),
			'role'		=> $this->_model->getRole(),
			'view'		=> 'admin/admin_user', 
			);
		$this->load->view('index', $data, FALSE);
		
	}

	public function adduser(){
		$data = array('view' => 'admin/admin_user_add', );
		$this->load->view('index', $data, FALSE);
	}

	public function delUserBatch(){
    	$data = $this->input->post('idt');
    	$del = $this->_model->UserDelBatch($data);
    	echo json_encode($del);
    }

	public function add_user(){
	$data = $this->input->post();
	$cek = $this->_model->inUser($data); 
		if($cek) {
			redirect('admin/menUser','refresh');
		}else{
			$this->session->set_flashdata('alert2', 'alert-warning');
        	$this->session->set_flashdata('alert2-msg', 'Username Tidak Dapat Digunakan..');
        	redirect('admin/addUser','refresh');     
		}

	}


	public function DetailUser($id,$kelas){
		$data= array(
			'user' 		=> $this->_model->getUserDet($id),
			'kelas'		=> $kelas,
			'view'		=> 'admin/admin_user_detail',
			);
		$this->load->view('index', $data, FALSE);
		

	}

	public function user_edit($idu){
		$data= array(
			'user' 		=> $this->_model->getUserDet($idu),
			'role'		=> $this->_model->getRole(),
			'users'		=> $this->_model->getUsers($idu),
			'view'		=> 'admin/admin_user_edit',
			);
		$this->load->view('index', $data, FALSE);
	}

	public function EditUser(){
		$data = $this->input->post();
		$edit = $this->_model->editUser($data);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Successfull..!');
		redirect('admin/menUser','refresh');
	}



	public function Deleteuser($data){
		$this->_model->hapusUser($data);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Data Has Been Delete..!');
		redirect('admin/menUser','refresh');

	}

	public function menEvent(){
		$data= array(
			'event' => $this->_model->getEvent(),
			'view'	=> 'admin/admin_event',
			);
		$this->load->view('index', $data, FALSE);
		

	}

	public function addEvent(){

		$this->load->view('index', array('view'	=> 'admin/admin_event_add',), FALSE);
		

	}

	public function inputEvent(){

		$config['upload_path']          = './assets/image/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 4000;
        $config['max_height']           = 2000;


        $this->upload->initialize($config);
   

       	if (!$this->upload->do_upload("gambar"))
            {
                $error = array('error' => $this->upload->display_errors());

                print_r($error);
                print_r($field_name);
            }
            else
            {	
                $data = $this->input->post();
            	if (empty($data['id'])) {
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
               		$this->_model->insertEvent($data,$file);
               		$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Input Data Success..!');
                	redirect('admin/menEvent','refresh');
            	}else{
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
					$this->_model->editEvent($data,$file);
					$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
					redirect('admin/menEvent','refresh');
            	}
               
            }
	}


	public function changeEvent($data){
		$data = array(
			'event' => $this->_model->eventEdit($data),
			'view'	=> 'admin/admin_event_edit', 
			);
			
		$this->load->view('index', $data, FALSE);
		
	}

	public function DeleteEvent($data){
		$this->_model->hapusEvent($data);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Data Has Been Delete..!');
		redirect('admin/menEvent','refresh');

	}

	public function viewEvent($id){
		$data = array(
		'event'	=> $this->_model->EventView($id),
		'view'	=> 'admin/admin_event_view',
			);
		$this->load->view('index', $data, FALSE);
		
	}


	public function menKelas(){
		$data= array(
			'kelas'		=> $this->_model->getKelas(),
			'event' 	=> $this->_model->getEvent(), 
			'instruc' 	=> $this->_model->getInstruc(),
			'view'		=> 'admin/admin_kelas',
			);
		$this->load->view('index', $data, FALSE);
		

	}

	public function addKelas(){
		$data= array(
			'event' 	=> $this->_model->getEvent(), 
			'instruc' 	=> $this->_model->getInstruc(),
			'view'		=> 'admin/admin_kelas_add',
			);
		$this->load->view('index', $data, FALSE);
		

	}

	public function KelasEdit($id){
		$data= array(
			'event' 	=> $this->_model->getEvent(), 
			'instruc' 	=> $this->_model->getInstruc(),
			'kelas'		=> $this->_model->getKelasDet($id),
			'jadwal'	=> $this->_model->getKelasJadRow($id),
			'view'		=> 'admin/admin_kelas_edit',
			);
		$this->load->view('index', $data, FALSE);
		
	}

	public function insertKelas(){
		$data = $this->input->post();
		$check = $this->_model->inputKelas($data);
		if ($check) {
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Insert Data Success..!');
		redirect('admin/menKelas','refresh');
		}else{
		$this->session->set_flashdata('alert', 'alert-warning');
        $this->session->set_flashdata('alert-msg', 'Insert Kelas Gagal, Jadwal dan Jam Bentrok..!');
		redirect('admin/addKelas','refresh');
		}



	}
	public function EditKelas(){
		$data = $this->input->post();
		$edit = $this->_model->editKelas($data);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Update Data Success..!');
		redirect('admin/menKelas','refresh');
	}

	public function DeleteKelas($id){
		$this->_model->hapusKelas($id);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Data Has Been Delete..!');
		redirect('admin/menKelas','refresh');
	}

	public function DetailKelas($id){
		$data= array(
			'kelas' 	=> 	$this->_model->getKelasDet($id),
			'jadwal' 	=> 	$this->_model->getKelasJad($id),
			'peserta'	=>	$this->_model->getKelasPer($id),
			'user'		=>	$this->_model->getKelas_add_peserta($id),
			'id_kelas'	=>	$id,
			'id_events'	=> 	$this->_model->getId_event($id),
			'view'		=>	'admin/admin_kelas_detail',
			'cekstat'	=>	$this->_model->cek_stat($id),
			);
		$this->load->view('index', $data, FALSE);
		
	}

	public function DetailAbsen($idk,$idj){
		$data= array(
			'user' 		=> $this->_model->getClasIntAbs($idk,$idj),
			'jadwal'	=> $this->_model->getClasIntJad($idj), 
			'idk'		=> $idk,
			'idj'		=> $idj,
			'view'		=> 'admin/admin_kelas_detail_absensi',
			);
		$this->load->view('index', $data, FALSE);
	
	}

	public function print_kelas($idk){
	
		$idu = $this->_model->getClasIntAbs_print($idk);

		$stat = array();

		foreach ($idu as $key => $value) {
			$stat[] = array(
				'stats' => $this->_model-> getStatusSesi($idk,$value['id_user']),
				);
		}

			$data= array(
			'kelas'		=>	$this->_model->getClas_print($idk),
			'user' 		=> 	$this->_model->getClasIntAbs_print($idk),
			'sesi'		=> 	$this->_model->getClasJad_print($idk),
			'stat'		=> 	$stat,
			);
		
		$this->load->view('admin/admin_kelas_laporan', $data, FALSE);
	}


	public function addPeserta(){
		$data 	= $this->input->post();
		
		$check = $this->_model->add_peserta_kelas($data);

		if ($check) {
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Enroll Success..!');
		redirect('admin/DetailKelas/'.$this->input->post('id_kelas').'','refresh');	
		}else{
		$this->session->set_flashdata('alert', 'alert-warning');
        $this->session->set_flashdata('alert-msg', 'Enroll Failure, Class Full..!');
		redirect('admin/DetailKelas/'.$this->input->post('id_kelas').'','refresh');	
		}

	}

	public function delroll($idu,$idk){
		$this->_model->remRoll($idu,$idk);

		$this->session->set_flashdata('alert', 'alert-warning');
        $this->session->set_flashdata('alert-msg', 'Remove Class Success..!');
		redirect('admin/DetailKelas/'.$idk.'','refresh');	
	}



	public function forum(){
		$idf 	= $this->_model->getForum();
		$jml 	= array();
		$cekv	= array();
		foreach ($idf as $key => $value) {
			$jml[] = array(
				'jmlrep' 	=> $this->_model->repKomen($value['idf']),
				);
			$cekv[] = array(
				'vForum'	=> $this->_model->getView($value['idf']),
				);
		}
		

		$data= array(
			'forum'		=> 	$this->_model->getForum(),
			'replies'	=> 	$jml,
			'viewer'	=>	$cekv,
			'view'		=> 'admin/admin_forum', 
			);
		$this->load->view('index', $data, FALSE);
	}

	public function viewForum($idf){
		$this->_model->inView($idf);
		$data= array(
			'forum'	=>	$this->_model->forumView($idf),
			'idf'	=> 	$idf,
			'komen'	=>	$this->_model->getKomen($idf),
			'view'	=>	'admin/admin_forum_view',
			);
		
		$this->load->view('index', $data, FALSE);
	
	}

	public function inForum(){
		$data= array('view' => 'admin/admin_forum_new');
		
		$this->load->view('index', $data, FALSE);
	
	}

	public function addForum(){
		$data = $this->input->post();
        $file_path = './assets/file';
    	$config['upload_path']          = $file_path;
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']				= 0;
        
        $this->upload->initialize($config);

       	if (!$this->upload->do_upload('file'))
            {
            	if (!($data['id'])) {
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
					$this->_model->insertForum($data,$file);
					$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Insert Data Success..!');
					redirect('admin/forum','refresh');
            	}else{
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
               		$this->_model->updateForum($data,$file);
               		$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
					redirect('admin/forum','refresh');
            	}
            }
            else
            {	
            	if (!($data['id'])) {
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
					$this->_model->insertForum($data,$file);
					$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Insert Data Success..!');
					redirect('admin/forum','refresh');
            	}else{
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
               		$this->_model->updateForum($data,$file);
               		$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
					redirect('admin/forum','refresh');
            	}
               
        }
	}

	public function inkomen($idf){
		$data = $this->input->post();
		$this->_model->addKomen($data);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Success..!');
		redirect('admin/viewForum/'.$idf.'','refresh');
	}

	public function editForum($idf){
		$data= array(
			'forum'	=>	$this->_model->forumView($idf),
			'view'	=>	'admin/admin_forum_edit',
			);
		
		$this->load->view('index', $data, FALSE);
	
	}

	public function upKomen($idf){
		$data = $this->input->post();
		$this->_model->updateKomen($data);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Success..!');
		redirect('admin/viewForum/'.$idf.'','refresh');
	}

	public function editKomen($idk,$idf){
		$data= array(
			'komen'	=>	$this->_model->gedEditKomen($idk),
			'idf'	=> 	$idf,
			'view'	=>	'admin/admin_forum_komen_edit',
			);
		
		$this->load->view('index', $data, FALSE);
	
	}

	public function DetailUsers($id){
		$data= array(
			'user' 	=> $this->_model->getUserDet($id),
			'view'	=> 'admin/admin_profile',
			);
		
		$this->load->view('index', $data, FALSE);
	}

	public function upFotoPro(){

		$config['upload_path']          = './assets/image/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 4000;
        $config['max_height']           = 2000;


        $this->upload->initialize($config);
   

       	if (!$this->upload->do_upload("foto"))
            {
                $error = array('error' => $this->upload->display_errors());

                print_r($error);
                print_r($field_name);
            }
            else
            {	
                $data = $this->input->post();
            	
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
               		$this->_model->editFotoPro($data,$file);
               		$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Success..!');
                	redirect('admin/DetailUsers/'.$this->session->userdata('idAuth').'','refresh');

            }
	}

	public function listForum($id){
		$data= array(
			'user' 	=> $this->_model->getUserDet($id),
			'forum'	=> $this->_model->getForumUs($id),
			'view'	=> 'admin/admin_profile_forum',
			);
		
		$this->load->view('index', $data, FALSE);
	
	}

	public function changePass($id){
		$data= array(
			'user' 	=> $this->_model->getUserDet($id),
			'view'	=> 'admin/admin_profile_changePass',
			);
		
		$this->load->view('index', $data, FALSE);
	}

	public function EditUsers($id){
		$data= array(
			'user' 	=> $this->_model->getUserDet($id),
			'view'	=> 'admin/admin_profile_edit',
			);
		
		$this->load->view('index', $data, FALSE);
	

	}

	public function EditUserPro(){
		$data = $this->input->post();
		$this->_model->editPro($data);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Update Data Success..!');
		redirect('admin/DetailUsers/'.$this->session->userdata('idAuth').'','refresh');
	}

	public function Change($id){
		$data = $this->input->post();

		$cek = $this->_model->cekpas($id,$data);
		if ($cek) {
			$this->session->set_flashdata('alert', 'alert-info');
        	$this->session->set_flashdata('alert-msg', 'Change Password Success..!');
			redirect('admin/DetailUsers/'.$id.'','refresh');
		}else{
			$this->session->set_flashdata('alert', 'alert-warning');
        	$this->session->set_flashdata('alert-msg', 'Change Password Failure..!');
			redirect('admin/changePass/'.$id.'','refresh');
		}

	}

	public function DelForum($id){
		$this->_model->HapusForum($id);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Data Has Been Delete..!');
		redirect('admin/forum','refresh');
	}

	public function DelKomen($idk,$idf){
		$this->_model->HapusKomen($idk);
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Data Has Been Delete..!');
		redirect('admin/viewForum/'.$idf.'','refresh');

	}


	public function Inemail($id){
		$data= array(
			'user' 	=> $this->_model->getUserDet($id),
			'view'	=> 'admin/admin_user_email',
			);
		
		$this->load->view('index', $data, FALSE);
	
	}

	public function sendMail(){

	$data = $this->input->post();

	$user = $this->_model->getUserDet($this->input->post('id'));

	$msg = $this->input->post('isi');

    $config = Array(
		  'protocol' 	=> 'smtp',
		  'smtp_host' 	=> 'ssl://smtp.googlemail.com',
		  'smtp_port' 	=> 465,
		  'smtp_user' 	=> 'hirro.last@gmail.com', // change it to yours
		  'smtp_pass' 	=> 'cdhdcxgxycqyqvlu', // change it to yours
		  'mailtype' 	=> 'html',
		  'charset' 	=> 'iso-8859-1',
		  'wordwrap' 	=> TRUE,
		  'newline'   	=> "\r\n",
		);

    		$this->input->post('isi');

		    $this->load->library('email', $config);
    		$this->email->initialize($config);
		    $this->email->from('hirro.last@gmail.com','BMLearning'); // change it to yours
		    $this->email->to($data['too']);
		    $this->email->subject($this->input->post('sub'));
		    $this->email->message("$msg");
		      	
		      	if($this->email->send()){
		      		$this->session->set_flashdata('alert', 'alert-info');
			        $this->session->set_flashdata('alert-msg', 'Send Email Success..!');
					redirect('admin/menUser','refresh');
		     	}
		     	else{
		     		$this->session->set_flashdata('alert', 'alert-warning');
			        $this->session->set_flashdata('alert-msg', 'Send Email Failure..!');
					redirect('admin/menUser','refresh');
		    	}

	}


		

	public function info(){
			$data= array(
				'view'	=> 'admin/admin_info',
				);
			
			$this->load->view('index', $data, FALSE);

	}

	public  function cariInfo(){
			$datas = $this->input->post();
			$data= array(
				'dat'	=> $datas,
				'view'	=> 'admin/admin_info_cari',
				);
			
			$this->load->view('index', $data, FALSE);
	}

	public function getInfo(){
		if($this->input->is_ajax_request()){

			$data = $this->_model->getJmlDaftar();

			echo json_encode($data);
		}else{
			exit('No direct script allowed');
		}
	}

	public function getInfoT(){
		if($this->input->is_ajax_request()){

			$data = $this->_model->getJmlDaftarHadir();

			echo json_encode($data);
		}else{
			exit('No direct script allowed');
		}
	}

	public function getCariInfo(){
		$datas = $this->input->post();
		if($this->input->is_ajax_request()){

			$data = $this->_model->CarigetJmlDaftar($datas);

			echo json_encode($data);
		}else{
			exit('No direct script allowed');
		}
	}

	public function getCariInfoT(){
		$datas = $this->input->post();
		if($this->input->is_ajax_request()){

			$data = $this->_model->CarigetJmlDaftarHadir($datas);

			echo json_encode($data);
		}else{
			exit('No direct script allowed');
		}
	}

	// dokumen
	public function menDok(){
		$data= array(
			'dok'	=> $this->_model->getAllDok(),
			'view'	=> 'admin/admin_dok',
			);

		$this->load->view('index', $data, FALSE);
	}

	public function dokView($id){
		$data= array(
			'dok'	=> $this->_model->getDokById($id),
			'view'	=> 'admin/admin_dok_view',
			);
		$this->load->view('index', $data, FALSE);
	}

	public function menDokAdd(){
		$data= array(
			'jen' => $this->_model->getJen(),
        	'kat' => $this->_model->getKat(),
			'view'	=> 'admin/admin_dok_add',
			);
		
		$this->load->view('index', $data, FALSE);
	}	

	public function addDok(){

		$upload1 = $_FILES['upload1']['name'];
		$upload2 = $_FILES['upload2']['name'];
		$upload3 = $_FILES['upload3']['name'];


        $data = $this->input->post();

	       	$file_path = './assets/kategori/'.$data['dokumen'];
	    	$config['upload_path']          = $file_path;
	        $config['allowed_types']        = 'pdf|doc|docx';
	        $config['max_size']				= 0;
	        
	        $this->upload->initialize($config);
			$this->load->library('upload', $config);
			$this->upload->do_upload('upload');
			$upload_data = $this->upload->data();
	        $file = array(
        	'name' => $upload_data['file_name'],
        	'size' => $upload_data['file_size'],
        	'path' => $config['upload_path']."/", 
        	);

 
       		if (!$this->upload->do_upload('upload'))
            {
  	 			$error = array('error' => $this->upload->display_errors());
     
            	$this->session->set_flashdata('alert', 'alert-dangger');
				$this->session->set_flashdata('alert-msg', '$error');
				redirect('admin/menDokAdd','refresh');
            }
            else
            {	
	            if (empty($data['id'])) {

			        if($upload1 !== ""){

				        $config['file_name']='upload1';          
				        $config['upload_path'] = './assets/image/';                        
				        $config['allowed_types'] = 'jpg|png|jpeg|gif';
				        $config['max_size'] = '0'; 
				        $config['overwrite'] = false;
				        $this->upload->initialize($config);
				        $this->load->library('upload', $config);
				        $this->upload->do_upload('upload1');
				        $upload_data = $this->upload->data();
				        $file_name1  = array(
				        	'name'	=> $upload_data['file_name'],
				        	'path' 	=> $config['upload_path']."/", 
				        	); 
				        if (!$this->upload->do_upload('upload1'))
			            {
			                $error = array('error' => $this->upload->display_errors());
			     
		                	$this->session->set_flashdata('alert', 'alert-dangger');
							$this->session->set_flashdata('alert-msg', '$error');
							redirect('admin/menDokAdd','refresh');
			            }

				    }else{
				    	$file_name1 = "/image";
				    }
				    if($upload2 !== ""){

				        $config['file_name']='upload2';
				        $config['upload_path'] = './assets/image/';             
				        $config['allowed_types'] = 'jpg|png|jpeg|gif';
				        $config['max_size'] = '0';           
				        $config['overwrite'] = false;
				        $this->upload->initialize($config);
				        $this->load->library('upload', $config);
				        $this->upload->do_upload('upload2');
				        $upload_data = $this->upload->data();
				        $file_name2 = array(
				        	'name'	=> $upload_data['file_name'],
				        	'path' 	=> $config['upload_path']."/", 
				        	); 
				        if (!$this->upload->do_upload('upload2'))
			            {
			                $error = array('error' => $this->upload->display_errors());
			     
		                	$this->session->set_flashdata('alert', 'alert-dangger');
							$this->session->set_flashdata('alert-msg', '$error');
							redirect('admin/menDokAdd','refresh');
			            }

				    }else{
				    	$file_name2 = "/image";
				    }

				    if($upload3 !== ""){

				        $config['file_name']='upload3';
				        $config['upload_path'] ='./assets/image/';
				        $config['allowed_types'] ='jpg|png|jpeg|gif';
				        $config['max_size'] = '0';
				        $config['overwrite'] = false;
				        $this->upload->initialize($config);
				        $this->load->library('upload',$config);
				        $this->upload->do_upload('upload3');
				        $upload_data = $this->upload->data();
				        $file_name3 = array(
				        	'name'	=> $upload_data['file_name'],
				        	'path' 	=> $config['upload_path']."/", 
				        	); 
				        if (!$this->upload->do_upload('upload3'))
			            {
			                $error = array('error' => $this->upload->display_errors());
			     
		                	$this->session->set_flashdata('alert', 'alert-dangger');
							$this->session->set_flashdata('alert-msg', '$error');
							redirect('admin/menDokAdd','refresh');
			            }

				    }else{
				    	$file_name3 = "/image";
				    }

            		
               		$add = $this->_model->inDok($data,$file,$file_name1,$file_name2,$file_name3);
					if ($add) {
				
                	$this->session->set_flashdata('alert', 'alert-success');
					$this->session->set_flashdata('alert-msg', 'Success..!');
					redirect('admin/menDokAdd','refresh');
					}
            	}
               
            }
    }


    public function dokEditText(){
    	$data = $this->input->post();
		
		$cek = $this->_model->editDok($data);

		if ($cek) {
		$this->session->set_flashdata('alert', 'alert-success');
		$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
			redirect('admin/dokEdit/'.$data['id'].'','refresh');
		}
    }

    public function dokEditImg(){

		$upload1 = $_FILES['upload1']['name'];
		$upload2 = $_FILES['upload2']['name'];
		$upload3 = $_FILES['upload3']['name'];


        $data = $this->input->post();

	       	$file_path = './assets/kategori/'.$data['dokumen'];
	    	$config['upload_path']          = $file_path;
	        $config['allowed_types']        = 'pdf|doc|docx';
	        $config['max_size']				= 0;
	        
	        $this->upload->initialize($config);
			$this->load->library('upload', $config);
			$this->upload->do_upload('upload');
			$upload_data = $this->upload->data();
	        $file = array(
        	'name' => $upload_data['file_name'],
        	'size' => $upload_data['file_size'],
        	'path' => $config['upload_path']."/", 
        	);

 
       		if (!$this->upload->do_upload('upload'))
            {
  	 			$error = array('error' => $this->upload->display_errors());
     
            	$this->session->set_flashdata('alert', 'alert-dangger');
				$this->session->set_flashdata('alert-msg', '$error');
				redirect('admin/dokEdit/'.$data['id'].'','refresh');
            }
            else
            {	
	            if ($data['id']) {

			        if($upload1 !== ""){

				        $config['file_name']='upload1';          
				        $config['upload_path'] = './assets/image/';                        
				        $config['allowed_types'] = 'jpg|png|jpeg|gif';
				        $config['max_size'] = '0'; 
				        $config['overwrite'] = false;
				        $this->upload->initialize($config);
				        $this->load->library('upload', $config);
				        $this->upload->do_upload('upload1');
				        $upload_data = $this->upload->data();
				        $file_name1  = array(
				        	'name'	=> $upload_data['file_name'],
				        	'path' 	=> $config['upload_path']."/", 
				        	); 
				        if (!$this->upload->do_upload('upload1'))
			            {
			                $error = array('error' => $this->upload->display_errors());
			     
		                	$this->session->set_flashdata('alert', 'alert-dangger');
							$this->session->set_flashdata('alert-msg', '$error');
							redirect('admin/dokEdit/'.$data['id'].'','refresh');
			            }

				    }else{
				    	$file_name1 = "/image";
				    }
				    if($upload2 !== ""){

				        $config['file_name']='upload2';
				        $config['upload_path'] = './assets/image/';             
				        $config['allowed_types'] = 'jpg|png|jpeg|gif';
				        $config['max_size'] = '0';           
				        $config['overwrite'] = false;
				        $this->upload->initialize($config);
				        $this->load->library('upload', $config);
				        $this->upload->do_upload('upload2');
				        $upload_data = $this->upload->data();
				        $file_name2 = array(
				        	'name'	=> $upload_data['file_name'],
				        	'path' 	=> $config['upload_path']."/", 
				        	); 
				        if (!$this->upload->do_upload('upload2'))
			            {
			                $error = array('error' => $this->upload->display_errors());
			     
		                	$this->session->set_flashdata('alert', 'alert-dangger');
							$this->session->set_flashdata('alert-msg', '$error');
							redirect('admin/dokEdit/'.$data['id'].'','refresh');
			            }

				    }else{
				    	$file_name2 = "/image";
				    }

				    if($upload3 !== ""){

				        $config['file_name']='upload3';
				        $config['upload_path'] ='./assets/image/';
				        $config['allowed_types'] ='jpg|png|jpeg|gif';
				        $config['max_size'] = '0';
				        $config['overwrite'] = false;
				        $this->upload->initialize($config);
				        $this->load->library('upload',$config);
				        $this->upload->do_upload('upload3');
				        $upload_data = $this->upload->data();
				        $file_name3 = array(
				        	'name'	=> $upload_data['file_name'],
				        	'path' 	=> $config['upload_path']."/", 
				        	); 
				        if (!$this->upload->do_upload('upload3'))
			            {
			                $error = array('error' => $this->upload->display_errors());
			     
		                	$this->session->set_flashdata('alert', 'alert-dangger');
							$this->session->set_flashdata('alert-msg', '$error');
							redirect('admin/dokEdit/'.$data['id'].'','refresh');
			            }

				    }else{
				    	$file_name3 = "/image";
				    }

            		
               		$add = $this->_model->editDokImg($data,$file,$file_name1,$file_name2,$file_name3);
					if ($add) {
                	$this->session->set_flashdata('alert', 'alert-success');
					$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
					redirect('admin/dokEdit/'.$data['id'].'','refresh');
					}
            	}
               
            }
    }


	public function viewDok($idj){
        $data = array(
            'katAll'    => 	$this->_model->getAllKat(),
            'totAllDok' => 	$this->_model->getTotAllDok(),
            'Dok'    	=> 	$this->_model->getDok($idj),
            'view'		=>	'admin/admin_dok_view',
        );
        $this->load->view('index', $data, FALSE);
   
    }

    public function DelDok($id){
        $this->_model->hpsDok($id);
        $this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Data Has Been Delete..!');
		redirect('admin/menDok','refresh');
    }


	public function menJenis(){
		$data= array(
			'jenis'	=> $this->_model->getJen(),
			'view'	=> 'admin/admin_dok_jenis',
			);
		
		$this->load->view('index', $data, FALSE);
		
	}

	public function menKategori(){
		$data= array(
			'kat'	=>	$this->_model->getKat(),
			'view'	=> 'admin/admin_dok_kategori',
			);
		
		$this->load->view('index', $data, FALSE);
		
	}

	public function addJen(){
        $data = $this->input->post();
        $this->_model->inJen($data);
        $this->session->set_flashdata('alert', 'alert-success');
		$this->session->set_flashdata('alert-msg', 'Success..!');
		redirect('admin/menJenis','refresh');
     
    }

    public function addKat(){
        $data = $this->input->post();
        $this->_model->inKat($data);
        $this->session->set_flashdata('alert', 'alert-success');
		$this->session->set_flashdata('alert-msg', 'Success..!');
		redirect('admin/menKategori','refresh');
 
    }


    public function delJen($id){
        $this->_model->hpsJen($id);
        $this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Data Has Been Delete..!');
		redirect('admin/menJenis','refresh');
       
    }

    public function delKat($id){
        $this->_model->hpsKat($id);
        $this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Data Has Been Delete..!');
		redirect('admin/menKategori','refresh');
    }


    public function dokEdit($id){
    	$data= array(
    		'jen' 	=> $this->_model->getJen(),
        	'kat' 	=> $this->_model->getKat(),
			'dok'	=> $this->_model->getDokById($id),
			'view'	=> 'admin/admin_dok_edit',
			);
		$this->load->view('index', $data, FALSE);
    }

   	public function transaksi(){
    	$data= array(
    		'list'	=> $this->_model->getTrans(),
			'view'	=> 'admin/admin_transaksi',
			);
		$this->load->view('index', $data, FALSE);
    }


    public function editTrans(){
  		$data = $this->input->post();
  		$user = $this->_model->getUserTrans($data);
    	$cek  = $this->_model->TransEdit($data);

    	if ($cek['result']){
    		
            //   $msg = '

            //         <div bgcolor="#FFFFFF" style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;width:100%!important;height:100%;font-size:14px;color:#404040;margin:0;padding:0">
            //           <!-- header -->
            //           <table bgcolor="#fff" style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
            //               <tbody><tr style="margin:0;padding:0">
            //                   <td style="margin:0;padding:0"></td>
            //                   <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">
            //                       <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:15px;border-color:#e7e7e7;border-style:solid;border-width:1px 1px 0">
            //                           <table bgcolor="#fff" style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
            //                               <tbody><tr style="margin:0;padding:0">
            //                                   <td style="margin:0;padding:0">
            //                                     <img src="http://portal.bmlearning.org/assets/img/bluemark.png" style="max-width:100%;margin:0;padding:0" class="CToWUd">
            //                                   </td>
                                              
            //                               </tr>
            //                           </tbody></table>
            //                       </div>
            //                   </td>
            //                   <td style="margin:0;padding:0"></td>
            //               </tr>
            //               </tbody>
            //           </table>

            //           <table style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
            //               <tbody>
            //                   <tr style="margin:0;padding:0">
            //                       <td style="margin:0;padding:0"></td>
            //                       <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

            //                           <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:0;border:0 solid #e7e7e7">
            //                               <table bgcolor="#fff" style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
            //                                   <tbody>
            //                                       <tr style="margin:0;padding:0"><td height="4" bgcolor="#eeb211" style="background-color:#3385ff!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;</td>
            //                                           <td height="4" bgcolor="#d50f25" style="background-color:#0066ff!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;</td>
            //                                           <td height="4" bgcolor="#3369E8" style="background-color:#0052cc!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;</td>
            //                                       </tr>
            //                                   </tbody>
            //                               </table>
            //                           </div>
            //                       </td>
            //                       <td style="margin:0;padding:0"></td>
            //                   </tr>
            //               </tbody>
            //           </table>
            //           <!-- end header -->

            //           <!-- body -->
            //           <table style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
            //                   <tbody>
            //                       <tr style="margin:0;padding:0">
            //                           <td style="margin:0;padding:0"></td>
            //                           <td bgcolor="#FFFFFF" style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

            //                               <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:30px 15px;border:1px solid #e7e7e7">
            //                                   <table style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
            //                                       <tbody>
            //                                         <tr>
            //                                           <td> 
            //                                           <br>
            //                                           </td>
            //                                         </tr>
            //                                           <tr>
            //                                               <td valign="top" style="font-family:Helvetica;font-size:18px;font-weight:normal;text-align:center;word-break:break-word;color:#fff;line-height:150%;
            //                                                   min-width: 100%!important;
            //                                                   background-color: #80b3ff;
            //                                                   border: 3px solid #0066ff;
            //                                                   border-collapse: collaps;
            //                                               ">
            //                                               	Hi&nbsp;
            //                                           		'.$user['username'].' <br>
            //                                                   Proses Pembayaran Anda Telah Berhasil, Silahkan Login kembali untuk mendownload E-book yang telah anda beli. Sebelum tanggal <b> '.date('d - M - Y H:i:s a',strtotime($cek['exp'])).'</b> <br>
            //                                                   Terimakasih.
            //                                               </td>
            //                                           </tr>
            //                                           <tr style="margin:0;padding:0">
            //                                               <td style="margin:0;padding:0">
            //                                                   <p style="font-weight:normal;font-size:14px;line-height:1.6;border-top-style:solid;border-top-color:#d0d0d0;border-top-width:3px;margin:40px 0 0;padding:10px 0 0">
            //                                                       <small style="color:#999;margin:0;padding:0">
            //                                                       Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.
            //                                                   </small>
            //                                                   </p>
            //                                               </td>
            //                                           </tr>
            //                                       </tbody>
            //                                   </table>
            //                               </div>
            //                           </td>
            //                           <td style="margin:0;padding:0"></td>
            //                       </tr>
            //                   </tbody>
            //           </table>
            //           <!-- end body -->

            //           <!-- footer -->
            //           <table style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;clear:both!important;background-color:transparent;margin:0 0 60px;padding:0" bgcolor="transparent">
            //               <tbody><tr style="margin:0;padding:0">
            //                   <td style="margin:0;padding:0"></td>
            //                   <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">
            //                       <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
            //                           <div style="padding:15px 12px;border-width:2px;border-style:dashed;border-color:#f5dadc;background-color:#fbe3e4">
            //                               <p style="font-size:12px;line-height:18px;font-weight:400;padding:0px;margin:0px"><b>Perhatian!</b> Kata sandi, kode verifikasi, dan kode OTP bersifat rahasia. Hati-hati untuk tidak memberikan data penting Anda kepada pihak yang mengatasnamakan BMLearning atau yang tidak dapat dijamin keamanannya.</p>
            //                           </div>
            //                       </div>
            //                   </td>
            //                   <td style="margin:0;padding:0"></td>
            //               </tr>
                         
            //               </tbody>
            //           </table>

            //           <p>&nbsp;<br></p>
            //         </div>';


            // $email  = $user['email'];
            // $sub    = 'Verifikasi Pembayaran';
            // $send   = SendMail($email,$sub,$msg);

    	$this->session->set_flashdata('alert', 'alert-success');
        $this->session->set_flashdata('alert-msg', 'Update Data Success..');
		redirect('admin/transaksi','refresh');

    	}else{

    	$this->session->set_flashdata('alert', 'alert-success');
        $this->session->set_flashdata('alert-msg', 'Update Data Success..');
		redirect('admin/transaksi','refresh');

    	}

    }

    public function deltrans($id){

    	$this->_model->TransDel($id);


    	$this->session->set_flashdata('alert', 'alert-success');
        $this->session->set_flashdata('alert-msg', 'Delete Data Success..');
		redirect('admin/transaksi','refresh');


    }

    public function delTransBatch(){
    	$data = $this->input->post('idt');
    	$del = $this->_model->TransDelBatch($data);
    	echo json_encode($del);
    }

    public function TransDetail($id){

    	$data = array(
    		'list' => $this->_model->TransDetailById($id),
    		'view' => 'admin/admin_transaksi_detail', 
    		);
    	$this->load->view('index', $data, FALSE);

    }

    public function sendMsg(){
		$data = $this->input->post();
		$send = $this->_model->send_msg($data);

		      	if($send){
		      		$this->session->set_flashdata('alert', 'alert-info');
			        $this->session->set_flashdata('alert-msg', 'Send Message Success..!');
					redirect('admin/message','refresh');
		     	}
		     	else{
		     		$this->session->set_flashdata('alert', 'alert-warning');
			        $this->session->set_flashdata('alert-msg', 'Send Message Failure..!');
					redirect('admin/message','refresh');
		    	}
	}

    public function message(){
    	$data = array(
    		'notif'	=> $this->_model->get_notif(),
    		'in' 	=> $this->_model->get_msg_in(),
    		'out' 	=> $this->_model->get_msg_out(),
    		'view' 	=> 'admin/admin_message', 
    		);
    	$this->load->view('index', $data, FALSE);
    }

    public function msg_view($id){
    	$up = $this->_model->up_msg_status($id);
    	$data = array(
    		'notif'	=> $this->_model->get_notif(),
    		'user' 	=> $this->_model->get_msg_ById($id),
    		'msg' 	=> $this->_model->get_msg_rep($id),
    		'view' 	=> 'admin/admin_message_view', 
    		'idm'	=> $id,
    		);
    	$this->load->view('index', $data, FALSE);
    }

    public function search_user(){
	    $this->db->like('nama', $this->input->get("q"));
	    $this->db->select('id_user as id,nama as text');
	    $this->db->from('detail_user');
	    $res = $this->db->get()->result_array();
	    echo json_encode($res);
    }

    public function send_msg_rep(){
    	$data  = $this->input->post();


    	$send = $this->_model->send_msg_rep($data);

    	if($send){
      		$this->session->set_flashdata('alert', 'alert-info');
	        $this->session->set_flashdata('alert-msg', 'Send Message Success..!');
			redirect('admin/msg_view/'.$data['idm'].'','refresh');
     	}
     	else{
     		$this->session->set_flashdata('alert', 'alert-warning');
	        $this->session->set_flashdata('alert-msg', 'Send Message Failure..!');
			redirect('admin/msg_view/'.$data['idm'].'','refresh');
    	}

    }


    //ebook

	public function ebook($id){
		if ($id > 0) {
		$data = array(
			'book'	=> $this->_model->getEbookByIdKat($id),
			'kat'	=> $this->_model->getKategori(),
			'view' 	=> 'admin/admin_add_trans', 
			);
		$this->load->view('index', $data, FALSE);
		}else{
		$data = array(
			'book'	=> $this->_model->getEbook(),
			'kat'	=> $this->_model->getKategori(),
			'view' 	=> 'admin/admin_add_trans', 
			);
		$this->load->view('index', $data, FALSE);
		}
	}

	public function ebookView($id){
		$idu = $this->session->userdata('idAuth');
		$data = array(
			'book'	=> $this->_model->getEbookById($id),
			'kat'	=> $this->_model->getKategori(),
			// 'cek'	=> $this->_model->checkTran($id),
			'user'	=> $this->_model->getUserDet($idu),	
			'view' 	=> 'admin/admin_add_view', 
			);
		$this->load->view('index', $data, FALSE);
	}

}?>