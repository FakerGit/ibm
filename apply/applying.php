<?php require_once('../Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>正在提交</title>
</head>
<body>
<?php
    if(isset($_POST['submit'])){
	$members=$_POST["mb"];
	$name = $_POST["name"];
	$mail = $_POST["mail"];  
    $age = $_POST["age"];
	$tel = $_POST["tel"];
	$username =$_POST["name"];
	$time =$_POST["time"];
	if($username!=''){
		$sql = "select * from users where username = '$user'";  
		$result = mysql_query($sql);  
   	    $num = mysql_num_rows($result);  
	    if(!$num){
			echo "<script>alert('用户名不存在！');history.go(-1);</script>";  
		}else{
			$is=1;
		}
	}else{
		$is=0;
	}
	if($members==1){
		$sql="insert into apply(id,name,age,tel,ifuser,time,deal,members)values('','$name','$age','$tel','$is','$time','0','$members')";
		mysql_query($sql);
		echo '报名成功!<br>正在跳到首页......';
		header("refresh:1;url=../index.php");
	}
	else{
		$num=$_POST['$num'];
		$sql="insert into apply(id,name,mail,age,tel,ifuser,time,deal,members)values('','$name','$mail','$age','$tel','$is','$time','0','$num')";
		mysql_query($sql);
		echo '报名成功!<br>正在跳到首页......';
		header("refresh:1;url=../index.php");
	}
}else
	echo "没有收到信息";
?>
</body>
</html>