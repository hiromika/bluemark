<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', '_model');
	}

	public function index()
	{
		$data = array();
		$this->load->view('login', $data, FALSE);
	}

	public function logout(){
	    $this->_model->destroy();
	    redirect();
  	}

  	public function register(){
  		$data = $this->input->post();
  		$username = $this->input->post('username');
		$password = $this->input->post('password');

  		$in = $this->_model->regis($data);
  		if ($in) {
  			$result = $this->_model->login($username,$password);
  			if($result['id']>0){

		    $this->session->set_userdata('user',$result['username']);
			$this->session->set_userdata('idAuth',$result['id']);
			$this->session->set_userdata('level',$result['level']);
			$this->session->set_userdata('email',$result['email']);
			$this->session->set_userdata('verify',$result['verified']);

	  		redirect('home/dashboard','refresh');
			
		    }

  		}

  		print_r($in);
  	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
?>