<?php require_once('Connections/weblib.php'); ?>

<?php
	$email = $_POST["email"];
	$sql = "select * from users where email = '$email'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num>0){
		echo "1";
	}
?>