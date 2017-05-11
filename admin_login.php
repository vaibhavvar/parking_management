<html>
<body>
<h1 align="center">ADMIN LOGIN<br></h1>
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

<?php
if (isset($_POST['login']))
{
	extract($_POST);
	mysql_connect("localhost" ,"root", "");
	mysql_select_db("parking_system");
	
	$p=mysql_query("select * from admin_login where name='$username' AND password='$password'");
	$q=mysql_num_rows($p);
	
	if($q>0)
	{
		$f=mysql_fetch_array($p);
		session_start();
		$_SESSION['admin_name']=$f['name'];
		header("location:admin_profile.php");
	}
	
	else echo"<h2>invalid username or password.</h2>";	
}
?>
</form></body></html>