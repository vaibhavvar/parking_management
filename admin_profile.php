<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
session_start();
$name=$_SESSION['admin_name'];
?>
<?php
//session_start();
$name=$_SESSION['admin_name'];
if($name=="")
header("location:admin_login.php");
?>
<html>
<head>
<title>
Admin Page
</title>
</head>
<body>
<h1 align="center">WELCOME<br><?php echo $name?></h1>
<hr>

<a href="manage_users.php"><input type ="button" name ="users" value="Manage Users"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="manage_guards.php"><input type ="button" name ="guards" value="Manage Guards"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="manage_space.php"><input type ="button" name ="space" value="Manage Space"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="logout.php"><input type ="button" name ="logout" value="LOGOUT"></a>
</body>
</html>