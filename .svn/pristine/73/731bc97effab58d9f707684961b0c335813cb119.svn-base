<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	if(isset($_POST["submit"]))  
    {  
		echo "提交成功";
		$uid = $_POST["uid"];
        $rid = $_POST["role"];  
		$authority = $_POST["authority"];
        $sql0 = "update users_role set rid = '$rid' where uid = '$uid'";//修改角色
		$result0 = mysql_query($sql0);
		$sql1 = "delete from users_authority where uid = '$uid'";//删除用户所有权限，为重新写入数据做准备
		$result1 = mysql_query($sql1);
        for($i=0;$i<count($authority);$i++){
			$sql2 = "insert into users_authority values('$uid','$authority[$i]')";//写入新的权限记录
			$result2 = mysql_query($sql2);
		}
		echo"<script>window.location.href='rbac.php'</script>";
	}
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }   
?>  
