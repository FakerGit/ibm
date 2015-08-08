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
$sql = "select * from comment,users where cid = '$cid' and comment.uid = users.uid";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
echo"<div>";
echo"<table border='1' width='725' cellpadding='0'>";
echo"<tr><th align='left'>".$row["username"]."&nbsp&nbsp&nbsp&nbsp&nbsp;".$row["time"]."</th></tr>";
echo"<tr><td><p>".$row["content"]."</p></td></tr>";
echo"</table>";
echo"</div>";
?>
<form action="commentreplycommit.php" method="post">
<label style="vertical-align:top">回复</label>
<textarea id="reply" name="reply" style="resize:none" cols="94" rows="5">
</textarea>
<br />
<input type="hidden" id="cid" name="cid" value="<?php echo $cid ?>" />
<button class="u-btn" type="submit" name="submit" id="submit">提交</button>&nbsp;
<button class="u-btn" type="reset">重置</button>&nbsp;
<input type="button" onclick="javascript:history.go(-1)" value="取消"/>
</body>
</html>