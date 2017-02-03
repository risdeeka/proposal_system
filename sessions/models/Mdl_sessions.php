<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Mdl_Sessions extends CI_Model {
    public function __construct()
	{
		$this->load->database();
	}
	
	public function validation_rules(){
   
   return  array(
               array(
                     'field'   => 'email', 
                     'label'   => lang('email'), 
                     'rules'   => 'required'
                  ),
			    array(
                     'field'   => 'password', 
                     'label'   => lang('password'), 
                     'rules'   => 'required'
                  ),
				  
			);
}
			
			
			
     public function register_validation_rules(){
   
   return  array(
              
				  array(
                     'field'   => 'first_name', 
                     'label'   => lang('firstname'), 
                     'rules'   => 'required'
                  ),
				  
				   array(
                     'field'   => 'last_name', 
                     'label'   => lang('lastname'), 
                     'rules'   => 'required'
                  ),
			  array(
                     'field'   => 'email', 
                     'label'   => lang('email'), 
                     'rules'   => 'required|valid_email|is_unique[users.email]'
                  ),
			     array(
                     'field'   => 'password', 
                     'label'   => lang('password'), 
                     'rules'   => 'trim|required|min_length[10]|max_length[25]'
               
                  ),
				  
                array(
                     'field'   => 'passwordc', 
                     'label'   => lang('verify_password'), 
                     'rules'   => 'required|matches[password]'
                  )	
			  
				  
               				  
				  
			);


   
   }
   
   public function recover_validation_rules(){
   
   return  array(
               array(
                     'field'   => 'email', 
                     'label'   => lang('email'), 
                     'rules'   => 'required|valid_email|email_exists'
                  )
				  
			);
}

 public function security_validation_rules(){
   
   return  array(
               
				  
				  array(
                     'field'   => 'sec_answer', 
                     'label'   => lang('sec_answer'), 
                     'rules'   => 'required|check_answer'
                  )
				  
			);
}



public function reset_validation_rules(){
   
   return  array(
              
			    array(
                     'field'   => 'password', 
                     'label'   => lang('password'),
					 'rules'   => 'trim|matches[passwordv]|required|is_password_strong'
                  ),
                array(
                     'field'   => 'passwordv', 
                     'label'   => lang('verify_password'), 
                     'rules'   => 'trim|required'
                  )				  
				  
			);		


   
   }

   
    
     public function auth($email, $password,$user_type="")
    {
	$this->db->where("email",$email);
    $query = $this->db->get("users");
	
		
        if ($query->num_rows())
        {
            $user = $query->row();
			
			if($user->password == md5($password)){
			
            if($user->active == 1){ 
			
             $session_data = array(
                    
                    'user_id'   => $user->user_id,
                    'user_name' => $user->first_name." ".$user->last_name
                );
			
				
				$this->session->set_userdata($session_data);
				return 1;
				}else return 3;
			}
        
		}
		

        return 2;
    }

 public function save($id = NULL, $db_array = NULL)
    {
	if($id == NULL)
	$db_array['created'] = date('Y-m-d H:i:s');
	
        if($id){
		 $this->db->where('user_id', $id);
         $this->db->update("users", $db_array);
		 }
		else{
		$this->db->insert('users', $db_array);
		$id = $this->db->insert_id();
		}

        

        return $id;
    }	
	
	
 public function sendVerificatinEmail($name,$email,$verificationText){ 
 
  $this->load->helper('email');
  $data['verificationText'] = $verificationText;
  $data['name'] = $name;
  $message = $this->load->view('verify_email',$data,true); 


  sendEmail($email,"Email Verification",$message);  
  
  
   }
   
   
 
 public function verifyEmailAddress($verificationcode){  
  $sql = "update users set active='1' WHERE verifi_code=?";
  $this->db->query($sql, array($verificationcode));
  $affrows = $this->db->affected_rows(); 
  
  $this->db->where("verifi_code",$verificationcode);
  $user = $this->db->get("users")->row();
 
  if($user){
  if($user->active == 1 && $affrows == 0)return 1;
  elseif($user->active == 1 && $affrows == 1)return 2;
  elseif($affrows == 0)return 3;
  
  }
  
  return 3;
  
  
  
  
  
 }

public function generate_verification_code(){
	
	return  md5(uniqid(rand(), true));
	
	}
 
}

?>