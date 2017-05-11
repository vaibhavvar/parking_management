<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
?>

<html>
<head><title>Create Profile</title></head>
<link href="style1.css" rel="stylesheet" type="text/css">
<body>
<form name="form" method="post" enctype="multipart/form-data" onSubmit="return(validate());">
<h3>USER REGISTRATION</h3>
 <table align="center" cellpadding = "10">
 
 <td>NAME*</td>
 <td><input type="text" name="name" maxlength="50" required="required" placeholder="max 50 characters">
 
 </td>
 </tr>

 <tr>
 <td>VEHICLE ID*</td>
 <td><input type="text" name="vehicle_id" maxlength="100" required="required"></td>
 </tr>
  
 <tr><td>Password*</td>
 <td><input type="password" name="pass" maxlength="20" required="required">
 
 </td>
 </tr>
 
 <tr>
 <td>CONTACT NUMBER*</td>
 <td><input type="text" name="no" maxlength="10" required="required"></td>
 </tr>
 
 <tr>
 <td>ADDRESS*</td>
 <td><input type="text" name="addr" maxlength="200" required="required"></td>
 </tr>
 
 <tr>
 <td colspan="3" align="center">
 <input type="submit" class="btnLogin" name="go" value="Register" >
 <input type="reset" class="btnLogin" value="Reset" >
 </td>
 </tr>
 
 <tr>
 <td>Already a Member?Click here to <a href="user_login.php">Login</a></td></tr>
 
 <tr><td>*feilds are mandatory.</td></tr>
 </table>
 
 </form> 
 </body>
 </html>
 
 <?php
 extract($_POST);
 //$z=MD5($pass);

 if(isset($_POST['go']))
 {
	 	$qry=mysql_query("select vehicle_id from user where '$vehicle_id'=vehicle_id");
 		$num=mysql_num_rows($qry);
		
	    if($num==0){
		extract($_POST); 
	 	 
	$q=mysql_query("insert into user (name,vehicle_id,password,contact_no,address) values ('$name','$vehicle_id','$pass','$no','$addr')");
	 if($q)
	 {		 
		 echo"value entered successfully";

		 if($vehicle_id!="")
		 header("location:index.php");
	 }
 	}	
 }
 
 ?>