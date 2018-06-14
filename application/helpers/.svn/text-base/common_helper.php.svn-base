<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 
 * @param type $type
 * @return string {CODE}.{MONTH}.{YEAR}.{NUMBER}
 */
function getOrderNumber() {
    
    $CI =& get_instance();
    
    $number = '00001';
    $prefix = 'RO';
    
    $rule = trim($prefix).".[0-9]{2}.[0-9]{4}.[0-9]{5}";
    //get last number
    $CI->db->select('MAX(RIGHT(REPAIR_ORDER_NUMBER,5)) AS LAST', FALSE);
    $CI->db->from('serv_repair_order');
    $CI->db->where('REPAIR_ORDER_NUMBER REGEXP "' . $rule . '"', NULL, FALSE);
    $Q2 = $CI->db->get();
    if($Q2->num_rows()){
        $last = $Q2->row();
        if((int)$last->LAST > 0){
            $number = ((int)$last->LAST) + 1;
        }
    }

    return trim($prefix).'.'.date('m').'.'.date('Y').'.'.sprintf("%05d",$number);
}

/**
 * 
 * @param type $type
 * @return string {CODE}.{MONTH}.{YEAR}.{NUMBER}
 */
function getSavingNumber($type) {
    
    $CI =& get_instance();
    
    $number = '00001';
    
    $CI->db->select('savingTypeCode');
    $CI->db->from('coop_saving_type');
    $CI->db->where('savingTypeID',$type);
    $Q = $CI->db->get();
       
    if($Q->num_rows() > 0){
        $row = $Q->row();
        $row->savingTypeCode;
        $rule = trim($row->savingTypeCode).".[0-9]{2}.[0-9]{4}.[0-9]{5}";
        //get last number
        $CI->db->select('MAX(RIGHT(memberSavingNo,5)) AS LAST', FALSE);
        $CI->db->from('coop_member_saving');
        $CI->db->where('savingTypeID',$type);
        $CI->db->where('memberSavingNo REGEXP "' . $rule . '"', NULL, FALSE);
        $Q2 = $CI->db->get();
        if($Q2->num_rows()){
            $last = $Q2->row();
            if((int)$last->LAST > 0){
                $number = ((int)$last->LAST) + 1;
            }
        }
        
        return trim($row->savingTypeCode).'.'.date('m').'.'.date('Y').'.'.sprintf("%05d",$number);
    }
    
    return false;
}

/**
 * 
 * @param type $type (1: Deposit, 2: Withdraw)
 * @return string {CODE}.{MONTH}.{YEAR}.{NUMBER}
 */
function getTransactionNumber($type) {
    
    $CI =& get_instance();
    
    $number = '00001';
    
    switch ($type) {
        case 1:
            $code = 'DEPO';
            break;
        
        case 2:
            $code = 'WITD';
            break;
        
        default:
            break;
    }
    $rule = trim($code).".[0-9]{2}.[0-9]{4}.[0-9]{5}";
    
    //get last number
    $CI->db->select('MAX(RIGHT(memberTransactionNumber,5)) AS LAST', FALSE);
    $CI->db->from('coop_member_transaction');
    $CI->db->where('memberTransactionType',$type);
    $CI->db->where('memberTransactionNumber REGEXP "' . $rule . '"', NULL, FALSE);
    $Q2 = $CI->db->get();
    if($Q2->num_rows()){
        $last = $Q2->row();
        if((int)$last->LAST > 0){
            $number = ((int)$last->LAST) + 1;
        }
    }

    return trim($code).'.'.date('m').'.'.date('Y').'.'.sprintf("%05d",$number);
    
    return false;
}

/**
 * 
 * @param type $type
 * @return string {CODE}.{MONTH}.{YEAR}.{NUMBER}
 */
function getLoanNumber($type) {
    
    $CI =& get_instance();
    
    $number = '00001';
    
    $CI->db->select('loanTypeCode');
    $CI->db->from('coop_loan_type');
    $CI->db->where('loanTypeID',$type);
    $Q = $CI->db->get();
       
    if($Q->num_rows() > 0){
        $row = $Q->row();
        $row->loanTypeCode;
        $rule = 'LOAN'.".[0-9]{2}.[0-9]{4}.[0-9]{5}";
        //get last number
        $CI->db->select('MAX(RIGHT(memberLoanNo,5)) AS LAST', FALSE);
        $CI->db->from('coop_member_loan');
        $CI->db->where('loanTypeID',$type);
        $CI->db->where('memberLoanNo REGEXP "' . $rule . '"', NULL, FALSE);
        $Q2 = $CI->db->get();
        if($Q2->num_rows()){
            $last = $Q2->row();
            if((int)$last->LAST > 0){
                $number = ((int)$last->LAST) + 1;
            }
        }
        
        return 'LOAN'.'.'.date('m').'.'.date('Y').'.'.sprintf("%05d",$number);
        //return trim($row->loanTypeCode).'.'.date('m').'.'.date('Y').'.'.sprintf("%05d",$number);
    }
    
    return false;
}


function catchRepairLog($data) {
    
    $CI =& get_instance();
    $session = $CI->authentication->getAuth();
    $auth = $session['id'];
        
    $insert = array(
        'REPAIR_ORDER_ID' => $data['REPAIR_ORDER_ID'],
        'REPAIR_LOG_DESC' => $data['REPAIR_LOG_DESC'],
        'CRDT' => date('Y-m-d H:i:s'),
        'CRBY' => $auth,
    );
    
    $CI->db->insert('serv_repair_log',$insert);
}