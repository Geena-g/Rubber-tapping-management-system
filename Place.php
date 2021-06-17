<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Place extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('place_model');
        $this->load->library('session');

}

public function index()
{
  $role = $this->session->userdata('role');
  $data['role']=$role;
  $data['place']=$this->place_model->list_place();
  $this->load->view("header.php");
  $this->load->view("place.php",$data);
  $this->load->view("footer.php");
}

public function newplace(){

     
  $this->place_model->newplace($this->input->post('name'));
 
  redirect('/place');

}

public function deleteplace(){

    
    $this->place_model->deleteplace($this->input->post('i'));
 
  redirect('/place');



}

}

?>
