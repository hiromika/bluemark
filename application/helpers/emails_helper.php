<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function SendMail($email,$sub,$msg){
	$CI =& get_instance();

    $config = Array(
		  'protocol' 	=> 'smtp',
		  'smtp_host' 	=> 'ssl://smtp.googlemail.com',
		  'smtp_port' 	=> 465,
		  'smtp_user' 	=> 'hirro.last@gmail.com', 
		  'smtp_pass' 	=> 'syhzloqibydqzwnh', 
		  'mailtype' 	=> 'html',
		  'charset' 	=> 'iso-8859-1',
		  'wordwrap' 	=> TRUE,
		  'newline'   	=> "\r\n",
		);

		    $CI->load->library('email', $config);
    		$CI->email->initialize($config);
		    $CI->email->from('hirro.last@gmail.com','BMLearning'); 
		    $CI->email->to("$email");
		    $CI->email->subject("$sub");
		    $CI->email->message("$msg");
		      	
		      	if($CI->email->send()){
		      		return TRUE;
		     	}
		     	else{
		     		return false;
		    	}

	}
	

?>