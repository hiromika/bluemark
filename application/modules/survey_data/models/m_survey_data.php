<?php

/**
 * Description of m_survey_data
 *
 * @author hariardi@gmail.com
 */
class m_survey_data extends CI_Model {
    
    public $auth;
    
    public function __construct() {
        parent::__construct();
        $session = $this->authentication->getAuth();
        $this->auth = $session['id'];
    }
    /*
    public function get_tree_node($parent = 0, &$node = array(), $pnode = false) {
        
        $this->db->select('a.name as text, a.id as dbid',false);
        $this->db->from('dm_content_type a');
        $this->db->where('parent',$parent);
        $Q = $this->db->get();
        
        if($Q->num_rows() > 0){
            $output = $Q->result_array();
            
            foreach($output as $key => $value) {
                if($this->_check_for_children($parent)){
                    $output[$key]['iconCls'] = 'icon-add';
                    $output[$key]['type'] = 'ct';
                    $output[$key]['id'] = 'ct-'.$value['dbid'];
                    $output[$key]['parent'] = $pnode;
                    $output[$key]['children'] = $this->get_tree_node($parent,$node);
                }
            }
            
            return $output;
        }
        
        return false;
    }
    */
    public function get_tree_node($parent = 0, &$node = array()) {
        
        $this->db->select('a.name as ctname, a.id as ctid',false);
        $this->db->from('dm_content_type a');
        $this->db->where('a.id',23);
        $CT = $this->db->get();
        
        if($CT->num_rows() > 0){
            $output = $CT->result_array();
            $CT->free_result();
            
            foreach($output as $key => $value) {

                $N = $this->db->query('SELECT nv.attr_value AS text, n.id as nid FROM dm_node_value nv, dm_node n WHERE nv.node_id =  n.id AND n.content_type_id = "'.$value['ctid'].'"');

                if($N->num_rows() > 0){
                    $output[$key]['id'] = $value['ctid'];
                    $output[$key]['type'] = 'ct';
                    $output[$key]['text'] = $value['ctname'];

                    // $output[$key]['children'] = $N->result_array();

                    foreach ($N->result_array() as $key2 => $val2) {
                        $DT = $this->db->query('SELECT id,name as text FROM dm_doc_type');
                        
                        if($DT->num_rows() > 0){
                            $dtchildren = array();
                            foreach($DT->result_array() as $dtkeys => $dtvalues){
                                $dtchildren[] = array(
                                    'id' => $dtvalues['id'],
                                    'text' => $dtvalues['text'],
                                    'type' => 'dt',
                                    'ctid' => $value['ctid'],
                                    'parent' => $val2['nid'],
                                );
                            }
                            
                            $output[$key]['children'][] = 
                            array(
                                'id' => $val2['nid'],
                                'type' => 'node', 
                                'text' => $val2['text'],
                                'iconCls' => 'icon-add', 
                                'children' => $dtchildren
                            );
                        }else{
                            $output[$key]['children'][] = 
                            array(
                                'id' => $val2['nid'], 
                                'type' => 'node', 
                                'text' =>$val2['text'],
                                'iconCls' => 'icon-add'
                            );
                        }
                    }
                }

                // if($this->_check_for_children($parent)){
                //     $output[$key]['iconCls'] = 'icon-add';
                //     $output[$key]['type'] = 'ct';
                //     $output[$key]['id'] = 'ct-'.$value['dbid'];
                //     $output[$key]['parent'] = $parent;
                //     $output[$key]['children'] = $this->get_tree_node($value['dbid'],$node);
                // }

            }
            
            return $output;
        }
        
        return false;
    }

    
    public function get_node($parent = 0, $ct = false, &$node = array()) {
        
        $this->db->select('a.name, a.id as ctid,b.id as dbid,(select attr_value from dm_node_value where node_id = b.id and attr_id = (select id from dm_content_type_attr where content_type_id = b.content_type_id order by dm_content_type_attr.id asc limit 1)) as text',false);
        $this->db->from('dm_content_type a');
        $this->db->join('dm_node b','b.content_type_id = a.id','right');
        $this->db->where('b.parent',$parent);
        if($ct){
            $this->db->where('b.content_type_id',$ct);//var_dump($this->db->_compile_select());
        }
        //var_dump($this->db->_compile_select());
        $Q = $this->db->get();
        
        if($Q->num_rows() > 0){
            $output = $Q->result_array();
            
            foreach($output as $key => $value) {
                $output[$key]['type'] = 'node';
                //if($this->_check_for_children($parent)){
                if(true){
                    $output[$key]['iconCls'] = 'icon-node';
                    $output[$key]['id'] = 'node-'.$value['dbid'];
                    $output[$key]['parent'] = $parent;
                    $output[$key]['children'] = $this->get_tree_node($value['ctid'],$node,$value['dbid']);
                }
            }
            
            return $output;
        }
        
        return false;
    }
    
    private function _check_for_children($parent) {
        
        $this->db->select('COUNT(id) AS total',false);
        $this->db->from('dm_content_type');
        $this->db->where('parent',$parent);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $row = $Q->row();
            return $row->total;
        }
        
        return false;
    }
    
    public function getChildContentType($parent) {
        
        $this->db->select('id');
        $this->db->from('dm_content_type');
        $this->db->where('parent',$parent);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $row = $Q->result_array();
            $output = array();
            foreach($row as $key => $value){
                
            }
            return $row;
        }
        return false;
    }
    
    public function getContentType($node) {
        
        $this->db->select('content_type_id');
        $this->db->from('dm_node');
        $this->db->where('id',$node);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $row = $Q->row();
            return $row->content_type_id;
        }
        return false;
    }
    
    public function getNodeDetail($node) {
        $this->db->select('id,name,label,type,required,show_in_table,taxonomy_id,content_reference');
        $this->db->from('dm_content_type_attr');
        $this->db->where('content_type_id = (select content_type_id from dm_node where id = '.$node.')',NULL,FALSE);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            foreach($result as $key => $value) {
                $this->db->select('attr_value');
                $this->db->from('dm_node_value');
                $this->db->where('node_id',$node);
                $this->db->where('attr_id',$value['id']);
                $detail = $this->db->get();
                if($detail->num_rows() > 0){
                    $row = $detail->row();
                    $result[$key]['value'] = $row->attr_value;
                }
            }
            return $result;
        }
        return false;
    }

    public function getSurveyData($id){
        $this->db->select('*');
        $this->db->from('dm_area_identity');
        $this->db->where('id = '.$id, NULL, FALSE);
        $q = $this->db->get();
        if($q->num_rows() > 0){
            $result = $q->row_array();
            return $result;
        }

        return false;
    }
    
    public function getFormDetail($ct) {
        $ct = str_replace('ct-', '', $ct);
        $this->db->select('id,name,label,type,required,show_in_table,taxonomy_id,content_reference');
        $this->db->from('dm_content_type_attr');
        $this->db->where('content_type_id = '.$ct,NULL,FALSE);
        $Q = $this->db->get();
        //var_dump($this->db->last_query());die;
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            
            return $result;
        }
        return false;
    }
    
    function get_tx_parent_item($fields, $where, $select){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);
        if($where != ''){ $this->db->where($where,NULL,FALSE); }

        $q = $this->db->get('dm_term');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('id'=>'0', 'name'=>'--')), $q->result_array());
            if($select > 0){
                $key = array_search($select, array_column($rstitems, 'id'));
                $rstitems[$key]['selected'] = 'true';
            }
            $result['items'] = $rstitems;
        }

        return $result;

    }
    
    function get_node_parent_item($fields, $where, $select){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields,false);
        if($where != ''){ $this->db->where($where,NULL,FALSE); }
        $this->db->join('dm_node_value','dm_node_value.node_id=dm_node.id','left');
        $this->db->group_by('node_id');
        $q = $this->db->get('dm_node');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('id'=>'0', 'name'=>'--')), $q->result_array());
            if($select > 0){
                $key = array_search($select, array_column($rstitems, 'id'));
                $rstitems[$key]['selected'] = 'true';
            }
            $result['items'] = $rstitems;
        }

        return $result;

    }
    
    public function getDocumentType() {
        $this->db->select('id,name');
        $this->db->from('dm_doc_type');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return false;
    }
    
    public function getUnits() {
        $this->db->select('id,name');
        $this->db->from('dm_unit');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return false;
    }
    
    public function getRuas() {
        $this->db->select('id,concat("[",ruas_code,"] ",name) as name',false);
        $this->db->from('dm_ruas');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return false;
    }
    
    public function getRacks() {
        $this->db->select('id,code');
        $this->db->from('dm_archive');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return false;
    }
    
    public function getDocumentCategories() {
        $this->db->select('id,name');
        $this->db->from('dm_doc_cat');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return false;
    }
    
    public function getProvinces() {
        $this->db->select('id,name');
        $this->db->from('dm_province');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return false;
    }
    
    public function getCities() {
        $this->db->select('id,name');
        $this->db->from('dm_city');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array();
            return $result;
        }
        return false;
    }
    
    public function get_doc_list($node,$type) {
        
        $this->db->select('dm_doc.id,doc_no,"test" as doc_name,page_total,code',false);
        $this->db->from('dm_doc');
        $this->db->join('dm_archive','dm_archive.id=dm_doc.archive_id','left');
        $this->db->where('doc_type_id',$type);
        $this->db->where('node_id',$node);
        $Q = $this->db->get();
        $output = array();
        if($Q->num_rows() > 0){
            
            $result = $Q->result_array();
            foreach ($result as $key => $value) {
                $btn = '<div class="btn-group btn-group-sm" role="group" aria-label="..."><a class="btn btn-default">Detail</a><a class="btn btn-danger" onclick="confirm(\'Konfirmasi penghapusan file\')">Delete</a></div>';
                $parts = array();
                foreach($value as $vkey => $realval) {
                    array_push($parts, $realval);
                }
                array_push($parts, $btn);
                array_push($output,$parts);
            }
        }
        
        return array('data' => $output);
    }
    
    private function _get_tx_term($taxid) {
        $this->db->select('id, label as name');
        $this->db->where('taxonomy_id',$taxid);
        $q = $this->db->get('dm_term');
        if($q->num_rows() > 0){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('id'=>'0', 'name'=>'--')), $q->result_array());
            if($select > 0){
                $key = array_search($select, array_column($rstitems, 'id'));
                $rstitems[$key]['selected'] = 'true';
            }
            $result['items'] = $rstitems;
        }

        return $rstitems;
    }
    
    private function _get_node($ctid) {
        $this->db->select('dm_node.id, attr_value as name');
        $this->db->join('dm_node_value','dm_node_value.node_id=dm_node.id','left');
        $this->db->where('dm_node.content_type_id',$ctid);
        $this->db->group_by('node_id');
        $q = $this->db->get('dm_node');
        if($q->num_rows() > 0){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('id'=>'0', 'name'=>'--')), $q->result_array());
            if($select > 0){
                $key = array_search($select, array_column($rstitems, 'id'));
                $rstitems[$key]['selected'] = 'true';
            }
            $result['items'] = $rstitems;
        }

        return $rstitems;
    }
    
    public function getColumns($contenttype){
        $this->db->select('*');
        $this->db->from('dm_content_type_attr');
        $this->db->where('show_in_table',1);
        $this->db->where('content_type_id',$contenttype);
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            $result = $Q->result_array(); //var_dump($result);
            foreach($result as $key => $cvalue){
                switch ($cvalue['type']) {
                    case 4: //combo
                        $result[$key]['combo_data'] = $this->_get_tx_term($cvalue['taxonomy_id']);
                        break;
                    case 5: //checkbox
                        $result[$key]['combo_data'] = $this->_get_tx_term($cvalue['taxonomy_id']);
                        break;
                    case 6: //radio
                        $result[$key]['combo_data'] = $this->_get_tx_term($cvalue['taxonomy_id']);
                        break;
                    case 999: //node ref
                        $result[$key]['combo_data'] = $this->_get_node($cvalue['content_reference']);
                        break;
                    }
            }
            return $result;
        }
        return false;
    }
    
    public function getNodeName($id) {
        
        $this->db->select('attr_value');
        $this->db->from('dm_node_value');
        $this->db->where('node_id',$id);
        $Q = $this->db->get();
        if($Q->num_rows()){
            $row = $Q->row();
            return $row->attr_value;
        }
        return '';
    }
    public function getDocType($id) {
        
        $this->db->select('name');
        $this->db->from('dm_doc_type');
        $this->db->where('id',$id);
        $Q = $this->db->get();
        if($Q->num_rows()){
            $row = $Q->row();
            return $row->name;
        }
        return '';
    }
    
    private function _getAttr($node,$attr){
        $this->db->select('dm_node_value.attr_value');
        $this->db->from('dm_node_value');
        $this->db->where('attr_id',$attr);
        $this->db->where('node_id',$node);
        $Q = $this->db->get();
                //var_dump($this->db->last_query());die;
        if($Q->num_rows() > 0){
            $row = $Q->row();
            return $row->attr_value;
        }
        return false;
    }
    
    private function _getAttrID($ct,$attr){
        $this->db->select('id');
        $this->db->from('dm_content_type_attr');
        $this->db->where('name',$attr);
        $this->db->where('content_type_id',$ct);
        $Q = $this->db->get();
                //var_dump($this->db->last_query());die;
        if($Q->num_rows() > 0){
            $row = $Q->row();
            return $row->id;
        }
        return false;
    }
    
    public function get_node_list($node,$type) {
        
        $columns = $this->getColumns($type);
        
        $this->db->select('id');
        $this->db->from('dm_node');
        $this->db->where('content_type_id',$type);
        $this->db->where('dm_node.parent',$node);
        $Q = $this->db->get();
        $output = array();
        if($Q->num_rows() > 0){
            
            $result = $Q->result_array();
            foreach ($result as $key => $value) {
                
                $parts = array(($key+1));
                foreach($columns as $ckey => $col){
                    //var_dump($value['id']);
                    //var_dump($col['id']);
                    $nodeval = $this->_getAttr($value['id'],$col['id']);
                    array_push($parts, $nodeval);
                }
                $btn = '<div class="btn-group btn-group-sm" role="group" aria-label="..." onclick="getDetail('.$value['id'].')"><a class="btn btn-default">Detail</a></div>';
                
                array_push($parts, $btn);
                array_push($output,$parts);
            }
        }
        
        return array('data' => $output);
    }
    
    public function add_survey($data,$node,$doctype) {
        $insert = array(
            'node_id' => $node,
            'doc_type' => $doctype,
            'document_no' => $data['nodoc'],
            'document_title' => $data['titledoc'],
            'document_created_date' => $data['created_date'],
            'unit_id' => $data['doc_unit'],
            'media_type' => $data['media_type'],
            'arsip_id' => $data['arsip_id'],
            'klasifikasi_arsip' => $data['klasifikasi'],
            'abstrak' => $data['deskripsi'],
            'category_arsip' => $data['category'],
            'kata_kunci' => $data['kunci'],
            'format' => $data['file_format'],
            'status' => $data['file_status'],
            'area_akses' => $data['file_akses'],
            'waktu' => $data['waktu'],
            'ruas_id' => $data['ruas_id'],
        );
        $this->db->insert('dm_area_identity',$insert);
        $inst = $this->db->insert_id();
        if($inst){
            return true;
        }
    }

    public function e_update_survey($data, $node, $doctype){
        $update = array(
            'node_id' => $node,
            'doc_type' => $doctype,
            'document_no' => $data['nodoc'],
            'document_title' => $data['titledoc'],
            'document_created_date' => $data['created_date'],
            'unit_id' => $data['doc_unit'],
            'media_type' => $data['media_type'],
            'arsip_id' => $data['arsip_id'],
            'klasifikasi_arsip' => $data['klasifikasi'],
            'abstrak' => $data['deskripsi'],
            'category_arsip' => $data['category'],
            'kata_kunci' => $data['kunci'],
            'format' => $data['file_format'],
            'status' => $data['file_status'],
            'area_akses' => $data['file_akses'],
            'waktu' => $data['waktu'],
            'ruas_id' => $data['ruas_id'],
        );
        $this->db->where('id', $data['editid']);
        $this->db->update('dm_area_identity',$update);

        return true;
    }
    
    public function update_survey($data) {
        $nodeid = $data['node'];
        $ct = $this->getContentType($nodeid);
        unset($data['node']);
        foreach($data as $key => $value){
            $attrid = $this->_getAttrID($ct,$key);
            $this->db->where('node_id',$nodeid);
            $this->db->where('attr_id',$attrid);
            $this->db->update('dm_node_value',array('attr_value' => $value));
        }
    }
    
    public function delete_node($id) {
        $this->db->select('*');
        $this->db->from('dm_doc');
        $this->db->where('node_id',$id);
        $Q = $this->db->get();
        if($Q->num_rows() == 0){
            
            $this->db->select('*');
            $this->db->from('dm_node');
            $this->db->where('parent',$id);
            $Q2 = $this->db->get();
            if($Q2->num_rows() == 0){
                $this->db->where('node_id',$id);
                $this->db->delete('dm_node_value');
                
                if(!$this->db->_error_number()){
                    $this->db->where('id',$id);
                    $this->db->delete('dm_node');
                    
                }
                //var_dump($this->db->last_query());die;
                return $this->db->_error_number();
            }
        }
        
        return 'Failed, this node has a documents';
    }
    
    public function setFile($nid,$data) {
        
        $insert = array(
            'node_id' => $nid,
            'name' => $data['file_name'],
            'path' => $data['full_path']
        );
        $this->db->insert('dm_file',$insert);
        
        return $this->db->insert_id();
        
    }

    public function delete_area_detail($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_area_identity');

        return $ernum = $this->db->_error_number();
    }
    
    public function delete_file($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_file');

        return true;
    }

    public function getFiles($nid){
        $this->db->select('*');
        $this->db->from('dm_file');
        $this->db->where('node_id', $nid);
        $Q2 = $this->db->get();
        if($Q2->num_rows() > 0){
            return $Q2->result_array();
        }
        return false;
    }
    
    public function add_node($post){
        $this->db->insert('dm_node', array('content_type_id'=>'23'));

        $nid = $this->db->insert_id();

        $this->db->insert('dm_node_value', array('attr_id'=>'39','node_id'=>$nid,'attr_value'=>$post['n_attr_value']));

        return $nvid = $this->db->insert_id();
    }


} //end of class