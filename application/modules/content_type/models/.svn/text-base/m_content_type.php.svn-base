<?php

/**
 * Description of m_content_type
 *
 * @author edow | en3.webmaster@gmail.com
 */
class M_Content_Type extends CI_Model {

    public $auth;
    
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
        $session = $this->authentication->getAuth();
        $this->auth = $session['id'];
    }

    function buildTree(array $elements, $parentId = 0) {
		$branch = array();

		foreach ($elements as $element) {
			if ($element['parent'] == $parentId) {
				$children = $this->buildTree($elements, $element['id']);
					if ($children) {
						$element['children'] = $children;
					}

				$branch[] = $element;
			}
		}

		return $branch;
	}

    function get_content_type_tree(){
    	$tmpres = array();
        $result = array('total' => 0, 'items' => array());

        $this->db->select('id, parent, name AS text');
        $q = $this->db->get('dm_content_type');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();            
            $result['items'] = $this->buildTree($q->result_array());
        }

        return $result;
    }

    function get_content_type_by_id($id){
        $result = array('total' => 0, 'items' => array());

        //get content type
        $this->db->select('id AS ct_id, parent AS ct_parent, name AS ct_name, description AS ct_description');
        $this->db->where('id', $id);
        $q = $this->db->get('dm_content_type');

        if($q->num_rows() > 0){
            $result['total'] = $q->num_rows();            
            $tmpct = $q->row_array();
        }else{
            exit();
        }
        $q->free_result();

        //get attribute
        $this->db->select('id AS cta_id, name AS cta_name, label AS cta_label, type AS cta_type, required AS cta_req, show_in_table AS cta_sit, taxonomy_id AS cta_txid, content_reference AS cta_cref');
        $this->db->where('content_type_id', $id);
        $qq = $this->db->get('dm_content_type_attr');

        if($qq->num_rows() > 0){
            $tmpct['attributes'] = $qq->result_array();
        }
        $qq->free_result();

        $result['items'] = $tmpct;

        return $result;
    }

    function get_ct_parent_item($fields, $where, $select){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);
        if($where != ''){ $this->db->where($where); }

        $q = $this->db->get('dm_content_type');

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

    function get_tx_parent_item($fields, $where, $select){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);
        if($where != ''){ $this->db->where($where); }

        $q = $this->db->get('dm_taxonomy');

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

    function add($post){
        // save content type
        //===============================
        $save_ct_data = array(
                'parent' => $post['ct_parent'],
                'name' => $post['ct_name'],
                'description' => $post['ct_desc'],
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_content_type', $save_ct_data);

        $ctid = $this->db->insert_id();

        // save attributes
        //===============================
        $save_cta_data = array();

        $loop = count($post['cta_name']);

        for ($i=1; $i <= $loop; $i++) {
            $ctarref = (isset($post['cta_ref'][$i][0])) ? $post['cta_ref'][$i][0] : 0 ;
            $txid = 0;
            $ndid = 0;
            if($ctarref != 0){
                switch ($post['cta_type'][$i][0]) {
                    case '999':
                        $ndid = $post['cta_ref'][$i][0];
                        break;
                    case '4':
                        $txid = $post['cta_ref'][$i][0];
                        break;
                     case '5':
                        $txid = $post['cta_ref'][$i][0];
                        break;
                     case '6':
                        $txid = $post['cta_ref'][$i][0];
                        break;
                }
            }

            if($post['cta_name'][$i][0] != ''){
                $save_cta_data = array(
                        'name' => $post['cta_name'][$i][0],
                        'content_type_id' => $ctid,
                        'label' => $post['cta_label'][$i][0],
                        'type' => $post['cta_type'][$i][0],
                        'required' => ($post['cta_req'][$i][0] == 'on') ? 1 : 0,
                        'show_in_table' => ($post['cta_sit'][$i][0] == 'on') ? 1 : 0,
                        'taxonomy_id' => $txid,
                        'content_reference' => $ndid,
                        'crby' => $this->auth,
                        'crdt' => date('Y-m-d H:i:s')
                    );

                $this->db->insert('dm_content_type_attr', $save_cta_data);
            }

        }

        return $ctid;
    }

    function update($post){
        // update content type
        //===============================
        $ctid = $post['ct_id'];
        $save_ct_data = array(
                'parent' => $post['ct_parent'],
                'name' => $post['ct_name'],
                'description' => $post['ct_desc'],
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );
        $this->db->where('id', $ctid);
        $this->db->update('dm_content_type', $save_ct_data);

        // update attributes
        //===============================
        $save_cta_data = array();
        $loop_existing = count($post['attributes']['cta_id']); //-1 for new item sub array

        foreach ($post['attributes']['cta_id'] as $key => $value) {
            $value = $value[0];
            $txid = 0;
            $ndid = 0;

            $ctarref = (isset($post['attributes']['cta_ref'][$value][0])) ? $post['attributes']['cta_ref'][$value][0] : 0;
            if($ctarref != 0){
                switch ($post['attributes']['cta_type'][$value][0]) {
                    case '999':
                        $ndid = $post['attributes']['cta_ref'][$value][0];
                        break;
                    case '4':
                        $txid = $post['attributes']['cta_ref'][$value][0];
                        break;
                     case '5':
                        $txid = $post['attributes']['cta_ref'][$value][0];
                        break;
                     case '6':
                        $txid = $post['attributes']['cta_ref'][$value][0];
                        break;
                }
            }

            if($post['attributes']['cta_name'][$value][0] != ''){
                $save_cta_data = array(
                        'name' => $post['attributes']['cta_name'][$value][0],
                        'content_type_id' => $ctid,
                        'label' => $post['attributes']['cta_label'][$value][0],
                        'type' => $post['attributes']['cta_type'][$value][0],
                        'required' => (isset($post['attributes']['cta_req'][$value][0]) && $post['attributes']['cta_req'][$value][0] == 'on') ? 1 : 0,
                        'show_in_table' => (isset($post['attributes']['cta_sit'][$value][0]) && $post['attributes']['cta_sit'][$value][0] == 'on') ? 1 : 0,
                        'taxonomy_id' => $txid,
                        'content_reference' => $ndid,
                        'upby' => $this->auth,
                        'updt' => date('Y-m-d H:i:s')
                    );

                $this->db->where('id', $post['attributes']['cta_id'][$value][0]);
                $this->db->update('dm_content_type_attr', $save_cta_data);
            }
        }

        if(isset($post['attributes']['cta_name']['nw'])){
            $loop_new = count($post['attributes']['cta_name']['nw']);

            for ($x=1; $x <= $loop_new; $x++) { 
                $txnewid = 0;
                $ndnewid = 0;
                $ctarrefnew = (isset($post['attributes']['cta_ref']['nw'][$x][0])) ? $post['attributes']['cta_ref']['nw'][$x][0] : 0;

                if($ctarrefnew != 0){
                    switch ($post['attributes']['cta_type']['nw'][$x][0]) {
                        case '999':
                            $ndnewid = $post['attributes']['cta_ref']['nw'][$x][0];
                            break;
                        case '4':
                            $txnewid = $post['attributes']['cta_ref']['nw'][$x][0];
                            break;
                         case '5':
                            $txnewid = $post['attributes']['cta_ref']['nw'][$x][0];
                            break;
                         case '6':
                            $txnewid = $post['attributes']['cta_ref']['nw'][$x][0];
                            break;
                    }
                }

                if($post['attributes']['cta_name']['nw'][$x][0] != ''){
                    $save_cta_new_data = array(
                            'name' => $post['attributes']['cta_name']['nw'][$x][0],
                            'content_type_id' => $ctid,
                            'label' => $post['attributes']['cta_label']['nw'][$x][0],
                            'type' => $post['attributes']['cta_type']['nw'][$x][0],
                            'required' => (isset($post['attributes']['cta_req']['nw'][$x][0]) && $post['attributes']['cta_req']['nw'][$x][0] == 'on') ? 1 : 0,
                            'show_in_table' => (isset($post['attributes']['cta_sit']['nw'][$x][0]) && $post['attributes']['cta_sit']['nw'][$x][0] == 'on') ? 1 : 0,
                            'taxonomy_id' => $txnewid,
                            'content_reference' => $ndnewid,
                            'crby' => $this->auth,
                            'crdt' => date('Y-m-d H:i:s')
                        );

                    $this->db->insert('dm_content_type_attr', $save_cta_new_data);
                }
            }
        }

        return $ctid;
    }

    function delete_ct($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_content_type');

        return $ernum = $this->db->_error_number();
    }

    function delete_attr($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_content_type_attr');

        return $ernum = $this->db->_error_number();
    }

} //end of class