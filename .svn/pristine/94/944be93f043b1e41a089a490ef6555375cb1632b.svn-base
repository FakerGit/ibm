<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	$did = $_GET["did"];
	$sql0 = "select * from dboperation where did = '$did'";
	$result0 = mysql_query($sql0);
	if($row = mysql_fetch_array($result0)){
		$file = $row["source"];
		//$sql = "restore database weblib from disk = '$file'";//从指定地址恢复数据库
		//$result = mysql_query($sql);
		$sql1 = "insert into dboperation(operation,source) values('restore','$file')";//插入一条恢复记录
		$result1 = mysql_query($sql1);
		if($result1){
			echo "<script>alert('恢复成功！'); window.location.href='dboperation.php';</script>";
		}
		else{
			echo "<script>alert('恢复失败！');history.go(-1);</script>";
		}
	}
	else{
		echo "<script>alert('恢复失败！');history.go(-1);</script>";
	}
?>