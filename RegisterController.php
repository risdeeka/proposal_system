<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class RegisterController extends MX_Controller {

    

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');		
		
		$fclass  = $this->router->fetch_class(); 
        $fmethod = $this->router->fetch_method();
		$this->load->helper('language');
       
        $this->load->module('layout');
		$this->lang->load('en.php', 'english');
		$this->load->library('form_validation');
		$this->form_validation->set_message('is_unique', 'The %s is already exists');
		
		if($this->session->userdata('user_id') > 0 && $fmethod != "logout" && $this->session->userdata('user_type') != 'Admin' ){
		redirect('/dashboard');
		
		
		  }
    }

}

?>