<?php

if(!function_exists('renderNavigation')){
    function renderNavigation(){
        
        $output = '';
        
        $CI =&get_instance();
        $CI->load->model('theme_model','_theme_model');
        $CI->load->library('theme');

        $auth = $CI->session->userdata('auth');
        
        //get navigation
        // $nav = buildTree($CI->_theme_model->getNavigation());
        
        $nav = buildTree($CI->_theme_model->getRoleNavigation($auth['hash']));
        $theme = $CI->_theme_model->getActiveTheme();
        
        $dir = FCPATH . 'themes' . DIRECTORY_SEPARATOR . $theme['THEME_SLUG'] . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
        if(!is_file($dir . 'navigation.php')){
            $dir = APPPATH . 'views' . DIRECTORY_SEPARATOR;
        }
        $CI->load->ext_view($dir,'navigation',array('navigation' => $nav));
        
    }
}


if(!function_exists('theme_path')){
    function theme_path(){
        
        $CI =&get_instance();
        $CI->load->model('theme_model','_theme_model');
        $CI->load->library('theme');
        
        //get selected theme
        $theme = $CI->_theme_model->getActiveTheme();
        return $theme['PATH'];
        
    }
}

if(!function_exists('buildTree')){
    function buildTree(array $dataset) {
        $tree = array();

        /* Most datasets in the wild are enumerative arrays and we need associative array
           where the same ID used for addressing parents is used. We make associative
           array on the fly */
        $references = array();
        foreach ($dataset as $id => &$node) {
            
            // Add the node to our associative array using it's ID as key
            $references[$node['NAVIGATION_ID']] = &$node;

            // Add empty placeholder for children
            $node['children'] = array();
            
            // It it's a root node, we add it directly to the tree
            if (is_null($node['NAVIGATION_PARENT'])) {
                
                $tree[$node['NAVIGATION_ID']] = &$node;
            } else {
                
                // It was not a root node, add this node as a reference in the parent.
                $tree[$node['NAVIGATION_PARENT']]['children'][$node['NAVIGATION_ID']] = &$node;
            }
        }
        
        return $tree;
    }
}

if(!function_exists('add_navigation')){
    function add_navigation($module = NULL, $parent = NULL, $name = '', $slug = '', $cls = '', $link = '#') {
        
        $CI =&get_instance();
        
        //get id from slug
        if(!is_null($parent)){
            $CI->db->select('NAVIGATION_ID');
            $CI->db->where('NAVIGATION_SLUG',$parent);
            $Q = $CI->db->get('bama_navigation');
            if($Q->num_rows() > 0){
                $row = $Q->row();
                $parent = $row->NAVIGATION_ID;
            }
        }
        if($module !== NULL){
            $CI->db->insert('bama_navigation',array(
                'MODULE_SLUG' => $module,
                'NAVIGATION_SLUG' => $slug,
                'NAVIGATION_PARENT' => $parent,
                'NAVIGATION_NAME' => $name,
                'NAVIGATION_CLS' => $cls,
                'NAVIGATION_LINK' => $link
            ));
        }
    }
}

if(!function_exists('remove_navigation')){
    function remove_navigation($module = NULL) {
        
        $CI =&get_instance();
        
        if($module !== NULL){
            
            //delete role navigation
            $CI->db->select('NAVIGATION_ID');
            $CI->db->from('bama_navigation');
            $CI->db->where('MODULE_SLUG',$module);
            $Q = $CI->db->get();
            if($Q->num_rows() > 0){
                $row = $Q->result_array();
                foreach ($row as $key => $value) {
                    $CI->db->where('NAVIGATION_ID',$value['NAVIGATION_ID']);
                    $CI->db->delete('bama_role_navigation');
                    
                    $CI->db->where('NAVIGATION_ID',$value['NAVIGATION_ID']);
                    $CI->db->delete('bama_navigation');
                }
            }
            
            
        }
    }
}