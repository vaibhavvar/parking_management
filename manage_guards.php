<?php 
	mysql_connect("localhost" ,"root", "");
	mysql_select_db("parking_system");
?>
<?php
session_start();
$name=$_SESSION['admin_name'];
if($name=="")
header("location:admin_login.php");
?>

<html>
<head>
<title>Manage Guards</title>
</head>
<body>
<h1>Manage Guards</h1>
<a href="admin_profile.php" ><input type ="button" name ="admin_profile" value="BACK"></a><br><br><br>
<a href="logout.php"><input type ="button" name ="logout" value="LOGOUT"></a><br><br><br>
<a href="create_guard.php" ><input type ="button" name ="new_guard" value="ADD NEW GUARD"></a>
<hr>
<?php 

	$q=mysql_query("select * from guard_login order by s_n asc");
	$num=mysql_num_rows($q);
	
	if($num>0)
	{
?>

<h2 align="center">Guards</h2>
<table id="report" align="center" cellpadding = "5">
        <tr>
            <th>S.No</th>
            <th>Guard Name</th>
            <th>Id</th>
            <th>Contact No</th>
            <th>Address</th>
        </tr>
        <?php 
		$i=1;
		while($f=mysql_fetch_array($q))
		{
		?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $f['name']; ?></td>
            <td><?php echo $f['id']; ?></td>
            <td><?php echo $f['contact_no']; ?></td>
            <td><?php echo $f['address']; ?></td>
        </tr>
        <tr>
            <td colspan="5">
                <ul>
                    <li><a href="deleteguard.php?del=<?php echo $f['s_n']; ?>"><input type="button" name="delete" value="DELETE" /></a></li>
                 </ul>   
            </td>
        </tr>
        <?php
		$i++;
	 	}
		?>
        
    </table>
 </form>
</body>
</html>

<?php

}
?>