<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller{
  function index()
  {
    $this->load->view("index" );
  }
  function master($page){
    $this->load->view('header');
    $this->load->view($page);
    $this->load->view('footer');
  }
  function compile()
  {
    //$this->load->view("loginf" );
    $languageID=$_POST["language"];
        error_reporting(0);
  if($_FILES["file"]["name"]!="")
  {
    include "compilers/make.php";
  }

  else
  {
    switch($languageID)
      {
        case "c":
        {
          $this->load->view('c');
          break;
        }
        case "cpp":
        {
         $this->load->view("cpp");
          break;
        }

        case "cpp11":
        {
          $this->load->view("cpp11");
          break;
        }
        case "java":
        {
          $this->load->view("java");
          break;
        }

        case "python2.7":
        {
          $this->load->view("python27");;
          break;
        }
        case "python3.2":
        {
          $this->load->view("python32");;
          break;
        }
      }

  }

  }
  function save(){
	   $code = $_POST['code'];
       $f=$_POST['co'];
$this->load->database();
$rt=$this->session->userdata('user');
//echo"two";
//$this->db->where('usr',"$rt");
    //$hquery = $this->db->get('user');
//$result = $this->db->query("select branch from user where usr='$rt'");
//print_r($hquery);
// print_r($hquery);

$queryb = $this->db->query("select branch from user where usr='$rt'");
foreach ($queryb->result_array() as $rowb)
{
        print_r($rowb);
        $b=$rowb["branch"];
        
}
$queryy = $this->db->query("select year from user where usr='$rt'");
foreach ($queryy->result_array() as $rowy)
{
        $y=$rowy["year"];
        
}
$querys = $this->db->query("select section from user where usr='$rt'");
foreach ($querys->result_array() as $rows)
{
        $s=$rows["section"];
        
}
   
       /*$branch=$_POST['combobranch'];
       $year=$_POST['comboyear'];
        $sec=$_POST['combosection'];*/

        $this->session->userdata('user');
        $file = fopen("Folders/$b/$y/$s/".$this->session->userdata('user')."/$f.txt","w+") or die("file not open");
        $s = $code."\n";
        fputs($file,$s) or die("Data not Write");
        fclose($file);

        redirect(base_url());
  }

function devs(){
   $this->load->view('developers');

    }
}
?>
