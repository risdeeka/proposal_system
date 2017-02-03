<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Dashboard extends Controller  {
public function index(){
$data = array();
$user_id = $this->session->userdata('user_id');
$data['contacts_count'] = $this->db->where('user_id',$user_id)->get('contacts')->num_rows();
$data['contact_groups_count'] = $this->db->where('user_id',$user_id)->get('contact_groups')->num_rows();
$this->layout->load_layout('dashboard/index',$data);	
}

}


