<?php require_once('Connections/weblib.php'); ?>

<?php
    header("Content-Type:text/html; charset=utf-8");
    $aid = $_GET["aid"];
	$sql = "update article set status=4 where aid='$aid'";
	$result = mysql_query($sql);
	if($result){
		echo "<script>alert('删除成功！'); window.location.href='articlemanage.php';</script>";
	}
	else{
		echo "<script>alert('删除失败！');history.go(-1);</script>";
	}
?>