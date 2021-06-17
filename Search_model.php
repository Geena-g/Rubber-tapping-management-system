<?php
class Search_model extends CI_model{
 
 

 
public function search_result($keyword,$option){
  $result=array();
  
  if($option !=-1 ){
    if($option == 'TAPPER'){
      $qry="select * from tbl_user where role='USER'";
      if($keyword !=-1){
        $qry .= "  and (user_name like '%".$keyword."%'  or user_email like '%".$keyword."%'  or address like '%".$keyword."%'  or user_mobile like '%".$keyword."%')";
      }
    }
    else if($option == 'OWNER'){
      $qry="select * from tbl_user where role='OWNER'";
      if($keyword !=-1){
        $qry .= "  and (user_name like '%".$keyword."%'  or user_email like '%".$keyword."%'  or address like '%".$keyword."%'  or user_mobile like '%".$keyword."%')";
      }
    }
    else if($option == 'LAND'){
      $qry = "select l.*,p.name as place_name,u.user_name,u.user_mobile,u.address from tbl_land as l join tbl_place as p on l.place=p.Id join tbl_user as u on l.userid=u.user_id where p.name like '%".$keyword."%' or landmark like '%".$keyword."%' or l.rubber_type like '%".$keyword."%'";
    }
    else if($option == 'PRODUCT'){
      $qry="select p.*,u.user_name,u.address,u.user_mobile from tbl_products as p join tbl_user as u on p.owner=u.user_id where p.product_name like '%".$keyword."%'";
    }
 
  
    $query = $this->db->query($qry);

    $result = $query->result_array();
  }

 
    return $result;

 
}


 
}
 
 
?>
