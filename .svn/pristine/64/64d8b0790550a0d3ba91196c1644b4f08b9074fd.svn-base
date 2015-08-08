<?php require_once('Connections/weblib.php'); ?>

<?php
    header("Content-Type:text/html; charset=utf-8");
    $aid = $_POST["aid"];
	$reviewresult = $_POST["result"];
	$reason =  $_POST["detail"];
	if($reviewresult==1){
		$sql = "update review set ispass=1 where aid='$aid'";
		$sql0 = "update article set status=1 where aid='$aid'";
		$result = mysql_query($sql);
		$result0 = mysql_query($sql0);
		if($result && $result0){
			echo "<script>alert('审核成功！'); window.location.href='articlereview.php';</script>";
		}
		else{
			echo "<script>alert('审核失败！');history.go(-1);</script>";
		}
	}
	else{
		$sql = "update review set ispass=0,reason='$reason' where aid='$aid'";
		$sql0 = "update article set status=2 where aid='$aid'";
		$result = mysql_query($sql);
		$result0 = mysql_query($sql0);
		if($result && $result0){
			echo "<script>alert('审核成功！'); window.location.href='articlereview.php';</script>";
		}
		else{
			echo "<script>alert('审核失败！');history.go(-1);</script>";
		}
	}
?>