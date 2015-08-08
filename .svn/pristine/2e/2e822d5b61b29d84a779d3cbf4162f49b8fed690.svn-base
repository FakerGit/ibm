<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改用户信息</title>
</head>
<script src="../js/jquery-1.11.2.min.js">
</script>
<?php 
    require_once('mysql.func.php');
	$user_display=new Show;
	$uid=$_GET['uid'];
	$sql="select * from users where uid='$uid'";
	$result=mysql_query($sql)or die(mysql_error());
	$row=mysql_fetch_array($result);
?>
<body>
<form action="updateuser.php" id="edit" name="edit" method="post">
<table  id="userList" align="left" border="2" cellpadding="10">    
    <tr align="center"> 
    <td>用户id</td>     
    <td>用户名</td>     
    <td>密码</td>     
    <td>性别</td>     
    <td>邮箱</td>
    <td>操作</td>      
    </tr>
    <tr>
    <td><?php echo $uid;?>
    <input type="hidden" value="<?php echo $uid;?>" name="uid"id="uid" ></td>
    <td>
    <input type="text" name="username" id="username" value="<?php echo $row['username']?>" /></td>
    <td>
    <input type="text" name="pwd" id="pwd" value="<?php echo $row['password']?>" /></td>
    <td><?php 
	      $sex1=$row['sex'];
		  if($sex1=="male"){
		  		$sex_t1="男";
				$sex_t2="女";
				$sex2="female";
			}else{
				$sex_t1="女";
				$sex_t2="男";
				$sex2="male";
			}
		  ?>
    <select name="sex"> <option value="<?php echo $sex1;?>"><?php echo $sex_t1;?></option><option value="<?php echo $sex2;?>"><?php echo $sex_t2;?></option></td>
    <td>
    <input type="text" name="email" id="email" value="<?php echo $row['email']?>" /></td>
	<td><button type="submit">保存</button>
    <button type="button" onclick="javascript:history.go(-1)">取消</button></td>
    </tr>
</table>
</form>
</body>
</html>