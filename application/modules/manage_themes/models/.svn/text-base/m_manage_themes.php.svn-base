<?php

/**
 * Description of m_user
 *
 * @author tuts.adiputra@gmail.com
 */
class m_manage_themes extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function add($data) {
        
        $this->db->insert('bama_theme',array(
            'THEME_NAME' => $data['THEME_NAME'],
            'THEME_SLUG' => $data['THEME_SLUG'],
            'THEME_AUTHOR' => $data['THEME_AUTHOR'],
            'THEME_STATUS' => 1,
            'THEME_ACTIVE' => 0
        ));
        
        return true;
    }
    
    public function edit($data) {
        $this->db->where('THEME_ID',$data['THEME_ID']);
        $this->db->update('bama_theme',array(
            'THEME_NAME' => $data['THEME_NAME'],
            'THEME_AUTHOR' => $data['THEME_AUTHOR']
        ));
        
        return true;
    }
    
    public function delete($theme_slug) {
        $this->db->where('THEME_SLUG',$theme_slug);
        $this->db->delete('bama_theme');
        return true;
    }

    public function get_all_themes() {
        $this->db->select('bt.THEME_ID,bt.THEME_NAME,bt.THEME_SLUG,bt.THEME_AUTHOR,bt.THEME_STATUS, IF(bt.THEME_STATUS = 1,"INSTALLED","NOT INSTALLED") AS THEME_STATUS_LABEL, bt.THEME_ACTIVE, IF(bt.THEME_ACTIVE = 1,"ACTIVE","NO ACTIVE") AS THEME_ACTIVE_LABEL',FALSE);
        $data = $this->db->get('bama_theme bt');
        return $data->result_array();
    }

    private function set_none_active_theme() {
        $this->db->update('bama_theme',array(
            'THEME_ACTIVE' => 0
        ));

        return true;
    }

    public function set_active_theme($theme_id) {
        $this->set_none_active_theme();

        $this->db->where('THEME_ID',$theme_id);
        $this->db->update('bama_theme',array(
            'THEME_ACTIVE' => 1
        ));
    }
}
