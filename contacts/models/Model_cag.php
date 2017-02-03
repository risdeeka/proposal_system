<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Model_cag extends CI_Model {

    public $table               = 'contact_and_groups';
    public $primary_key         = 'contact_and_groups.cag_id';
	
	public function __construct()
	{
		$this->load->database();
	}

   
	
	
    public function save($id = NULL, $db_array = NULL)
    {	
	
	$db_array['user_id'] = $this->session->userdata('user_id');
	//if($id == NULL)
	//$db_array['created'] = date('Y-m-d H:i:s');
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
	
	 public function delete_for_group($group_id)
    {
		$user_id= $this->session->userdata('user_id');
        $this->db->where('group_id='.$group_id.' and user_id = '.$user_id);
        $this->db->delete($this->table);

        
    }
	



}

?>