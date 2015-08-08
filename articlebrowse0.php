<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>评论</title>
</head>

<body>
<form action="commentcommit.php" method="post">
<textarea id="comment" name="comment" style="resize:none" cols="100" rows="10">
</textarea>
<br />
<button class="u-btn" type="submit" name="submit" id="submit">提交</button>&nbsp;
<button class="u-btn" type="reset">重置</button>
<?php
$sql = "select * from comment";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	echo"<div>";
	echo"<table border='1' width='725' cellpadding='0'>";
	echo"<tr><th align='left'>".$row["uid"]."&nbsp&nbsp&nbsp&nbsp&nbsp;".$row["time"]."</th></tr>";
	echo"<tr><td><p>".$row["content"]."</td></p></tr>";
	echo"</table>";
	echo"</div>";
}
?>
</form>
</body>
</html>