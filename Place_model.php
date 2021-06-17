<?php
class Place_model extends CI_model{
 
 
 
public function newplace($name){
 
 
    $qry="insert into tbl_place(name) values('".$name."')";
    $query = $this->db->query($qry);
 
}
public function deleteplace($id){
  $qry="delete from tbl_place where id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_place(){
  $result=array();
 
    $qry="select * from tbl_place";
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

 
 
}
 
 
?>
