<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	if(isset($_POST["submit"]))  
    {  
		echo "提交成功";
			$uid = $_SESSION["userid"];
			$cid = $_POST["cid"];
			$content = $_POST["reply"];
			if($content != ""){
				$sql = "insert into commentreply(uid,cid,content) values('$uid','$cid','$content')";//插入评论信息
			    if($result = mysql_query($sql)){
					echo "<script>alert('回复成功！'); window.location.href='commentmanage_editor.php';</script>";
				}
				else{
					echo "<script>alert('回复失败！'); history.go(-1);</script>";
				}
			}
			else{
				echo "<script>alert('回复不能为空！'); history.go(-1);</script>"; 
			}
		//}
	}
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }   
?>  