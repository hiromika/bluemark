<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model','_model');
		
	}

	public function index()
	{
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
			'view'		=>	'home',
			);
			
			$this->load->view('index', $data, FALSE);


	}

	// public function login(){

	// 	$data = $this->input->post();
	// 	$cek = $this->_model->Ceklogin($data);

	// 	if ($cek['level'] == '1'){
	// 		$this->session->set_userdata('user',$cek['username']);
	// 		$this->session->set_userdata('idAuth',$cek['id']);
	// 		$this->session->set_userdata('level',$cek['level']);
	// 		redirect('Admin');

	// 	}elseif($cek) {
	// 		$this->session->set_userdata('user',$cek['username']);
	// 		$this->session->set_userdata('idAuth',$cek['id']);
	// 		$this->session->set_userdata('level',$cek['level']);
	// 		redirect('Member');
	// 	}else {

	// 		$this->session->set_flashdata('alert', 'alert-warning');
 //        	$this->session->set_flashdata('alert-msg', 'Username Atau Password Salah..');

 //        	redirect('Dashboard');        	
	// 	}
	// }

	// public function login2($data){

	// 	$cek = $this->_model->Ceklogin($data);

	// 	$username = $this->input->post('username');
	// 	if($cek) {
	// 		$this->session->set_userdata('user',$cek['username']);
	// 		$this->session->set_userdata('idAuth',$cek['id']);
	// 		$this->session->set_userdata('level',$cek['level']);
	// 		redirect('Member/inPro/'.$cek['id'].'');
	// 	}else {

	// 		$this->session->set_flashdata('alert', 'alert-warning');
 //        	$this->session->set_flashdata('alert-msg', 'Username Atau Password Salah..');
 //        	redirect('Dashboard');        	
	// 	}
	// }

	// public function regis(){
	// $data = $this->input->post();
	// $cek = $this->_model->inUser($data); 
	// 	if($cek) {
	// 		$this->login2($data);
	// 	}else{
	// 		$this->session->set_flashdata('alert2', 'alert-warning');
 //        	$this->session->set_flashdata('alert2-msg', 'Username Tidak Dapat Digunakan..');
 //        	redirect('Dashboard');     
	// 	}

	// }


	public function register()
	{
	
		$data = array(
		'view'	=> 'register',
			);
		$this->load->view('index',$data,false);

	}


	public function logout(){
		$this->_model->destroy();
		redirect();
	}



	public function viewForum($idf){
		$this->_model->inView($idf);
		$data= array(
			'forum'	=>	$this->_model->forumView($idf),
			'idf'	=> 	$idf,
			'komen'	=>	$this->_model->getKomen($idf),
			'view'	=>	'view_forum',
			);
		
		$this->load->view('index', $data, FALSE);
	
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
			'view'		=> 'forum', 
			);
		$this->load->view('index', $data, FALSE);
	}

	public function event(){
		$data = array(
			'event' => $this->_model->getEventall(),
			'view'	=> 'event' 
			);
			
			$this->load->view('index', $data, FALSE);
		
	}


	public function DetailEvent($id){

		$idkel = $this->_model->getEventKelas($id);
		$kelas = array();
		$kuot_k = array();
		$kuot_t = array();
		foreach ($idkel as $key => $value) {
			$kelas[] = array(
					'lis' => $this->_model->getKelas($value['id']),	
				);
			$kuot_k[] = array(
					'kuo_k' => $this->_model->getKuota_kelas($value['id']),
				);
			$kuot_t[] = array(
					'kuo_t' => $this->_model->getKuota_terdaftar($value['id']),
				);
			}

		$ida = $this->session->userdata('idAuth');
		$data = array(
			'event' 	=> $this->_model->getEventDetail($id),
			'kelas'		=> $this->_model->getEventKelas($id), 
			'list'		=> $kelas,
			'id_event'	=> $id,
			'check'		=> $this->_model->checked($id,$ida),
			'view'		=> 'view_event',
			'kuot_k'	=> $kuot_k, 
			'kuot_t'	=> $kuot_t, 
			);
			
			$this->load->view('index', $data, FALSE);
		
	}

	public function about_us(){
		$data = array(
			'view' => 'about', 
			);
		$this->load->view('index', $data, FALSE);
	}


	// DOK 
	// 
	
	public function ebook($id){
		if ($id > 0) {
		$data = array(
			'book'	=> $this->_model->getEbookByIdKat($id),
			'kat'	=> $this->_model->getKategori(),
			'view' 	=> 'dok', 
			);
		$this->load->view('index', $data, FALSE);
		}else{
		$data = array(
			'book'	=> $this->_model->getEbook(),
			'kat'	=> $this->_model->getKategori(),
			'view' 	=> 'dok', 
			);
		$this->load->view('index', $data, FALSE);
		}

	}

	public function ebookView($id){
		$data = array(
			'book'	=> $this->_model->getEbookById($id),
			'kat'	=> $this->_model->getKategori(),
			'view' 	=> 'dok_view', 
			);
		$this->load->view('index', $data, FALSE);
	}
	

}

?>