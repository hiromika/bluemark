<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_member extends CI_Model {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		
	}

	public function getEvent(){
		$this->db->order_by('id', 'desc');
		return	$this->db->get('tb_event',3)->result_array();
	}
	public function getJadTo(){
		$this->db->select('*');
		$this->db->from('tb_kelas a');
		$this->db->join('tb_kelas_jadwal b', 'b.id_kelas = a.id', 'left');
		$this->db->join('tb_kelas_terdaftar c', 'c.id_kelas = a.id', 'left');
		$this->db->where('b.tgl_kelas', date('Ymd'));
		$this->db->where('c.id_user', $this->session->userdata('idAuth'));
		return $this->db->get()->result_array();
	}
	public function getJadSo(){
		$this->db->select('*');
		$this->db->from('tb_kelas a');
		$this->db->join('tb_kelas_jadwal b', 'b.id_kelas = a.id', 'left');
		$this->db->join('tb_kelas_terdaftar c', 'c.id_kelas = a.id', 'left');
		$this->db->where('b.tgl_kelas !=', date('Ymd'));
		$this->db->where('b.tgl_kelas >=', date('Ymd'));
		$this->db->where('c.id_user', $this->session->userdata('idAuth'));
		$this->db->order_by('b.tgl_kelas', 'asd');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}
	public function getEventall(){
		$this->db->order_by('id', 'desc');
		return	$this->db->get('tb_event')->result_array();
	}

	public function getEventDetail($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_event')->row_array();
	}

	public function getEventKelas($id){
		$this->db->where('id_event', $id);
		return $this->db->get('tb_kelas')->result_array();
	}

	public function getKelas($id){
		$this->db->where('id_kelas', $id);
		return $this->db->get('tb_kelas_jadwal')->result_array();
	}

	public function getkuota_kelas($id){
		$this->db->select('kuota');
		$this->db->from('tb_kelas');
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}

	public function getKuota_terdaftar($id){
		$this->db->select('count(id_kelas)');
		$this->db->from('tb_kelas_terdaftar');
		$this->db->where('id_kelas', $id);
		return $this->db->get()->row_array();
	}

	public function getUserDet($id){
		$this->db->select('*');
		$this->db->from('tb_user a');
		$this->db->join('detail_user b', 'b.id_user = a.id', 'left');
		$this->db->where('b.id_user', $id);
		return $this->db->get('detail_user')->row_array();
	}

	public function editPro($data){
		$obj = array(
			'nama' 			=>	$data['nama'],
			'jenis_kelamin'	=> 	$data['kelamin'],
			'tempat_lahir'	=>	$data['tmplahir'],
			'tgl_lahir'		=>	date('y-m-d',strtotime($data['tgl_lahir'])),
			'alamat'		=>	$data['alamat'],
			'agama'			=>	$data['agama'],
			'tlp'			=>	$data['tlp'],
			'email'			=>	$data['email'],
			'sekolah'		=>	$data['kampus'],
			'status'		=>	$data['status'],
			);
		$this->db->where('id_user', $data['id']);
		$this->db->update('detail_user', $obj);

		return true;
	}
	public function editFotoPro($data,$file){
		$obj = array(
			'foto' => $file['path'].$file['name'],
			);
		$this->db->where('id_user', $data['id']);
		$this->db->update('detail_user', $obj);
	}

	public function cekpas($id,$data){
		$this->db->select('password');
		$this->db->from('tb_user');
		$this->db->where('id', $id);
		$this->db->where('password', md5($data['oldpas']));
		$cekpass = $this->db->get();
		if ($cekpass->num_rows() > 0) {
			$obj = array(
				'password' => md5($data['newpas']), 
				);
			$this->db->where('id', $id);
			$this->db->update('tb_user', $obj);
			return true;
		}else{
			return false;
		}

	}

	public function enrol($data){
		$this->db->select('kuota');
		$this->db->from('tb_kelas');
		$this->db->where('id', $data['id_kelas']);
		$cs = $this->db->get()->row_array();

		$this->db->where('id_kelas', $data['id_kelas']);
		$ct = $this->db->get('tb_kelas_terdaftar')->num_rows();

		if ($ct >= $cs['kuota']) {
			return false;
		}else{
			
		$this->db->where('id_kelas', $data['id_kelas']);
		$jad = $this->db->get('tb_kelas_jadwal')->result_array();

		foreach ($jad as $key => $value) {
			$ob = array(
				'id_kelas' 	=> 	$data['id_kelas'],
				'id_user'	=>	$data['id_user'],
				'id_jadwal'	=>	$value['id'],
				 );
			$this->db->insert('tb_kelas_absensi', $ob);
		}

		$obj = array(
			'id_kelas' 	=>	$data['id_kelas'] ,
			'id_user'	=>	$data['id_user'],
			'id_event'	=>	$data['id_event'], 
			);
		$this->db->insert('tb_kelas_terdaftar', $obj);
		return true;
			
		}

	}

	public function remRoll($idu,$idk){
		$this->db->where('id_user', $idu);
		$this->db->where('id_kelas', $idk);
		$this->db->delete('tb_kelas_terdaftar');

		$this->db->where('id_user', $idu);
		$this->db->where('id_kelas', $idk);
		$this->db->delete('tb_kelas_absensi');
		return true;
	}

	public function checked($id,$ida){
		$this->db->where('id_user', $ida);
		$this->db->where('id_event', $id);
		return $this->db->get('tb_kelas_terdaftar')->result_array();
		
	}

	public function checked_inst($id,$ida){
		$this->db->where('id_instruktur', $ida);
		$this->db->where('id_event', $id);
		return $this->db->get('tb_kelas')->result_array();
	}

	public function checkMasa($id){
		$date = date("ymd");
		$this->db->select('a.tgl_kelas');
		$this->db->from('tb_kelas_jadwal a');
		$this->db->join('tb_kelas b', 'b.id = a.id_kelas', 'left');
		$this->db->where('b.id_event', $id);
		$this->db->where('a.tgl_kelas <', $date );
		return $this->db->get()->result_array();
	}

	public function clas($id){
		$this->db->where('id_user', $id);	
		return $this->db->get('tb_kelas_terdaftar')->result_array();
	}

	public function getClas($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_kelas')->result_array();
	}

	public function getClas_print($id){
		$this->db->select('*');
		$this->db->from('tb_kelas a');
		$this->db->join('detail_user b', 'b.id_user = a.id_instruktur', 'left');
		$this->db->where('a.id', $id);
		return $this->db->get()->row_array();
	}

	public function getClasJad($id){
		$this->db->where('id_kelas', $id);
		return $this->db->get('tb_kelas_jadwal')->result_array();
	}

	public function getClasJad_print($idk){
		$this->db->where('id_kelas', $idk);
		return $this->db->get('tb_kelas_jadwal')->num_rows();
	}

	public function getClasJadAb($idj){
		$this->db->where('id_jadwal', $idj);
		return $this->db->get('tb_kelas_absensi')->result_array();
		
	}
	
	public function getClasInt($id){
		$this->db->where('id_instruktur', $id);
		return $this->db->get('tb_kelas')->result_array();
	}

	public function getClasIntAbs($idk,$idj){
		$this->db->select('*,a.id_user as ids');
		$this->db->from('tb_kelas_terdaftar a');
		$this->db->join('tb_kelas b', 'b.id = a.id_kelas', 'left');
		$this->db->join('detail_user c', 'c.id_user = a.id_user', 'left');
		$this->db->join('tb_kelas_absensi d', 'd.id_user = a.id_user', 'left');
		$this->db->where('a.id_kelas', $idk);
		$this->db->where('d.id_jadwal', $idj);
		$this->db->group_by('a.id_user');
		return $this->db->get()->result_array();
	
	}
	public function getClasIntAbs_print($idk){
		$this->db->select('*,a.id_user as ids');
		$this->db->from('tb_kelas_terdaftar a');
		$this->db->join('tb_kelas b', 'b.id = a.id_kelas', 'left');
		$this->db->join('detail_user c', 'c.id_user = a.id_user', 'left');
		$this->db->where('a.id_kelas', $idk);
		$this->db->group_by('a.id_user');
		return $this->db->get()->result_array();
	}

	public function getClasIntJad($idj){
		$this->db->where('id', $idj);
		return $this->db->get('tb_kelas_jadwal')->row_array();
	}

	public function upAbsen($id,$absen,$jadwal,$idj){
		foreach ($id as $key => $value) {
			
			$obj = array(
				'status' => $absen[$key] , 
				);
			$this->db->where('id_user', $value);
			$this->db->where('id_jadwal', $jadwal[$key]);
			$this->db->update('tb_kelas_absensi', $obj);

		}
		$ob = array('status' => 1, );
		$this->db->where('id', $idj);
		$this->db->update('tb_kelas_jadwal', $ob);
		return true;

	}

	public function insertForum($data,$file){
		if (!$file['name']) {
			$obj = array(
			'id_user' 		=> 	$data['id_user'],
			'judul_forum'	=>	$data['judul'],
			'isi_forum'		=>	$data['isi'],
			);
		$this->db->insert('tb_forum', $obj);

		return true;
		}else{
		$obj = array(
			'id_user' 		=> 	$data['id_user'],
			'judul_forum'	=>	$data['judul'],
			'isi_forum'		=>	$data['isi'],
			'file'			=> 	$file['path'].$file['name'],
			);
		$this->db->insert('tb_forum', $obj);

		return true;	
		}
	}
	public function updateForum($data,$file){
		if (!$file['name']) {
		$obj = array(
			'id_user' 		=> 	$data['id_user'],
			'judul_forum'	=>	$data['judul'],
			'isi_forum'		=>	$data['isi'],
			);
		$this->db->where('id', $data['id']);
		$this->db->update('tb_forum', $obj);

		return true;
		}else{
		$obj = array(
			'id_user' 		=> 	$data['id_user'],
			'judul_forum'	=>	$data['judul'],
			'isi_forum'		=>	$data['isi'],
			'file'			=> 	$file['path'].$file['name'],
			);
		$this->db->where('id', $data['id']);
		$this->db->update('tb_forum', $obj);

		return true;
		}
	}


	public function getForum(){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->result_array();
	}


	public function getForumLast(){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->order_by('a.id', 'desc');
		$this->db->limit(4);
		return $this->db->get()->result_array();
	}



	public function repKomen($idf){
		$this->db->where('id_forum', $idf);
		return $this->db->get('tb_forum_komen')->num_rows();
	}

	public function inView($idf){
		$ip 	= $this->input->ip_address();
		// $tgl 	= date("Ymd"); // Mendapatkan tanggal sekarang
  		// $waktu  = time(); // 
		$this->db->select('*');
		$this->db->from('tb_forum_statistik');
		$this->db->where('ip', $ip);
		$this->db->where('id_forum', $idf);
		$cek = $this->db->get();
		if ($cek->num_rows() == 0) {
			$obj = array(
				'ip' 		=> 	$ip,
				'hits'		=>	1,
				'id_forum'	=>	$idf,
				// 'online'	=>	$waktu,
				);
			$this->db->insert('tb_forum_statistik', $obj);
		}else{
			return true;
		}
		// $bataswaktu       = time() - 300;	

	}

	public function getView($idf){
		$this->db->where('id_forum', $idf);
		return $this->db->get('tb_forum_statistik')->num_rows();
	}

	public function getForumUs($id){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.id_user', $id);
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->result_array();
	}

	public function getForums($idk){
		$this->db->where('id_kelas', $idk);

		return $this->db->get('tb_forum')->row_array();
	}

	public function forumView($idf){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.id', $idf);
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->row_array();
	}

	public function addKomen($data){
		$obj = array(
			'id_user' 	=> $data['id_user'],
			'id_forum' 	=> $data['id_forum'],
			'komen' 	=> $data['isi'],
			);
		$this->db->insert('tb_forum_komen', $obj);
		return true;
	}

	public function getKomen($idf){
		$this->db->select('*');
		$this->db->from('tb_forum_komen a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.id_forum', $idf);
		return $this->db->get()->result_array();
	}

	public function gedEditKomen($idk){
		$this->db->where('id', $idk);
		return $this->db->get('tb_forum_komen')->row_array();
	}

	public function updateKomen($data){
		$obj = array(
			'komen' => $data['isi'], 
			);
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('id', $data['id']);
		$this->db->update('tb_forum_komen', $obj);
		return true;
	}


	// ebook

	public function getKategori(){
		$this->db->select('*,count(a.id_kat) as jml');
		$this->db->from('tb_dok a');
		$this->db->join('tb_dok_kategori b', 'b.id = a.id_kat', 'left');
		$this->db->group_by('a.id_kat');
		$this->db->where('a.status', 1);
		return $this->db->get()->result_array();
	}

	public function getEbook(){
		$this->db->select('*,a.id as iddok');
		$this->db->from('tb_dok a');
		$this->db->join('tb_dok_kategori b', 'b.id = a.id_kat', 'left');
		$this->db->where('a.status', 1);
		return $this->db->get()->result_array();
	}
	public function getEbookByIdKat($id){
		$this->db->select('*,a.id as iddok');
		$this->db->from('tb_dok a');
		$this->db->join('tb_dok_kategori b', 'b.id = a.id_kat', 'left');
		$this->db->where('a.status', 1);
		$this->db->where('a.id_kat', $id);
		return $this->db->get()->result_array();
	}
	public function getEbookById($id){
		$this->db->select('*, a.id as iddok');
		$this->db->from('tb_dok a');
		$this->db->join('tb_dok_kategori b', 'b.id = a.id_kat', 'left');
		$this->db->where('a.status', 1);
		$this->db->where('a.id', $id);
		return $this->db->get()->row_array();
	}

	public function checkTran($iddok){
		$uid = $this->session->userdata('idAuth');
		$this->db->where('id_user', $uid);
		$this->db->where('id_dok', $iddok);
		return $this->db->get('tb_transaksi')->row_array();
	}

	public function doBuy($data){
		$object = array(
			'tlp' 	=> $data['tlp'],
			'alamat'=> $data['alamat'],
		 );
		$this->db->where('id_user', $data['idu']);
		$this->db->update('detail_user', $object);

		$time = date('Y-m-d H:i:s',strtotime(date("Y-m-d H:i:s")." +2 days"));

		$id_tran = $data['no_dok'].mt_rand(10000,99999);
		$code = mt_rand(100,499);

		$obj = array(
			'id_transaksi' 	=> $id_tran,
			'id_user'		=> $data['idu'],
			'id_dok'		=> $data['iddok'],
			'harga'			=> $data['harga']+$code,
			'expired'		=> $time,
			);
		$this->db->insert('tb_transaksi', $obj);

		$id = $this->db->insert_id();

		$result = array(
			'result' 	=> true,
			'id_tran'	=> $id_tran,
			'harga'		=> $data['harga']+$code,
			'exp'		=> $time,	 
			);

		return $result;
	 }

	 public function getListTrans($id){
	 	$this->db->select('*,a.id as idtran,a.harga as hargas, a.status as stat');
	 	$this->db->from('tb_transaksi a');
	 	$this->db->join('tb_dok b', 'b.id = a.id_dok', 'left');
	 	$this->db->where('a.id_user', $id);
	 	return $this->db->get()->result_array();
	 }

	 public function getListTransById($id){
	 	$this->db->select('*,a.id as idtran,a.harga as hargas, a.status as stat');
	 	$this->db->from('tb_transaksi a');
	 	$this->db->join('tb_dok b', 'b.id = a.id_dok', 'left');
	 	$this->db->where('a.id_transaksi', $id);
	 	return $this->db->get()->row_array();
	 }

	 public function getListTransByIdUser($id,$idu){
	 	$this->db->select('*');
	 	$this->db->from('tb_transaksi');
	 	$this->db->where('id_user', $idu);
	 	$this->db->where('id_transaksi', $id);
	 	return $this->db->get()->row_array();
	 }

	 public function TransDel($id){

    	$this->db->where('id_transaksi', $id);
    	$this->db->delete('tb_transaksi');

    	return true;
    }

	 public function Konfir($idu,$id_tran,$file,$ket){
	 	if (count($file) > 0) {
	 		$obj = array(
	 			'status_kon'	=> 1,
	 			'keterangan'	=> $ket,
	 			'bukti'			=> $file['path'].$file['name'],
	 			);
	 		$this->db->where('id_user', $idu);
	 		$this->db->where('id_transaksi', $id_tran);
	 		$this->db->update('tb_transaksi', $obj);
	 	}else{
	 		$obj = array(
	 			'status_kon'=> 1,
	 			'keterangan'	=> $ket,
	 			);
	 		$this->db->where('id_user', $idu);
	 		$this->db->where('id_transaksi', $id_tran);
	 		$this->db->update('tb_transaksi', $obj);
	 	}
	 	return true;
	 }


	  public function send_msg($data){
    	$id = $this->session->userdata('idAuth');
    	$obj = array(
    		'id_user' 	=> $id,
    		'id_user_to'=> $data['id'],
    		'subject'	=> $data['sub'],
    		'msg'		=> $data['isi'],
    	);
    	$this->db->insert('tb_message', $obj);
    	$inid = $this->db->insert_id(); 

    	$obje = array(
    		'id_msg' 		=> $inid,
    		'id_user_' 		=> $id,
    		'id_user_to_'	=> $data['id'],
    		'msg'			=> $data['isi'],
    		'status_'		=> 1,
    		);
    	$this->db->insert('tb_message_rep', $obje);
    	return true;

    }

    public function get_msg_in(){
    	$id = $this->session->userdata('idAuth');
    	$this->db->select('*, b.nama as namas, e.nama as namar, a.id_user as idu, a.id as idm ');
    	$this->db->from('tb_message a');
    	$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
    	$this->db->join('detail_user e', 'e.id_user = a.id_user_to', 'left');
    	$this->db->join('tb_message_rep c', 'c.id_msg = a.id', 'left');
    	$this->db->where('a.id_user_to', $id);
    	$this->db->where('c.status_', 1);
    	$this->db->or_where('a.id_user_to', $id);
    	$this->db->where('c.status_', 0);
    	$this->db->order_by('a.id', 'desc');
    	$this->db->group_by('c.id_msg');
    	return $this->db->get()->result_array();

    }

    public function get_msg_out(){
    	$id = $this->session->userdata('idAuth');
    	$this->db->select('*');
    	$this->db->from('tb_message a');
    	$this->db->join('detail_user b', 'b.id_user = a.id_user_to', 'left');
    	$this->db->where('a.id_user', $id);
    	$this->db->order_by('a.id', 'desc');
    	return $this->db->get()->result_array();

    }   

   	public function get_msg_ById($id){
    	$idu = $this->session->userdata('idAuth');
    	$this->db->select('*');
    	$this->db->from('tb_message a');
    	$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
    	$this->db->where('a.id', $id);
    	return $this->db->get()->row_array();
    }

    public function get_msg_rep($id){
    	$idu = $this->session->userdata('idAuth');
    	$this->db->select('*,b.nama as namas, b.foto as fotos, c.nama as namar, c.foto as fotor');
    	$this->db->from('tb_message_rep a');
    	$this->db->join('detail_user b', 'b.id_user = a.id_user_', 'left');
    	$this->db->join('detail_user c', 'c.id_user = a.id_user_to_', 'left');
    	$this->db->where('a.id_msg', $id);
    	return $this->db->get()->result_array();
    }


    public function send_msg_rep($data){

    	$obj = array(
    		'id_msg' 		=> $data['idm'],
    		'id_user_'		=> $data['id_user'],
    		'id_user_to_'	=> $data['id_user_to'],
    		'msg'			=> $data['msg'],
    		);
    	$this->db->insert('tb_message_rep', $obj);
    	return true;
    }

    public function up_msg_status($id){
    	
    	$obj  = array(
    		'status_v' => 1, );
    	$this->db->where('id_msg', $id);
    	$this->db->update('tb_message_rep', $obj);

    }


}

/* End of file model_member.php */
/* Location: ./application/models/model_member.php */