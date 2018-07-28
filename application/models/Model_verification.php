<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_verification extends CI_Model {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		
	}

	function insert_new_code(){
		
		$id_user = $this->session->userdata('idAuth');

		$code = mt_rand(1000,9999);
		$time = date('Y-m-d H:i:s',strtotime(date("Y-m-d H:i:s")." +30 minutes"));

		$now = date('Y-m-d H:i:s');

		$this->db->where('id_user',$id_user);
		$this->db->where("expire >= '$now'");
		$code_status = $this->db->get('tb_verification_code',1)->num_rows();

		if($code_status>0){
			return 'a';
		}else{
			$data = array(
				'id_user'	=> $id_user, 
				'code'		=> $code,
				'expire'	=> $time
			);

			$this->db->insert('tb_verification_code',$data);
			$insert = $this->db->insert_id();

			if($insert>0){
		
		$msg = '

<div bgcolor="#FFFFFF" style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;width:100%!important;height:100%;font-size:14px;color:#404040;margin:0;padding:0">
	<!-- header -->
	<table bgcolor="#fff" style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
	    <tbody><tr style="margin:0;padding:0">
	        <td style="margin:0;padding:0"></td>
	        <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">
	            <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:15px;border-color:#e7e7e7;border-style:solid;border-width:1px 1px 0">
	                <table bgcolor="#fff" style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
	                    <tbody><tr style="margin:0;padding:0">
	                        <td style="margin:0;padding:0">
	                          <img src="http://portal.bmlearning.org/assets/img/bluemark.png" style="max-width:100%;margin:0;padding:0" class="CToWUd">
	                        </td>
	                        
	                    </tr>
	                </tbody></table>
	            </div>
	        </td>
	        <td style="margin:0;padding:0"></td>
	    </tr>
	    </tbody>
	</table>

	<table style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
	    <tbody>
	        <tr style="margin:0;padding:0">
	            <td style="margin:0;padding:0"></td>
	            <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

	                <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:0;border:0 solid #e7e7e7">
	                    <table bgcolor="#fff" style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
	                        <tbody>
	                            <tr style="margin:0;padding:0"><td height="4" bgcolor="#eeb211" style="background-color:#3385ff!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;</td>
	                                <td height="4" bgcolor="#d50f25" style="background-color:#0066ff!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;</td>
	                                <td height="4" bgcolor="#3369E8" style="background-color:#0052cc!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;</td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </td>
	            <td style="margin:0;padding:0"></td>
	        </tr>
	    </tbody>
	</table>
	<!-- end header -->

	<!-- body -->
	<table style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
	        <tbody>
	            <tr style="margin:0;padding:0">
	                <td style="margin:0;padding:0"></td>
	                <td bgcolor="#FFFFFF" style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

	                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:30px 15px;border:1px solid #e7e7e7">
	                        <table style="font-family:Helvetica,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
	                            <tbody>
	                            	<tr>
	                            		<td> Hi &nbsp;
	                            		'.$this->session->userdata('user').'
	                            		<br>
	                            		</td>
	                            	</tr>
	                                <tr>
	                                    <td valign="top" style="font-family:Helvetica;font-size:18px;font-weight:normal;text-align:center;word-break:break-word;color:#202020;line-height:150%;
	                                        min-width: 100%!important;
	                                        background-color: #80b3ff;
	                                        border: 3px solid #0066ff;
	                                        border-collapse: collaps;
	                                    ">
	                                        <span style="font-size:16px"><span style="color:#222222">Kode Verifikasi:</span></span><br>
	                                    <span style="color:#ff0000"><span style="font-size:24px"><strong>'.$code.'</strong></span></span>
	                                    </td>
	                                </tr>
	                                <tr style="margin:0;padding:0">
	                                    <td style="margin:0;padding:0">
	                                        <p style="font-weight:normal;font-size:14px;line-height:1.6;border-top-style:solid;border-top-color:#d0d0d0;border-top-width:3px;margin:40px 0 0;padding:10px 0 0">
	                                            <small style="color:#999;margin:0;padding:0">
	                                            Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.
	                                        </small>
	                                        </p>
	                                    </td>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                </td>
	                <td style="margin:0;padding:0"></td>
	            </tr>
	        </tbody>
	</table>
	<!-- end body -->

	<!-- footer -->
	<table style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;clear:both!important;background-color:transparent;margin:0 0 60px;padding:0" bgcolor="transparent">
	    <tbody><tr style="margin:0;padding:0">
	        <td style="margin:0;padding:0"></td>
	        <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">
	            <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
	                <div style="padding:15px 12px;border-width:2px;border-style:dashed;border-color:#f5dadc;background-color:#fbe3e4">
	                    <p style="font-size:12px;line-height:18px;font-weight:400;padding:0px;margin:0px"><b>Perhatian!</b> Kata sandi, kode verifikasi, dan kode OTP bersifat rahasia. Hati-hati untuk tidak memberikan data penting Anda kepada pihak yang mengatasnamakan BMLearning atau yang tidak dapat dijamin keamanannya.</p>
	                </div>
	            </div>
	        </td>
	        <td style="margin:0;padding:0"></td>
	    </tr>
	   
	    </tbody>
	</table>

	<p>&nbsp;<br></p>
</div>';



				$email =  $this->session->userdata('email');
				$sub   = 'Kode Verifikasi';
				$send = SendMail($email,$sub,$msg);

				if ($send) {
					return 'b';
				}else{
					return 'e';
				}
				return 'b';
			}else{
				return 'c';
			}

		}

	}

	function check_code($code,$id){

		$now = date('Y-m-d H:i:s');

		$this->db->where('id_user',$id);
		$this->db->where('code',$code);
		$this->db->where("expire >= '$now'");
		$this->db->order_by('id','DESC');
		$check = $this->db->get('tb_verification_code',1)->num_rows();

		// echo $this->db->last_query();

		if($check>0){
			$this->db->where('id',$id);
			$this->db->update('tb_user',array('verified'=>1));
			return true;
		}

		return false;
	}

	function check_verify_status($id){
		$this->db->where('id',$id);
		$this->db->select('verified');
		return $this->db->get('tb_user',1)->row_array();
	}
	

}

/* End of file model_verification.php */
/* Location: ./application/models/model_verification.php */

