<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章管理</title>
</head>

<body>

<?php
$uid = $_SESSION["userid"];
$sql = "select * from article where uid = '$uid' order by status,date desc";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num){
	echo"<table  align='center' border='1' cellpadding='10'>
		<tr>
		<th>文章标题</th>
		<th>所属模块</th>
		<th>创建时间</th>
		<th>点赞数</th>
		<th>转发数</th>
		<th>状态</th>
		<th>操作</th>
		</tr>";
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
		echo "<td>".$row["praise"]."</td>";
		echo "<td>".$row["retweet"]."</td>";
		switch($row["status"]){
			case 0:
			echo "<td>待审核</td>";
			break;
			case 1:
			echo "<td>待发布</td>";
			break;
			case 2:
			echo "<td>待修改</td>";
			break;
			case 3:
			echo "<td>已发布</td>";
			break;
			default:
			echo "<td>已删除</td>";
		}
		echo "<td>";
		$aid = $row["aid"];
		switch($row["status"]){
			case 0:
			echo "<a href='articlecheck.php?aid=".$aid."target='_blank'>查看</a>&nbsp";
	    	echo "<a href='articlemodify.php?aid=".$aid."target='_blank' />修改</a>&nbsp";
	    	echo "<a href='articledelete.php?aid=".$aid."target='_blank' />删除</a>";
			break;
			case 1:
			echo "<a href='articlerelease.php?aid=".$aid."target='_blank' />发布</a>&nbsp";
			echo "<a href='articlecheck.php?aid=".$aid."target='_blank'>查看</a>&nbsp";
	    	echo "<a href='articlemodify.php?aid=".$aid."target='_blank' />修改</a>&nbsp";
	    	echo "<a href='articledelete.php?aid=".$aid."target='_blank' />删除</a>";
			break;
			case 2:
			echo "<a href='articlecheck.php?aid=".$aid."target='_blank'>查看</a>&nbsp";
			echo "<a href='checkreason.php?aid=".$aid."target='_blank'>退回原因</a>&nbsp";
	    	echo "<a href='articlemodify.php?aid=".$aid."target='_blank' />修改</a>&nbsp";
	    	echo "<a href='articledelete.php?aid=".$aid."target='_blank' />删除</a>";
			break;
			case 3:
			echo "<a href='articlecheck.php?aid=".$aid."target='_blank'>查看</a>&nbsp";
	    	echo "<a href='articlemodify.php?aid=".$aid."target='_blank' />修改</a>&nbsp";
	    	echo "<a href='articledelete.php?aid=".$aid."target='_blank' />删除</a>";
			break;
			default:
			echo "<a href='articlecheck.php?aid=".$aid."target='_blank'>查看</a>&nbsp";
	   		echo "<a href='articlerestore.php?aid=".$aid."target='_blank' />恢复</a>";
		}
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else{
	echo "<p>您还未发布任何文章</p>";
}
?>
</body>
</html>