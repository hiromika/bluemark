<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author tuts.adiputra@gmail.com
 */
class role_navigation extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_role_navigation','_role_nav_model');
        $this->layout->addScript('/assets/'.__CLASS__.'/js/datagrid-groupview.js');
        $this->layout->addScript('/assets/'.__CLASS__.'/js/permissions.js');
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
                $module_id = $this->_role_nav_model->install_module($dir_result);
            }

            if($status) {
                # install installsql.sql
                if($has_installsql) {
                    $fullpathfile = $path . '/' . $module_slug . '/install.sql';
                    $this->_role_nav_model->import_sql($fullpathfile);
                }
                
                # awal setting navigation
                # jika data array lebih dari satu, tinggal di loop saja
                // set navigation
                $array_navigation = array(
                    'NAVIGATION_NAME' => "Role Navigation",
                    'NAVIGATION_CLS' => "",
                    'NAVIGATION_PARENT' => "",
                    'NAVIGATION_LINK' => "role_navigation",
                    'MODULE_ID' => $module_id
                );
                $navigation_id = $this->_role_nav_model->install_navigation($array_navigation);

                // set role navigation for super admin
                $array_role_navigation = array(
                    "NAVIGATION_ID" => $navigation_id,
                    "ROLE_ID" => 1 // SUPER ADMIN
                );
                $this->_role_nav_model->install_role_navigation($array_role_navigation);
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
        $status = $this->_role_nav_model->uninstall_module(__CLASS__);
        $msg = "Gagal melakukan proses uninstall";
        if($status) $msg = "Berhasil melakukan uninstall module";
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }
    
    public function index() {

        $this->layout->set_header('Role Navigation');
        $role = $this->_role_nav_model->getActiveRole();
        $content = $this->load->view('index',array('role' => $role, 'data_module' => $this->_role_nav_model->get_all_module_select()),true);
        $this->layout->set_content($content);
        
        $this->layout->render("",__CLASS__);
    }
    
    public function get_role() {
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        
        $result = $this->_role_nav_model->getAllRole($start,$limit,$order,$direction,$key);
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }

    public function get_select_module() {
        $result = $this->_role_nav_model->get_all_module_select();
        echo json_encode($result);
    }

    public function save_role() {
        if(strlen($this->input->post('ROLE_ID')) > 0){
            $this->_role_nav_model->edit_role($this->input->post());
        } else {
            $this->_role_nav_model->add_role($this->input->post());
        }
    }

    public function delete_role($id) {
        if((int)$id  == 0){
            throw new Exception;
        }
        
        $this->_role_nav_model->delete_role($id);
    }

    # section navigation
    public function get_select_navigation_parent() {
        $result = $this->_role_nav_model->get_all_navigation_parent();
        echo json_encode($result);   
    }
    
    public function checked_navigation() {
        $status = true;
        $check_navigation = $this->_role_nav_model->get_role_navigation( $this->input->post() );
        // echo $this->db->last_query();
        // jika checked == true => proses remove data, sebaliknya, proses add data
        
        if( $this->input->post('checked') === "true" ) {
            if( count($check_navigation) <= 0 ) {
                $this->_role_nav_model->add_role_navigation( $this->input->post() );
            } else {
                $status = false;
            }
        } else {
            if( count($check_navigation) > 0 ) {
                $this->_role_nav_model->remove_role_navigation( $this->input->post() );
            } else {
                $status = false;
            }
        }
        echo json_encode(array('status'=>$status));
    }

    public function get_navigation() {

        // get all parent navigation
        $parent_navigation = $this->_role_nav_model->get_parent_navigation();

        // get all child navigation
        $child_navigation = $this->_role_nav_model->get_child_navigation();
        $role = $this->_role_nav_model->getActiveRole();
        $result = array();
        for( $i=0; $i<count($parent_navigation); $i++ ) {
            $result[$i]['id'] = $parent_navigation[$i]['NAVIGATION_ID'];
            $result[$i]['text'] = $parent_navigation[$i]['NAVIGATION_NAME'];
            foreach ($role as $rkey => $rvalue) {
                $result[$i][$rvalue['ROLE_ID']] = json_encode($this->_role_nav_model->getPermissionValue($parent_navigation[$i]['NAVIGATION_ID'],$rvalue['ROLE_ID']));
            }
            $has_child = false;
            $data_child = array();
            $i_child = 0;
            for( $j=0; $j<count($child_navigation); $j++ ) {
                if( $child_navigation[$j]['NAVIGATION_PARENT'] == $parent_navigation[$i]['NAVIGATION_ID'] ) {
                    $has_child = true;
                    $data_child[$i_child]['id'] = $child_navigation[$j]['NAVIGATION_ID'];
                    $data_child[$i_child]['text'] = $child_navigation[$j]['NAVIGATION_NAME'];
                    $data_child[$i_child]['checked'] = false;
                    foreach ($role as $rkey => $rvalue) {
                        $data_child[$i_child][$rvalue['ROLE_ID']] = json_encode($this->_role_nav_model->getPermissionValue($child_navigation[$j]['NAVIGATION_ID'],$rvalue['ROLE_ID']));
                    }
                    $i_child++;
                }
            }

            if($has_child) {
                $result[$i]['children'] = $data_child;
            }
        }
        
        echo json_encode($result);
    }

    public function get_data_role_navigation() {
        $role_id = $this->input->post('role_id');
        // get all navigation by role_id
        $data_navigation = $this->_role_nav_model->get_role_navigation_by('ROLE_ID',$role_id);

        echo json_encode($data_navigation);
    }

    public function save_navigation() {
        if(strlen($this->input->post('NAVIGATION_ID')) > 0){
            $this->_role_nav_model->edit_navigation($this->input->post());
        } else {
            $this->_role_nav_model->add_navigation($this->input->post());
        }
    }

    public function get_navigation_item() {
        $navigation_id = $this->input->post('navigation_id');
        $data_navigation = $this->_role_nav_model->get_navigation_by('NAVIGATION_ID',$navigation_id);
        echo json_encode($data_navigation);
    }

    public function delete_navigation_item() {
        $id = $this->input->post('navigation_id');
        if((int)$id  == 0){
            throw new Exception;
        }
        $this->_role_nav_model->delete_navigation($id);
    }
    
    public function save_permission() {
        $data = json_decode($this->input->post('data'),true);
        $update = $this->_role_nav_model->savePermission($data);
        echo $update;
    }
}
