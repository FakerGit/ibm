<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	$dir = 'dbbackup/';
	if(!file_exists($dir)){
		mkdir($dir);
	}
	$file = $dir.time().'.bak';
	//$sql = "backup database weblib to disk = '$file'";//备份数据库到指定地址
	//$result = mysql_query($sql);
	$sql0 = "insert into dboperation(operation,source) values('backup','$file')";//插入一条备份记录
	$result0 = mysql_query($sql0);
	if($result0){
		echo "<script>alert('备份成功！'); window.location.href='dboperation.php';</script>";
	}
	else{
		echo "<script>alert('备份失败！');history.go(-1);</script>";
	}
?>