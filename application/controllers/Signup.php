<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller{
  function index(){
    $this->load->model('login_model');
   
    //$this->load->view('login/loginf');
    $this->load->view('signup');
  }

  function form_validation(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules("usr","Username",'required');
    $this->form_validation->set_rules("pass","Password",'required');
       $this->form_validation->set_rules("combobranch",'required');
    $this->form_validation->set_rules("comboyear",'required');
        $this->form_validation->set_rules("combosection",'required');
    if($this->form_validation->run()){
      $this->load->model('login_model');
      $data=array(
          "usr"=>$this->input->post("usr"),
        "pass"=>$this->input->post("pass"),
                  "branch"=>$this->input->post("combobranch"),
                            "year"=>$this->input->post("comboyear"),
                                      "section"=>$this->input->post("combosection")
      );
      $this->login_model->insert_data($data);
      $this->createpath($data['usr'],$data['branch'],$data['year'],$data['section']);
      redirect(base_url()."login");
        }
    else{
        $this->index();
    }

  }
  function createpath($path,$b,$y,$s) {
	  
    //$t= ."Folders/".$path;
     // mkdir($t, 0777, true);
    /*if (is_dir($path)) return true;
    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );
    $return = createPath($prev_spath);
    return ($return && is_writable($prev_path)) ? mkdir($path) : false;*/
    
   mkdir("Folders/"."$b/$y/$s/$path", 0777,true);

}
  function inserted(){
    $this-> index();
  }
  function file(){
    //$this->load->view('login/loginf');
    $this->load->view('file');
  }
}

 ?>
