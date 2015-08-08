<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>评论管理</title>
</head>

<body>
<?php
$uid = $_SESSION["userid"];
$sql = "select * from comment,article,users where article.uid = '$uid' and comment.aid = article.aid and comment.uid = users.uid and cid not in(select cid from commentreply) order by comment.time desc";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num){
	echo"<table align='center' border='1' cellpadding='10'>";
	echo"<tr>";
	echo"<th>文章</th>";
	echo"<th>评论者</th>";
	echo"<th>评论时间</th>";
	echo"<th>操作</th>";
	echo"</tr>";
	while($row = mysql_fetch_assoc($result)){
		echo"<tr>";
		echo"<td>".$row["title"]."</td>";
		echo"<td>".$row["username"]."</td>";
		echo"<td>".$row["time"]."</td>";
		echo"<td><a href='commentreply.php?cid=".$row["cid"]."'>查看评论</a>&nbsp;";
		echo"<a href='commentdelete.php?cid=".$row["cid"]."'/>删除评论";
		echo"</tr>";
	}
	echo"</table>";
}
else{
	echo"<p>当前没有未回复评论</p>";
}
?>
</body>
</html>