<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
?>
<?php
session_start();
$id=$_SESSION['guard_id'];
if($id=="")
header("location:guard_login.php");
?>

<html>
<head><title>Collect Fare</title></head>
<link href="style1.css" rel="stylesheet" type="text/css">
<body>
<form name="form" method="post" enctype="multipart/form-data" onSubmit="return(validate());">
<h3>COLLECT FARE</h3>
 <table align="center" cellpadding = "10">
 
 <tr>
 <td>VEHICLE ID*</td>
 <td><input type="text" name="vehicle_id" maxlength="100" required="required"></td>
 </tr>
  
 <tr><td>EXIT DATE*</td>
 <td><input type="text" name="exit_date" maxlength="100" required="required">
 
 </td>
 </tr>
 
 <tr>
 <td>EXIT TIME*</td>
 <td><input type="text" name="exit_time" maxlength="100" required="required"></td>
 </tr>
 
  <tr>
 <td>FARE*</td>
 <td><input type="text" name="fare" maxlength="100" required="required"></td>
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
		
		$q1=mysql_query("select MAX(s_n) from reservation where vehicle_id='$vehicle_id' ");
		$f1=mysql_fetch_array($q1);
		$no=$f1['MAX(s_n)'];
		//echo $no;
		//die();
		$q2=mysql_query("select space_id from reservation where s_n='$no' ");
		$f2=mysql_fetch_array($q2);
		$spid=$f2['space_id'];
	 	$r=mysql_query("update space set status='0' where space_id='$spid' ");
		$q3=mysql_query("update reservation set exit_date='$exit_date' , exit_time='$exit_time' , fare='$fare' where s_n='$no' ");
		if($q3)
		{		 
			echo"value entered successfully";

			if($vehicle_id!="")
			header("location:guard_profile.php");
		}
 }
 
 ?>