<?php 

class References extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('m_references','_references');       
        $this->layout->addScript('/assets/'.strtolower(__CLASS__).'/js/script.js');
    }

    public function install() {

        $status = true;
        $msg = 'Successfull';
        
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }

    public function uninstall() {
        
        $status = true;
        $msg = "Gagal melakukan proses uninstall";
        if($status) $msg = "Berhasil melakukan uninstall module";
        return array("status"=>$status,"msg"=>$msg);
    }

    /* ============================== 
     * --------- Taxonomy -----------
     * ============================== */

    public function taxonomy(){
        $this->layout->set_header('Taksonomi');

        $content = $this->load->view('taxonomy',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }    

    public function get_taxonomy_list(){
        $table = 'dm_taxonomy';
        $primaryKey = 'id';
        $columns = array(
                    array(
                        'db' => '`tx`.`id`', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => '`tx`.`id`', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => '`tx`.`name`', 'dt' => 2, 'field' => 'name' ),
                    array( 'db' => '`tx`.`description`', 'dt' => 3, 'field' => 'description' ),
                    array( 'db' => '(SELECT name FROM dm_taxonomy WHERE id = `tx`.`parent`)', 'dt' => 4, 'field' => 'parent_name', 'as' => 'parent_name' ),
                    array( 'db' => '(SELECT count(id) FROM dm_term WHERE taxonomy_id = `tx`.`id`)', 'dt' => 5, 'field' => 'term_count', 'as' => 'term_count' ),
                    array(
                        'db' => '`tx`.`id`', 
                        'dt' => 6,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_taxonomy" class="btn btn-default btn-sm" onclick="showTxUpdateModal('.$d.')">Edit</a>
                                        <a data-acl="view_taxonomy_term" href="terms/'.$d.'" class="btn btn-default btn-sm">List term</a>';
                            },
                        'field' => 'id'
                    )
            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');

        $joinQuery = "FROM `{$table}` AS `tx`";

        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
        );
    }

    public function edit_taxonomy(){
        $id = $this->input->post('tid');
        $data = $this->_references->get_taxonomy_by_id($id);
        echo json_encode($data['items']);
    }

    public function get_form_tx_parent_item(){
        $id = 0;
        $id = $this->input->post('tid');

        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'id, name';
        $where ='';

        if($id > 0){ $where = 'id != ' . $id; }

        $data = $this->_references->get_tx_parent_item($fields, $where);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }

    public function save_taxonomy(){
        if(strlen($this->input->post('tx_id')) > 0){
            $save = $this->_references->update_taxonomy($this->input->post());
        }else{
            $save = $this->_references->add_taxonomy($this->input->post());
        }

        echo $save;
        //after save success
    }

    public function delete_taxonomy($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        // echo $tid;
        $this->_references->delete_taxonomy($id);
    }

    /* ============================== 
     * ----------- Terms ------------
     * ============================== */

    public function terms($txid){
        $data = array();
        if($txid){
            $check_tx = $this->_references->get_taxonomy_by_id($txid);

            $data['taxonomy'] = array('id' => $txid, 'name' => $check_tx['items']['name'], 'description' => $check_tx['items']['description']);
        }

        $this->layout->set_header('Term Taksonomi');

        $content = $this->load->view('terms',$data,true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function edit_term(){
        $id = $this->input->post('trmid');
        $data = $this->_references->get_term_by_id($id);
        echo json_encode($data['items']);
    }

    public function get_term_list($txid){
        $table = 'dm_term';
        $primaryKey = 'id';

        $columns = array(
                    array(
                        'db' => 'id', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => 'id', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => 'label', 'dt' => 2, 'field' => 'label' ),
                    array(
                        'db' => 'id', 
                        'dt' => 3,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_taxonomy_term" class="btn btn-default btn-sm" onclick="showTrmUpdateModal('.$d.')">Edit</a>';
                            },
                        'field' => 'id'
                    )

            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');

        $joinQuery = "FROM ".$table;
        $extraCondition = "taxonomy_id=".$txid;

        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition )
        );
    }

    public function save_term(){
        if(strlen($this->input->post('trm_id')) > 0){
            $save = $this->_references->update_term($this->input->post());
        }else{
            $save = $this->_references->add_term($this->input->post());
        }

        echo $save;
    }

    public function delete_term($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_references->delete_term($id);
    }

    /* ============================== 
     * ------- Business Unit --------
     * ============================== */

    public function unit_kerja(){
        $this->layout->set_header('Unit Kerja');

        $content = $this->load->view('unit_kerja',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function edit_unit(){
        $id = $this->input->post('untid');
        $data = $this->_references->get_unit_by_id($id);
        echo json_encode($data['items']);
    }

    public function get_unit_list(){
        $table = 'dm_unit';
        $primaryKey = 'id';

        $columns = array(
                    array(
                        'db' => '`u`.`id`', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => '`u`.`id`', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => '`u`.`initial`', 'dt' => 2, 'field' => 'initial' ),
                    array( 'db' => '`u`.`name`', 'dt' => 3, 'field' => 'name' ),
                    array( 'db' => '(SELECT name FROM dm_unit WHERE id = `u`.`parent`)', 'dt' => 4, 'field' => 'parent_name', 'as' => 'parent_name' ),
                    array(
                        'db' => '`u`.`id`', 
                        'dt' => 5,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_unit" class="btn btn-default btn-sm" onclick="showUntUpdateModal('.$d.')">Edit</a>';
                            },
                        'field' => 'id'
                    )
            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');

        $joinQuery = "FROM `{$table}` AS `u`";

        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
        );
    }

    public function get_form_unt_parent_item(){
        $id = 0;
        $id = $this->input->post('untid');

        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'id, initial, name';
        $where ='';

        if($id > 0){ $where = 'id != ' . $id; }

        $data = $this->_references->get_unt_parent_item($fields, $where);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }

    public function save_unit(){
        if(strlen($this->input->post('unt_id')) > 0){
            $save = $this->_references->update_unit($this->input->post());
        }else{
            $save = $this->_references->add_unit($this->input->post());
        }

        echo $save;
    }

    public function delete_unit($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_references->delete_unit($id);
    }

    /* ============================== 
     * --------- Doc Type -----------
     * ============================== */

    public function tipe_dokumen(){
        $this->layout->set_header('Tipe Dokumen');

        $content = $this->load->view('tipe_dokumen',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function edit_doc_type(){
        $id = $this->input->post('dtyid');
        $data = $this->_references->get_dty_by_id($id);
        echo json_encode($data['items']);
    }

    public function get_doc_type_list(){
        $table = 'dm_doc_type';
        $primaryKey = 'id';        

        $columns = array(
                    array(
                        'db' => '`d`.`id`', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => '`d`.`id`', 'dt' => 1, 'field' => 'id' ),                  
                    array( 'db' => '`d`.`name`', 'dt' => 2, 'field' => 'name' ),
                    array( 'db' => '(SELECT name FROM dm_doc_type WHERE id = `d`.`parent`)', 'dt' => 3, 'field' => 'parent_name', 'as' => 'parent_name' ),                    
                    array( 'db' => '(SELECT name FROM dm_unit WHERE id = `d`.`unit_id`)', 'dt' => 4, 'field' => 'unit_name', 'as' => 'unit_name' ),
                    array(
                        'db' => '`d`.`id`', 
                        'dt' => 5,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_doc_type" class="btn btn-default btn-sm" onclick="showDTUpdateModal('.$d.')">Edit</a>';
                            },
                        'field' => 'id'
                    )
            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');

        $joinQuery = "FROM `{$table}` AS `d`";
        // $joinQuery = "FROM `{$table}` AS `d` LEFT JOIN `dm_unit` AS `u` ON (`d`.`unit_id` = `u`.`id`)";

        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
        );
    }

    public function get_form_dty_parent_item(){
        $id = 0;
        $id = $this->input->post('dtyid');

        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'id, name';
        $where ='';

        if($id > 0){ $where = 'id != ' . $id; }

        $data = $this->_references->get_dty_parent_item($fields, $where);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }

    public function get_form_dty_unit(){
        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'id, initial, name';

        $data = $this->_references->get_dty_unit($fields);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }

    public function save_doc_type(){
        if(strlen($this->input->post('dty_id')) > 0){
            $save = $this->_references->update_doc_type($this->input->post());
        }else{
            $save = $this->_references->add_doc_type($this->input->post());
        }

        echo $save;
    }

    public function delete_doc_type($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_references->delete_doc_type($id);
    }

    /* ============================== 
     * ---------- Archive -----------
     * ============================== */

    public function arsip(){
        $this->layout->set_header('Arsip');

        $content = $this->load->view('archive',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function edit_archive(){
        $id = $this->input->post('acid');
        $data = $this->_references->get_archive_by_id($id);
        echo json_encode($data['items']);
    }

    public function get_archive_list(){
        $table = 'dm_archive';
        $primaryKey = 'id';

        $columns = array(
                    array(
                        'db' => 'id', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => 'id', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => 'code', 'dt' => 2, 'field' => 'code' ),
                    array( 'db' => 'building_name', 'dt' => 3, 'field' => 'building_name' ),
                    array( 'db' => 'building_address', 'dt' => 4, 'field' => 'building_address' ),
                    array( 'db' => 'floor', 'dt' => 5, 'field' => 'building_address' ),
                    array( 'db' => 'room', 'dt' => 6, 'field' => 'room' ),
                    array( 'db' => 'rack', 'dt' => 7, 'field' => 'rack' ),
                    array( 'db' => 'box', 'dt' => 8, 'field' => 'box' ),
                    array(
                        'db' => 'id', 
                        'dt' => 9,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_archive" class="btn btn-default btn-sm" onclick="showACUpdateModal('.$d.')">Edit</a>';
                            },
                        'field' => 'id'
                    )
            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');


        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
        );

    }

    public function save_archive(){
        if(strlen($this->input->post('ac_id')) > 0){
            $save = $this->_references->update_archive($this->input->post());
        }else{
            $save = $this->_references->add_archive($this->input->post());
        }

        echo $save;
    }

    public function delete_archive($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_references->delete_archive($id);
    }

    /* ============================== 
     * --------- Province -----------
     * ============================== */

    public function province(){
        $this->layout->set_header('Provinsi');

        $content = $this->load->view('province',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function get_province_list(){
        $table = 'dm_province';
        $primaryKey = 'id';

        $columns = array(
                    array(
                        'db' => '`pv`.`id`', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => '`pv`.`id`', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => '`pv`.`code`', 'dt' => 2, 'field' => 'code' ),
                    array( 'db' => '`pv`.`name`', 'dt' => 3, 'field' => 'name' ),
                    array( 'db' => '(SELECT count(id) FROM dm_city WHERE province_id = `pv`.`code`)', 'dt' => 4, 'field' => 'city', 'as' => 'city' ),
                    array(
                        'db' => '`pv`.`id`', 
                        'dt' => 5,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_province" class="btn btn-default btn-sm" onclick="showPVUpdateModal('.$d.')">Edit</a>';
                            },
                        'field' => 'id'
                    )
            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');

        $joinQuery = "FROM `{$table}` AS `pv`";

        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
        );
    }

    public function save_province(){
        if(strlen($this->input->post('pv_id')) > 0){
            $save = $this->_references->update_province($this->input->post());
        }else{
            $save = $this->_references->add_province($this->input->post());
        }

        echo $save;
    }

     public function edit_province(){
        $id = $this->input->post('pvid');
        $data = $this->_references->get_province_by_id($id);
        echo json_encode($data['items']);
    }

    public function delete_province($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_references->delete_province($id);
    }

    /* ============================== 
     * ----------- City -------------
     * ============================== */

    public function city(){
        $this->layout->set_header('Kota/Kab.');

        $content = $this->load->view('city',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function get_form_ct_province_item(){
        $id = 0;
        $id = $this->input->post('pvcode');

        $result = array('code' => 0, 'name' => 'No item available');

        $fields = 'code, name';
        $where ='';

        if($id > 0){ $where = 'code != ' . $id; }

        $data = $this->_references->get_ct_province_item($fields, $where);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }

     public function get_city_list(){
        $table = 'dm_city';
        $primaryKey = 'id';

        $columns = array(
                    array(
                        'db' => '`ct`.`id`', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => '`ct`.`id`', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => '`ct`.`code`', 'dt' => 2, 'field' => 'code' ),
                    array( 'db' => '`ct`.`name`', 'dt' => 3, 'field' => 'name' ),
                    array( 'db' => '(SELECT name FROM dm_province WHERE code = `ct`.`province_id`)', 'dt' => 4, 'field' => 'province', 'as' => 'province' ),
                    array(
                        'db' => '`ct`.`id`', 
                        'dt' => 5,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_city" class="btn btn-default btn-sm" onclick="showCTUpdateModal('.$d.')">Edit</a>';
                            },
                        'field' => 'id'
                    )
            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');

        $joinQuery = "FROM `{$table}` AS `ct`";

        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
        );
    }

    public function save_city(){
        if(strlen($this->input->post('ct_id')) > 0){
            $save = $this->_references->update_city($this->input->post());
        }else{
            $save = $this->_references->add_city($this->input->post());
        }

        echo $save;
    }

     public function edit_city(){
        $id = $this->input->post('ctid');
        $data = $this->_references->get_city_by_id($id);
        echo json_encode($data['items']);
    }

    public function delete_city($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_references->delete_city($id);
    }

    /* ============================== 
     * --------- Dog Cat ------------
     * ============================== */

    public function doc_category(){
        $this->layout->set_header('Kategori Dokumen');

        $content = $this->load->view('doc_category',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function edit_doc_cat(){
        $id = $this->input->post('dcid');
        $data = $this->_references->get_doc_cat_by_id($id);
        echo json_encode($data['items']);
    }

    public function get_doc_cat_list(){
        $table = 'dm_doc_cat';
        $primaryKey = 'id';

        $columns = array(
                    array(
                        'db' => 'id', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => 'id', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => 'name', 'dt' => 2, 'field' => 'name' ),
                    array(
                        'db' => 'id', 
                        'dt' => 3,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_doc_cat" class="btn btn-default btn-sm" onclick="showDCUpdateModal('.$d.')">Edit</a>';
                            },
                        'field' => 'id'
                    )
            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');


        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
        );

    }

    public function save_doc_cat(){
        if(strlen($this->input->post('dc_id')) > 0){
            $save = $this->_references->update_doc_cat($this->input->post());
        }else{
            $save = $this->_references->add_doc_cat($this->input->post());
        }

        echo $save;
    }

    public function delete_doc_cat($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_references->delete_doc_cat($id);
    }

    /* ============================== 
     * ----------- Ruas -------------
     * ============================== */

    public function ruas(){
        $this->layout->set_header('Ruas');

        $content = $this->load->view('ruas',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function get_form_rs_province_item(){
        $id = 0;
        $id = $this->input->post('pvcode');

        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'id, name';
        $where ='';

        if($id > 0){ $where = 'id != ' . $id; }

        $data = $this->_references->get_rs_province_item($fields, $where);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }

    public function get_ruas_list(){
        $table = 'dm_ruas';
        $primaryKey = 'id';

        $columns = array(
                    array(
                        'db' => '`rs`.`id`', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => '`rs`.`id`', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => '`rs`.`link_id`', 'dt' => 2, 'field' => 'link_id' ),
                    array( 'db' => '(SELECT name FROM dm_province WHERE id = `rs`.`province_id`)', 'dt' => 3, 'field' => 'province', 'as' => 'province' ),
                    array( 'db' => '`rs`.`ruas_code`', 'dt' => 4, 'field' => 'ruas_code' ),
                    array( 'db' => '`rs`.`description_code`', 'dt' => 5, 'field' => 'description_code' ),
                    array( 'db' => '`rs`.`name`', 'dt' => 6, 'field' => 'name' ),
                    array( 'db' => '`rs`.`length`', 'dt' => 7, 'field' => 'length' ),
                    array(
                        'db' => '`rs`.`id`', 
                        'dt' => 8,
                        'formatter' => function( $d, $row){
                                return '<a data-acl="edit_ruas" class="btn btn-default btn-sm" onclick="showRSUpdateModal('.$d.')">Edit</a>';
                            },
                        'field' => 'id'
                    )
            );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        
        $this->load->library('edtssp');

        $joinQuery = "FROM `{$table}` AS `rs`";

        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery )
        );
    }

    public function save_ruas(){
        if(strlen($this->input->post('rs_id')) > 0){
            $save = $this->_references->update_ruas($this->input->post());
        }else{
            $save = $this->_references->add_ruas($this->input->post());
        }

        echo $save;
    }

     public function edit_ruas(){
        $id = $this->input->post('rsid');
        $data = $this->_references->get_ruas_by_id($id);
        echo json_encode($data['items']);
    }

    public function delete_ruas($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_references->delete_ruas($id);
    }

}//end of class