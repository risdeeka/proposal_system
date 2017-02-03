<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layout extends MX_Controller {
 public function __construct()
	{
		parent::__construct();
		
		$this->load->database();		
	}
	
	
	function load_layout($view,$data=array()){
	$this->load->view('header');
	$this->load->view($view,$data);
	$this->load->view('footer'); 
	}
	
	

}

?>