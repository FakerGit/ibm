<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色权限管理</title>
</head>

<body>
<form name="table" method="post" action="rbacright.php" target="right">
<?php
$sql = "select * from users,users_role,role where users.uid=users_role.uid and users_role.rid=role.rid";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num){
	echo "<table align='center' border='1' cellpadding='10'>
	<tr>
	<th>用户</th>
	<th>角色</th>
	<th>操作权限</th>
	<th>操作</th>
	</tr>";
	while($row=mysql_fetch_assoc($result)){
		$uid = $row["uid"];
	    echo"<tr>";//输出一条权限记录
	    echo"<td>".$row["username"]."</td>";//输出用户名
	    echo"<td>".$row["rolename"]."</td>";//输出角色名
	    $sql1 = "select authorityname from authority,users_authority where users_authority.uid='$uid' and users_authority.auid=authority.auid";
    	$result1 = mysql_query($sql1);
    	echo"<td>";
    	while($row1=mysql_fetch_assoc($result1)){
			echo $row1["authorityname"]."  ";//输出操作权限
    	}
		echo"</td>";
    	echo"<td>";
    	echo"<a href='rbacedit.php?uid=".$row["uid"]."target='_blank' />修改</a>";
    	echo"</td>";
    	echo"</tr>";
	}
	echo "</table>";
}
else{
	echo "<p>当前没有注册用户</p>";
}
?>
</form>
</body>
</html>