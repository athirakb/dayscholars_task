<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
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
	<h1>Registration!</h1>

	<div id="body">
	
	 
	 <form method='post' name="regform" onsubmit=" return display()">
	
	<table>
		<tr>
		<td>Enter your Email  </td><td><input type="text" name="txtemail"  id="txtemail"><span id="email_error"style="color:red"> </span></td>
		</tr>
		<tr>
		</tr>
		<tr>
		<td>  </td><td><input type="submit" id="submit" name="submit" value="Register"></td>
		</tr>
	</table>
	</form>
	</div>

	
</div>
<script>

 function display(){
   
	var email=document.regform.txtemail;
	var mailformat =  /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var sta;
	

  if(email.value.match(mailformat))
  {
     
	 document.getElementById("email_error").innerHTML='';

  }
  else
  {
   document.getElementById("email_error").innerHTML='Please enter a valid Email';
	 sta= false;
  }
  return sta;
 }
 
 </script>


</body>
</html>
