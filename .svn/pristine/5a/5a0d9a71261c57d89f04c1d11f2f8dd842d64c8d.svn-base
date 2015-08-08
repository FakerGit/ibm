<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章审核</title>
</head>

<body>
<?php
$sql = "select * from article where status=0 order by date desc";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num){
	echo"<table align='center' border='1' cellpadding='10'>";
	echo"<tr>";
	echo"<th>文章</th>";
	echo"<th>模块</th>";
	echo"<th>提交时间</th>";
	echo"<th>操作</th>";
	echo"</tr>";
	while($row = mysql_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row["title"]."</td>";
		switch($row["module"]){
			case 1:
			echo "<td>科技快讯</td>";
			break;
			case 2:
			echo "<td>主机技术</td>";
			break;
			case 3:
			echo "<td>科普乐园</td>";
			break;
			default:
			echo "<td>知识问答</td>";
		}
		echo "<td>".$row["date"]."</td>";
		echo "<td>";
		$aid = $row["aid"];
		echo "<a href='checkandreview.php?aid=".$aid."target='_blank'>查看</a>&nbsp";
		echo "</td>";
		echo "</tr>";
	}
	echo"</table>";
}
else{
	echo "<p>当前没有需要审核的文章</p>";
}
?>
</body>
</html>