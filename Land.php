<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Land extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('place_model');
               $this->load->model('land_model');
        $this->load->library('session');

}

public function index()
{
  $role = $this->session->userdata('role');
    $uid=$this->session->userdata('user_id');
    $data['uid']=$uid;
  $data['role']=$role;
  $data['place']=$this->place_model->list_place();
  $data['land']=$this->land_model->list_land();
  $this->load->view("header.php");
  $this->load->view("land.php",$data);
  $this->load->view("footer.php");
}

public function newland(){

     
  $this->land_model->newland($this->session->userdata('user_id'),$this->input->post('place'),$this->input->post('area'),$this->input->post('landmark'),$this->input->post('no_tree'),$this->input->post('rtype'));
 
  redirect('/land');

}

public function deleteland(){

    
    $this->land_model->deleteland($this->input->post('i'));
 
  redirect('/land');



}

}

?>
