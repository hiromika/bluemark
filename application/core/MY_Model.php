<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function install_module($data) {
        
        $this->db->insert('bama_modules',array(
            'MODULE_NAME' => $data['MODULE_NAME'],
            'MODULE_SLUG' => $data['MODULE_SLUG'],
            'MODULE_DESC' => $data['MODULE_DESC'],
            'MODULE_STATUS' => 1,
            'MODULE_ENABLED' => 1
        ));

        $id = $this->db->insert_id();
        
        return $id;
    }

    public function install_navigation($data) {
    	$this->db->insert('bama_navigation',array(
            'NAVIGATION_NAME' => $data['NAVIGATION_NAME'],
            'NAVIGATION_CLS' => $data['NAVIGATION_CLS'],
            'NAVIGATION_PARENT' => $data['NAVIGATION_PARENT'],
            'NAVIGATION_LINK' => $data['NAVIGATION_LINK'],
            'MODULE_ID' => $data['MODULE_ID']
        ));

        $id = $this->db->insert_id();
        
        return $id;	
    }

    public function install_role_navigation($data) {
    	$this->db->insert('bama_role_navigation',array(
            'NAVIGATION_ID' => $data['NAVIGATION_ID'],
            'ROLE_ID' => $data['ROLE_ID']
        ));

        $id = $this->db->insert_id();
        
        return $id;	
    }

    public function install_permission($data) {
    	$this->db->insert('bama_permission',array(
            'PERMISSION_NAME' => $data['PERMISSION_NAME'],
            'PERMISSION_SLUG' => $data['PERMISSION_SLUG'],
            'PERMISSION_DESC' => $data['PERMISSION_DESC'],
            'MODULE_ID' => $data['MODULE_ID']
        ));

        $id = $this->db->insert_id();
        
        return $id;	
    }

    public function install_role_permission($data) {
    	$this->db->insert('bama_role_permission',array(
            'PERMISSION_ID' => $data['PERMISSION_ID'],
            'ROLE_ID' => $data['ROLE_ID']
        ));

        $id = $this->db->insert_id();
        
        return $id;	
    }

    # akhir proses install module

    # proses uninstall module
    public function uninstall_module($module_slug) {
    	$this->db->select("MODULE_ID");
    	$this->db->where('MODULE_SLUG',$module_slug);
    	$data = $this->db->get('bama_modules');
    	$result = $data->result_array();
    	$module_id = "";
    	if(count($result) > 0) {
    		$module_id = $result[0]['MODULE_ID'];
    	}

    	if($module_id != "") {
    		$this->db->where('MODULE_ID',$module_id);
	        $this->db->delete('bama_modules');

	        // DELETE NAVIGATION AND ROLE NAVIGATION
	        $this->uninstall_delete_navigation($module_id);

	        // DELETE PERMISSION AND ROLE PERMISSION
	        $this->uninstall_delete_permission($module_id);
	        return true;
    	} else {
    		return false;
    	}
    }

    public function uninstall_delete_navigation( $module_id ) {
    	$this->db->select('NAVIGATION_ID');
    	$this->db->where('MODULE_ID',$module_id);
    	$r_data = $this->db->get('bama_navigation');
    	$data_navigation = $r_data->result_array();
    	for($i=0; $i<count($data_navigation); $i++) {
    		// delete role navigation
    		$navigation_id = $data_navigation[$i]['NAVIGATION_ID'];
    		$this->uninstall_delete_role_navigation($navigation_id);

    		// delete bama navigation
    		$this->db->where('NAVIGATION_ID', $navigation_id);
    		$this->db->delete('bama_navigation');
    	}
    }

    public function uninstall_delete_role_navigation($navigation_id) {
    	$this->db->where('NAVIGATION_ID',$navigation_id);
    	$this->db->delete('bama_role_navigation');
    }

    public function uninstall_delete_permission( $module_id ) {
    	$this->db->select('PERMISSION_ID');
    	$this->db->where('MODULE_ID',$module_id);
    	$r_data = $this->db->get('bama_permission');
    	$data_permission = $r_data->result_array();

    	for($i=0; $i<count($data_permission); $i++) {
    		// delete bama role permission
    		$permission_id = $data_permission[$i]['PERMISSION_ID'];
    		$this->uninstall_delete_role_permission($permission_id);

    		// delete bama permission
    		$this->db->where('PERMISSION_ID', $permission_id);
    		$this->db->delete('bama_permission');
    	}
    }

    public function uninstall_delete_role_permission($permission_id) {
    	$this->db->where('PERMISSION_ID',$permission_id);
    	$this->db->delete('bama_role_permission');
    }
    
    # proses edit module
    public function edit_module($data) {
        
        $this->db->where('MODULE_ID',$data['MODULE_ID']);
        
        $this->db->update('bama_modules',array(
            'MODULE_NAME' => $data['MODULE_NAME'],
            'MODULE_DESC' => $data['MODULE_DESC']
        ));
        
        return true;
    }

    public function import_sql($fullpathfile) {
        $file_restore = $this->load->file($fullpathfile, true);
        $file_array = explode(';', $file_restore);
        foreach ($file_array as $query)
        {
            if(strlen($query) > 5) {
                $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
                $this->db->query($query);
                $this->db->query("SET FOREIGN_KEY_CHECKS = 1");    
            }
        }
    }
}