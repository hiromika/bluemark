<?php

/**
 * Description of Layout
 *
 * @author hariardi@gmail.com
 */
class Layout {
    
    public  $CI;
    public  $title;
    public  $theme = '';
    public  $content = '';
    public  $header = '';
    public  $breadcrumb = 'Dashboard';
    public  $vars = '';
    public  $scripts;
    public  $styles;
    private $_auth = true;
    public $permission = array();

    public function __construct() {
        $this->scripts = new SplPriorityQueue();
        $this->styles = new SplPriorityQueue();
        $this->CI =&get_instance();
        $this->_auth = $this->CI->session->userdata('auth');
    }
    
    public function get_theme() {
        return $this->theme;
    }
    
    public function get_header() {
        return $this->header;
    }
    
    public function get_title() {
        return $this->title;
    }

    public function get_breadcrumb() {
        return $this->breadcrumb;
    }
    
    public function set_title($title) {
        
        if(!is_string($title)){
            throw new Exception ("Title have to be String");
        }
        
        $this->title = $title;
    }
    
    public function set_header($header) {
        
        if(!is_string($header)){
            throw new Exception ("Header have to be String");
        }
        
        $this->header = $header;
    }

    public function set_breadcrumb($breadcrumb) {
        if(!is_string($breadcrumb)){
            throw new Exception ("Breadcrumb have to be String");
        }
        
        $this->breadcrumb = $breadcrumb;
    }
    
    public function set_theme( $value ) {
        $this->theme = $value;
    }
    
    /**
    * Prepares styles & scripts
    * @return string
    */
    protected function prepareAssets() {
        return $this->prepareScripts() . $this->prepareStyles();
    }
    
    /**
    * Prepare the scripts
    * @return string
    */
    protected function prepareScripts() {
        $scripts = '';
        if($this->scripts->count()) {
            foreach($this->scripts as $script) {
                $scripts .= '<script src="' . $script . '"></script>' . PHP_EOL;
            }
        }
        
        return $scripts;
    }
    
    /**
    * Prepare the styles
    * @return string
    */
    protected function prepareStyles() {
        $styles = '';
        if($this->styles->count()) {
            foreach($this->styles as $style) {
                $styles .= '<link href="' . $style . '" rel="stylesheet"/>' . PHP_EOL;
            }
        }
        
        return $styles;
    }
    
    /**
    * Adds the script file according to priority
    * @param string $script
    * @param int $priority
    * @return self for object chaining
    */
    public function addScript($script, $priority = NULL) {
        $this->scripts->insert($script, is_int($priority) ? $priority : $this->scripts->count());
        return $this;
    }
    
    /**
    * Adds the style/css file according to priority
    * @param string $style
    * @param int $priority
    * @return self for object chaining
    */
    public function addStyle($style, $priority = NULL) {
        $this->styles->insert($style, is_int($priority) ? $priority : $this->styles->count());
        return $this;
    }

    private function _check_permission_content($content,$permission) {
        $this->CI->load->helper('dom');
        $html = str_get_html($content);
        $data_acl = "data-acl";
        $array_acl = array();
        $i=0;
        // untuk tombol / button a href
        foreach($html->find('a') as $e) {
            if(isset($e->attr[$data_acl])) {
                $array_acl[$i] = $e->attr[$data_acl];
                $i++;        
            }
        }

        // untuk span search
        foreach($html->find('span') as $e) {
            if(isset($e->attr[$data_acl])) {
                $array_acl[$i] = $e->attr[$data_acl];
                $i++;        
            }
        }

        // tree
        foreach($html->find('ul') as $e) {
            if(isset($e->attr[$data_acl])) {
                $array_acl[$i] = $e->attr[$data_acl];
                $i++;        
            }
        }
        
        $array_permission = array();
        $i=0;
        foreach($permission as $item) {
            $array_permission[$i] = $item["PERMISSION_SLUG"];
            $i++;
        }
        $result = array_values(array_diff($array_acl,$array_permission));

        # add style display none
        // button anchor
        $doc = new DOMDocument;
        libxml_use_internal_errors(true);
        $doc->loadHTML($content);
        $nodes = $doc->getElementsByTagName('a');
        foreach ($nodes as $node) {
            if ($node->hasAttributes()) {
                foreach ($node->attributes as $a) {
                    if($a->nodeName == 'data-acl') {
                        foreach($result as $row) {
                            if($a->nodeValue == $row) {
                                $node->setAttribute('style','display:none;');
                                break;
                            }
                        }
                    }
                }
            }
        }
        $content = $doc->saveHTML();

        // span search
        $doc = new DOMDocument;
        libxml_use_internal_errors(true);
        $doc->loadHTML($content);
        $nodes = $doc->getElementsByTagName('span');
        foreach ($nodes as $node) {
            if ($node->hasAttributes()) {
                foreach ($node->attributes as $a) {
                    if($a->nodeName == 'data-acl') {
                        foreach($result as $row) {
                            if($a->nodeValue == $row) {
                                $node->setAttribute('style','display:none;');
                                break;
                            }
                        }
                    }
                }
            }
        }
        $content = $doc->saveHTML();

        // span tree
        $doc = new DOMDocument;
        libxml_use_internal_errors(true);
        $doc->loadHTML($content);
        $nodes = $doc->getElementsByTagName('ul');
        foreach ($nodes as $node) {
            if ($node->hasAttributes()) {
                foreach ($node->attributes as $a) {
                    if($a->nodeName == 'data-acl') {
                        foreach($result as $row) {
                            if($a->nodeValue == $row) {
                                $data_options = $node->getAttribute('data-options');
                                if(isset($data_options)) {
                                    $data_options = str_replace("checkbox:true","checkbox:false",$data_options);    
                                    $node->setAttribute('data-options',$data_options);
                                }
                                break;
                            }
                        }
                    }
                }
            }
        }
        $content = $doc->saveHTML();

        return $content;
    }
    
    public function render($return = false, $module_slug = "") {
        
        $this->CI->load->model('theme_model','_theme_model');
        
        if(isset($this->theme)) {
            $this->_set_active_theme();
        }

        $layout = $this->_get_theme_layout();
        $layout = realpath($layout);
        
        $search = array(
           '/\>[^\S ]+/s',
           '/[^\S ]+\</s',
           '/(\s)+/s', // shorten multiple whitespace sequences
         '#(?://)?<!\[CDATA\[(.*?)(?://)?\]\]>#s' //leave CDATA alone
         );
        $replace = array(
            '>',
            '<',
            '\\1',
         "//&lt;![CDATA[\n".'\1'."\n//]]>"
         );

        //$this->content = preg_replace($search, $replace, $this->content);
        
        // ambil data module untuk informasi breadcrumb
        $module_data = $this->_get_module_data($module_slug);
        if(count($module_data) > 0) {
            $this->set_breadcrumb($module_data['MODULE_NAME']);
        }
        
        if($this->breadcrumb == 'Dashboard'){
            // edow
            $this->CI->load->model('dashboard_model', '_dashmd');
            $data = $this->CI->_dashmd->get_all_dashboard_content();
            // end of edow
            $this->content = $this->CI->load->view('dashboard', array('data' => $data), true);
        }
        
        //$this->content = preg_replace($search, $replace, $this->content);
        
        $permission = $this->_get_permission($module_slug);
        if($this->content) {
            $this->content = $this->_check_permission_content($this->content, $permission);    
        }

        $params = array(
            'content'       => $this->content,
            'variable'      => $this->vars,
            'header'        => $this->header,
            'breadcrumb'    => $this->breadcrumb,
            'headtag'       => $this->prepareAssets()
        );

        if($this->_auth){
            if(!$this->CI->input->is_ajax_request()){
                $this->CI->load->theme_view($this->theme,'index.php',$params);
                return;
            } else {
                return;
            }
        }
        
        $this->CI->load->theme_view($this->theme,'views/login');
    }
    
    public function set_content($content){
        $this->content = $content;
    }
    
    public function set_variables($vars){
        $this->vars = $vars;
    }
    
    public function set_view($view,$vars = array()){
        $wrapper = $this->CI->load($view);
    }
	
    private function _get_theme_layout(){
        if(is_file(FCPATH.'themes/'.$this->theme.'/index.php')){
            $layout = FCPATH.'themes/'.$this->theme.'/';
        } else {
            $layout = false;
        }
        
        return $layout;
    }

    private function _get_permission($module_slug = "") {
        $this->CI->load->model('theme_model','_theme_model');
        $auth = $this->_auth;
        $role_id = $auth['hash'];
        $permission = $this->CI->_theme_model->getRolePermission($role_id,$module_slug);

        return $permission;
    }

    private function _get_module_data($module_slug = "") {
        $this->CI->load->model('module_model','_module_model');
        $data_module = $this->CI->_module_model->get_module_by('MODULE_SLUG',$module_slug,'*');

        return $data_module;   
    }

    private function _set_active_theme() {
        $this->CI->load->model('theme_model','_theme_model');
        $theme_slug = $this->CI->_theme_model->getActiveThemeSlug();
        $this->set_theme($theme_slug);
    }
}
