<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify_login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index(){
		redirect(base_url(),'refresh');
	}

	public function verify(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','password','trim|required|xss_clean');

		if(!$this->check_database()){
		echo json_encode(array('result'=>false));
		}else{
		echo json_encode(array('result'=>true));
		}
	}

	function check_database(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//get user data from database
		$result = $this->login_model->login($username,$password);

		//passing data to array
		if($result['id']>0){
		$this->session->set_userdata('user',$result['username']);
		$this->session->set_userdata('idAuth',$result['id']);
		$this->session->set_userdata('level',$result['level']);
		$this->session->set_userdata('email',$result['email']);
		$this->session->set_userdata('verify',$result['verified']);

		return true;
		}else{
		return false;
		}
	}

}

/* End of file verify_login.php */
/* Location: ./application/controllers/verify_login.php */