<?php
class Product_model extends CI_model{
 
 
 
public function addproduct($uid,$pname,$prate,$pinstock,$pimage){
 
 
    $qry="insert into tbl_products(owner,product_name,rate,image,instock) values(".$uid.",'".$pname."','".$prate."','".$pimage."',".$pinstock.")";
    $query = $this->db->query($qry);
 
}
public function deleteproduct($id){
  $qry="delete from tbl_products where Id=".$id;
    $query = $this->db->query($qry);
 
}
 
public function list_product(){
  $result=array();
 
    $qry="select p.*, u.user_name,u.address,u.user_mobile from tbl_products as p join tbl_user as u on p.owner=u.user_id ";
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function neworder($product,$rate,$qty,$address,$mobile){
 
 
    $qry="insert into tbl_orders(product,rate,qty,address,mobile,order_date,status) values(".$product.",'".$rate."',".$qty.",'".$address."','".$mobile."',curdate(),'Requested')";
    $query = $this->db->query($qry);
 
}

public function list_orders($mobile,$role,$uid){
  $result=array();
 
    $qry="select o.Id,o.product,o.rate,o.qty,o.address,o.mobile,o.order_date,o.status,p.product_name,p.owner,p.image from tbl_orders as o join tbl_products as p on o.product = p.Id where 1=1";

    if($role =='OWNER'){ $qry .= " and p.owner=".$uid; }
    else if($mobile !=-1){ $qry .= " and o.mobile=".$mobile; }
    else{ $qry .= " and p.owner = -1"; }
   
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

 public function updatestatus($id,$status){
  $qry="update tbl_orders set status='".$status."' where Id=".$id;
    $query = $this->db->query($qry);
 
}
 
 public function deleteorder($id){
  $qry="delete from tbl_orders where Id=".$id;
    $query = $this->db->query($qry);
 
}
}
 
 
?>
