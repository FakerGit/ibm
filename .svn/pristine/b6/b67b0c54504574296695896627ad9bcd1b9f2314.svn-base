<?php require_once('Connections/weblib.php'); ?>

<?php
header("Content-Type:text/html; charset=utf-8");
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$sql="update users set sex='$sex',email='$email',password='$pwd' where uid=$uid";
		if(mysql_query($sql)or die(mysql_error()))
		{
			echo"<script>alert('修改成功！'); history.go(-1);</script>";
		}else{
			echo"<script>alert('修改失败！'); history.go(-1);</script>";
		}