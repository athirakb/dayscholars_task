<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {


	public function __construct() {
		parent::__construct();
		//$this->load->library('session');
		$this->load->model('register_model');
	}
	 
	public function index()
	{
		
		// Check form submit or not
		
		if($this->input->post('submit') != NULL ){
 
		//insert email details
		
		$arrData["reg_name"] = 'demo';
		$arrData["reg_email"] = $this->input->post("txtemail");
		$result=$this->register_model->insertData($arrData);
		
		if($result>0)
			{		
				// generate OTP
					$otp = rand(10000,99999);					
				// insert otp details in database
				$arrData1["email"] = $this->input->post("txtemail");
				$arrData1["otp"] = $otp;
				$arrData1["otp_create"] =  date('Y-m-d H:i:s a', time());
				$arrData1["otp_expire"] =  "0";
				$arrData1["otp_count"] =  "1";
								
				$this->register_model->insertOtp($arrData1);
				
				echo $otp;
				
//send otp through mail 			
					
/*					
					
					$to = $this->input->post("txtemail");					
					
					$subject ="OTP Verification";
					$message = '<p>Hi,</br></p>';
					$message = '<p>Your One Time Password for email verification is : '.$otp.' </br></p>';
					$message .= '<p>Thanks!</br></p>';				
					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: <athirakb11596@gmail.com>' . "\r\n";
					$headers .= 'Cc: '.$sadminemail. "\r\n";
					
					$sndmil=mail($to,$subject,$message,$headers); 
					 if($sndmil){
						redirect('registration');
					} 
					else {
						show_error($this->email->print_debugger());			

						}
					
*/			
	
$data['curntdata']=$arrData1;
$this->load->view('otp_view',$data);			
			}
			else
			{
				$this->load->view('register_view');
				echo "This email already exist !";
			}
	
		}
		else
		{		
			$this->load->view('register_view');
		}
	
	}
	public function otpverify()
	{
		
		$email = $this->input->post("txtemail");
		$otpdata = $this->input->post("txtotp");
		$arrData2["email"] = $this->input->post("txtemail");
		$data['curntdata']=$arrData2;
		
		$res=$this->db->from("otp_tbl")->where("email",$email)->get();
		$rows=($res->result_array());
		$votp= $rows[0]['otp'];
		if ($otpdata==$votp)
		{
			echo "<center style='color:green; padding-top: 100px;'>Your email is verified sucessfully !<center>";
			//$this->load->view('register_view');
		}
		else{
			echo "Invalid OTP !";
			$this->load->view('otp_view',$data);
		}
		
		
	}
}






?>






