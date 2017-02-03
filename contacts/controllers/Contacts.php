<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Contacts extends Controller  {

public function index(){
$user_id = $this->session->userdata('user_id');
$this->db->where('user_id',$user_id);
$data['contacts'] = $this->db->get('contacts')->result();
$this->layout->load_layout('contacts/index',$data);	
}



public function add($contact_group_id=NULL){
if($contact_group_id > 0){
$user_id = $this->session->userdata('user_id');
$contact_group = $this->db->where('contact_group_id',$contact_group_id)->get('contact_groups')->row();
if($contact_group->user_id  != $user_id){
	$this->session->set_flashdata('alert_error','This Group Not belongs to you');
	redirect('contact_groups/view/'.$contact_group_id);
}
}	
$this->load->model('contacts/Model_contact');
$this->form_validation->set_rules($this->Model_contact->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $data_array['email'] = $this->input->post('email',true);
	    $data_array['phone'] = $this->input->post('phone',true);
		$data_array['company'] = $this->input->post('company',true);
		
	   
	   $contact_id = $this->Model_contact->save(NULL, $data_array);
	   
	   if($contact_group_id > 0){
		$this->load->model('contacts/Model_cag'); 
         $data_array = array();  
	   $data_array['group_id'] = $contact_group_id;
	   $data_array['contact_id'] = $contact_id;
		
	   
	   $id = $this->Model_cag->save(NULL, $data_array);		 
		   
	   }
	   $this->session->set_flashdata('alert_success',lang('record_add_success'));
	   if($contact_group_id > 0)redirect('contact_groups/view/'.$contact_group_id);
       else redirect('contacts/index');

	   }	
	   $this->layout->load_layout('contacts/add');
}


public function edit($id){

$user_id = $this->session->userdata('user_id');
$contact = $this->db->where('contact_id',$id)->get('contacts')->row();
if($contact->user_id  != $user_id){
	$this->session->set_flashdata('alert_error','This Contact not belongs to you');
	redirect('contacts/index');
}

$this->load->model('contacts/Model_contact');
$this->form_validation->set_rules($this->Model_contact->validation_rules());	   
	   if ($this->form_validation->run()) {
	   $data_array = array();  
	   $data_array['first_name'] = $this->input->post('first_name',true);
	   $data_array['last_name'] = $this->input->post('last_name',true);
	   $data_array['email'] = $this->input->post('email',true);
	   $data_array['phone'] = $this->input->post('phone',true);
	   $data_array['company'] = $this->input->post('company',true);
	   
	   $this->Model_contact->save($id, $data_array);
	   $this->session->set_flashdata('alert_success',lang('record_edit_success'));
       redirect('contacts/index');

	   }

        $this->db->where('contact_id',$id);
       $data['contact'] = $this->db->get('contacts')->row();	   
	   $this->layout->load_layout('contacts/edit',$data);
}


public function delete($id){
$user_id = $this->session->userdata('user_id');
$contact = $this->db->where('contact_id',$id)->get('contacts')->row();
if($contact->user_id  != $user_id){
	$this->session->set_flashdata('alert_error','This Contact not belongs to you');
	redirect('contacts/index');
}
$this->load->model('contacts/Model_contact');
$id = $this->Model_contact->delete($id);
$this->session->set_flashdata('alert_success',lang('record_delete_success'));
redirect('contacts/index');
}


}


