<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	if(isset($_GET["submit"]))  
    {  
        $user = $_GET["username"];  
        $pwd = $_GET["pwd"];
		$mail = $_GET["email"];
		$repwd = $_GET["repwd"];  
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
					if($pwd != $repwd)
					{
						echo "<script>alert('两次输入密码不一致！'); history.go(-1);</script>";
					}
					else
					{
						$sql = "insert into users(username,email,password) values('$user','$mail','$pwd')";//向用户表插入一条记录  
                        $result = mysql_query($sql);
						if($result)
						{
			                echo "<script>alert('注册成功！'); window.location.href='index.php';</script>";
						}
						else
						{
							echo "<script>alert('注册失败！');history.go(-1);</script>"; 
  	                    }
					}
				}
			}
		}
    }
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }
?>