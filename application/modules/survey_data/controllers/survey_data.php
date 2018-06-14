<?php 

class Survey_data extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('m_survey_data','_survey');       
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

    public function index(){
        $this->layout->set_header('Data dokumen');

        $content = $this->load->view('index',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }
    
    public function add($nid,$doctype){
        $ctid = $this->_survey->getContentType($nid);
        $document_types = $this->_survey->getDocumentType();
        $detail = $this->_survey->getNodeDetail($nid);
        $name = $detail[0]['value'];
        $ruas = $this->_survey->getRuas(); 
        echo $this->load->view('nodedetail',array('ruass' => $ruas,'units' => $this->_survey->getUnits(),'doctype' => $document_types,'name' => $name,'nodeid' => $nid, 'content_type_id' => $ctid, 'tipedocid' => $doctype));
    }
    
    public function jalan(){
    	$this->layout->set_header('Data Survey');

        $content = $this->load->view('list_jalan',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }

    public function nodelist($ctid,$parent,$dt) {
        
        $columns = $this->_survey->getColumns($ctid);
        $node = $this->_survey->getNodeName($parent);
        $doctype = $this->_survey->getDocType($dt);
        $units = $this->_survey->getUnits(); 
        $ruas = $this->_survey->getRuas(); 
        //var_dump($columns);die;
        echo $this->load->view('nodelist',array('ruas' => $ruas,'doc_type' => $this->_survey->getDocumentType(), 'units' => $units,'tipedocid' => $dt, 'tipedoc' => $doctype, 'nid' => $parent, 'name' => $node,'columns' => $columns,'content_type_id' => $ctid,'parent' => $parent));
    }
    
    public function nodedetail($id) {
        //default survey data for edit
        $svdata = '';

        $ctid = $this->_survey->getContentType($id);
        $next = $this->_survey->getChildContentType($ctid);
        $detail = $this->_survey->getNodeDetail($id);
        // $svdata = $this->_survey->getSurveyData($id);
        $document_types = $this->_survey->getDocumentType();
        $files = $this->_survey->getfiles($id);
        $name = $detail[0]['value'];
        echo $this->load->view('nodedetail',array('files' => $files,'units' => $this->_survey->getUnits(),'doctype' => $document_types,'name' => $name,'nodeid' => $id, 'content_type_id' => $ctid, 'child_content_type_id' => $next, 'detail' => $detail, 'svdata' => $svdata));
    }

    public function nodeedit($aid){
        //default survey data for edit
        $svdata = '';
        $svdata = $this->_survey->getSurveyData($aid);

        $ctid = $this->_survey->getContentType($svdata['node_id']);
        $next = $this->_survey->getChildContentType($ctid);
        
        $detail = $this->_survey->getNodeDetail($svdata['node_id']);
        $name = $detail[0]['value'];

        $ruas = $this->_survey->getRuas();

        $document_types = $this->_survey->getDocumentType();
        $files = $this->_survey->getfiles($aid);
        
        echo $this->load->view('nodedetail',array('aid' => $aid,'files' => $files,'units' => $this->_survey->getUnits(),'doctype' => $document_types,'name' => $name,'nodeid' => $svdata['node_id'], 'detail' => $detail, 'svdata' => $svdata, 'ruass'=>$ruas, 'tipedocid'=> $svdata['doc_type']));
    }
    
    public function get_tree_node() {
        
        $data = $this->_survey->get_tree_node();
        echo json_encode($data);
    }
    
    public function get_data_combo_taxonomy(){
        $id = 0;
        $id = $this->input->post('id');
        $select = $this->input->post('slct');

        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'id, label as name';
        $where ='';

        if($id > 0){ $where = 'taxonomy_id = ' . $id; }
        $data = $this->_survey->get_tx_parent_item($fields, $where, $select);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }
    
    public function get_data_combo_content(){
        $id = 0;
        $id = $this->input->post('id');
        $select = $this->input->post('slct');

        $result = array('id' => 0, 'name' => 'No item available');

        $fields = 'dm_node.id, attr_value as name';
        $where ='';

        if($id > 0){ $where = 'content_type_id = ' . $id; }
        $data = $this->_survey->get_node_parent_item($fields, $where, $select);

        if($data['total'] >= 0){
            $result = $data['items'];
        }

        echo json_encode($result);
    }
    
    public function get_doc_list($node,$type){
        $result = $this->_survey->get_doc_list($node,$type);
        
        echo json_encode($result);
    }
    
    public function get_survey_data($ct,$node) {
        $result = $this->_survey->get_node_list($node,$ct);
        
        echo json_encode($result);
    }
    
    public function save_survey_data() {
        $ct = $this->input->post('content_type_id');
        $parent = $this->input->post('parent');
        $data = $this->input->post();
        unset($data['content_type_id']);
        unset($data['parent']);
        
        $insert = $this->_survey->add_survey($data,$ct,$parent);
        
        echo $insert;
    }
    
    public function update_survey_data() {
        $data = $this->input->post();
        $update = $this->_survey->update_survey($data);
        
        echo $update;
    }
    
    public function delete_node($id) {
        
        $delete = $this->_survey->delete_node($id);
        echo $delete;
    }
    
    public function add_file($node) {
        $vars = array(
            'nodeid' => $node, 
            'doc_type' => $this->_survey->getDocumentType(),
            'doc_categories' => $this->_survey->getDocumentCategories(),
            'provinces' => $this->_survey->getProvinces(),
            'cities' => $this->_survey->getCities(),
            'units' => $this->_survey->getUnits(),
            'racks' => $this->_survey->getRacks()
        );
        $content = $this->load->view('add_file',$vars,true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }
    
    public function upload_file($nid) {
        
        $config['upload_path'] = './files/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('doc_file'))
        {
            $error = array('error' => $this->upload->display_errors());
            //var_dump($error);
        }
        else
        {
            $data = $this->upload->data('doc_file');
            
            $id = $this->_survey->setFile($nid,$data);
            
            echo '<li id="file-'.$id.'"><span><a href="'.  base_url().'/files/'.$data['file_name'].'">'.$data['file_name'].'</a></span>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="hapusfile('.$id.')">hapus</a></li>';
        }
    }
    
    public function submit_data($node,$doctype) {
        
        $data = $this->input->post();
        
        if(strlen($this->input->post('editid'))){
            $insert = $this->_survey->e_update_survey($data,$node,$doctype);
        }else{
            $insert = $this->_survey->add_survey($data,$node,$doctype);
        }
        
        echo $insert;
    }

    /* ============================== 
     * ------- Area Identity --------
     * ============================== */

    public function get_area_identity_list($nid, $dtid){
        $table = 'dm_area_identity';
        $primaryKey = 'id';

        $columns = array(
                    array(
                        'db' => '`ai`.`id`', 
                        'dt' => 0,
                        'formatter' => function( $d, $row ) {
                                    return '<input type="checkbox" id="sb'.$d.'">';
                            }, 
                        'field' => 'id'
                    ),
                    array( 'db' => '`ai`.`id`', 'dt' => 1, 'field' => 'id' ),
                    array( 'db' => '`ai`.`document_no`', 'dt' => 2, 'field' => 'document_no' ),
                    array( 'db' => '`ai`.`document_title`', 'dt' => 3, 'field' => 'document_title' ),
                    array( 'db' => '`ai`.`document_created_date`', 'dt' => 4, 'field' => 'document_created_date' ),
                    array( 'db' => '(SELECT name FROM dm_unit WHERE id = `ai`.`unit_id`)', 'dt' => 5, 'field' => 'parent_name', 'as' => 'parent_name' ),
                    array( 'db' => '`ai`.`media_type`', 'dt' => 6, 'field' => 'media_type' ),
                    array(
                        'db' => '`ai`.`id`', 
                        'dt' => 7,
                        'formatter' => function( $d, $row){                            
                                return '<a class="btn btn-default btn-sm" onclick="getDetail('.$d.')">Detail</a>';

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

        $joinQuery = "FROM `{$table}` AS `ai`";
        $extraCondition = "`ai`.`node_id`=".$nid." AND `ai`.`doc_type` = ".$dtid;

        echo json_encode(
            EDTSSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition )
        );
    }

    public function delete_area_detail($id){

        if((int)$id  == 0){
            throw new Exception;
        }

        $this->_survey->delete_area_detail($id);
    }

    public function save_node(){
        $save = $this->_survey->add_node($this->input->post());

        echo $save;
    }
    
    public function hapusfile(){
        $id = $this->input->post('id');
        $this->_survey->delete_file($id);
    }


}//end of class