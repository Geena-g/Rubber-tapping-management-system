<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');

  	 		$this->load->model('search_model');



}

public function index()
{
  $keyword = -1;
  $option = -1;

  if($this->input->post('keyword')!=null){
    $keyword =  $this->input->post('keyword');
    $option =  $this->input->post('option');
  }

  $data['results']=$this->search_model->search_result($keyword,$option);
  $data['option'] = $option;
  $data['keyword'] = $keyword;
  
 
  $this->load->view("preheader.php");
  $this->load->view("search.php",$data);
  $this->load->view("footer.php");

}





}

?>
