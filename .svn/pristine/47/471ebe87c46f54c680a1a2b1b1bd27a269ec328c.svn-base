<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	$cid = $_GET["cid"];
	$sql = "delete from comment where cid = '$cid'";//删除评论
	$result = mysql_query($sql);
	if($result){
		echo "<script>alert('删除成功！'); history.go(-1);</script>";
	}
	else{
		echo "<script>alert('删除失败！');history.go(-1);</script>";
	}
?>