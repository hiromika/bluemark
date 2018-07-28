<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_verification');
		
	}

	public function index(){
		xit('No direct script access allowed');
	}

	function send_verification(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}else{
			$send = $this->model_verification->insert_new_code();

			$data = array(
				'result' => $send
			);

			echo json_encode($data);
		}
	}

	function do_verification(){
		if(!$this->input->is_ajax_request()){
			exit('No direct script allowed');
		}else{
			$id_user = $this->session->userdata('idAuth');
			$code = $this->input->post('code');

			$check = $this->model_verification->check_code($code,$id_user);

			$return = array();
			
			if($check){
				$return['result'] = 1;
			}else{
				$return['result'] = 0;
			}

			echo json_encode($return);
		}
	}

}

/* End of file verfification.php */
/* Location: ./application/controllers/verfification.php */
?>