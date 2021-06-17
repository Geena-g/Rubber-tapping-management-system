<?php
class User_model extends CI_model{
 
 
 
public function register_user($user){
 
 
$this->db->insert('tbl_user', $user);
 
}
 
public function login_user($user_login){
  $result=array();
 //$email,$pass
 /* $this->db->select('*');
  $this->db->from('tbl_user');
  $this->db->where('email',$user_login['user_email']);
  $this->db->where('password',$user_login['user_password']);
  */
  $qry="select * from tbl_user where user_email='".$user_login['user_email']."' and user_password='".$user_login['user_password']."' and status='APPROVED'";
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function listlandowner($uid,$role){
  $result=array();
 
  $qry="select * from tbl_user where role='OWNER'";

  if($role == "OWNER")
    $qry .= " and user_id=".$uid;
    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function listtapper($uid,$role,$land){
  $result=array();
 
  $qry="select * from tbl_user where role='USER'";

  if($role == 'OWNER')
    $qry = "select u.*,tr.rate_day,tr.Id,tr.land from tbl_user as u join tbl_tap_request as tr on u.user_id = tr.tapper where u.role='USER' and tr.status='APPROVED' and tr.land=".$land;

    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function addtapperrequests($uid,$role,$land,$details,$rate_day){

$qry= "select count(*) as present from tbl_tap_request where tapper=".$uid." and land=".$land;
$query = $this->db->query($qry);
$result = $query->result_array();

if($result[0]['present'] == 0 ){ 
  
  $qry="insert into tbl_tap_request(land,tapper,details,rate_day,status,request_date,modified_date) values( ".$land.", ".$uid.", '".$details."','".$rate_day."','Requested',curdate(),'--')";
    $query = $this->db->query($qry);
}
   
 
}

public function listtapperrequests($uid,$role){
  $result=array();
 
  $qry="select l.no_tree,l.Id as land_id,l.rubber_type,l.area,t.user_name,t.user_mobile,t.user_id,tr.Id,tr.details,tr.rate_day,tr.status,tr.request_date,tr.modified_date from tbl_user as t join tbl_tap_request as tr on t.user_id=tr.tapper join tbl_land as l on tr.land=l.Id where 1=1";

  if($role == 'USER'){
    $qry .= " and tr.tapper=".$uid;
  }

  if($role=='OWNER'){
    $qry .= " and l.userid=".$uid;
  }


    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function listtapperattendance($tapper,$land,$uid,$role){
  $result=array();
 
  $qry="select a.*,u.user_name,u.user_mobile,l.no_tree,l.Id as land_id,l.rubber_type,l.area from tbl_attendance as a join tbl_user as u on a.tapper=u.user_id join tbl_land as l on a.land=l.Id where 1=1";

  if($role == 'USER'){
    $qry .= " and a.tapper=".$tapper;
  }

  if($role='OWNER'){
    $qry .= " and a.tapper=".$tapper." and a.land=".$land;
  }

  $qry .= " order by a.Id DESC";


    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}

public function listtapperpayment($tapper,$land,$uid,$role){
  $result=array();
 
  $qry="select a.*,u.user_name,u.user_mobile,l.no_tree,l.Id as land_id,l.rubber_type,l.area from tbl_payment as a join tbl_user as u on a.tapper=u.user_id join tbl_land as l on a.land=l.Id where 1=1";

  if($role == 'USER'){
    $qry .= " and a.tapper=".$tapper;
  }

  if($role='OWNER'){
    $qry .= " and a.tapper=".$tapper." and a.land=".$land;
  }

  $qry .= " order by a.Id DESC";


    $query = $this->db->query($qry);

    $result = $query->result_array();

 
    return $result;

 
}
public function markattendance($tapper,$land,$rate_day){

$qry= "select count(*) as present from tbl_attendance where tapper=".$tapper." and land=".$land." and present_date=curdate()";
$query = $this->db->query($qry);
$result = $query->result_array();

if($result[0]['present'] == 0 ){ 
  
  $qry="insert into tbl_attendance(tapper,land,present_date,wage) values(".$tapper.",".$land.",curdate(),".$rate_day.")";
    $query = $this->db->query($qry);
}
   
 
}
public function deleteattendance($id){
  
  $qry="delete from tbl_attendance where Id=".$id;
    $query = $this->db->query($qry);

   
 
}


public function calculatepay($tapper,$land,$date_from,$date_to){

 $qry="select sum(wage) as amount from tbl_attendance where status='--' and present_date>='".$date_from."' and present_date<='".$date_to."' and tapper=".$tapper." and land=".$land;
 $query = $this->db->query($qry);
$result = $query->result_array();
$amount=$result[0]['amount'] ;
  
  if($amount>0){
  $qry="insert into tbl_payment(tapper,land,amount,date_from,date_to,calculation_date) values(".$tapper.",".$land.",'".$amount."','".$date_from."','".$date_to."',curdate())";
    $query = $this->db->query($qry);

    $qry="update tbl_attendance set status='CALCULATED' where status='--' and present_date>='".$date_from."' and present_date<='".$date_to."' and tapper=".$tapper." and land=".$land;
 $query = $this->db->query($qry);


}

 
}


public function deletepayment($id,$tapper,$land,$date_from,$date_to){
  
  $qry="delete from tbl_payment where Id=".$id;
  $query = $this->db->query($qry);

  $qry="update tbl_attendance set status='--' where present_date>='".$date_from."' and present_date<='".$date_to."' and tapper=".$tapper." and land=".$land ;
  $this->db->query($qry);  
 
}

public function approveowner($id){
  
  $qry="update tbl_user set status='APPROVED' where user_id=".$id;
    $query = $this->db->query($qry);

   
 
}

public function rejectowner($id){
  
  $qry="update tbl_user set status='REJECTED' where user_id=".$id;
    $query = $this->db->query($qry);

   
 
}

public function approverequest($id){
  
  $qry="update tbl_tap_request set status='APPROVED' where Id=".$id;
    $query = $this->db->query($qry);

   
 
}

public function rejectrequest($id){
  
  $qry="update tbl_tap_request set status='REJECTED' where Id=".$id;
    $query = $this->db->query($qry);

   
 
}
public function email_check($email){
 
  $this->db->select('*');
  $this->db->from('tbl_user');
  $this->db->where('user_email',$email);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }
 
}
 
 
}
 
 
?>
