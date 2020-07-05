<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
  function index()
  {
    $this->load->view("loginf" );

  }
  function loginr(){
    $data['title']='codeigniter';
    $this->load->view("loginf",$data);
  }
  function login_validation(){
     $this->load->library('form_validation');
     $this->form_validation->set_rules('usr','Username','required');
     $this->form_validation->set_rules('pass','Password','required');
     
     if($this->form_validation->run()){
       $username=$this->input->post('usr');
       $password=$this->input->post('pass');
       $tst=$this->input->post('test');
       $this->load->model('Main_model');
      
          if($this->Main_model->can_login($username, $password)){
        // $this->Main_model->load();
                $session_data=array(
                'user' => $username,
                'test' => $tst     
          //  'branch'=> $b,
          // 'year' => $y,
          // 'section'=> $s
                );
          $this->session->set_userdata($session_data);
          if($tst=="yes"){
             redirect (base_url().'login/enter1');
           }
           else
           {
             redirect (base_url().'login/enter');
           }
          }
       else {
         $this->session->set_flashdata('error', 'Invalid username and password');
         redirect (base_url().'login/loginr');
      }
}
     else {
       $this->loginr();
     }
  }
  function enter(){
    if($this->session->userdata('user') != ''){
   redirect (base_url());
     
     /*$this->load->model("Main_model");
      $this->Main_model->load();
       $ses=array(
       'branch'=> $query->row("branch")
         );
         $this->load->view("index",$ses);*/
    //  $this->load->view("index");
      //echo '<h2>Welcome - '.$this->session->userdata('user').'</h2>';
      //echo  '<label><a href="'.base_url().'main/logout">Log out</label></a>';
    }
    else {
      redirect (base_url(). 'login/loginr');
    }
  }
    function enter1(){
    if($this->session->userdata('user') != ''){
       $this->load->view("Test/test");
     /*$this->load->model("Main_model");
      $this->Main_model->load();
       $ses=array(
       'branch'=> $query->row("branch")
         );
         $this->load->view("index",$ses);*/
    //  $this->load->view("index");
      //echo '<h2>Welcome - '.$this->session->userdata('user').'</h2>';
      //echo  '<label><a href="'.base_url().'main/logout">Log out</label></a>';
    }
    else {
      redirect (base_url(). 'login/loginr');
    }
  }
  function logout(){
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('test');
    redirect (base_url() );
  }

   function signup(){
    $this->load->view('signup');
  }
}
?>
