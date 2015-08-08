<?php require_once('Connections/weblib.php'); ?>

<?php
    header("Content-Type:text/html; charset=utf-8");
    $aid = $_GET["aid"];
	$sql = "update article set status=0 where aid='$aid'";
	$result = mysql_query($sql);
	if($result){
		echo "<script>alert('恢复成功！'); window.location.href='articlemanage.php';</script>";
	}
	else{
		echo "<script>alert('恢复失败！');history.go(-1);</script>";
	}
?>