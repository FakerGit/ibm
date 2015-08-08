<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据库备份与恢复</title>
</head>

<body>
<?php
$sql = "select * from dboperation order by time desc";
if($result = mysql_query($sql)){
	echo "<table align='left' border='1' cellpadding='10'>
	<tr>
	<th>操作类型</th>
	<th>操作时间</th>
	<th>操作</th>
	</tr>";
	while($row = mysql_fetch_array($result)){
		echo"<tr>";
		if($row["operation"]=="backup"){
			echo"<td>备份</td>";
		}
		else{
			echo"<td>恢复</td>";
		}
		echo"<td>".$row["time"]."</td>";
		if($row["operation"]=="backup"){
			echo"<td><a href='dbrestore.php?did=".$row["did"]."'>恢复</a></td>";
		}
		else{
			echo"<td></td>";
		}
		echo"</tr>";
	}
	echo "</table>";
}
else{
	echo "<p>当前没有数据库备份和恢复记录</p>";
}
?>
<br />
<input type="button" value="备份" onclick="window.location.href='dbbackup.php'" />
</body>
</html>