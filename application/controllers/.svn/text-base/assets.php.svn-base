<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Assets extends CI_Controller {
    
    function __construct() {
        parent::__construct(); 
        //---get working directory and map it to your module
        $path = getcwd() . '/application/modules/' . $this->uri->segments[2];
        $uri = $this->uri->segments;
        unset($uri[2]);
        $uri = implode('/',$uri);
        $file = $path.'/'.$uri;
		
        //----get path parts form extension
        $path_parts = pathinfo( $file);
        //---set the type for the headers
        $file_type=  strtolower($path_parts['extension']);
        
        if (is_file(realpath($file))) {
            //----write propper headers
            switch ($file_type) {
                case 'css':
                    header('Content-type: text/css');
                    break;

                case 'js':
                    header('Content-type: text/javascript');
                    break;
                
                case 'json':
                    header('Content-type: application/json');
                    break;
                
                case 'xml':
                    header('Content-type: text/xml');
                    break;
                
                case 'pdf':
                    header('Content-type: application/pdf');
                    break;
                
                case 'jpg' || 'jpeg' || 'png' || 'gif':
                    readfile($file);
                    break;
            }
 
            readfile($file);
        } else {
            show_404();
        }
        exit;
    }
   
}