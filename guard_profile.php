<?php
mysql_connect("localhost" ,"root", "");
mysql_select_db("parking_system");
session_start();
$name=$_SESSION['guard_name'];
if($name=="")
header("location:guard_login.php");
?>

<html>
<head>
<title>
Guard Page
</title>
</head>
<body>
<h1 align="center">WELCOME<br><?php echo $name?></h1><br>
<a href="logout.php"><input type ="button" name ="logout" value="LOGOUT"></a><br><br>
<a href="collect_fare.php"><input type ="button" name ="collect" value="Collect Fare"></a>
<hr>

<h2 align="center">Available Spaces</h2>
<?php 

	$q=mysql_query("select * from space order by s_n asc");
	$num=mysql_num_rows($q);
	
	if($num>0)
	{
?>

<table id="report" align="center" cellpadding = "5">
        <tr>
            <th>S.No</th>
            <th>Space Id</th>
            <th>Status</th>
        </tr>
        <?php 
		$i=1;
		while($f=mysql_fetch_array($q))
		{
			$temp=$f['status'];
			if($temp==0)
			{
		?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $f['space_id']; ?></td>
            <td><?php echo 'Vacant'; ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <ul>
                    <li><a href="reserve_parking.php?space_id=<?php echo $f['space_id']; ?>"><input type="button" name="reserve" value="RESERVE PARKING" /></a></li>
                 </ul>   
            </td>
        </tr>
        <?php
		$i++;
			}
	 	}
		?>
        
    </table>
 </form>
</body>
</html>

<?php

}
?>