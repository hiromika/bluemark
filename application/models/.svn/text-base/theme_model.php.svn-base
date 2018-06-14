<?php

/**
 * Description of theme_model
 *
 * @author hariardi@gmail.com
 */
class theme_model extends CI_Model {
    
    public $theme = array('THEME_ID' => NULL, 'THEME_NAME' => 'default','THEME_SLUG' => 'default', 'THEME_AUTHOR' => 'hariardi@gmail.com', 'PATH' => '' );
    public $navigation = array();
    public $permission = array();
    
    function __construct() {
        parent::__construct();
        
        $this->getTheme();
    }
    
    private function getTheme() {
        
        $this->db->select(array('THEME_ID','THEME_NAME','THEME_SLUG','THEME_AUTHOR'));
        $this->db->from('bama_theme');
        $this->db->where('THEME_ACTIVE',1);
        $Q = $this->db->get();
        if($Q->num_rows()){
            $result = $Q->row_array();
            
            $result['PATH'] = base_url() . 'themes/' . $result['THEME_SLUG'];
            
            $this->theme = $result;
        }
    }

    public function getActiveThemeSlug() {
        $this->db->select(array('THEME_SLUG'));
        $this->db->from('bama_theme');
        $this->db->where('THEME_ACTIVE',1);
        $Q = $this->db->get();
        $theme_slug = 'default';
        if($Q->num_rows()){
            $result = $Q->row_array();
            $theme_slug = $result['THEME_SLUG'];
        }
        return $theme_slug;
    }
    
    public function getActiveTheme() {
        return $this->theme;
    }
    
    public function getNavigation() {
        
        $this->db->select(array('NAVIGATION_ID','NAVIGATION_CLS','MODULE_SLUG','NAVIGATION_PARENT','NAVIGATION_NAME','NAVIGATION_LINK'));
        $this->db->from('bama_navigation');
        $Q = $this->db->get();
        if($Q->num_rows()){
            $this->navigation = $Q->result_array();
        }
        
        return $this->navigation;
    }

    public function getRoleNavigation($role_id) {
        
        $this->db->select(array('NAVIGATION_ID','NAVIGATION_CLS','MODULE_SLUG','NAVIGATION_PARENT','NAVIGATION_NAME','NAVIGATION_LINK'));
        $this->db->from('bama_navigation');
        $this->db->where('NAVIGATION_ID IN(SELECT NAVIGATION_ID FROM bama_role_navigation WHERE ROLE_ID = '.$role_id.') AND bama_navigation.MODULE_SLUG IN(SELECT MODULE_SLUG FROM bama_modules WHERE MODULE_STATUS = 1)',NULL,FALSE);
        $this->db->or_where('NAVIGATION_NAME','DASHBOARD');
        $this->db->order_by('NAVIGATION_PARENT','ASC');
        $this->db->order_by('NAVIGATION_ID','ASC');
        $Q = $this->db->get();
        if($Q->num_rows()){
            $this->navigation = $Q->result_array();
        }
        
        return $this->navigation;
    }

    public function getRolePermission($role_id, $module_slug) {
        $this->db->select(array('bp.PERMISSION_ID','bp.PERMISSION_NAME','bp.PERMISSION_SLUG','bp.MODULE_ID','bm.MODULE_NAME','bm.MODULE_SLUG'));
        $this->db->from('bama_role_permission brp');
        $this->db->join('bama_permission bp', 'bp.PERMISSION_ID = brp.PERMISSION_ID');
        $this->db->join('bama_modules bm', 'bm.MODULE_ID = bp.MODULE_ID');
        $this->db->where('brp.ROLE_ID',$role_id);
        if($module_slug != "") $this->db->where('bm.MODULE_SLUG',$module_slug);
        $Q = $this->db->get();
        if($Q->num_rows()){
            $this->permission = $Q->result_array();
        }

        return $this->permission;
    }
    
    public function getVisualChecks() {
        $this->db->select('*');
        $this->db->from('ref_visual_checks');
        $Q = $this->db->get();
        if($Q->num_rows()){
            return $Q->result_array();
        }
        
        return false;
    }
   
}
