<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
session_start();
$name=$_SESSION['user_name'];
if($name=="")
header("location:user_login.php");
$vehicle_id=$_SESSION['vehicle_id'];
?>

<html>
<head>
<title>
User Page
</title>
</head>
<body>
<h1 align="center">WELCOME<br><?php echo $name?></h1>
<hr>
Vehile ID :&nbsp;&nbsp;<?php echo $vehicle_id?><br><br>

<?php
$p=mysql_query("select * from reservation where vehicle_id='$vehicle_id'");
$q=mysql_num_rows($p);
if($q==0)
	echo 'You have <b>Not</b> parked your vehicle';
else
{
	//$no=mysql_query("select MAX(s_n) from reservation where vehicle_id='$vehicle_id'");
	$r=mysql_query("select * from reservation where vehicle_id='$vehicle_id' order by s_n desc");
	$s=mysql_fetch_array($r);
	echo nl2br('Your vehicle is parked at '. $s['space_id']."\n\n");
	echo 'Fare= '.$s['fare'];
}
?>
<br><br>
<?php
$p=mysql_query("select * from space where status='0'");
$q=mysql_num_rows($p);
if($q==0)
	echo 'No parking space';
else
	echo 'Space <b>Available</b> to park your vehicle';
?>

<a href="logout.php"><h1 align="center">LOGOUT</h1></a>
</body>
</html>