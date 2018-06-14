<?php

class model extends CI_Model {
    
    public $auth;
    
    function __construct() {
        parent::__construct();
    }

    public function getFlow() {
        $this->db->select('*');
        $this->db->from('eu_transaksi');
        $this->db->join('eu_akun', 'eu_akun.kode_akun = eu_transaksi.kode_akun','left');
        $this->db->join('eu_kategori', 'eu_kategori.kode_kategori = eu_transaksi.kode_kategori','left');
        $this->db->join('eu_komponen', 'eu_komponen.kode_komponen = eu_transaksi.kode_komponen','left');
        $this->db->join('eu_client', 'eu_client.id = eu_transaksi.client', 'left');
        $this->db->order_by('eu_transaksi.id_transaksi', 'desc');
        $G = $this->db->get();
        if ($G->num_rows() > 0) {
            $result = $G->result_array();
            return $result;
        } 
        return array();
    }

    public function getAkun() {
        $this->db->select('kode_akun,nama_akun');
        $this->db->from('eu_akun');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
       return array();
    }


    public function getKator() {
        $this->db->select('kode_kategori,nama_kategori');
        $this->db->from('eu_kategori');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return array();
    }

   

    public function getKom() {
        $this->db->select('kode_komponen,nama_komponen');
        $this->db->from('eu_komponen');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return array();
    }

   
    public function getClient(){
        $this->db->select('*');
        $this->db->from('eu_client');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return array();
    }
   

    public function getGroup(){
        $this->db->select('*');
        $this->db->from('eu_group_akun');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return array();
    }

    public function select_transaksi_max_id(){
        $this->db->select(array(
            'max(id_transaksi) as max_id'
        ),false);
        return $this->db->get('eu_transaksi',1)->row_array();
    }


    public function _income($data) {
    
        $this->db->select('saldo_smtr');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result = $this->db->get()->row_array();
         
        $this->db->select('saldo');
        $this->db->where('kode_akun', $data['nama_akun']);
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result2 = $this->db->get()->row_array();
            

        $a = $this->db->insert('eu_transaksi',array(
                'tanggal'       => date('Y-m-d', strtotime($data['tanggal'])),
                'kode_akun'     => $data['nama_akun'],
                'kode_kategori' => $data['nama_kategori'],
                'debet'         => $data['nominal'],
                'kode_komponen' => $data['nama_komponen'],
                'client'        => $data['client'],
                'note'          => $data['note']            
            ));

        $id =  $this->db->insert_id();
        $add = ((int)$result['saldo_smtr'] + $data['nominal']);
        $add2 = ((int)$result2['saldo'] + $data['nominal']);
        
        $this->db->set('saldo_smtr', $add); 
        $this->db->set('saldo', $add2); 
        $this->db->where('id_transaksi', $id);
        $this->db->update('eu_transaksi');         
            
            return true;
        }


        public function _expense($data) {
        
        $this->db->select('saldo_smtr');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result = $this->db->get()->row_array();

        $this->db->select('saldo');
        $this->db->where('kode_akun', $data['nama_akun']);
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result2 = $this->db->get()->row_array();
            
        $a = $this->db->insert('eu_transaksi',array(
                'tanggal'       => date('Y-m-d', strtotime($data['tanggal'])),
                'kode_akun'     => $data['nama_akun'],
                'kode_kategori' => $data['nama_kategori'],
                'kredit'        => $data['nominal'],
                'kode_komponen' => $data['nama_komponen'],
                'client'        => $data['client'],
                'note'          => $data['note']            
            ));

        $id =  $this->db->insert_id();
        $add = ((int)$result['saldo_smtr'] - $data['nominal']);
        $add2 = ((int)$result2['saldo'] - $data['nominal']);

        $this->db->set('saldo_smtr', $add); 
        $this->db->set('saldo', $add2);
        $this->db->where('id_transaksi', $id);
        $this->db->update('eu_transaksi');         
            
            return true;

    }

     public function _transfer1($data) {
    
        $this->db->select('saldo_smtr');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result = $this->db->get()->row_array();

        $this->db->select('saldo');
        $this->db->where('kode_akun', $data['from_akun']);
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result2 = $this->db->get()->row_array();
            
        $a = $this->db->insert('eu_transaksi',array(
                'tanggal'       => date('Y-m-d', strtotime($data['tanggal'])),
                'kode_akun'     => $data['from_akun'],
                'kredit'        => $data['nominal'],
                'kode_komponen' => $data['nama_komponen'],
                'client'        => $data['client'],
                'note'          => $data['note']            
            ));

        $id =  $this->db->insert_id();
        $add = ((int)$result['saldo_smtr'] - $data['nominal']);
        $add2 = ((int)$result2['saldo'] - $data['nominal']);

        $this->db->set('saldo_smtr', $add); 
        $this->db->set('saldo', $add2);
        $this->db->where('id_transaksi', $id);
        $this->db->update('eu_transaksi');         
            
            return true;

        }
        
        public function _transfer2($data) {
          

        $this->db->select('saldo_smtr');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result = $this->db->get()->row_array();
         
        $this->db->select('saldo');
        $this->db->where('kode_akun', $data['to_akun']);
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result2 = $this->db->get()->row_array();
            

        $a = $this->db->insert('eu_transaksi',array(
                'tanggal'       => date('Y-m-d', strtotime($data['tanggal'])),
                'kode_akun'     => $data['to_akun'],
                'debet'         => $data['nominal'],
                'kode_komponen' => $data['nama_komponen'],
                'client'        => $data['client'],
                'note'          => $data['note']            
            ));

        $id =  $this->db->insert_id();
        $add = ((int)$result['saldo_smtr'] + $data['nominal']);
        $add2 = ((int)$result2['saldo'] + $data['nominal']);
        
        $this->db->set('saldo_smtr', $add); 
        $this->db->set('saldo', $add2); 
        $this->db->where('id_transaksi', $id);
        $this->db->update('eu_transaksi');         
            
            return true;

    }

    public function _update($data) {

        $this->db->where('id_transaksi', $data['id']);
        $this->db->delete('eu_transaksi');

            
        $debet = str_replace("Rp","", $data['debet']);
        $debet = str_replace(".", "", $debet);  

        if ($debet > 0) {

        $this->db->select('saldo_smtr');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result = $this->db->get()->row_array();
         
        $this->db->select('saldo');
        $this->db->where('kode_akun', $data['nama_akun']);
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result2 = $this->db->get()->row_array();
        

        $a = $this->db->insert('eu_transaksi',array(
                'tanggal'       => date('Y-m-d', strtotime($data['tanggal'])),
                'kode_akun'     => $data['nama_akun'],
                'kode_kategori' => $data['nama_kategori'],
                'debet'         => $debet,
                'kode_komponen' => $data['nama_komponen'],
                'client'        => $data['client'],
                'note'          => $data['note']            
            ));

        $id =  $this->db->insert_id();
        $add = ((int)$result['saldo_smtr'] + $debet);
        $add2 = ((int)$result2['saldo'] + $debet);
        
        $this->db->set('saldo_smtr', $add); 
        $this->db->set('saldo', $add2); 
        $this->db->where('id_transaksi', $id);
        $this->db->update('eu_transaksi');         
            
            return true;

        } else {

        $this->db->select('saldo_smtr');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result = $this->db->get()->row_array();

        $this->db->select('saldo');
        $this->db->where('kode_akun', $data['nama_akun']);
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $result2 = $this->db->get()->row_array();

        $kredit  = str_replace("Rp", "", $data['kredit']);
        $kredit  = str_replace(".", "", $kredit);
            
        $a = $this->db->insert('eu_transaksi',array(
                'tanggal'       => date('Y-m-d', strtotime($data['tanggal'])),
                'kode_akun'     => $data['nama_akun'],
                'kode_kategori' => $data['nama_kategori'],
                'kredit'        => $kredit,
                'kode_komponen' => $data['nama_komponen'],
                'client'        => $data['client'],
                'note'          => $data['note']            
            ));

        $id =  $this->db->insert_id();
        $add = ((int)$result['saldo_smtr'] - $kredit);
        $add2 = ((int)$result2['saldo'] - $kredit);

        $this->db->set('saldo_smtr', $add); 
        $this->db->set('saldo', $add2);
        $this->db->where('id_transaksi', $id);
        $this->db->update('eu_transaksi');         
            
            return true;
        }
    
}


    public function _delete($id) {

       $this->db->where('id_transaksi', $id);
       $this->db->delete('eu_transaksi');

        return true;
    }

    public function getDataById($id) {
        $this->db->where('id',$id);
        $Q = $this->db->get('eu_transaksi');
        if($Q->num_rows() > 0){
            return $Q->row_array();
        }
        
        return false;
    }

/*Detail Akun */

    public function detail_akun(){
        $this->db->select('*');
        $this->db->from('eu_akun');
        $get = $this->db->get()->result_array();
        return $get;

    }

    public function data_akun($kode_akun){
        $this->db->select(array(
            '*,a.id_transaksi as ida',
            'a.debet as adebet',
            'a.kredit as akredit',
            'a.saldo as asaldo'
        ),FALSE);
        $this->db->from('eu_transaksi a');
        $this->db->join('eu_akun b', 'b.kode_akun = a.kode_akun','left');
        $this->db->join('eu_kategori c', 'c.kode_kategori = a.kode_kategori','left');
        $this->db->join('eu_komponen d', 'd.kode_komponen = a.kode_komponen','left');
        $this->db->where('a.kode_akun', $kode_akun);
        $this->db->order_by('a.id_transaksi', 'desc');
        $G = $this->db->get();
        if ($G->num_rows() > 0) {
            $result = $G->result_array();
            return $result;
        }else {
            return array();
        }
    }
    public function totalAkun($kode_akun){
        $this->db->select('saldo as saldo_akun',FALSE);
        $this->db->from('eu_transaksi');
        $this->db->where('kode_akun', $kode_akun);
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $G = $this->db->get();
        if ($G->num_rows() > 0) {
            $result = $G->result_array();
            return $result;
        }else {
            return array();
            }
    }
   
    

    /*PROJECT AND SERVICE*/
    public function Kategori($kode_kategori) {
        $this->db->select(array(
            '*',
            'debet as adebet',
            'kredit as akredit'
        ),FALSE);
        $this->db->from('eu_transaksi a');
        $this->db->join('eu_akun', 'eu_akun.kode_akun = a.kode_akun','left');
        $this->db->join('eu_kategori', 'eu_kategori.kode_kategori = a.kode_kategori','left');
        $this->db->join('eu_komponen', 'eu_komponen.kode_komponen = a.kode_komponen','left');
        $this->db->where('a.kode_kategori',$kode_kategori);
        $this->db->order_by('a.id_transaksi', 'desc');
        $G = $this->db->get();
        if ($G->num_rows() > 0) {
            $result = $G->result_array();
            return $result;
        }else {
            return array();
        }
    
    }


    public function salKator($kode_kategori){
        $this->db->select_sum('debet','totdebet');
        $this->db->select_sum('kredit', 'totkredit');
        $this->db->where('kode_kategori', $kode_kategori);
        $this->db->from('eu_transaksi');
      return  $a = $this->db->get()->result_array();
        
      //   $this->db->where('kode_kategori', $kode_kategori);
      //   $this->db->from('eu_transaksi');
      // return  $b = $this->db->get()->result_array();

      //   $c = ((int)$a['totdebet']-$b['totkredit']);

      //   if($c){
      //       return array('asd' => $c);
      //   }
      //   else{
      //       return array();
      //   }

    }

    public function totalSaldo(){
        $this->db->select('saldo_smtr');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $this->db->from('eu_transaksi');
        $G = $this->db->get();
        if ($G->num_rows() > 0) {
            $result = $G->result_array();
            return $result;
        }else {
            return array();
        }

    }


     
    

    



/*CRUD MASTER*/

    public function addAkun($data){
        $this->db->insert('eu_akun',$data);
            return $this->db->insert_id();
    }
    public function gakun(){
        $this->db->select('*,a.id as id_akun');
        $this->db->from('eu_akun a');
        $this->db->join('eu_group_akun b', 'b.kode_group = a.kode_group', 'left');
        return $this->db->get()->result_array();
    }
    public function editAkun($data,$id){
        $this->db->where('id', $id);
        return $this->db->update('eu_akun', $data);

    }
    public function delAkun($id){
        $this->db->where('id', $id);
        $this->db->delete('eu_akun');
        return true;
    }



    public function addKator($data){
        $this->db->insert('eu_kategori',$data);
            return $this->db->insert_id();
    } 
    public function gkator(){
        return $this->db->get('eu_kategori')->result_array();
    }
    public function editKator($data,$id){
        $this->db->where('id', $id);
        return $this->db->update('eu_kategori', $data);

    }
    public function delKator($id){
        $this->db->where('id', $id);
        $this->db->delete('eu_kategori');
        return true;
    }



    public function addKom($data){
        $this->db->insert('eu_komponen',$data);
            return $this->db->insert_id();
    }
    public function gkom(){
       $this->db->select('*,a.id as id_komponen');
        $this->db->from('eu_komponen a');
        $this->db->join('eu_kategori b', 'b.kode_kategori = a.kode_kategori_kmp', 'left');
        return $this->db->get()->result_array();
    }
    public function editKom($data,$id){
        $this->db->where('id', $id);
        return $this->db->update('eu_komponen', $data);

    }
    public function delKom($id){
        $this->db->where('id', $id);
        $this->db->delete('eu_komponen');
        return true;
    }



    public function addClient($data){
        $this->db->insert('eu_client',$data);
            return $this->db->insert_id();
    }
    public function gclient(){
       return $this->db->get('eu_client')->result_array();
    }
 
    public function editClient($data,$id){
        $this->db->where('id', $id);
        return $this->db->update('eu_client', $data);

    }
    public function delClient($id){
        $this->db->where('id', $id);
        $this->db->delete('eu_client');
        return true;
    }


   /*REKAP*/

   public function cariRek($data){
    $this->db->select('*');
    $this->db->from('eu_transaksi');
    $this->db->join('eu_akun', 'eu_akun.kode_akun = eu_transaksi.kode_akun','left');
    $this->db->join('eu_kategori', 'eu_kategori.kode_kategori = eu_transaksi.kode_kategori','left');
    $this->db->join('eu_komponen', 'eu_komponen.kode_komponen = eu_transaksi.kode_komponen','left');
    $this->db->join('eu_client', 'eu_client.id = eu_transaksi.client', 'left');
    $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($data['start'])). '" and "'. date('Y-m-d', strtotime($data['end'])).'"');
    $this->db->order_by('eu_transaksi.id_transaksi', 'asc');
    $db = $this->db->get();
    if ($db->num_rows() > 0) {
        $result = $db->result_array();
        return $result;   
    }else{
        return array();
    }
   }
}
