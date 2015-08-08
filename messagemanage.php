<?php require_once('Connections/weblib.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言管理</title>
</head>

<body>
<center>
<?php
header("Content-Type:text/html; charset=utf-8");
$sql = "select * from message,users where message.uid = users.uid order by time desc";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num){
	echo "<table align='center' border='1' cellpadding='10'>
	<tr>
	<th>ID</th>
	<th>用户名</th>
	<th>发表时间</th>
	<th>留言内容</th>
	</tr>";
	while($row=mysql_fetch_assoc($result)){
		echo"<tr>";
		echo"<td>".$row["mid"]."</td>";
		echo"<td>".$row["username"]."</td>";
		echo"<td>".$row["time"]."</td>";
		echo"<td>".$row["content"]."</td>";
		echo"</tr>";
	}
	echo"</table>";
	echo"</center>";
}
else{
	echo "<p>当前没有留言</p>";
}
?>
</center>
</body>
</html>