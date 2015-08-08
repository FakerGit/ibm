<?php require_once('Connections/weblib.php'); ?>

<?php
	
	$username = $_POST["username"];
	$sql = "select * from users where username = '$username'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num>0){
		echo "1";
	}
?>