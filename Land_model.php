<?php
class Land_model extends CI_model{
 
 
 
public function newland($userid,$place,$area,$landmark,$no_tree,$rtype){
 
 
    $qry="insert into tbl_land(userid,place,area,landmark,no_tree,rubber_type) values(".$userid.",".$place.",'".$area."','".$landmark."',".$no_tree.",'".$rtype."')";
    $query = $this->db->query($qry);
 
}
public function deleteland($id){
  $qry="delete from tbl_land where id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_land(){
  $result=array();
 
    $qry="select l.*,p.name as place_name,u.user_name as user,u.user_mobile,u.address from tbl_land as l join tbl_place as p on l.place=p.Id join tbl_user as u on l.userid=u.user_id";
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

 
 
}
 
 
?>
