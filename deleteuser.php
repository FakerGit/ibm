<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	$uid = $_POST["uid"];
	$sql="delete from users where uid=$uid";
		if(mysql_query($sql)or die(mysql_error()))
		{	
			echo 1;
		}
		else
		{
			echo 2;
		}