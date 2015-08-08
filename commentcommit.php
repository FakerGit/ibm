<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	if(isset($_POST["submit"]))  
    {  
		$username = $_POST["username"];
		$aid = $_POST["aid"];
		$content = $_POST["content"];
		if($username != ""){
			$sql0 = "select * from users where username = '$username'";//验证用户名是否存在
			$result0 = mysql_query($sql0);
			$num = mysql_num_rows($result0);
			if($num){//若用户名存在
				$row0 = mysql_fetch_array($result0);
				$uid = $row0["uid"];//取得用户ID
				if($content != ""){
					$sql = "insert into comment(uid,aid,content) values('$uid','$aid','$content')";//插入评论记录
					if($result = mysql_query($sql)){
						echo "<script>alert('评论成功！'); history.go(-1);</script>";
					}
					else{
						echo "<script>alert('评论失败！'); history.go(-1);</script>";
					}
				}
				else{
					echo "<script>alert('评论不能为空！'); history.go(-1);</script>"; 
				}
			}
			else{
				echo "<script>alert('用户名不存在！'); history.go(-1);</script>";
			}
		}
		else{
			echo "<script>alert('用户名不能为空！'); history.go(-1);</script>";
		}
	}
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }   
?>  