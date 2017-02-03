<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Controller extends MX_Controller {

    

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
		$this->load->helper('email');
		//$this->load->helper('upload');
       $this->load->library('session');		
		
		$fclass  = $this->router->fetch_class(); 
        $fmethod = $this->router->fetch_method();
		$this->load->helper('language');
       
        $this->load->module('layout');
		$this->lang->load('en_lang.php', 'english');
		$this->load->library('form_validation');
		$this->form_validation->set_message('is_unique', 'The %s is already exists');
		
		if($this->session->userdata('user_id') <= 0  ){
		redirect('/sessions/login');
		
		
		  }
    }

}

?>