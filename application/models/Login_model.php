<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
  function  login(){

  }
  function insert_data($data){
    $this->db->insert("user",$data);
  }
  function fetch_single($id){
    $this->db->where("book_id",$id);
    $query=$this->db->get("new");
    return $query;
  }
}
 ?>
