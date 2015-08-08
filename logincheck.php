<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录跳转中</title>
</head>

<body>
<?php  
    if(isset($_POST["submit"]))  
    {  
		echo "提交成功";
        $user = $_POST["username"];
        $pwd = $_POST["password"];
        if($user == "" || $pwd == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else  
        {  
            $sql = "select * from users where username = '$user'";  
            $result = mysql_query($sql);  
            $num = mysql_num_rows($result);  
            if($num)  
            {  
				 $row=mysql_fetch_array($result);
				 $uid=$row['uid'];
				 if($pwd===$row['password']){//对密码进行判断。
				 	 $_SESSION['userid']=$uid;
				 	 $sql0 = "select * from users_role where uid = '$uid'";
				 	 $result0 = mysql_query($sql0);
				 	 $row0=mysql_fetch_array($result0);
			     	 echo "登陆成功，正在为你跳转至后台页面";
				 	 switch($row0["rid"]){
						 case 1:
						 header("location:public.html");
						 break;
						 case 2:
						 header("location:editor.html");
						 break;
						 default:
						 header("location:manager.html");
					 }
 			    }
				else{
					echo "<script>alert('密码不正确！');history.go(-1);</script>";
				}  
			}
            else  
            {  
                echo "<script>alert('用户名不存在！');history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
  
?>  
</body>
</html>

