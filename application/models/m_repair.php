<?php

/**
 * Description of m_user
 *
 * @author hariardi@gmail.com
 */
class M_Repair extends CI_Model {
    
    public $auth;
    
    function __construct() {
        parent::__construct();
        $this->load->dbforge();
        $session = $this->authentication->getAuth();
        $this->auth = $session['id'];
    }
    
    public function getData($start = 0, $limit = 20, $sort = 'RELATION_NAME', $dir = 'ASC', $key = '') {

        $this->db->start_cache();
        $this->db->select(array(
            '*,ref_relation.PROVINCE_ID AS PROVINCE_ID,ref_relation.RELATION_ID AS RELATION_ID'
        ),FALSE);
        $this->db->from('ref_relation');
        $this->db->join('ref_relation_company','ref_relation_company.RELATION_ID=ref_relation.RELATION_ID','left');
        $this->db->join('ref_company','ref_company.COMPANY_ID=ref_relation_company.COMPANY_ID','left');
        $this->db->join('ref_province','ref_province.PROVINCE_ID=ref_relation.PROVINCE_ID','left');
        if(strlen($key) > 0){
            $this->db->like('RELATION_NAME',$key);
        }
        $this->db->stop_cache();
        $total = $this->db->get()->num_rows();
        
        $this->db->limit($limit,$start);
        
        $data = $this->db->get();
        
        if($total){
            $result = $data->result_array();
            
            return array('total' => $total, 'data' => $result);
        }
        
        return array('total' => 0, 'data' => array());
    }
    
    public function add($data) {
        
        $number = getOrderNumber();
        
        if((int)$data['CUSTOMER_ID'] == 0){
            $data['CUSTOMER_ID'] = $this->add_customer($data);
        }
        
        $data['REPAIR_ORDER_INCLUDE'] = json_encode(array(
            "INCLUDE_MEMORY" => $data['INCLUDE_MEMORY'],
            "INCLUDE_SIM" => $data['INCLUDE_SIM'],
            "INCLUDE_HEADSET" => $data['INCLUDE_HEADSET'],
            "INCLUDE_HEAD_CHARGER" => $data['INCLUDE_HEAD_CHARGER'],
            "INCLUDE_GUARANTEE" => $data['INCLUDE_GUARANTEE'],
            "INCLUDE_DATA_CABLE" => $data['INCLUDE_DATA_CABLE'],
        ));
        
        $insert = array(
            'REPAIR_ORDER_NUMBER' => $number,
            'REPAIR_ORDER_DATE' => date('Y-m-d H:i:s'),
            'CUSTOMER_ID' => $data['CUSTOMER_ID'],
            'MODEL_ID' => $data['MODEL_ID'],
            'REPAIR_ORDER_IMEI' => $data['REPAIR_ORDER_IMEI'],
            'REPAIR_ORDER_PIN' => $data['REPAIR_ORDER_PIN'],
            'REPAIR_ORDER_MEID' => $data['REPAIR_ORDER_MEID'],
            'REPAIR_ORDER_SERIAL' => $data['REPAIR_ORDER_SERIAL'],
            'REPAIR_ORDER_COLOR' => $data['REPAIR_ORDER_COLOR'],
            'REPAIR_ORDER_WARRANTY' => $data['REPAIR_ORDER_WARRANTY'],
            'REPAIR_ORDER_INCLUDE' => $data['REPAIR_ORDER_INCLUDE'],
            'CRDT' => date('Y-m-d H:i:s'),
            'CRBY' => $this->auth
        );
        
        $this->db->insert('serv_repair_order',$insert);
        $roid = $this->db->insert_id();
        
        catchRepairLog(array(
            'REPAIR_ORDER_ID' => $roid,
            'REPAIR_LOG_DESC' => 'Diterima Customer Service',
        ));
        
        return $roid;
    }
    
    public function add_customer($data) {
        
        $insert = array(
            'CUSTOMER_NAME' => $data['CUSTOMER_NAME'],
            'CUSTOMER_GENDER' => $data['CUSTOMER_GENDER'],
            'CUSTOMER_ID_NUMBER' => $data['CUSTOMER_ID_NUMBER'],
            'CUSTOMER_ADDRESS' => $data['CUSTOMER_ADDRESS'],
            'CUSTOMER_PHONE' => $data['CUSTOMER_PHONE'],
            'CUSTOMER_ALT_PHONE' => $data['CUSTOMER_ALT_PHONE'],
            'PROVINCE_ID' => $data['PROVINCE_ID'],
            'CUSTOMER_ZIPCODE' => $data['CUSTOMER_ZIPCODE'],
            'CUSTOMER_EMAIL' => $data['CUSTOMER_EMAIL'],
            'CRDT' => date('Y-m-d H:i:s'),
            'CRBY' => $this->auth
        );
        
        $this->db->insert('serv_customer',$insert);
        
        $relid = $this->db->insert_id();
        
        return $relid;
    }
    
    public function edit($data) {
        
        $this->db->where('RELATION_ID',$data['RELATION_ID']);
        
        $this->db->update('ref_relation',$insert = array(
            'RELATION_NAME' => $data['RELATION_NAME'],
            'RELATION_JOB' => $data['RELATION_JOB'],
            'RELATION_GENDER' => $data['RELATION_GENDER'],
            'RELATION_POB' => $data['RELATION_POB'],
            'RELATION_DOB' => $data['RELATION_DOB'],
            'RELATION_STREET' => $data['RELATION_STREET'],
            'PROVINCE_ID' => $data['PROVINCE_ID'],
            'RELATION_ZIPCODE' => $data['RELATION_ZIPCODE'],
            'RELATION_PHONE' => $data['RELATION_PHONE'],
            'RELATION_FAX' => $data['RELATION_FAX'],
            'RELATION_EMAIL' => $data['RELATION_EMAIL'],
            'UPDT' => date('Y-m-d H:i:s'),
            'UPBY' => $this->auth
        ));
        
        $this->db->where('RELATION_ID',$data['RELATION_ID']);
        $this->db->delete('ref_relation_company');
        
        $this->db->insert('ref_relation_company',array('COMPANY_ID' => $data['COMPANY_ID'], 'RELATION_ID' => $data['RELATION_ID']));
        
        return true;
    }
    
    public function delete($id) {
        
        $this->db->where('RELATION_ID',$id);
        
        $this->db->delete('ref_relation');
        
        return true;
    }
    
    public function getDataComboCustomer($sort = 'CUSTOMER_NAME', $dir = 'ASC', $key = '') {

        $this->db->start_cache();
        $this->db->select(array(
            '*'
        ),FALSE);
        $this->db->from('serv_customer');
        if(strlen($key) > 0){
            $this->db->like('CUSTOMER_NAME',$key);
        }
        $this->db->stop_cache();
        $total = $this->db->get()->num_rows();
        
        $data = $this->db->get();
        
        if($total){
            $result = $data->result_array();
            
            return $result;
        }
        
        return array('total' => 0, 'data' => array());
    }
    
    public function getDataComboModel($sort = 'MODEL_NAME', $dir = 'ASC', $key = '') {

        $this->db->start_cache();
        $this->db->select(array(
            '*'
        ),FALSE);
        $this->db->from('ref_model');
        if(strlen($key) > 0){
            $this->db->like('MODEL_NAME',$key);
        }
        $this->db->stop_cache();
        $total = $this->db->get()->num_rows();
        
        $data = $this->db->get();
        
        if($total){
            $result = $data->result_array();
            
            return $result;
        }
        
        return array('total' => 0, 'data' => array());
    }
    
    public function getDataComboProvince($sort = 'PROVINCE_NAME', $dir = 'ASC', $key = '') {

        $this->db->start_cache();
        $this->db->select(array(
            '*'
        ),FALSE);
        $this->db->from('ref_province');
        if(strlen($key) > 0){
            $this->db->like('PROVINCE_NAME',$key);
        }
        $this->db->stop_cache();
        $total = $this->db->get()->num_rows();
        
        $data = $this->db->get();
        
        if($total){
            $result = $data->result_array();
            
            return $result;
        }
        
        return array('total' => 0, 'data' => array());
    }
    
    public function getDataCompany($sort = 'COMPANY_NAME', $dir = 'ASC', $key = '') {

        $this->db->start_cache();
        $this->db->select(array(
            '*'
        ),FALSE);
        $this->db->from('ref_company');
        if(strlen($key) > 0){
            $this->db->like('COMPANY_NAME',$key);
        }
        $this->db->stop_cache();
        $total = $this->db->get()->num_rows();
        
        $data = $this->db->get();
        
        if($total){
            $result = $data->result_array();
            
            return $result;
        }
        
        return array('total' => 0, 'data' => array());
    }
    
    public function getCustomer($id) {
        
        $this->db->where('CUSTOMER_ID',$id);
        $this->db->select('*');
        $this->db->from('serv_customer');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            return $Q->row_array();
        }
        return false;
    }
    
    public function getModel($id) {
        
        $this->db->where('MODEL_ID',$id);
        $this->db->select('*');
        $this->db->from('ref_model');
        $this->db->join('ref_vendor','ref_vendor.VENDOR_ID=ref_model.VENDOR_ID','left');
        $this->db->join('ref_brand','ref_brand.BRAND_ID=ref_model.BRAND_ID','left');
        $Q = $this->db->get();
        if($Q->num_rows() > 0){
            return $Q->row_array();
        }
        return false;
    }

}
