<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
session_start();
$id=$_SESSION['admin_name'];
if($id=="")
header("location:admin_login.php");

	extract($_GET);
	$q=mysql_query("delete from guard_login where s_n='$del'");
	
	if($q)
	{
		header("location:manage_guards.php");
	}
?>