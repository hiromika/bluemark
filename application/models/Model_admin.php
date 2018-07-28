<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			date_default_timezone_set("Asia/Bangkok");
	}

	public function getUser(){
			$this->db->select('*');
			$this->db->from('tb_user a');
			$this->db->join('role_user b', 'b.id_role = a.level', 'left');
			$this->db->join('detail_user c', 'c.id_user = a.id', 'left');
			$this->db->where('username !=', 'admin');
	return  $this->db->get()->result_array();

	}

	public function getUsers($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_user')->row_array();
	}

	public function inUser($data){

	$this->db->select('username');
	$this->db->from('tb_user');
	$this->db->where('username', $data['username']);
	$cek =  $this->db->get();
		if ($cek->num_rows()>0) {
			return false;
		}else{

		$this->db->insert('tb_user',array(
			'username' 	=>  $data['username'],
			'password'	=>	md5($data['password']),
			'full_name'	=> 	$data['fullname'],
			'level'		=> 	'2',
			'verified'	=>  '1'
			));
		$id=$this->db->insert_id();

		$this->db->insert('detail_user', array(
			'id_user' 	=> $id,
			'kode_user'	=> $id,
			'nama'	=> $data['fullname'],
			'email'	=> $data['email'],
			));
		return true;
		}
	}


	public function getRole(){
	return	$this->db->get('role_user')->result_array();
	}

	public function editUser($data){

		$obj = array(
			'nama' 			=>	$data['nama'],
			'jenis_kelamin'	=> 	$data['kelamin'],
			'tempat_lahir'	=>	$data['tempat'],
			'tgl_lahir'		=>	date('y-m-d',strtotime($data['tgl'])),
			'alamat'		=>	$data['alamat'],
			'agama'			=>	$data['agama'],
			'tlp'			=>	$data['tlp'],
			'email'			=>	$data['email'],
			'sekolah'		=>	$data['kampus'],
			'status'		=>	$data['status'],
			);
		$this->db->where('id_user', $data['id']);
		$this->db->update('detail_user', $obj);

		$object = array(

			'level' => $data['level'],

			);
		$this->db->where('id', $data['id']);
		$this->db->update('tb_user', $object);

		if (isset($data['newpas'])) {
				$object = array(

				'password' => md5($data['newpas']),

				);
			$this->db->where('id', $data['id']);
			$this->db->update('tb_user', $object);
		}

		if (isset($data['verified'])) {
		$this->db->where('id', $data['id']);
		$this->db->update('tb_user', array('verified' => $data['verified']));
		}
		return true;

	}

	public function hapusUser($data){
		$this->db->where('id', $data);
		$this->db->delete('tb_user');

		$this->db->where('id_user', $data);
		$this->db->delete('detail_user');

		return true;
	}


	public function UserDelBatch($data){
		$this->db->where_in('id', $data);
		$this->db->delete('tb_user');

		$this->db->where_in('id_user', $data);
		$this->db->delete('detail_user');

		return true;
	}

	public function getEvent(){
		return	$this->db->get('tb_event')->result_array();
	}

	public function eventEdit($id){
		$this->db->select('*');
		$this->db->from('tb_event');
		$this->db->where('id', $id);
		$db =	$this->db->get();
			if ($db->num_rows() > 0) {
			return $db->row_array();
			}
	}
	public function insertEvent($data,$file){

		$object = array(
			'judul_event' 	=> $data['judul'],
			'isi'			=> $data['isi'],
			'gambar'		=> $file['path'].$file['name'],
			);
		$this->db->insert('tb_event', $object);

		return true;
	}

	public function editEvent($data,$file){

		$object = array(
			'judul_event' 	=> $data['judul'],
			'isi'			=> $data['isi'],
			'gambar'		=> $file['path'].$file['name'],
			);
		$this->db->where('id', $data['id']);
		$this->db->update('tb_event', $object);

		return true;

	}

	public function EventView($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_event')->row_array();
	}

	public function hapusEvent($data){
		$this->db->where('id', $data);
		$this->db->delete('tb_event');

		return true;
	}

	
	public function getInstruc(){
			$this->db->select('*');
			$this->db->from('tb_user a');
			$this->db->join('detail_user b', 'b.id_user = a.id', 'inner');
			$this->db->where('a.level', 3);
	return 	$this->db->get()->result_array();

	}


	public function inputKelas($data){
		$date 		= date('Ymd' ,strtotime($data['tgl']));
		$t1 = str_replace('-','', $data['jam_s']).'00';
	 	$t2 = str_replace('-','', $data['jam_e']).'00';


	 	// kelas
		$object = array(
			'id_event' 		=>	$data['event'],
			'id_instruktur'	=>	$data['instruktur'],
			'kelas'			=>	$data['kelas'],
			'jumlah_sesi'	=>	$data['sesi'],
			'kuota'			=> 	$data['kuota'], 
			);
		$this->db->insert('tb_kelas', $object);
		$idk = $this->db->insert_id();


		// jadwal
		$start 		= new DateTime($date);
		$interval 	= new dateinterval('P1W');
		$period 	= new dateperiod($start,$interval,$data['sesi']-1);
		
		foreach ($period as $key => $value) {
		 $tgl = $value->format('Ymd');
		 	$obj = array(
		 		'id_kelas' 	=> $idk,
		 		'tgl_kelas' => $tgl,
		 		'jam_mulai'	=> $t1,
		 		'jam_akhir'	=> $t2,
		 		);
		 	$this->db->insert('tb_kelas_jadwal', $obj);
		}

		// event
		$obj = array(
			'id_user' 		=> $data['instruktur'], 
			'id_kelas'		=> $idk,
			'judul_forum'	=> 'Forum Class '.$data['kelas'],
			'isi_forum'		=> '<h5>Welcome<h5>',
			);
		$a = $this->db->insert('tb_forum', $obj);

		if ($a) {
		foreach ($period as $skey => $values) {
			$tgl = $values->format('Ymd');
			$this->db->select('*');
			$this->db->from('tb_kelas_jadwal');
			$this->db->where('tgl_kelas', $tgl);
			$this->db->where('jam_mulai >=', $t1);
			$this->db->where('jam_akhir <=', $t2);
			$cek = $this->db->get();
			if ($cek->num_rows() > 0) {
				$this->db->where('id', $idk);
				$this->db->delete('tb_kelas');

				$this->db->where('id_kelas', $idk);
				$this->db->delete('tb_kelas_jadwal');

				$this->db->where('id_kelas', $idk);
				$this->db->delete('tb_forum');

				return false;
				}
			}

		}else{
			return false;
		} 

		return true;
	}	


	public function editKelas($data){
		
		$this->db->where('id_kelas', $data['idk']);
		$this->db->delete('tb_kelas_jadwal');		

		$this->db->where('id_kelas', $data['idk']);
		$this->db->delete('tb_kelas_absensi');

		$object = array(
			'id_event' 		=>	$data['event'],
			'id_instruktur'	=>	$data['instruktur'],
			'kelas'			=>	$data['kelas'],
			'jumlah_sesi'	=>	$data['sesi'],
			'kuota'			=> 	$data['kuota'],  
			);
		$this->db->where('id', $data['idk']);
		$this->db->update('tb_kelas', $object);
		$idk = $data['idk'];


		$date 		= date('Ymd' ,strtotime($data['tgl']));
		$start 		= new DateTime($date);
		$interval 	= new dateinterval('P1W');
		$period 	= new dateperiod($start,$interval,$data['sesi']-1);
		$t2 		= str_replace('-','', $data['jam_e']).'00';
		$t1 		= str_replace('-','', $data['jam_s']).'00';
		
		$this->db->select('id_user');
		$this->db->where('id_kelas', $data['idk']);
		$idu = $this->db->get('tb_kelas_terdaftar')->result_array();

		foreach ($period as $key2 => $value2) {
			 	$tgl = $value2->format('Ymd');
			 	$obj = array(
			 		'id_kelas' 	=> $idk,
			 		'tgl_kelas' => $tgl,
			 		'jam_mulai'	=> $t1,
			 		'jam_akhir'	=> $t2,
			 		);
			 	$this->db->insert('tb_kelas_jadwal', $obj);
			 	$id = $this->db->insert_id();


			 	foreach ($idu as $key => $value) {
				 	$ob = array(
							'id_kelas' 	=> 	$data['idk'],
							'id_user'	=>	$value['id_user'],
							'id_jadwal'	=>	$id,
							 );
						$this->db->insert('tb_kelas_absensi', $ob);
				}
			 	
		}


		$obj = array(
			'id_user' 		=> $data['instruktur'], 
			'id_kelas'		=> $idk,
			'judul_forum'	=> 'Forum Class '.$data['kelas'],
			'isi_forum'		=> '<h5>Welcome<h5>',
			);
		$this->db->where('id_kelas', $idk);
		$this->db->update('tb_forum', $obj);

		return true;
	}

	public function hapusKelas($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_kelas');

		$this->db->where('id_kelas', $id);
		$this->db->delete('tb_kelas_jadwal');

		$this->db->where('id_kelas', $id);
		$this->db->delete('tb_forum');

		$this->db->where('id_kelas', $id);
		$this->db->delete('tb_kelas_terdaftar');

		$this->db->where('id_kelas', $id);
		$this->db->delete('tb_kelas_absensi');

		return true;
	}

	public function getKelas(){
		$this->db->select('*,a.id as idk, count(d.id_user) as terdaftar');
		$this->db->from('tb_kelas a');
		$this->db->join('tb_user b', 'b.id = a.id_instruktur', 'left');
		$this->db->join('tb_event c', 'c.id = a.id_event', 'left');
		$this->db->join('tb_kelas_terdaftar d', 'd.id_kelas = a.id', 'left');
		$this->db->group_by('a.id');
		return $this->db->get()->result_array();
	}	

	public function getKelasDet($id){
		$this->db->select('*,a.id as idk,b.id as idu, c.id as ide');
		$this->db->from('tb_kelas a');
		$this->db->join('tb_user b', 'b.id = a.id_instruktur', 'left');
		$this->db->join('tb_event c', 'c.id = a.id_event', 'left');
		$this->db->where('a.id', $id);
		return $this->db->get()->row_array();
	}

	public function getKelasJad($id){
		$this->db->where('id_kelas', $id);
		return $this->db->get('tb_kelas_jadwal')->result_array();
	}	
	public function getKelasJadRow($id){
		$this->db->where('id_kelas', $id);
		$this->db->order_by('id', 'asc');
		return $this->db->get('tb_kelas_jadwal')->row_array();
	}

	public function getKelasPer($id){
		$this->db->select('*,a.id as idk');
		$this->db->from('tb_kelas_terdaftar a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.id_kelas', $id);
		return $this->db->get()->result_array();

	}

	public function getKelas_add_peserta($id){
		// $this->db->select('id_user');
		// $this->db->from('tb_kelas_terdaftar');
		// $this->db->where('id_kelas', $id);
		// $iduser = $this->db->get()->result_array();
		// $idu = array()
		// foreach ($$iduser as $key => $value) {
		// 	$value
		// }

		$this->db->select('*,a.id_user as idu');
		$this->db->from('detail_user a');
		$this->db->join('tb_kelas_terdaftar b', 'b.id_user = a.id_user', 'left');
		$this->db->where('b.id_kelas is null');
		$this->db->where('a.id_user !=', 1);
		$this->db->or_where('b.id_kelas !=', $id);
		$this->db->where('a.id_user !=', 1);
		// $this->db->where_in('b.id_user !=', array(55,56));
		$this->db->group_by('a.id_user');
		return $this->db->get()->result_array();

	}


	public function add_peserta_kelas($data){
		$this->db->select('kuota');
		$this->db->from('tb_kelas');
		$this->db->where('id', $data['id_kelas']);
		$cs = $this->db->get()->row_array();

		$this->db->where('id_kelas', $data['id_kelas']);
		$ct = $this->db->get('tb_kelas_terdaftar')->num_rows();

		if (($cs['kuota'] - $ct) < count($data['id_user'])) {
			return false;
		}else{
				
			foreach ($data['id_user'] as $key => $value) {

				$this->db->where('id_kelas', $data['id_kelas']);
				$jad = $this->db->get('tb_kelas_jadwal')->result_array();

				foreach ($jad as $keys => $values) {
					$ob = array(
						'id_kelas' 	=> 	$data['id_kelas'],
						'id_user'	=>	$value,
						'id_jadwal'	=>	$values['id'],
						 );
					$this->db->insert('tb_kelas_absensi', $ob);
				}

				$obj = array(
					'id_kelas' 	=>	$data['id_kelas'] ,
					'id_user'	=>	$value,
					'id_event'	=>	$data['id_event'], 
					);
				$this->db->insert('tb_kelas_terdaftar', $obj);
				
			}

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


	// jumlah sesi
	public function getClasJad_print($idk){
		$this->db->where('id_kelas', $idk);
		return $this->db->get('tb_kelas_jadwal')->num_rows();
	}

	public function getStatusSesi($idk,$idu){
		$this->db->select('status');
		$this->db->from('tb_kelas_absensi');
		$this->db->where('id_kelas', $idk);
		$this->db->where('id_user', $idu);
		return $this->db->get()->result_array();
	}


	// peserta
	public function getClasIntAbs_print($idk){
		$this->db->select('*,a.id_user as ids');
		$this->db->from('tb_kelas_terdaftar a');
		$this->db->join('tb_kelas b', 'b.id = a.id_kelas', 'left');
		$this->db->join('detail_user c', 'c.id_user = a.id_user', 'left');
		$this->db->where('a.id_kelas', $idk);
		$this->db->group_by('a.id_user');
		return $this->db->get()->result_array();
	}
	// instruktur
	public function getClas_print($id){
		$this->db->select('*');
		$this->db->from('tb_kelas a');
		$this->db->join('detail_user b', 'b.id_user = a.id_instruktur', 'left');
		$this->db->where('a.id', $id);
		return $this->db->get()->row_array();
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

	public function getClasIntJad($idj){
		$this->db->where('id', $idj);
		return $this->db->get('tb_kelas_jadwal')->row_array();
	}

	
	public function cek_stat($id){
		$this->db->where('id_kelas', $id);
		$this->db->where('status', 1);
		$st = $this->db->get('tb_kelas_jadwal')->num_rows();

		$this->db->where('id_kelas', $id);
		$jm = $this->db->get('tb_kelas_jadwal')->num_rows();

		if ($st==$jm) {
			return true;
		}else{
			return false;
		}

	}

	public function getId_event($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_kelas')->row_array();
	}

	public function getForum(){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->result_array();
	}


	public function repKomen($idf){
		$this->db->where('id_forum', $idf);
		return $this->db->get('tb_forum_komen')->num_rows();
	}

	public function getView($idf){
		$this->db->where('id_forum', $idf);
		return $this->db->get('tb_forum_statistik')->num_rows();
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

	public function forumView($idf){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.id', $idf);
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->row_array();
	}

	public function getKomen($idf){
		$this->db->select('*');
		$this->db->from('tb_forum_komen a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.id_forum', $idf);
		return $this->db->get()->result_array();
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

	public function addKomen($data){
		$obj = array(
			'id_user' 	=> $data['id_user'],
			'id_forum' 	=> $data['id_forum'],
			'komen' 	=> $data['isi'],
			);
		$this->db->insert('tb_forum_komen', $obj);
		return true;
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

	public function gedEditKomen($idk){
		$this->db->where('id', $idk);
		return $this->db->get('tb_forum_komen')->row_array();
	}

	public function getUserDet($id){
		$this->db->select('*');
		$this->db->from('tb_user a');
		$this->db->join('detail_user b', 'b.id_user = a.id', 'left');
		$this->db->where('b.id_user', $id);
		return $this->db->get('detail_user')->row_array();
	}

	public function getForumUs($id){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.id_user', $id);
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->result_array();
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

	public function editFotoPro($data,$file){
		$obj = array(
			'foto' => $file['path'].$file['name'],
			);
		$this->db->where('id_user', $data['id']);
		$this->db->update('detail_user', $obj);
	}

	public function HapusForum($id){

		$this->db->where('id', $id);
		$this->db->delete('tb_forum');

		$this->db->where('id_forum', $id);
		$this->db->delete('tb_forum_komen');

		$this->db->where('id_forum', $id);
		$this->db->delete('tb_forum_statistik');

		return true;

	}

	public function HapusKomen($idk){
		$this->db->where('id', $idk);
		$this->db->delete('tb_forum_komen');

		return true;
	}

	public function getForumLast(){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->order_by('a.id', 'desc');
		$this->db->limit(4);
		return $this->db->get()->result_array();
	}



	public function getEvents(){
		$this->db->order_by('id', 'desc');
		return	$this->db->get('tb_event',3)->result_array();
	}
	public function getJadTo(){
		$this->db->select('*');
		$this->db->from('tb_kelas a');
		$this->db->join('tb_kelas_jadwal b', 'b.id_kelas = a.id', 'left');
		$this->db->where('b.tgl_kelas', date('Ymd'));
		return $this->db->get()->result_array();
	}
	public function getJadSo(){
		$this->db->select('*');
		$this->db->from('tb_kelas a');
		$this->db->join('tb_kelas_jadwal b', 'b.id_kelas = a.id', 'left');
		$this->db->where('b.tgl_kelas !=', date('Ymd'));
		$this->db->where('b.tgl_kelas >=', date('Ymd'));
		$this->db->order_by('b.tgl_kelas', 'asd');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}

	public function getJmlDaftar(){
		$this->db->select('*,count(id_user) as jumlah');
		$this->db->from('tb_kelas_terdaftar');
		$this->db->where('date !=', '00000000000000');
		$this->db->group_by('MONTH(date)');
		return $this->db->get()->result_array();
	}

	public function getJmlDaftarHadir(){
		$this->db->select('*,count(a.id_user) as jumlah');
		$this->db->from('tb_kelas_terdaftar a');
		$this->db->join('tb_kelas_absensi b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.date !=', '00000000000000');
		$this->db->where('b.status IS NOT NULL');
		$this->db->group_by('MONTH(a.date)');
		return $this->db->get()->result_array();
	}

	public function CarigetJmlDaftar($datas){
		$this->db->select('*,count(id_user) as jumlah');
		$this->db->from('tb_kelas_terdaftar');
		$this->db->where('date !=', '00000000000000');
		$this->db->where('date >=', $datas['tgla']);
		$this->db->where('date <=', $datas['tglb']);
		$this->db->group_by('MONTH(date)');

		return $this->db->get()->result_array();
	}

	public function CarigetJmlDaftarHadir($datas){
		$this->db->select('*,count(a.id_user) as jumlah');
		$this->db->from('tb_kelas_terdaftar a');
		$this->db->join('tb_kelas_absensi b', 'b.id_user = a.id_user', 'left');
		$this->db->where('a.date !=', '00000000000000');
		$this->db->where('b.status IS NOT NULL');
		$this->db->where('a.date >=', $datas['tgla']);
		$this->db->where('a.date <=', $datas['tglb']);
		$this->db->group_by('MONTH(a.date)');
		return $this->db->get()->result_array();
	}


	// dokumen
	// 
	// 
	// 
	// 
	
	public function inDok($data,$file,$file_name1,$file_name2,$file_name3){
        $dats = array(
            'no_dok'     	=> $data['no'],
            'judul_dok'  	=> $data['judul'],
            'tahun'         => $data['tahun'],
            'tgl'           => date('Y-m-d'),
            'abstrak'       => $data['abstrak'],
            'keyword'       => $data['keyword'],
            'penulis'       => $data['penulis'],
            'id_jen'        => $data['dokumen'],
            'id_kat'        => $data['kategori'],
            'harga'        	=> $data['harga'],
            'upload_file'   => $file['path'].$file['name'],
            'name_file'		=> $file['name'],
            'size_file'     => $file['size'],
            'image1'		=> $file_name1['path'].$file_name1['name'],
            'image2'		=> $file_name2['path'].$file_name2['name'],
            'image3'		=> $file_name3['path'].$file_name3['name'],
            );
        $this->db->insert('tb_dok', $dats);

        return true;
    }

    public function editDok($data){
    	$dats = array(
            'no_dok'     	=> $data['no'],
            'judul_dok'  	=> $data['judul'],
            'tahun'         => $data['tahun'],
            'abstrak'       => $data['abstrak'],
            'keyword'       => $data['keyword'],
            'penulis'       => $data['penulis'],
            'id_jen'        => $data['dokumen'],
            'id_kat'        => $data['kategori'],
            'harga'        	=> $data['harga'],
            );
    	$this->db->where('id', $data['id']);
        $this->db->update('tb_dok', $dats);

        return true;
    }

    public function editDokImg($data,$file,$file_name1,$file_name2,$file_name3){
    	$dats = array(
            'upload_file'   => $file['path'].$file['name'],
            'name_file'		=> $file['name'],
            'size_file'     => $file['size'],
            'image1'		=> $file_name1['path'].$file_name1['name'],
            'image2'		=> $file_name2['path'].$file_name2['name'],
            'image3'		=> $file_name3['path'].$file_name3['name'],
            );
    	$this->db->where('id', $data['id']);
        $this->db->update('tb_dok', $dats);

        return true;
    }

    public function getDok($id){
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        return $this->db->get('tb_dok')->row_array();
    }
    

    public function getAllKat(){
        $this->db->select('*,count(a.id_kat) as totKat');
        $this->db->from('tb_dok a');
        $this->db->join('tb_dok_kategori b', 'b.id = a.id_kat', 'left');
        $this->db->where('a.status', 1);
        $this->db->group_by('a.id_kat');
        return $this->db->get()->result_array();
    }


    public function getTotAllDok(){
        $this->db->where('status', 1);
        return $this->db->get('tb_dok')->num_rows();
    }

    public function hpsDok($id){
        $this->db->where('id', $id);
        $object = array('status' => 0, );
        $this->db->update('tb_dok', $object);
        return true;
    }
	


	public function getJen(){
        return $this->db->get('tb_dok_jenis')->result_array();
    }
    public function inJen($data){
        $path = './assets/kategori/';

        if (isset($data['id'])) {
      
            $dats = array(
                'nama_jenis' 	=> $data['jenis'],
                'keterangan'	=> $data['keterangan'], 
                );
            $this->db->where('id', $data['id']);
            $this->db->update('tb_dok_jenis', $dats);

            return true;
        }else{
            $dats = array(
                'nama_jenis' 	=> $data['jenis'],
                'keterangan'    => $data['keterangan'], 
            );
            $this->db->insert('tb_dok_jenis', $dats);
            $id = $this->db->insert_id();
            if($id){
                if (!is_dir($path.$id)){
                mkdir($path.$id,0777, TRUE);
                return true;

             }else{
                  return false;
             }
            return false;
            }
          
        }
        return false;

    }


    public function hpsJen($id){
        $path = './assets/kategori/';
        rmdir($path.$id);
        $this->db->where('id', $id);
        $this->db->delete('tb_dok_jenis');
        return true;
    }
    public function hpsKat($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_dok_kategori');
        return true;
    }
   
    public function getKat(){
        return $this->db->get('tb_dok_kategori')->result_array();
    }

    public function inKat($data){
        if (isset($data['id'])) {
      
            $dats = array(

                'nama_kategori' => $data['kategori'],
                'keterangan'    => $data['keterangan'], 
                );
            $this->db->where('id', $data['id']);
            $this->db->update('tb_dok_kategori', $dats);

            return true;
        }else{
            $dats = array(

                'nama_kategori' => $data['kategori'],
                'keterangan'    => $data['keterangan'], 
            );
            $this->db->insert('tb_dok_kategori', $dats);
          
            return true;
            }
        return false;
          
        }



    public function getAllDok(){
        $this->db->select('
        	*,
            a.id as iddok, 
            ');
        $this->db->from('tb_dok a');
        $this->db->join('tb_dok_jenis b', 'b.id = a.id_jen', 'left');
        $this->db->join('tb_dok_kategori c', 'c.id = a.id_kat', 'left');
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->result_array();
    }

    public function getDokById($data){
    	$this->db->select('
        	*,
            a.id as iddok, 
            ');
        $this->db->from('tb_dok a');
        $this->db->join('tb_dok_jenis b', 'b.id = a.id_jen', 'left');
        $this->db->join('tb_dok_kategori c', 'c.id = a.id_kat', 'left');
        $this->db->where('a.status', 1);
        $this->db->where('a.id', $data);
        $this->db->order_by('a.id', 'desc');
        return $this->db->get()->row_array();
    }

    public function getTrans(){

    	$this->db->select('*,a.harga as hargas, c.judul_dok as judul, a.status as statuss, a.id as id_t');
    	$this->db->from('tb_transaksi a');
    	$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
    	$this->db->join('tb_dok c', 'c.id = a.id_dok', 'left');
    	$this->db->order_by('a.id', 'desc');
    	return $this->db->get()->result_array();
    }

    public function TransEdit($data){
    	$time = date('Y-m-d H:i:s',strtotime(date("Y-m-d H:i:s")." +29 days"));
    	$set = array(
    		'status' 	=> $data['status'],
    		'exp_down' 	=> $time,
    		);
    	$this->db->where('id', $data['id']);
    	$this->db->update('tb_transaksi', $set);

    	if ($data['status']==1) {
    		$result = array(
    			'result' => true,
    			'exp'	=> $time, 
    			);
    		return $result;
    	}else{
    			$result = array(
    			'result' => false,
    			 
    			);
    		return $result;
    	}

    }

    public function getUserTrans($data){
    	$this->db->select('*');
    	$this->db->from('tb_transaksi a');
    	$this->db->join('tb_user b', 'b.id = a.id_user', 'left');
    	$this->db->where('a.id', $data['id']);
    	return $this->db->get()->row_array();
    }

    public function TransDel($id){

    	$this->db->where('id', $id);
    	$del = $this->db->delete('tb_transaksi');

    	if ($del) {
			return true;
		}else{
			return false;
		}
    }

    public function TransDelBatch($data){
    	$this->db->where_in('id', $data);
		$del = $this->db->delete('tb_transaksi');

		if ($del) {
			return true;
		}else{
			return false;
		}
    }

    public function TransDetailById($id){
    	$this->db->select('*,a.harga as hargas, c.judul_dok as judul, a.status as statuss, a.id as id_t');
    	$this->db->from('tb_transaksi a');
    	$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
    	$this->db->join('tb_dok c', 'c.id = a.id_dok', 'left');
    	$this->db->where('a.id_transaksi', $id);
    	return $this->db->get()->row_array();
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
    	$this->db->or_where('c.status_', 0);
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

    public function get_notif(){
    	$id = $this->session->userdata('idAuth');
    	$this->db->select('count(id) as notif');
    	$this->db->from('tb_message_rep');
    	$this->db->where('status_v', 0);
    	$this->db->where('id_user_to_', $id);
    	return $this->db->get()->row_array();
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

	//ebook
	 
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
}
/* End of file model_admdbin.php */
/* Location: ./application/models/model_admin.php */