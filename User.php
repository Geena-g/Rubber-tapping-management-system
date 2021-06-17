<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');

}

public function index()
{

$this->load->view("register.php");
}
   
   
   public function register_owner()
    {
$this->load->view("preheader.php");
    $this->load->view("landownerreg.php");
    $this->load->view("footer.php");
    }
    public function register()
    {
$this->load->view("preheader.php");
    $this->load->view("register.php");
    $this->load->view("footer.php");
    }

public function register_user(){

     
  $user=array(
    'user_name'=>$this->input->post('user_name'),
    'user_email'=>$this->input->post('user_email'),
    'user_password'=>$this->input->post('user_password'),
    'gender'=>$this->input->post('gender'),
    'user_mobile'=>$this->input->post('user_mobile'),
                'role'=>'USER', 'status'=>'APPROVED','aadharno'=>$this->input->post('aadhar'),'address'=>$this->input->post('address'),

      );
    print_r($user);



  $this->user_model->register_user($user);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('user/login_view');


}
    public function register_landowner(){

          $user=array(
          'user_name'=>$this->input->post('user_name'),
          'user_email'=>$this->input->post('user_email'),
          'user_password'=>$this->input->post('user_password'),
          'gender'=>$this->input->post('gender'),
          'user_mobile'=>$this->input->post('user_mobile'),'aadharno'=>$this->input->post('aadhar'),'address'=>$this->input->post('address'),
                      'role'=>'OWNER',

            );
        print_r($user);



      $this->user_model->register_user($user);
      $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
      redirect('user/login_view');


    }




public function login_view(){


$this->load->view("preheader.php");
$this->load->view("login.php");

$this->load->view("footer.php");

}

function login_user(){ 
  $user_login=array(

  'user_email'=>$this->input->post('user_email'),
  'user_password'=>$this->input->post('user_password')

    ); 
//$user_login['user_email'],$user_login['user_password']
    $users=$this->user_model->login_user($user_login);
    if($users){
        $this->session->set_userdata('user_id',$users[0]['user_id']);
        $this->session->set_userdata('role',$users[0]['role']);
    
    redirect('land');
    }
    else{
       $this->session->set_flashdata('error_msg', 'Invalid Login Credentials..');
       redirect('user/login_view', 'refresh');

      }

}

function user_profile(){
$this->load->view("header.php");
$this->load->view('user_profile.php');
$this->load->view("footer.php");

}

public function landowner()
{
  $role = $this->session->userdata('role');
    $uid=$this->session->userdata('user_id');
    $data['uid']=$uid;
  $data['role']=$role;
  $data['user']=$this->user_model->listlandowner($uid,$role);
  $this->load->view("header.php");
  $this->load->view("landowner.php",$data);
  $this->load->view("footer.php");
}

function approveowner(){
$this->user_model->approveowner($this->input->post('i'));
redirect('user/landowner');

}

function rejectowner(){
$this->user_model->rejectowner($this->input->post('i'));
redirect('user/landowner');

}

function approverequest(){
$this->user_model->approverequest($this->input->post('i'));
redirect('user/requests');

}

function rejectrequest(){
$this->user_model->rejectrequest($this->input->post('i'));
redirect('user/requests');

}

public function tapper()
{
  $land =-1;
  $role = $this->session->userdata('role');
    $uid=$this->session->userdata('user_id');
    $data['uid']=$uid;
  $data['role']=$role;
  if($this->input->post('land')!=null) {
    $land = $this->input->post('land');
  }
  $data['user']=$this->user_model->listtapper($uid,$role,$land);
  $this->load->view("header.php");
  $this->load->view("tapper.php",$data);
  $this->load->view("footer.php");
}

public function requests()
{
  $role = $this->session->userdata('role');
    $uid=$this->session->userdata('user_id');
  $land=-1;
  $pr=-1;
  if($this->input->post('pr')!=null){$pr = $this->input->post('pr');}
  if($this->input->post('land')!=null){$land = $this->input->post('land');}

if($pr==3){
  $details='';
  $rate_day  ='';
  if($this->input->post('rate_day')!=null){$rate_day = $this->input->post('rate_day');}
  if($this->input->post('details')!=null){$details = $this->input->post('details');}
  $this->user_model->addtapperrequests($uid,$role,$land,$details,$rate_day);

}

  $data['uid']=$uid;
  $data['role']=$role;
  $data['pr']=$pr;
  $data['land']=$land;

  $data['requests']=$this->user_model->listtapperrequests($uid,$role);
  $this->load->view("header.php");
  $this->load->view("tapperrequests.php",$data);
  $this->load->view("footer.php");
}

public function attendance()
{
  $role = $this->session->userdata('role');
    $uid=$this->session->userdata('user_id');

    $tapper=-1;
    $land=-1;
    $pr=-1;
    $i=-1;
    $rate_day=-1;
    if($this->input->post('tapper')!=null){$tapper = $this->input->post('tapper');}
    if($this->input->post('land')!=null){$land = $this->input->post('land');}

    if($this->input->post('pr')!=null){$pr = $this->input->post('pr');}
    if($this->input->post('i')!=null){$i = $this->input->post('i');}
    if($this->input->post('rate_day')!=null){$rate_day = $this->input->post('rate_day');}

    if($pr=="del"){
      if($i!=-1){
        $this->user_model->deleteattendance($i);
      }
    }
    if($pr=="mark"){
      if($rate_day!=-1){
        $this->user_model->markattendance($tapper,$land,$rate_day);
      }
    }

    $data['uid']=$uid;
  $data['role']=$role;
  $data['tapper']=$tapper;
  $data['land']=$land;
  $data['attendance']=$this->user_model->listtapperattendance($tapper,$land,$uid,$role);
  $this->load->view("header.php");
  $this->load->view("tapperattendance.php",$data);
  $this->load->view("footer.php");
}

public function payment()
{
  $role = $this->session->userdata('role');
    $uid=$this->session->userdata('user_id');

    $tapper=-1;
    $land=-1;
    $pr=-1;
    $i=-1;
    $rate_day=-1;
    $date_from=-1;
    $date_to=-1;
    if($this->input->post('tapper')!=null){$tapper = $this->input->post('tapper');}
    if($this->input->post('land')!=null){$land = $this->input->post('land');}

    if($this->input->post('pr')!=null){$pr = $this->input->post('pr');}
    if($this->input->post('i')!=null){$i = $this->input->post('i');}
    if($this->input->post('rate_day')!=null){$rate_day = $this->input->post('rate_day');}

    if($this->input->post('date_to')!=null){$date_to = $this->input->post('date_to');}
    if($this->input->post('date_from')!=null){$date_from = $this->input->post('date_from');}


    if($pr=="del"){
      if($i!=-1){
        $this->user_model->deletepayment($i,$tapper,$land,$date_from,$date_to);
      }
    }

    if($pr=="calc"){
     
        $this->user_model->calculatepay($tapper,$land,$date_from,$date_to);
      }


    $data['uid']=$uid;
  $data['role']=$role;
  $data['tapper']=-$tapper;
  $data['land']=$land;
  $data['payment']=$this->user_model->listtapperpayment($tapper,$land,$uid,$role);
  $this->load->view("header.php");
  $this->load->view("tapperpayment.php",$data);
  $this->load->view("footer.php");
}

public function user_logout(){

  $this->session->sess_destroy();
  redirect('/', 'refresh');
}

}

?>
