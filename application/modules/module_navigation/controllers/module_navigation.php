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
class module_navigation extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_module_navigation','_mod_nav_model');
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
                $module_id = $this->_mod_nav_model->install_module($dir_result);
            }

            if($status) {
                # install installsql.sql
                if($has_installsql) {
                    $fullpathfile = $path . '/' . $module_slug . '/install.sql';
                    $this->_mod_nav_model->import_sql($fullpathfile);
                }

                # awal setting navigation
                # jika data array lebih dari satu, tinggal di loop saja
                // set navigation
                $array_navigation = array(
                    'NAVIGATION_NAME' => "Module Navigation",
                    'NAVIGATION_CLS' => "",
                    'NAVIGATION_PARENT' => "",
                    'NAVIGATION_LINK' => "module_navigation",
                    'MODULE_ID' => $module_id
                );
                $navigation_id = $this->_mod_nav_model->install_navigation($array_navigation);

                // set role navigation for super admin
                $array_role_navigation = array(
                    "NAVIGATION_ID" => $navigation_id,
                    "ROLE_ID" => 1 // SUPER ADMIN
                );
                $this->_mod_nav_model->install_role_navigation($array_role_navigation);
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
        $status = $this->_mod_nav_model->uninstall_module(__CLASS__);
        $msg = "Gagal melakukan proses uninstall";
        if($status) $msg = "Berhasil melakukan uninstall module";
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }
    
    public function index() {
        $this->layout->set_header('Add/Remove Module');
        $content = $this->load->view('index',array(),true);
        $this->layout->set_content($content);
        $this->layout->render("",__CLASS__);
    }
    
    public function get_module() {
        $db_module = $this->_mod_nav_model->get_all_module();

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

        // paging array
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $end = $start + $limit;
        $count = count($db_module);

        // Conditionally return results
        if ($start < 0 || $count <= $start)
            // Page is out of range
            $datagrid = array(); 
        else if ($count <= $end) 
            // Partially-filled page
            $datagrid = array_slice($db_module, $start);
        else
            // Full page 
            $datagrid = array_slice($db_module, $start, $end - $start);

        $key = $this->input->get('key');
        if($key != "") {
            $datagrid = $this->search_paging($db_module,'MODULE_NAME',$key);
            $count = count($datagrid);
        }
        
        echo json_encode(array('total' => $count,'rows' => $datagrid));
    }

    function search_paging($array, $key, $value) { 
        $results = array(); 

        if (is_array($array)) 
        { 
            if (isset($array[$key]) && strpos(strtolower($array[$key]),strtolower($value)) !== false)
                $results[] = $array; 
            
            foreach ($array as $subarray) 
                $results = array_merge($results, $this->search_paging($subarray, $key, $value)); 
        } 

        return $results; 
    }

    public function get_select_module() {
        $result = $this->_mod_nav_model->get_all_module_select();
        echo json_encode($result);
    }

    public function save_module() {
        if(strlen($this->input->post('MODULE_ID')) > 0){
            $this->_mod_nav_model->edit_module($this->input->post());
        } else {
            $this->_mod_nav_model->add_module($this->input->post());
        }
    }

    public function get_navigation() {
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $order = $this->input->get('order');
        $direction = $this->input->get('sort');
        $key = $this->input->get('key');
        $module_id = $this->input->get('module_id');
        if($module_id != '') {
            $result = $this->_mod_nav_model->get_all_navigation_by($start,$limit,$order,$direction,$key, $module_id);
        } else {
            $result = $this->_mod_nav_model->get_all_navigation($start,$limit,$order,$direction,$key);    
        }
        
        echo json_encode(array('total' => $result['total'],'rows' => $result['data']));
    }

    public function get_select_navigation_parent() {
        $result = $this->_mod_nav_model->get_all_navigation_parent();
        echo json_encode($result);   
    }

    // public function get_navigation() {

    //     // get all parent navigation
    //     $parent_navigation = $this->_mod_nav_model->get_parent_navigation();

    //     // get all child navigation
    //     $child_navigation = $this->_mod_nav_model->get_child_navigation();

    //     $result = array();
    //     for( $i=0; $i<count($parent_navigation); $i++ ) {
    //         $result[$i]['id'] = $parent_navigation[$i]['NAVIGATION_ID'];
    //         $result[$i]['text'] = $parent_navigation[$i]['NAVIGATION_NAME'];

    //         $has_child = false;
    //         $data_child = array();
    //         $i_child = 0;
    //         for( $j=0; $j<count($child_navigation); $j++ ) {
    //             if( $child_navigation[$j]['NAVIGATION_PARENT'] == $parent_navigation[$i]['NAVIGATION_ID'] ) {
    //                 $has_child = true;
    //                 $data_child[$i_child]['id'] = $child_navigation[$j]['NAVIGATION_ID'];
    //                 $data_child[$i_child]['text'] = $child_navigation[$j]['NAVIGATION_NAME'];
    //                 $data_child[$i_child]['checked'] = false;
    //                 $i_child++;
    //             }
    //         }

    //         if($has_child) {
    //             $result[$i]['children'] = $data_child;
    //         }
    //     }
        
    //     echo json_encode($result);
    // }

    public function get_navigation_item() {
        $navigation_id = $this->input->post('navigation_id');
        $data_navigation = $this->_mod_nav_model->get_navigation_by('NAVIGATION_ID',$navigation_id);
        echo json_encode($data_navigation);
    }

    public function get_data_navigation() {
        $module_id = $this->input->post('module_id');
        // get all navigation by module_id
        $data_navigation = $this->_mod_nav_model->get_navigation_by('MODULE_ID',$module_id);

        echo json_encode($data_navigation);
    }

    public function checked_navigation() {
        $status = true;
        $check_navigation = $this->_mod_nav_model->get_module_navigation( $this->input->post() );
        if( count($check_navigation) <= 0 ) {
            $this->_mod_nav_model->add_module_navigation( $this->input->post() );
        } else {
            $status = false;
        }
        echo json_encode(array('status'=>$status));
    }

    public function save_navigation() {
        if(strlen($this->input->post('NAVIGATION_ID')) > 0){
            $this->_mod_nav_model->edit_navigation($this->input->post());
        } else {
            $this->_mod_nav_model->add_navigation($this->input->post());
        }
    }

    public function delete_navigation_item() {
        $id = $this->input->post('navigation_id');
        if((int)$id  == 0){
            throw new Exception;
        }
        $this->_mod_nav_model->delete_navigation($id);
    }
}
