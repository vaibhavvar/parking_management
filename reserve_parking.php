<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
?>
<?php
session_start();
$id=$_SESSION['guard_id'];
if($id=="")
header("location:guard_login.php");
extract($_GET);
?>

<html>
<head><title>Reserve Parking</title></head>
<link href="style1.css" rel="stylesheet" type="text/css">
<body>
<form name="form" method="post" enctype="multipart/form-data" onSubmit="return(validate());">
<h3>RESERVE PARKING</h3>
 <table align="center" cellpadding = "10">

 <tr>
 <td>VEHICLE ID*</td>
 <td><input type="text" name="vehicle_id" maxlength="100" required="required"></td>
 </tr>
  
 <tr><td>ENTRY DATE*</td>
 <td><input type="text" name="entry_date" maxlength="100" required="required">
 
 </td>
 </tr>
 
 <tr>
 <td>ENTRY TIME*</td>
 <td><input type="text" name="entry_time" maxlength="100" required="required"></td>
 </tr>
 
 <tr>
 <td colspan="3" align="center">
 <input type="submit" class="btnLogin" name="sub" value="SUBMIT" >
 <input type="reset" class="btnLogin" value="RESET" >
 </td>
 </tr>
 
 <tr><td>*feilds are mandatory.</td></tr>
 </table>
 
 </form> 
 </body>
 </html>
 
 <?php
 extract($_POST);
 //$z=MD5($pass);

 if(isset($_POST['sub']))
 {
	 	
		extract($_POST); 
		
	 	 $r=mysql_query("update space set status='1' where space_id='$space_id' ");
	$q=mysql_query("insert into reservation (space_id,vehicle_id,entry_date,entry_time) values ('$space_id','$vehicle_id','$entry_date','$entry_time')");
	 if($q)
	 {		 
		 echo"value entered successfully";

		 if($vehicle_id!="")
		 header("location:guard_profile.php");
	 }
 }
 
 ?>