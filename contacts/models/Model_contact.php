<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_contact extends CI_Model {

    public $table               = 'contacts';
    public $primary_key         = 'contacts.contact_id';
	
	public function __construct()
	{
		$this->load->database();
	}

   public function validation_rules(){
   
   return  array(
               array(
                     'field'   => 'first_name', 
                     'label'   => lang('first_name'), 
                     'rules'   => 'required'
					 
                  ) ,
               array(
                     'field'   => 'last_name', 
                     'label'   => lang('last_name'), 
                     'rules'   => 'required'
					 
                  ) ,
              array(
                     'field'   => 'email', 
                     'label'   => lang('email'), 
                     'rules'   => 'required'
					 
                  ) ,
              array(
                     'field'   => 'phone', 
                     'label'   => lang('phone'), 
                     'rules'   => 'required'
					 
                  ) ,
				  array(
                     'field'   => 'company', 
                     'label'   => lang('company'), 
                     'rules'   => 'required'
					 
                  ) 
             				  
				  
			);
   }
	
	
	
	

    public function save($id = NULL, $db_array = NULL)
    {	
	$edit = $id;
	$db_array['user_id'] = $this->session->userdata('user_id');
	if($id == NULL)
	$db_array['created'] = date('Y-m-d H:i:s');
        if($id){
		 $this->db->where($this->primary_key, $id);
         $this->db->update($this->table, $db_array);
		 }
		else{
		$this->db->insert($this->table, $db_array);
		$id =  $this->db->insert_id();
		}

        
		

        return $id;
    }

    public function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);

        
    }
	



}

?>