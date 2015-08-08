<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
        $user = $_POST["username"];  
        $pwd = $_POST["pwd"];
		$mail = $_POST["email"];
		$sex = $_POST["sex"];  
        if($user == "")
		{  
            echo "<script>alert('用户名不能为空！'); history.go(-1);</script>";  
        }
		else
		{
			if($pwd == "")
			{
				echo "<script>alert('密码不能为空！'); history.go(-1);</script>";
			}
			else
			{
				if($mail == "")
				{
					echo "<script>alert('邮箱不能为空！'); history.go(-1);</script>";
				}
				else
				{
					$sql = "insert into users(username,email,password,sex) values('$user','$mail','$pwd','$sex')";//向用户表插入一条记录  
                    $result = mysql_query($sql);
					if($result)
					{
						echo "<script>alert('添加成功！'); history.go(-1);</script>";
					}
					else
					{
						echo "<script>alert('添加失败！');history.go(-1);</script>"; 
  	                }
				}
			}
		}
?>