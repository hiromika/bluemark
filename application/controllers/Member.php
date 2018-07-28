<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if 	(!$this->session->userdata('idAuth')) {
			redirect('dashboard','refresh');
			}else{
			$this->load->model('model_member','_model');
			}
		
	}

	public function index(){
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
		$data = array(
			'event' 	=> $this->_model->getEvent(), 
			'jad_today' => $this->_model->getJadTo(), 
			'jad_soon'	=> $this->_model->getJadSo(),
			'forum'		=> $this->_model->getForumLast(),
			'replies'	=> 	$jml,
			'viewer'	=>	$cekv,
			'view'		=> 'member/member'
			);
	
			$this->load->view('index', $data, FALSE);
		
	}

	public function event(){
			$data = array(
			'event' 	=> $this->_model->getEventall(), 
			'view'		=> 'member/member_event'
			);
	
			$this->load->view('index', $data, FALSE);
			
	}

	public function DetailEvent($id){

			$idk = $this->_model->getEventKelas($id);

			$list  	= array();
			$kuot_t = array();
			$kuot_k	= array();

			foreach ($idk as $key => $value) {
				$list[] =  array(
					'lis' => $this->_model->getKelas($value['id']), 
					);
				$kuot_k[] =  array(
					'kuo_k' => $this->_model->getkuota_kelas($value['id']), 
					);
				$kuot_t[]  = array(
					'kuo_t' => $this->_model->getKuota_terdaftar($value['id']), 
					); 
			}


			$data = array(
				'event'		=> $this->_model->getEventDetail($id),
				'kelas'		=> $this->_model->getEventKelas($id),
				'list'		=> $list,
				'kuot_t'	=> $kuot_t,
				'kuot_k'	=> $kuot_k,
				'id_event'	=> $id,
				'check'		=> $this->_model->checked($id,$this->session->userdata('idAuth')),
				'checkin'	=> $this->_model->checked_inst($id,$this->session->userdata('idAuth')),
				'checkm'	=> $this->_model->checkMasa($id),
				'view' 		=> 'member/member_event_view', 

			);

			$this->load->view('index', $data, FALSE);


	}

	public function enroll(){
		$data = $this->input->post();

		$enroll = $this->_model->enrol($data);

		if ($enroll) {
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Enroll Success..!');
		redirect('member/DetailEvent/'.$data['id_event'].'','refresh');
		}else{
		$this->session->set_flashdata('alert', 'alert-warning');
        $this->session->set_flashdata('alert-msg', 'Enroll failure..!');
		redirect('member/DetailEvent/'.$data['id_event'].'','refresh');
		}
	}

	public function kelas($idu){

		$idk = $this->_model->clas($idu);

		$idkel  = array();
		$keljad = array();

		foreach ($idk as $key => $value) {
			$idkel[]  = array(
				'id_kel' => $this->_model->getClas($value['id_kelas']) , 
				);
			$keljad[] = array(
				'jadwal' => $this->_model->getClasJad($value['id_kelas']), 
				);
		}


		$data = array(
			'idk' 	=> $idk,
			'idkel'	=> $idkel,
			'keljad'=> $keljad,
			'view' 	=> 'member/member_class', 
			);
		$this->load->view('index', $data, FALSE);
	}

	public function delroll($idu,$idk){
		$dell = $this->_model->remRoll($idu,$idk);
		if ($dell) {
		$this->session->set_flashdata('alert', 'alert-info');
        $this->session->set_flashdata('alert-msg', 'Enroll Success..!');
		redirect('member/kelas/'.$idu.'','refresh');
		}
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

		$data = array(
			'forum'	=> $this->_model->getForum(),
			'view' 	=> 'member/member_forum',
			'replies'	=> 	$jml,
			'viewer'	=>	$cekv, 
			);
		$this->load->view('index', $data, FALSE);

	}

	public function viewForum($idf){

		$data = array(
			'forum'	=> $this->_model->forumView($idf),
			'komen'	=> $this->_model->getKomen($idf),
			'idf'	=> $idf,
			'view' 	=> 'member/member_forum_view',
			);
		$this->load->view('index', $data, FALSE);

	}

	public function inForum(){

		$data = array(
			'view' => 'member/member_forum_new', 
			);
		$this->load->view('index', $data, FALSE);

	}

	public function inkomen(){
		$data = $this->input->post();
		$kom = $this->_model->addKomen($data);

		if ($kom) {
			$this->session->set_flashdata('alert', 'alert-info');
        	$this->session->set_flashdata('alert-msg', 'Reply Success..!');
			redirect('member/viewForum/'.$data['id_forum'].'','refresh');
		}

	}

	public function editForum($idf){
		$data = array(
			'forum'	=> $this->_model->forumView($idf),
			'idf'	=> $idf,
			'view' 	=> 'member/member_forum_edit',
			);
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
					redirect('member/forum','refresh');
            	}else{
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
               		$this->_model->updateForum($data,$file);
               		$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
					redirect('member/forum','refresh');
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
					redirect('member/forum','refresh');
            	}else{
            		$file = array(
                	'name' => $this->upload->data('file_name'),
                	'path' => $config['upload_path']."/", 
                	);
               		$this->_model->updateForum($data,$file);
               		$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
					redirect('member/forum','refresh');
            	}
               
        }
	}

	public function editKomen($idk,$idf){
		$data = array(
			'komen'	=> $this->_model->gedEditKomen($idk),
			'idf'	=> $idf,
			'view' 	=> 'member/member_forum_komen_edit', 
			);
		$this->load->view('index', $data, FALSE);
	}

	public function upKomen($idf){
		$data = $this->input->post();

		$up = $this->_model->updateKomen($data);
		if ($up) {
			$this->session->set_flashdata('alert', 'alert-info');
        	$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
			redirect('member/viewForum/'.$idf.'','refresh');
		}
	}

	public function instructur($idu){

		$idk = $this->_model->getClasInt($idu);
		$jadwal = array();
		foreach ($idk as $key => $value) {
			$jadwal[]  = array(
				'jadwal' => $this->_model->getClasJad($value['id']) , 
				);
		}

		$data = array(
			'keljad'=> $jadwal,
			'idk'	=> $idk,
			'view' 	=> 'member/member_instructur' , 
			);
		$this->load->view('index', $data, FALSE);
	}

	public function viewForums($idk){
		$idf = $this->_model->getForums($idk);
		$data = array(
			'forum'	=> $this->_model->forumView($idf['id']),
			'komen'	=> $this->_model->getKomen($idf['id']),
			'idf'	=> $idf['id'],
			'view' 	=> 'member/member_forum_view',
			);
		$this->load->view('index', $data, FALSE);
	}

	public function print_absensi($idk){

		$data = array(
			'kelas'	=> $this->_model->getClas_print($idk),
			'sesi'	=> $this->_model->getClasJad_print($idk),
			'user'	=> $this->_model->getClasIntAbs_print($idk),
			'view' 	=> 'member/member_instructur_print_absensi',
			);
		$this->load->view('index', $data, FALSE);
	}

	public function instAbsen($idk,$idj){
			$data = array(
			'idj'	=> $idj,
			'idk'	=> $idk,
			'jadwal'=> $this->_model->getClasIntJad($idj),
			'user'	=> $this->_model->getClasIntAbs($idk,$idj),
			'view' 	=> 'member/member_instructur_absensi',
			);
		$this->load->view('index', $data, FALSE);
	}


	public function inAbsen($idk,$idj){
		$data = $this->input->post();

		$in = $this->_model->upAbsen($data['id_user'],$data['absen'],$data['id_jadwal'],$idj);

		if ($in) {
			$this->session->set_flashdata('alert', 'alert-info');
        	$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
			redirect('member/instAbsen/'.$idk.'/'.$idj.'','refresh');
		}

	}

	public function DetailUser($idu){

		$data = array(
			'user'	=> $this->_model->getUserDet($idu),	
			'view' 	=> 'member/member_profile', 
			);
			$this->load->view('index', $data, FALSE);		

	}

	public function EditUser($idu){

		$data = array(
			'user'	=> $this->_model->getUserDet($idu),	
			'view' 	=> 'member/member_profile_edit', 
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
                	redirect('member/DetailUsers/'.$this->session->userdata('idAuth').'','refresh');

            }
	}


	public function EditUserPro(){
		$data = $this->input->post();

		$up = $this->_model->editPro($data);

		if ($up) {
			$this->session->set_flashdata('alert', 'alert-info');
        	$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
			redirect('member/DetailUser/'.$this->session->userdata('idAuth').'','refresh');
		}
	}

	public function listforum($idu){
		$idf 	= $this->_model->getForumUs($idu);
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
			'forum'		=> $this->_model->getForumUs($idu),
			'user'		=> $this->_model->getUserDet($idu),
			'replies'	=> 	$jml,
			'viewer'	=>	$cekv,
			'view' 		=> 'member/member_profile_forum', 
			);

		$this->load->view('index', $data, FALSE);
	}

	public function changePass($idu){
		$data = array(
			'user'	=> $this->_model->getUserDet($idu),
			'view' 	=> 'member/member_profile_changePass', 
			);
		$this->load->view('index', $data, FALSE);
	}

	public function change($idu){
		$data = $this->input->post();

		$up = $this->_model->cekpas($idu,$data);
		if ($up) {
			$this->session->set_flashdata('alert', 'alert-info');
        	$this->session->set_flashdata('alert-msg', 'Update Data Success..!');
			redirect('member/changePass/'.$this->session->userdata('idAuth').'','refresh');
		}else{
			$this->session->set_flashdata('alert', 'alert-danger');
        	$this->session->set_flashdata('alert-msg', 'Update Data Failure..!');
			redirect('member/changePass/'.$this->session->userdata('idAuth').'','refresh');
		}
	}

	// ebook
	

	public function ebook($id){
		if ($id > 0) {
		$data = array(
			'book'	=> $this->_model->getEbookByIdKat($id),
			'kat'	=> $this->_model->getKategori(),
			'view' 	=> 'member/member_dok', 
			);
		$this->load->view('index', $data, FALSE);
		}else{
		$data = array(
			'book'	=> $this->_model->getEbook(),
			'kat'	=> $this->_model->getKategori(),
			'view' 	=> 'member/member_dok', 
			);
		$this->load->view('index', $data, FALSE);
		}

	}

	public function ebookView($id){
		$idu = $this->session->userdata('idAuth');
		$data = array(
			'book'	=> $this->_model->getEbookById($id),
			'kat'	=> $this->_model->getKategori(),
			'cek'	=> $this->_model->checkTran($id),
			'user'	=> $this->_model->getUserDet($idu),	
			'view' 	=> 'member/member_dok_view', 
			);
		$this->load->view('index', $data, FALSE);
	}

	public function buy(){

		$data 	= $this->input->post();
		$idu 	= $this->session->userdata('idAuth');
		$user	= $this->_model->getUserDet($idu);
		$buy 	= $this->_model->doBuy($data);
		$produk = $this->_model->getEbookById($data['iddok']);
		if ($buy['result'] == true){


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
                                                      <td> 
                                                      <br>
                                                      </td>
                                                    </tr>
                                                      <tr>
                                                          <td valign="top" style="font-family:Helvetica;font-size:18px;font-weight:normal;text-align:center;word-break:break-word;color:#fff;line-height:150%;
                                                              min-width: 100%!important;
                                                              background-color: #80b3ff;
                                                              border: 3px solid #0066ff;
                                                              border-collapse: collaps;
                                                              padding:10px;
                                                          ">
                                                          	Hi&nbsp;
                                                      		'.$user['nama'].' <br>
                                                             Terimakasih telah melakukan pembelian di BMLearning. <br>
                                                             <table style="text-align : left;" >
                                                             	<tr>
                                                             	<th>Id Transaksi 	:</th>
                                                             	<td>'.$buy['id_tran'].'</td>
                                                             	</tr>
                                                             	<tr>
                                                             		<th>Nama Produk 	:</th>
                                                             		<td>'.$produk['judul_dok'].'</td>
                                                             	</tr>
                                                             	<tr>
                                                             		<th>Total Harga 	:</th>
                                                             		<td>Rp.'.number_format($buy['harga'],0,',','.').'</td>
                                                             	</tr>
                                                             </table>
                                                               
                                                          	
                                                             Harap segera menyelesaikan transaksi pemberian ke nomor rekening yang telah tersedia sebelum tanggal <b>'.date('d-m-Y H:i:s',strtotime($buy['exp'])).'</b>. <br> <strong> Nomor rekening :  
                                                             	7056589157 <br> Bank Syariah Mandiri a.n BAMA </strong> <br>
                                                            <p style="font-size:15px; text-align:left; color:#000; "> Pastikan Nominal yang Anda Kirim sesuai dengan yang tercantum pada E-mail ini agar mempercepat proses konfirmasi pembayaran. 
                                                            </p>
                                                            
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

            $email  = $user['email'];
            $sub    = 'Verifikasi Pembayaran';
            $send   = SendMail($email,$sub,$msg);

        
		echo json_encode($buy);
           
		}else{
			echo json_encode(array('result' => false,));
		}

	}

	public function pembelian($idu){
		$data = array(
			'list'	=> $this->_model->getListTrans($idu),
			'view' 	=> 'member/member_dok_pem', 
			);
		$this->load->view('index', $data, FALSE);
	}


	public function download($id_tran){
		$idu = $this->session->userdata('idAuth');
		$path = $this->_model->getListTransById($id_tran);
		$cek =  $this->_model->getListTransByIdUser($id_tran,$idu);

		if ($cek['status'] == 1) {
			force_download($path['upload_file'], NULL);
		}else{
			redirect('member/ebook/0','refresh');
		}
	}

	public function deltrans($id){

    	$this->_model->TransDel($id);


    	$this->session->set_flashdata('alert', 'alert-success');
        $this->session->set_flashdata('alert-msg', 'Delete Data Success..');
		redirect('member/pembelian/'.$this->session->userdata('idAuth').'','refresh');


    }
		
	public function konfirmasi(){

	$idu = $this->session->userdata('idAuth');
	$id_tran = $this->input->post('id_tran');
	$ket = $this->input->post('ket');

		$config['upload_path']          = './assets/bukti/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 4000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config);

       	if (!$this->upload->do_upload("bukti"))
            {
                	$file = array();
            		$this->_model->Konfir($idu,$id_tran,$file,$ket);
               		$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Success..!');
                	redirect('member/pembelian/'.$this->session->userdata('idAuth').'','refresh');

            }
            else
            {	
                $data = $this->input->post();
            	
            		$file = array(
                		'name' => $this->upload->data('file_name'),
                		'path' => $config['upload_path'], 
                	);
               		$this->_model->Konfir($idu,$id_tran,$file,$ket);
               		$this->session->set_flashdata('alert', 'alert-info');
        			$this->session->set_flashdata('alert-msg', 'Success..!');
                	redirect('member/pembelian/'.$this->session->userdata('idAuth').'','refresh');
            }
	}

	public function makanbang(){
		$this->load->view('member/index',array(),false);
	}


	 public function sendMsg(){
		$data = $this->input->post();
		$send = $this->_model->send_msg($data);

		      	if($send){
		      		$this->session->set_flashdata('alert', 'alert-info');
			        $this->session->set_flashdata('alert-msg', 'Send Message Success..!');
					redirect('member/message','refresh');
		     	}
		     	else{
		     		$this->session->set_flashdata('alert', 'alert-warning');
			        $this->session->set_flashdata('alert-msg', 'Send Message Failure..!');
					redirect('member/message','refresh');
		    	}
	}

    public function message(){
    	$data = array(
    		'in' 	=> $this->_model->get_msg_in(),
    		'out' 	=> $this->_model->get_msg_out(),
    		'view' 	=> 'member/member_message', 
    		);
    	$this->load->view('index', $data, FALSE);
    }

    public function msg_view($id){
    	$up = $this->_model->up_msg_status($id);
    	$data = array(
    		'user' 	=> $this->_model->get_msg_ById($id),
    		'msg' 	=> $this->_model->get_msg_rep($id),
    		'view' 	=> 'member/member_message_view',
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
			redirect('member/msg_view/'.$data['idm'].'','refresh');
     	}
     	else{
     		$this->session->set_flashdata('alert', 'alert-warning');
	        $this->session->set_flashdata('alert-msg', 'Send Message Failure..!');
			redirect('member/msg_view/'.$data['idm'].'','refresh');
    	}

    }
}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */