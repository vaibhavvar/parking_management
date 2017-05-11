<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
session_start();
$id=$_SESSION['admin_name'];
if($id=="")
header("location:admin_login.php");
?>

<html>
<head><title>Create Guard Entry</title></head>
<link href="style1.css" rel="stylesheet" type="text/css">
<body>
<form name="form" method="post" enctype="multipart/form-data" onSubmit="return(validate());">
<h3>ADD NEW GUARD</h3>
 <table align="center" cellpadding = "10">
 
 <td>NAME*</td>
 <td><input type="text" name="name" maxlength="50" required="required" placeholder="max 50 characters">
 
 </td>
 </tr>

 <tr>
 <td>ID*</td>
 <td><input type="text" name="id" maxlength="100" required="required"></td>
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
 <input type="submit" class="btnLogin" name="go" value="REGISTER" >
 <input type="reset" class="btnLogin" value="RESET" >
 </td>
 </tr>
 </table>
 </form> 
 </body>
 </html>
 
 <?php
 extract($_POST);
 //$z=MD5($pass);

 if(isset($_POST['go']))
 {
	 	$qry=mysql_query("select id from guard_login where '$id'=id");
 		$num=mysql_num_rows($qry);
		
	    if($num==0){
		extract($_POST); 
	 	 
	$q=mysql_query("insert into guard_login (name,id,password,address,contact_no) values ('$name','$id','$pass','$addr','$no')");
	 if($q)
	 {		 
		 echo"value entered successfully";

		 if($id!="")
		 header("location:manage_guards.php");
	 }
 	}	
 }
 
 ?>