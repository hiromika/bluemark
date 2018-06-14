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
class manage_themes extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_manage_themes','_manage_themes_model');
    }
    
    public function index() {
        
        $this->layout->set_header('Theme List');
        
        $content = $this->load->view('index',array(),true);
        $this->layout->set_content($content);
        
        $this->layout->render("",__CLASS__);
    }
    
    public function get() {
        $db_themes = $this->_manage_themes_model->get_all_themes();

        $path = FCPATH . '/themes/';
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
                                $dir_result[$seq_dir]["THEME_NAME"] = $config['name'];
                                $dir_result[$seq_dir]["THEME_SLUG"] = $config['slug'];
                                $dir_result[$seq_dir]["THEME_AUTHOR"] = $config['author'];
                                $dir_result[$seq_dir]["THEME_STATUS"] = "0";
                                $dir_result[$seq_dir]["THEME_STATUS_LABEL"] = "NOT INSTALLED";
                                $dir_result[$seq_dir]["THEME_ACTIVE"] = "0";
                                $dir_result[$seq_dir]["THEME_ACTIVE_LABEL"] = "NO ACTIVE";
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

            if( count($db_themes) > 0 ) {
                $ketemu = false;
                for( $i=0; $i<count($db_themes); $i++ ) {
                    if( $dir_result[$j]['THEME_SLUG'] == $db_themes[$i]['THEME_SLUG'] ) {
                        $ketemu = true;
                        break;
                    }
                }

                if(!$ketemu) { // jika ga ada di db
                    array_push($db_themes, $dir_result[$j]); 
                }
            } else {
                // kalau ga ada di db
                $db_themes = $dir_result;
            }
        }

        // paging array
        $start = (($this->input->get('page') - 1) * $this->input->get('rows')); //get start from page number
        $limit = $this->input->get('rows');
        $end = $start + $limit;
        $count = count($db_themes);

        // Conditionally return results
        if ($start < 0 || $count <= $start)
            // Page is out of range
            $datagrid = array(); 
        else if ($count <= $end) 
            // Partially-filled page
            $datagrid = array_slice($db_themes, $start);
        else
            // Full page 
            $datagrid = array_slice($db_themes, $start, $end - $start);

        $key = $this->input->get('key');
        if($key != "") {
            $datagrid = $this->search_paging($db_themes,'THEME_NAME',$key);
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

    public function install() {
        $status = true;
        $msg = "";
        $theme_slug = $this->input->post('THEME_SLUG');

        $path = FCPATH . '/themes/';
        $dir_result = array();
        
        if (is_dir($path . '/' . $theme_slug)) {
            $curr_dir = $path . '/' . $theme_slug;
            
            // check file config.php
            if ($dh = opendir($curr_dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file === '.' or $file === '..') continue;

                    if($file === 'config.php') {
                        include_once($curr_dir . '/' . $file);
                        if(isset($config)) {
                            if($theme_slug !== $config['slug']) {
                                // no data in config variable
                                $msg = "Slug tidak sama pada slug di file config.php";
                                $status = false;
                            } else {
                                $dir_result["THEME_NAME"] = $config['name'];
                                $dir_result["THEME_SLUG"] = $config['slug'];
                                $dir_result["THEME_AUTHOR"] = $config['author'];

                                $status = true;
                                $msg = "Success Install " . $dir_result["THEME_NAME"];

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

            // check folder views
            if($status) {
                if ($dh = opendir($curr_dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file === '.' or $file === '..') continue;
                        if($file === 'views') {
                            $status = true;
                            break;
                        } else {
                            // no file config.php in folder
                            $msg = "Tidak ada folder views pada theme ".$dir_result["THEME_NAME"];
                            $status = false;
                        }
                    }
                    closedir($dh);
                } else {
                    // no file config.php in folder
                    $msg = "Folder ".__CLASS__." tidak dapat diakses";
                    $status = false;
                }
            }


            // check file login.php dan navigation.php di folder views
            if($status) {
                // ada folder views
                if($df = opendir($curr_dir . '/views/')) {
                    $ketemu=0;
                    while (($file = readdir($df)) !== false) {
                        if ($file === '.' or $file === '..') continue;

                        if($file === 'login.php') {
                            // echo "1.login.php";
                            $ketemu++;
                            // echo $ketemu;
                        }

                        if($file === 'navigation.php') {
                            // echo "2.navigation.php";
                            $ketemu++;
                            // echo $ketemu;
                        }
                    }

                    if($ketemu == 2) {
                        // ada 2 file navigation.php dan login.php
                        $status = true;
                        $msg = "Success Install " . $dir_result["THEME_NAME"];  
                    } else {
                        // no data in config variable
                        $msg = "Tidak ada file navigation.php atau login.php pada folder views theme " . $dir_result["THEME_NAME"];
                        $status = false;
                    }
                } else {
                    // no data in config variable
                    $msg = "Tidak ada twte folder views theme ".$dir_result["THEME_NAME"];
                    $status = false;
                }
            }

        } else {
            $msg = "Folder ".__CLASS__." tidak ditemukan";
            $status = false;
        }

        if($status === true) {
            if(array_key_exists("THEME_SLUG", $dir_result)) {
                $theme_id = $this->_manage_themes_model->add($dir_result);
            }
        }

        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }

    public function uninstall() {
        $theme_slug = $this->input->post('THEME_SLUG');
        $status = $this->_manage_themes_model->delete($theme_slug);
        $msg = "Gagal melakukan proses uninstall";
        if($status) $msg = "Berhasil melakukan uninstall theme";
        echo json_encode(array("status"=>$status,"msg"=>$msg));
    }

    public function set_active() {
        $theme_id = $this->input->post('THEME_ID');
        $this->_manage_themes_model->set_active_theme($theme_id);
        echo json_encode(true);
    }

    public function save() {
        if(strlen($this->input->post('THEME_ID')) > 0){
            $this->_manage_themes_model->edit($this->input->post());
        } else {
            // $this->_manage_themes_model->add($this->input->post());
        }
    }
}
