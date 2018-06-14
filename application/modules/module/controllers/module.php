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
class module extends MY_Controller {
    private $_arr_modules;

    public function __construct() {
        parent::__construct();
        $this->load->model('m_module','_module_model');
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
        $db_module = $this->_module_model->get_all_module();

        $path = APPPATH . 'modules/';
        $results = scandir($path);
        $dir_result = array();
        $seq_dir = 0;

        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;

            if (is_dir($path . '/' . $result)) {
                $curr_dir = $path . '/' . $result;
                if ($dh = opendir($curr_dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file === '.' or $file === '..') continue;
                        
                        if($file === 'config.php') {
                            include_once($curr_dir . '/' . $file);
                            if(isset($config)) {
                                $dir_result[$seq_dir]["MODULE_NAME"] = $config['name'];
                                $dir_result[$seq_dir]["MODULE_SLUG"] = $config['slug'];
                                $dir_result[$seq_dir]["MODULE_DESC"] = $config['description'];
                                $dir_result[$seq_dir]["MODULE_STATUS"] = "0";
                                $dir_result[$seq_dir]["MODULE_STATUS_LABEL"] = "NOT INSTALLED";
                                $dir_result[$seq_dir]["MODULE_ENABLED"] = "0";
                                $dir_result[$seq_dir]["MODULE_ENABLED_LABEL"] = "DISABLED";
                                $config = null;
                                $seq_dir++;
                            }
                        }
                    }
                    closedir($dh);
                }
            }
        }

        for($j=0; $j<count( $dir_result ); $j++ ) {

            if( count($db_module) > 0 ) {
                $ketemu = false;
                for( $i=0; $i<count($db_module); $i++ ) {
                    if( $dir_result[$j]['MODULE_SLUG'] == $db_module[$i]['MODULE_SLUG'] ) {
                        $ketemu = true;
                        break;
                    }
                }

                if(!$ketemu) { // jika ga ada di db
                    array_push($db_module, $dir_result[$j]); 
                }
            } else {
                // kalau ga ada di db
                $db_module = $dir_result;
            }
        }
        // echo "--";

        $datagrid = $db_module;
        $total_datagrid = count($datagrid);
        
        echo json_encode(array('total' => $total_datagrid,'rows' => $datagrid));
    }

    public function save() {
        if(strlen($this->input->post('MODULE_ID')) > 0){
            $this->_module_model->edit($this->input->post());
        } else {
            $this->_module_model->add($this->input->post());
        }
    }

    public function install() {
        $module_slug = $this->input->post('MODULE_SLUG');
        //run install method
        $string_install = modules::run($module_slug.'/install');
        $array_result_install = json_decode($string_install,true);

        $status = $array_result_install['status'];
        $msg = $array_result_install['msg'];
        
        if($status == true){
            
            //Save module config to database
            $this->_saveModule($module_slug);
        }
    }

    public function uninstall() {
        $module_slug = $this->input->post('MODULE_SLUG');
        
        //run uninstall method
        $string_uninstall = modules::run($module_slug.'/uninstall');
        
        $status = $string_uninstall['status'];
        $msg = $string_uninstall['msg'];
        
        //remove navigation
        remove_navigation($module_slug);
                
        if($status == true){
            
            //Remove module 
            $this->_module_model->delete($module_slug);
            
        }
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }
    
    private function _saveModule($module) {
        
        $msg = "Modul tidak dapat diakses.";
        $status = false;
            
        //looking for config file
        $path = APPPATH . 'modules/'.$module.'/config.php';
        
        if (is_file($path)) {
            include_once($path);
            if(isset($config)) {
                if($module !== $config['slug']) {
                    // no data in config variable
                    $msg = "Slug tidak sama pada slug di file config.php";
                    
                } else {
                    
                    $dir_result["MODULE_NAME"] = $config['name'];
                    $dir_result["MODULE_SLUG"] = $config['slug'];
                    $dir_result["MODULE_DESC"] = $config['description'];
                    
                    $status = true;
                }
            } else {
                
                // no data in config variable
                $msg = "Tidak ada variable config pada file config.php";
                
            }
            
             if($status === true) {
                if(array_key_exists("MODULE_SLUG", $dir_result)) {
                    $module_id = $this->_module_model->install_module($dir_result);
                }
            }
        }
    }
}
