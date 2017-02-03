<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class My_profile extends Controller  {


public function index(){
$user_id = $this->session->userdata('user_id');
$this->load->model('my_profile/Model_user');
$this->form_validation->set_rules($this->Model_user->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $password = $this->input->post('new_password',true);;
	   if(trim($password) != "")
	   $data_array['password'] = md5($password);
	   
	   $this->Model_user->save($data_array);
	   $this->session->set_flashdata('alert_success',lang('record_edit_success'));
       redirect('my_profile/index');

	   }

       $this->db->where('user_id',$user_id);
       $data['contact'] = $this->db->get('users')->row();	   
	   $this->layout->load_layout('my_profile/index',$data);
}


}


