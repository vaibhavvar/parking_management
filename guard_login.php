<html>
<body>
<h1 align="center">GUARD LOGIN<br></h1>
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
<br><br><input type ="submit" name ="login" value="Login">
</td>
</tr>
</table>
<br><br><br><br>

<?php
if (isset($_POST['login']))
{
	extract($_POST);
	mysql_connect("localhost" ,"root", "");
	mysql_select_db("parking_system");
	
	$p=mysql_query("select * from guard_login where id='$username' AND password='$password'");
	$q=mysql_num_rows($p);
	
	if($q>0)
	{
		$f=mysql_fetch_array($p);
		session_start();
		$_SESSION['guard_id']=$f['id'];
		$_SESSION['guard_name']=$f['name'];
		$_SESSION['guard_password']=$f['password'];
		$_SESSION['guard_contact_no']=$f['contact_no'];
		$_SESSION['guard_address']=$f['address'];
		header("location:guard_profile.php");
	}
	
	else echo"<h2>invalid username or password.</h2>";	
}
?>
</form></body></html>