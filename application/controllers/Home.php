<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('user')){
      redirect(base_url('login'),'refresh');
    }

    $this->load->model('login_model');

  }

  public function index()
  { 
    if(!$this->session->userdata('user')){
      redirect(base_url('login'),'refresh');
    }else{
      redirect('home/dashboard','refresh');
    }
  }



  public function dashboard(){

    $id_user =  $this->session->userdata('idAuth');
      //get user data from database
    $result = $this->login_model->SelectUser($id_user);

    //passing data to array
    if($result > 0){
      $this->session->set_userdata('user',$result['username']);
      $this->session->set_userdata('idAuth',$result['id']);
      $this->session->set_userdata('level',$result['level']);
      $this->session->set_userdata('email',$result['email']);
      $this->session->set_userdata('verify',$result['verified']);
    }

    $this->load->model('model_verification');
    $check_verify = $this->model_verification->check_verify_status($id_user);

    $level = $this->session->userdata('level');

    if($check_verify['verified']>0){
      if ($level == 1) {
          redirect('Admin');
      }else{
          redirect('Member');
      }
    }else{
          $data['view'] = 'verification';
    }

    $this->load->view('index',$data);
    }

  }
?>