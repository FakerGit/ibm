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
	$uid=$_REQUEST['uid'];
	$sql="select * from users where uid='{$uid}'";
	$result=mysql_query($sql)or die(mysql_error());
	$row=mysql_fetch_array($result);
?>
<body>
<script type="text/javascript">
	function edit_user(){
		var username=$("#username").val();
			var uid=$("#uid").val();
			var pwd=$("#pwd").val();
			var sex=document.getElementById("sex").value;
			var email=$("#email").val();
			var authority=$("#authority").val();
			var act="edit";
		$.ajax({
				type:"POST",
				url:"doAdminAction.php?",
				data:"act="+act+"&uid="+uid+"&username="+username+"&pwd="+pwd+"&sex="+sex+"&email="+email,beforeSend: function(){},
				success:function(msg){
					if(msg==1)
					{
						alert("修改成功");
						window.close();
					}
				}
			});
	}
</script>
<form action="sub.php?" id="edit" name="edit" method="post">
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
	<td><input type="button" value="保存" onClick="edit_user()" /></td>
    </tr>
</table>
</form>
</body>
</html>