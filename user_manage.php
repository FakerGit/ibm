<?php require_once('mysql.func.php')?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户管理</title>
</head>
<script src="js/jquery.js">
</script>
<script type="text/javascript">
	 function del(id){
		 var uid=id;
		$.post("deleteuser.php",{uid:uid},function(msg){
		if(msg == 1){
			alert('删除成功!');
			location.reload(true); 
		}else{
			alert('删除失败!');
		}
		});
	}
	
	function edit(id)
	{	
		window.open("edit.php?uid="+id,"_self",   "height=400, width=1200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
	}
  </script>
 
<body>

<h1>用户信息管理</h1>
<hr noshade="noshade" />
<div>
<table  id="userList" align="left" border="2" cellpadding="10">    
    <tr align="center">     
    <td>id</td>     
    <td>用户名</td>     
    <td>密码</td>     
    <td>性别</td>     
    <td>邮箱</td>     
    <td>操作</td>    
    </tr> 
<?php
	$user_display=new Show;
	$row=$user_display->display(2);
	foreach($row as $user){
		echo"
			<tr>
			<td>".$user['uid']."</td>
			<td>".$user['username']."</td>
			<td>".$user['password']."</td>
			<td>".$user['sex']."</td>
			<td>".$user['email']."</td>
			<td>
			<button onclick='edit(".$user['uid'].")'>修改</button>
			<button onClick='del(".$user['uid'].")'>删除</button>
			</td>
			</tr>";
	}
	echo "</table>";
	
	echo $user_display->pagebar();
?>


</div>
<div>
 <form action="adduser.php" name="addForm" id="addForm" method="post">
<table align="center" border="1" cellpadding="10">
	<tr>
    <td>用户名(*):<input type="text"  name="username" id="username"/> </td>
    <td>密码(*)
    <input type="text"  name="pwd" id="pwd"/> </td>
    <td> 性别(*): 
		<select name="sex" id="sex">
        <option value="male">男</option>
        <option value="female">女</option>
        </select>
    </td>
	<td>邮箱(*):
		<input type="text"  name="email" id="email"/></td>
     <td>
     <input type="submit"  value="增加" /></td>
     </tr>
    </table>
    </form>
 </div>
</body>
</html>
