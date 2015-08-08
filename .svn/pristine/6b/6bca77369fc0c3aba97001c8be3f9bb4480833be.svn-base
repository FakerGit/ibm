<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>评论回复</title>
</head>

<body>
<?php
$cid = $_GET["cid"];
$sql = "select * from comment where cid = '$cid'";//获得评论记录
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
//输出评论信息
echo"<div>";
echo"<table border='1' width='725' cellpadding='0'>";
echo"<tr><th align='left'>".$row["time"]."</th></tr>";
echo"<tr><td><p>".$row["content"]."</td></p></tr>";
echo"</table>";
echo"</div>";
$sql0 = "select * from commentreply where cid = '$cid'";//获得评论回复记录
$result0 = mysql_query($sql0);
if($row0 = mysql_fetch_array($result0)){//如果编辑已经回复
	//输出回复信息
	echo"<div>";
    echo"<table border='1' width='725' cellpadding='0'>";
    echo"<tr><th align='left'>".$row0["time"]."</th></tr>";
    echo"<tr><td><p>回复：".$row0["content"]."</p></td></tr>";
    echo"</table>";
    echo"</div>";
}
else{//如果编辑尚未回复
	echo"<table border='1' width='725' cellpadding='0'>";
	echo"<tr><td><p>尚未回复</p></td></tr>";
	echo"</table>";
}
?>
<br />
<input type="button" id="return" name="return" onclick="window.history.go(-1)" value="返回" />
</body>
</html>