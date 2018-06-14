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
class role_permission extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_role_permission','_role_perm_model');
       
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
                $module_id = $this->_role_perm_model->install_module($dir_result);
            }

            if($status) {
                # install installsql.sql
                if($has_installsql) {
                    $fullpathfile = $path . '/' . $module_slug . '/install.sql';
                    $this->_role_perm_model->import_sql($fullpathfile);
                }
                # awal setting navigation
                # jika data array lebih dari satu, tinggal di loop saja
                // set navigation
                $array_navigation = array(
                    'NAVIGATION_NAME' => "Role Permission",
                    'NAVIGATION_CLS' => "",
                    'NAVIGATION_PARENT' => "",
                    'NAVIGATION_LINK' => "role_permission",
                    'MODULE_ID' => $module_id
                );
                $navigation_id = $this->_role_perm_model->install_navigation($array_navigation);

                // set role navigation for super admin
                $array_role_navigation = array(
                    "NAVIGATION_ID" => $navigation_id,
                    "ROLE_ID" => 1 // SUPER ADMIN
                );
                $this->_role_perm_model->install_role_navigation($array_role_navigation);
                # akhir setting navigation

                # awal setting permission
                // set permission
                // $array_permission = array(
                //     'PERMISSION_NAME' => "edit_module",
                //     'PERMISSION_SLUG' => "edit_module",
                //     'PERMISSION_DESC' => "edit_module",
                //     'MODULE_ID' => $module_id
                // );
                # $permission_id = $this->_mod_nav_model->install_permission($array_permission);

                // set role permission for super admin
                // $array_role_navigation = array(
                //     "PERMISSION_ID" => $permission_id,
                //     "ROLE_ID" => 1 // SUPER ADMIN
                // );
                # $this->_mod_nav_model->install_role_permission($array_role_navigation);
            }
        }

        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }

    public function uninstall() {
        $status = $this->_role_perm_model->uninstall_module(__CLASS__);
        $msg = "Gagal melakukan proses uninstall";
        if($status) $msg = "Berhasil melakukan uninstall module";
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }
    
    public function index() {
        $this->layout->set_header('Role Permission');
        $data_module = $this->_role_perm_model->get_all_module();
        $content = $this->load->view('index',array('data_module'=>$data_module),true);
        $this->layout->set_content($content);
        
        $this->layout->render("",__CLASS__);
    }
    
    public function get_role() {
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        
        $result = $this->_role_perm_model->getAllRole($start,$limit,$order,$direction,$key);
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }

    public function save_role() {
        if(strlen($this->input->post('ROLE_ID')) > 0){
            $this->_role_perm_model->edit_role($this->input->post());
        } else {
            $this->_role_perm_model->add_role($this->input->post());
        }
    }

    public function delete_role($id) {
        if((int)$id  == 0){
            throw new Exception;
        }
        
        $this->_role_perm_model->delete_role($id);
    }

    public function get_select_module() {
        $result = $this->_role_perm_model->get_all_module_select();
        echo json_encode($result);
    }

    public function get_permission() {
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        $module_id = $this->input->get('module_id');
        
        $result = $this->_role_perm_model->get_all_permission($start,$limit,$order,$direction,$key, $module_id);
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }

    public function checked_role_permission() {
        $status = true;
        $check_permission = $this->_role_perm_model->get_role_permission( $this->input->post() );
        if( count($check_permission) <= 0 ) {
            $this->_role_perm_model->add_role_permission( $this->input->post() );
        } else {
            $status = false;
        }
        echo json_encode(array('status'=>$status));
    }

    public function unchecked_role_permission() {
        $status = true;
        $check_permission = $this->_role_perm_model->get_role_permission( $this->input->post() );
        if( count($check_permission) > 0 ) {
            $this->_role_perm_model->remove_role_permission( $this->input->post() );
        } else {
            $status = false;
        }
        echo json_encode(array('status'=>$status));
    }

    public function get_data_permission() {
        $data_permission = $this->_role_perm_model->get_role_permission( $this->input->post() );
        echo json_encode( $data_permission );
    }

    public function save_permission() {
        if(strlen($this->input->post('PERMISSION_ID')) > 0){
            $this->_role_perm_model->edit_item_permission($this->input->post());
        } else {
            $this->_role_perm_model->add_item_permission($this->input->post());
        }
    }

    public function delete_permission($id) {
        if((int)$id  == 0){
            throw new Exception;
        }
        $this->_role_perm_model->delete_item_permission($id);
    }
}
