<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	date_default_timezone_set('Asia/Shanghai');
	$uid = $_SESSION["userid"];
	if($uid != ""){
		if(isset($_POST["submit"])){
			$message = $_POST["message"];
			if($message == ""){  
            	echo "<script>alert('留言不能为空！'); history.go(-1);</script>";  
        	}
			else{
				echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
				echo "<script charset='utf-8' type='text/javascript'>alert('$message');</script>";
				$sql = "insert into message(uid,content) values('$uid','$message')";  
            	$result = mysql_query($sql);
				if($result){
					echo "<script>alert('提交成功！'); window.location.href='index.php';</script>";
				}
				else{
					echo "<script>alert('提交失败！');history.go(-1);</script>"; 
  	        	}
			}
		}
    	else{  
        	echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    	}
	}
	else{
		echo "<script>alert('请先登录'); history.go(-1);</script>";
	}
?>