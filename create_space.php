<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
session_start();
$id=$_SESSION['admin_name'];
if($id=="")
header("location:admin_login.php");
?>

<html>
<head><title>Create Space</title></head>
<link href="style1.css" rel="stylesheet" type="text/css">
<body>
<form name="form" method="post" enctype="multipart/form-data" onSubmit="return(validate());">
<h3>ADD NEW SPACE</h3>
 <table align="center" cellpadding = "10">

 <tr>
 <td>SPACE ID*</td>
 <td><input type="text" name="id" maxlength="100" required="required"></td>
 </tr>
 
 <tr>
 <td colspan="3" align="center">
 <input type="submit" class="btnLogin" name="go" value="CREATE" >
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
	 	$qry=mysql_query("select space_id from space where space_id='$id'");
 		$num=mysql_num_rows($qry);
		
	    if($num==0){
		extract($_POST); 
	 	 
	$q=mysql_query("insert into space (space_id) values ('$id')");
	 if($q)
	 {		 
		 echo"value entered successfully";

		 if($id!="")
		 header("location:manage_space.php");
	 }
 	}	
 }
 
 ?>