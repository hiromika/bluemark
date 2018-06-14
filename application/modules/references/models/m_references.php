<?php

/**
 * Description of m_references
 *
 * @author edow | en3.webmaster@gmail.com
 */
class M_References extends CI_Model {

    public $auth;
    
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
        $session = $this->authentication->getAuth();
        $this->auth = $session['id'];
    }

    /* ============================== 
	 * --------- Taxonomy -----------
     * ============================== */

    function get_taxonomy_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_taxonomy');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function get_tx_parent_item($fields, $where){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);
        if($where != ''){ $this->db->where($where); }

        $q = $this->db->get('dm_taxonomy');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('id'=>'0', 'name'=>'--')), $q->result_array());
            $result['items'] = $rstitems;
        }

        return $result;

    }

    function add_taxonomy($post){
        $save_data = array(
                'name' => $this->db->escape_str($post['tx_name']),
                'description' => $this->db->escape_str($post['tx_desc']),
                'parent' => $post['tx_parent'],
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_taxonomy', $save_data);

        return $id = $this->db->insert_id();
    }

    function update_taxonomy($post){
        $save_data = array(
                'name' => $post['tx_name'],
                'description' => $post['tx_desc'],
                'parent' => $post['tx_parent'],
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['tx_id']);

        $this->db->update('dm_taxonomy', $save_data);

        return $post['tx_id'];
    }

    function delete_taxonomy($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_taxonomy');
        return true;
    }

    /* ============================== 
     * ----------- Term -------------
     * ============================== */

    function get_term_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_term');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function add_term($post){
        $save_data = array(
                'label' => $this->db->escape_str($post['trm_label']),
                'taxonomy_id' => $post['trm_tx_id'],
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_term', $save_data);

        return $id = $this->db->insert_id();
    }

    function update_term($post){
        $save_data = array(
                'label' => $post['trm_label'],
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['trm_id']);

        $this->db->update('dm_term', $save_data);

        return $post['trm_id'];
    }

    function delete_term($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_term');
        return true;
    }

    /* ============================== 
     * ----------- Unit -------------
     * ============================== */

    function get_unt_parent_item($fields, $where){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);
        if($where != ''){ $this->db->where($where); }

        $q = $this->db->get('dm_unit');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('id'=>'0', 'name'=>'--')), $q->result_array());
            $result['items'] = $rstitems;
        }

        return $result;

    }

    function get_unit_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_unit');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function add_unit($post){
        $save_data = array(
                'initial' => $this->db->escape_str($post['unt_initial']),
                'name' => $this->db->escape_str($post['unt_name']),
                'parent' => $post['unt_parent'],
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_unit', $save_data);

        return $id = $this->db->insert_id();
    }

    function update_unit($post){
        $save_data = array(
                'initial' => $this->db->escape_str($post['unt_initial']),
                'name' => $this->db->escape_str($post['unt_name']),
                'parent' => $post['unt_parent'],
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['unt_id']);

        $this->db->update('dm_unit', $save_data);

        return $post['unt_id'];
    }

    function delete_unit($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_unit');
        return true;
    }

    /* ============================== 
     * --------- Doc Type -----------
     * ============================== */

    function get_dty_parent_item($fields, $where){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);
        if($where != ''){ $this->db->where($where); }

        $q = $this->db->get('dm_doc_type');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('id'=>'0', 'name'=>'--')), $q->result_array());
            $result['items'] = $rstitems;
        }

        return $result;

    }

    function get_dty_unit($fields){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);

        $q = $this->db->get('dm_unit');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('id'=>'0', 'name'=>'--')), $q->result_array());
            $result['items'] = $rstitems;
        }

        return $result;

    }

    function get_dty_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_doc_type');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function add_doc_type($post){
        $save_data = array(
                'name' => $this->db->escape_str($post['dty_name']),
                'parent' => $post['dty_parent'],
                'unit_id' => $post['dty_unit'],
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_doc_type', $save_data);

        return $id = $this->db->insert_id();
    }

     function update_doc_type($post){
        $save_data = array(
                'name' => $this->db->escape_str($post['dty_name']),
                'parent' => $post['dty_parent'],
                'unit_id' => $post['dty_unit'],
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['dty_id']);

        $this->db->update('dm_doc_type', $save_data);

        return $post['dty_id'];
    }

    function delete_doc_type($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_doc_type');
        return true;
    }

    /* ============================== 
     * ---------- Archive -----------
     * ============================== */

    function get_archive_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_archive');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function add_archive($post){
        $save_data = array(
                'code' => $this->db->escape_str($post['ac_code']),
                'building_name' => $this->db->escape_str($post['ac_building_name']),
                'building_address' => $this->db->escape_str($post['ac_building_address']),
                'floor' => $this->db->escape_str($post['ac_floor']),
                'room' => $this->db->escape_str($post['ac_room']),
                'rack' => $this->db->escape_str($post['ac_rack']),
                'box' => $this->db->escape_str($post['ac_box']),
                'description' => $this->db->escape_str($post['ac_desc']),
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_archive', $save_data);

        return $id = $this->db->insert_id();
    }

    function update_archive($post){
        $save_data = array(
                'code' => $this->db->escape_str($post['ac_code']),
                'building_name' => $this->db->escape_str($post['ac_building_name']),
                'building_address' => $this->db->escape_str($post['ac_building_address']),
                'floor' => $this->db->escape_str($post['ac_floor']),
                'room' => $this->db->escape_str($post['ac_room']),
                'rack' => $this->db->escape_str($post['ac_rack']),
                'box' => $this->db->escape_str($post['ac_box']),
                'description' => $this->db->escape_str($post['ac_desc']),
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['ac_id']);

        $this->db->update('dm_archive', $save_data);

        return $post['ac_id'];
    }

    function delete_archive($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_archive');
        return true;
    }

    /* ============================== 
     * --------- Province -----------
     * ============================== */

    function get_province_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_province');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function add_province($post){
        $save_data = array(
                'code' => $this->db->escape_str($post['pv_code']),
                'name' => $this->db->escape_str($post['pv_name']),
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_province', $save_data);

        return $id = $this->db->insert_id();
    }

    function update_province($post){
        $save_data = array(
                'code' => $this->db->escape_str($post['pv_code']),
                'name' => $this->db->escape_str($post['pv_name']),
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['pv_id']);

        $this->db->update('dm_province', $save_data);

        return $post['pv_id'];
    }

    function delete_province($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_province');
        
        return $ernum = $this->db->_error_number();
    }

    /* ============================== 
     * ----------- City -------------
     * ============================== */

    function get_ct_province_item($fields, $where){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);
        if($where != ''){ $this->db->where($where); }

        $q = $this->db->get('dm_province');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $rstitems = array_merge(array(array('code'=>'0', 'name'=>'--')), $q->result_array());
            $result['items'] = $rstitems;
        }

        return $result;

    }

    function get_city_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_city');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function add_city($post){
        $save_data = array(
                'code' => $this->db->escape_str($post['ct_code']),
                'name' => $this->db->escape_str($post['ct_name']),
                'province_id' => $post['ct_province'],
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_city', $save_data);

        return $id = $this->db->insert_id();
    }

    function update_city($post){
        $save_data = array(
                'code' => $this->db->escape_str($post['ct_code']),
                'name' => $this->db->escape_str($post['ct_name']),
                'province_id' => $post['ct_province'],
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['ct_id']);

        $this->db->update('dm_city', $save_data);

        return $post['ct_id'];
    }

     function delete_city($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_city');
        
        return $ernum = $this->db->_error_number();
    }

    /* ============================== 
     * ---------- Dog Cat -----------
     * ============================== */

    function get_doc_cat_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_doc_cat');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function add_doc_cat($post){
        $save_data = array(
                'name' => $this->db->escape_str($post['dc_name']),
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_doc_cat', $save_data);

        return $id = $this->db->insert_id();
    }

    function update_doc_cat($post){
        $save_data = array(
                'name' => $this->db->escape_str($post['dc_name']),
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['dc_id']);

        $this->db->update('dm_doc_cat', $save_data);

        return $post['dc_id'];
    }

    function delete_doc_cat($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_doc_cat');
        return true;
    }

    /* ============================== 
     * ----------- Ruas -------------
     * ============================== */

    function get_rs_province_item($fields, $where){
        $result = array('total' => 0, 'items' => array());

        $this->db->select($fields);
        if($where != ''){ $this->db->where($where); }

        $q = $this->db->get('dm_province');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $rstitems = $q->result_array();
            $result['items'] = $rstitems;
        }

        return $result;

    }

    function get_ruas_by_id($id){
        $result = array('total' => 0, 'items' => array());

        $this->db->where('id', $id);
        $q = $this->db->get('dm_ruas');

        if($q->num_rows() >= 1){
            $result['total'] = $q->num_rows();
            $result['items'] = $q->row_array();
        }

        return $result;
    }

    function add_ruas($post){
        $save_data = array(
                'link_id' => $this->db->escape_str($post['rs_link_id']),
                'province_id' => $post['rs_province'],
                'ruas_code' => $this->db->escape_str($post['rs_code']),
                'description_code' => $this->db->escape_str($post['rs_desc_code']),
                'name' => $this->db->escape_str($post['rs_name']),
                'length' => $post['rs_length'],
                'sta_start' => $this->db->escape_str($post['rs_sta_start']),
                'sta_end' => $this->db->escape_str($post['rs_sta_end']),
                'coor_start' => $this->db->escape_str($post['rs_coor_start']),
                'coor_end' => $this->db->escape_str($post['rs_coor_end']),
                'ref_point_start' => $this->db->escape_str($post['rs_ref_point_start']),
                'ref_point_end' => $this->db->escape_str($post['rs_ref_point_end']),
                'crby' => $this->auth,
                'crdt' => date('Y-m-d H:i:s')
            );

        $this->db->insert('dm_ruas', $save_data);

        return $id = $this->db->insert_id();
    }

    function update_ruas($post){
        $save_data = array(
                'link_id' => $this->db->escape_str($post['rs_link_id']),
                'province_id' => $post['rs_province'],
                'ruas_code' => $this->db->escape_str($post['rs_code']),
                'description_code' => $this->db->escape_str($post['rs_desc_code']),
                'name' => $this->db->escape_str($post['rs_name']),
                'length' => $post['rs_length'],
                'sta_start' => $this->db->escape_str($post['rs_sta_start']),
                'sta_end' => $this->db->escape_str($post['rs_sta_end']),
                'coor_start' => $this->db->escape_str($post['rs_coor_start']),
                'coor_end' => $this->db->escape_str($post['rs_coor_end']),
                'ref_point_start' => $this->db->escape_str($post['rs_ref_point_start']),
                'ref_point_end' => $this->db->escape_str($post['rs_ref_point_end']),
                'upby' => $this->auth,
                'updt' => date('Y-m-d H:i:s')
            );

        $this->db->where('id', $post['rs_id']);

        $this->db->update('dm_ruas', $save_data);

        return $post['rs_id'];
    }

     function delete_ruas($id){
        $this->db->where('id', $id);
        $this->db->delete('dm_ruas');
        
        return $ernum = $this->db->_error_number();
    }

} //end of class