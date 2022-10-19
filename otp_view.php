<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	#container {
		margin: 10px 400px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	
	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
		align:center
	}
	
	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	
	
	</style>
</head>
<body>

<div id="container">
	<h1>Check your registered email for the OTP!</h1>

	<div id="body">
	
	 <form method='post' name="otpform"  action='<?= base_url(); ?>registration/otpverify'>
	<table>
		<tr>
		<td> <input type="hidden"  name="txtemail" value="<?php echo $curntdata['email']; ?>"> </td>
		</tr>
		<tr>
		<td><input type="text" placeholder="Enter the OTP" name="txtotp" id="txtotp"><span id="otp_error"style="color:red"> </td>
		</tr>
		<tr>
		<td>  </td><td><input type="submit" name="submit" value="Submit" onclick=" return display()"></td>
		</tr>
	</table>
	</form>
	</div>

	
</div>
<script>

function display(){
   
	var optdata=document.otpform.txtotp.value;
	
	var sta;
	

  if(optdata.length==5 )
  {
     
	 document.getElementById("otp_error").innerHTML='';
	
	
  }
  else
  {
   document.getElementById("otp_error").innerHTML='Invalid OTP';
	 sta= false;
  }
  return sta;
 }
 </script>
</body>
</html>
