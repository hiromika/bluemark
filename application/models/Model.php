<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function __construct(){
		parent::__construct();

		
	}
	
	public function Ceklogin($data){

		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('username', $data['username']);
		$this->db->where('password', MD5($data['password']));
		$db = $this->db->get();

		if ($db->num_rows() > 0) {
			$result = $db->row_array();
			return $result;
		}else{
			return false;
		}
	}

	public function destroy(){
		$this->session->sess_destroy();
	}

	// public function inUser($data){

	// $this->db->select('username');
	// $this->db->from('tb_user');
	// $this->db->where('username', $data['username']);
	// $cek =  $this->db->get();
	// 	if ($cek->num_rows()>0) {
	// 		return false;
	// 	}else{

	// 	$this->db->insert('tb_user',array(
	// 		'username' 	=>  $data['username'],
	// 		'password'	=>	md5($data['password']),
	// 		'full_name'	=> 	$data['fullname'],
	// 		'level'		=> 	'2'
	// 		));
	// 	$id=$this->db->insert_id();

	// 	$this->db->insert('detail_user', array(
	// 		'id_user' 	=> $id,
	// 		'kode_user'	=> $id,
	// 		'nama'	=> $data['fullname'],
	// 		'email'	=> $data['email'],
	// 		));
	// 	return true;
	// 	}
	// }


	public function getEvents(){
		$this->db->order_by('id', 'desc');
		return	$this->db->get('tb_event',3)->result_array();
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

	public function getView($idf){
		$this->db->where('id_forum', $idf);
		return $this->db->get('tb_forum_statistik')->num_rows();
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

	public function getForum(){
		$this->db->select('*,a.id as idf');
		$this->db->from('tb_forum a');
		$this->db->join('detail_user b', 'b.id_user = a.id_user', 'left');
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->result_array();
	}

	public function getEventall(){
		$this->db->order_by('id', 'desc');
		return	$this->db->get('tb_event')->result_array();
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

	public function getEventDetail($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_event')->row_array();
	}

	public function checked($id,$ida){
		$this->db->where('id_user', $ida);
		$this->db->where('id_event', $id);
		return $this->db->get('tb_kelas_terdaftar')->result_array();
		
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
		$this->db->select('*');
		$this->db->from('tb_dok a');
		$this->db->join('tb_dok_kategori b', 'b.id = a.id_kat', 'left');
		$this->db->where('a.status', 1);
		$this->db->where('a.id', $id);
		return $this->db->get()->row_array();
	}


}

?>