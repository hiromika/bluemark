<?php

/*
 * Tampilkan module di di folder modules, bandingkan di table module, jika di table modules tidak ada, berarti statusnya not installed
 * jika ingin di install, maka tambahkan ke table modules
 */

/**
 * Description of user
 *
 * @author hariardi@gmail.com
 */
class Theme extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_theme','_theme_model');
        $this->layout->addStyle('/assets/'.__CLASS__.'/css/gray/easyui.css');
        $this->layout->addStyle('/assets/'.__CLASS__.'/css/style.css');
        $this->layout->addStyle('/assets/'.__CLASS__.'/css/icon.css');
        $this->layout->addScript('/assets/'.__CLASS__.'/js/jquery.easyui.min.js');
    }
    
    public function index() {
        
        $this->layout->set_header('Module List');
        
        $content = $this->load->view('index',array(),true);
        $this->layout->set_content($content);
        
        $this->layout->render();
    }
    
    public function get() {
        
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        
        // $result = $this->_module_model->getAllModule($start,$limit,$order,$direction,$key);
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }

    public function install() {
        // add to database this module
        $module_slug = __CLASS__; // nama slug module harus sama dengan nama class controller module

        $path = APPPATH . '/' . $module_slug;
        $results = scandir($path);
        $dir_result = array();
        $seq_dir = 0;
        $file = 'config.php';
        if( file_exists($path . '/' . $file) ) {
            include_once($path . '/' . $file);
            if(isset($config)) {
                $dir_result["MODULE_NAME"] = $config['name'];
                $dir_result["MODULE_SLUG"] = $config['slug'];
                $dir_result["MODULE_DESC"] = $config['description'];
            }
        }

        if( count($dir_result) <= 0 ) {
            // tidak ditemukan file config.php
        } else {

            // ditemukan file config.php
            $datasave = array(
                'MODULE_NAME' => $dir_result['MODULE_NAME'],
                'MODULE_SLUG' => $dir_result['MODULE_SLUG'],
                'MODULE_DESC' => $dir_result['MODULE_DESC'],
                'MODULE_STATUS' => 1,
                'MODULE_ENABLED' => 1
            );
            $this->_theme_model->install_module($datasave);

            // add navigation 
            $data_navigation = array(
                'MODULE_ID' => '',
                'NAVIGATION_PARENT' => '',
                'NAVIGATION_NAME' => '',
                'NAVIGATION_CLS' => '',
                'NAVIGATION_LINK' => '/' . $dir_result['MODULE_SLUG']
            );
            $this->_theme_model->install_navigation($data_navigation);

            // add role navigation
            $data_role_navigation = array(
                'ROLE_ID'=>'',
                'NAVIGATION_ID'=>''
            );
            $this->_theme_model->install_role_navigation($data_role_navigation);

        }
    }

    public function uninstall() {

    }
}
