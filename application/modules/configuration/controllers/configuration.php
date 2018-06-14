<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author hariardi@gmail.com
 */
class configuration extends MY_Controller {
    
    public $_viewbag = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('m_configuration','main_model');

        $this->_viewbag['class_name'] = __CLASS__;
    }

    public function install() {
        $status = true;
        $msg = "";
        $module_slug = strtolower(__CLASS__);

        $path = APPPATH . 'modules';
        $dir_result = array();
        $has_installsql = false;
        
        if (is_dir($path . '/' . $module_slug)) {
            $curr_dir = $path . '/' . $module_slug . '/';
            
            if ($dh = opendir($curr_dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file === '.' or $file === '..') continue;
                    
                    if($file === 'config.php') {
                        include_once($curr_dir . '/' . $file);
                        if(isset($config)) {
                            if($module_slug !== $config['slug']) {
                                // no data in config variable
                                $msg = "Slug tidak sama pada slug di file config.php";
                                $status = false;
                            } else {
                                $dir_result["MODULE_NAME"] = $config['name'];
                                $dir_result["MODULE_SLUG"] = $config['slug'];
                                $dir_result["MODULE_DESC"] = $config['description'];
                                $status = true;
                                $msg = "Success Install " . strtoupper(__CLASS__);

                                break;
                            }
                        } else {
                            // no data in config variable
                            $msg = "Tidak ada variable config pada file config.php";
                            $status = false;
                        }
                    } else {
                        // no file config.php in folder
                        $msg = "Tidak ada file config.php pada folder";
                        $status = false;
                    }
                }
                closedir($dh);
            } else {
                // no file config.php in folder
                $msg = "Folder ".__CLASS__." tidak dapat diakses";
                $status = false;
            }

            if ($dh2 = opendir($curr_dir) ) {
                while (($file = readdir($dh2)) !== false) {
                    if ($file === '.' or $file === '..') continue;
                    if($file === 'install.sql') {
                        $has_installsql = true;
                    }
                }
                closedir($dh2);
            }
        } else {
            $msg = "Folder ".__CLASS__." tidak ditemukan";
            $status = false;
        }

        if($status === true) {
            if(array_key_exists("MODULE_SLUG", $dir_result)) {
                $module_id = $this->main_model->install_module($dir_result);
            }

            if($status) {
                # install installsql.sql
                if($has_installsql) {
                    $fullpathfile = $path . '/' . $module_slug . '/install.sql';
                    $this->main_model->import_sql($fullpathfile);
                }

                # awal setting navigation
                # jika data array lebih dari satu, tinggal di loop saja
                // set navigation
                $array_navigation = array(
                    'NAVIGATION_NAME' => "Configuration",
                    'NAVIGATION_CLS' => "icon-group",
                    'NAVIGATION_PARENT' => "",
                    'NAVIGATION_LINK' => "configuration",
                    'MODULE_ID' => $module_id
                );
                $navigation_id = $this->main_model->install_navigation($array_navigation);

                // set role navigation for super admin
                $array_role_navigation = array(
                    "NAVIGATION_ID" => $navigation_id,
                    "ROLE_ID" => 1 // SUPER ADMIN
                );
                $this->main_model->install_role_navigation($array_role_navigation);
                # akhir setting navigation

                # awal setting permission
                // set permission
                // $array_permission = array(
                //     'PERMISSION_NAME' => "edit_module",
                //     'PERMISSION_SLUG' => "edit_module",
                //     'PERMISSION_DESC' => "edit_module",
                //     'MODULE_ID' => $module_id
                // );
                # $permission_id = $this->main_model->install_permission($array_permission);

                // set role permission for super admin
                // $array_role_navigation = array(
                //     "PERMISSION_ID" => $permission_id,
                //     "ROLE_ID" => 1 // SUPER ADMIN
                // );
                # $this->main_model->install_role_permission($array_role_navigation);
            }
        }

        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }

    public function uninstall() {
        $status = $this->main_model->uninstall_module(__CLASS__);
        $msg = "Gagal melakukan proses uninstall";
        if($status) $msg = "Berhasil melakukan uninstall module";
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }
    
    public function index() {

        $this->layout->set_header('Configuration');

        $content = $this->load->view('index',$this->_viewbag,true);
        $this->layout->set_content($content);
        
        $this->layout->render("",__CLASS__);
    }
    
    public function get_configuration() {
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        $result = $this->main_model->get_all_configuration($start,$limit,$order,$direction,$key);    
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }

    public function save_configuration() {
        if(strlen($this->input->post('CONFIG_ID')) > 0){
            $this->main_model->edit_config($this->input->post());
        } else {
            $this->main_model->add_config($this->input->post());
        }
    }

    public function delete_configuration() {
        $config_id = $this->input->post('config_id');
        if((int)$config_id  == 0){
            throw new Exception;
        }
        
        $this->main_model->delete_config($config_id);
    }
}
