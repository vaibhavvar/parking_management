<html>
<body>
<h1 align="center">USER LOGIN<br></h1>
<a href="index.php" ><input type ="button" name ="index" value="BACK"></a><br><br><br>
<hr>
<form method="POST" >

<table align="center">

<tr>
<td><b>Login</b><br>
<br>Username
<input type="text" name ="username" required>
<br><br>Password&nbsp;
<input type="password" name="password" required>
<br><br><input type ="submit" class ="btnLogin" name ="login" value="Login">
</td>
</tr>
</table>
<br><br><br><br>
<table align="center">
<tr>
<td> &emsp;&emsp;<b>New User? Register Now!</b>
<br><br>&emsp;&emsp;<a href="create_profile.php"><input type ="button" class ="btnLogin" name ="go1" value="Register"></a>
</td>
</tr>
</table>

<?php
if (isset($_POST['login']))
{
	extract($_POST);
	mysql_connect("localhost" ,"root", "");
	mysql_select_db("parking_system");
	
	$p=mysql_query("select * from user where vehicle_id='$username' AND password='$password'");
	$q=mysql_num_rows($p);
	
	if($q>0)
	{
		$f=mysql_fetch_array($p);
		session_start();
		$_SESSION['vehicle_id']=$f['vehicle_id'];
		$_SESSION['user_name']=$f['name'];
		$_SESSION['user_password']=$f['password'];
		$_SESSION['user_contact_no']=$f['contact_no'];
		$_SESSION['user_address']=$f['address'];
		header("location:user_profile.php");
	}
	
	else echo"<h2>invalid username or password.</h2>";	
}
?>
</form></body></html>