<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>评论管理</title>
</head>

<body>
<?php
$uid = $_SESSION['userid'];
$sql = "select * from comment,article where comment.uid = '$uid' and comment.aid=article.aid order by comment.time desc";
$result = mysql_query($sql);
if($result = mysql_query($sql)){
	echo"<table align='center' border='1' cellpadding='10'>";
	echo"<tr>";
	echo"<th>文章</th>";
	echo"<th>评论时间</th>";
	echo"<th>操作</th>";
	echo"</tr>";
	while($row = mysql_fetch_array($result)){
		echo"<tr>";
		echo"<td>".$row["title"]."</td>";
		echo"<td>".$row["time"]."</td>";
		echo"<td><a href='commentreplycheck.php?cid=".$row["cid"]."'>查看</a>&nbsp;";
		echo"<a href='commentdelete.php?cid=".$row["cid"]."'/>删除评论</td>";
		echo"</tr>";
	}
}
else{
	echo"<p>您还没有进行评论</p>";
}
?>
</table>
</body>
</html>