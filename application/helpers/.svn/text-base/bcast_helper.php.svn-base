<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('bcastEmail')){
	function bcastEmail($module, $emails, $subject, $message){

		$CI =&get_instance();
		$CI->load->library('email');
		$CI->load->model('bcast_model','_m_bcast');
		$auth = 'admin'; // cant retrieve current logged user

		$count_email = count($emails);

		if($module != '' && $count_email >= 1 && $subject != '' && $message != ''){
			foreach ($emails as $address) {
				$rMessage = $message;
				$CI->email->clear();

			    $CI->email->from('system@hari-hari-ardi.com'); //next task, make a core variable for it
				$CI->email->to($address);
			    $CI->email->subject('DoNotReply : '.$subject);
			    $CI->email->message($rMessage);
			    
			    if($CI->email->send()){
			    	$status = 1;
			    	$status_message = 'Sent Successfully';
			    }else{
			    	$status = 0;
			    	$status_message = $CI->email->print_debugger();
			    }

			    echo $CI->email->print_debugger();

			    //$CI->_m_bcast->save($module, $auth, $address, $subject, $message, $status, $status_message);
			}
		}else{
			return array('status'=>'error', 'message'=>'Invalid parameters');
		}

	}
}
