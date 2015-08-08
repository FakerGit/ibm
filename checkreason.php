<?php require_once('Connections/weblib.php'); ?>

<?php
    header("Content-Type:text/html; charset=utf-8");
    $aid = $_GET["aid"];
	$sql = "select * from review where aid='$aid'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num){
		$row = mysql_fetch_array($result);
		echo "<script>alert('".$row["reason"]."');history.go(-1);</script>";
	}
	else{
		echo "<script>alert('查询失败！');history.go(-1);</script>";
	}
?>