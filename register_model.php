<?php
class register_model extends CI_Model {
	
	public function __construct()
	{ 
        parent::__construct(); 
    } 
	
	public function insertData($arrData) 
	{	
			 if($this->db->insert('register_tbl', $arrData))
				return true;
			else
				return false;
	  
		
    }
	public function insertOtp($arrData1) 
	{			
       
		$emailid=$arrData1['email'];
		
		if($this->db->insert('otp_tbl', $arrData1))
          return true;
        else
          return false;
		
    }
	public function updateOtp($arrData) 
	{
		$this->db->set('otp', $arrData['otp'], FALSE);
		$this->db->set('otp_create', date('Y-m-d H:i:s a', time()), FALSE);
		
		$this->db->set('otp_count', 'otp_count+1', FALSE);
		$this->db->where('email',$arrData['email'] );
		$this->db->update('mytable'); 
	}	
}


?>