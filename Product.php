<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');

  	 		$this->load->model('product_model');
        $this->load->library('session');



}

public function index()
{
  $role = -1;
  if($this->session->userdata('role')!=null)
    $role=$this->session->userdata('role');
  $data['role']=$role;
  $data['product']=$this->product_model->list_product();
  
  if($role == 'OWNER') $this->load->view("header.php");
  else $this->load->view("preheader.php");

  $this->load->view("product.php",$data);
  $this->load->view("footer.php");
}

public function newproduct(){
 //move_uploaded_file($_FILES['pimage']['tmp_name'],"uploads/".$_FILES['pimage']['name']);
      $pimage = '-1';
      $errors= array();
      $file_name = time();//$_FILES['pimage']['name'];
      $file_size =$_FILES['pimage']['size'];
      $file_tmp =$_FILES['pimage']['tmp_name'];
      $file_type=$_FILES['pimage']['type'];
      $file_ext=pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);//strtolower(end(explode('.',$_FILES['pimage']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         $fname = "uploads/".$file_name.'.'.$file_ext;
         move_uploaded_file($file_tmp,$fname);
         $pimage =  $fname;
      }else{
         //print_r($errors);
      }

  if($pimage != '-1'){
   $pname =  $this->input->post('pname');
   $prate =  $this->input->post('prate');
   $pinstock =  $this->input->post('pinstock');

   $uid=$this->session->userdata('user_id');

    $this->product_model->addproduct($uid,$pname,$prate,$pinstock,$pimage);

  }
    
 
  redirect('/product');

}

public function upload(){
      $value = '-1';
      $errors= array();
      $file_name = time();//$_FILES['pimage']['name'];
      $file_size =$_FILES['pimage']['size'];
      $file_tmp =$_FILES['pimage']['tmp_name'];
      $file_type=$_FILES['pimage']['type'];
      $file_ext=pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);//strtolower(end(explode('.',$_FILES['pimage']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         $fname = "uploads/".$file_name.'.'.$file_ext;
         move_uploaded_file($file_tmp,$fname);
         $value =  $fname;
      }else{
         //print_r($errors);
      }

      return $value;
}

public function deleteproduct(){

    
    $this->product_model->deleteproduct($this->input->post('i'));
 
  redirect('/product');



}

public function orders(){
  $mobile=-1;
  $product='';
  $rate='';
  $pr=-1;
  $qty=-1;
  $uid=-1;

  $role = -1;
  if($this->session->userdata('role')!=null)
    $role=$this->session->userdata('role');

  if($this->session->userdata('user_id')!=null)
    $uid=$this->session->userdata('user_id');
 

  if( $this->input->post('product') )
    $product =  $this->input->post('product');

  if( $this->input->post('rate') )
    $rate =  $this->input->post('rate');

  if( $this->input->post('pr') )
    $pr =  $this->input->post('pr');

  if( $pr == 1 ){//Order Request

    $data['product_id']=$product;
    $data['product_rate']=$rate;

  }

  if( $pr == 2 ){//New Order
 
    $qty =  $this->input->post('qty');
    $address =  $this->input->post('address');
    $mobile =  $this->input->post('mobile');

    $this->product_model->neworder($product,$rate,$qty,$address,$mobile);

  }
  if( $pr == 3 ) {//Search Order
 
    $mobile =  $this->input->post('mobile');

  }

  if( $pr == 4 ) {//update status
 
    $this->product_model->updatestatus($this->input->post('i'),$this->input->post('status'));

  }

  if( $pr == 5 ) {//Delete Order
 
    $this->product_model->deleteorder($this->input->post('i'));
    $mobile =  $this->input->post('mobile');

  }

   $data['role']=$role;
   $data['pr']=$pr;
    
   $data['orders']= $this->product_model->list_orders($mobile,$role,$uid);
 
  if($role == 'OWNER') $this->load->view("header.php");
  else $this->load->view("preheader.php");
  $this->load->view("orders.php",$data);
  $this->load->view("footer.php");



}

public function deleteorder(){

    
    $this->product_model->deleteorder($this->input->post('i'));
 
  redirect('/orders');



}



}

?>
