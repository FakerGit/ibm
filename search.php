<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站内搜索结果</title>
</head>

<body>
<?php
	$searchT=$_GET['wd'];
	$sql = "select * from article where title like '%$searchT%'";  
    $result = mysql_query($sql);  
    if(mysql_num_rows($result))
	{
		$num=mysql_num_rows($result);
		for($i=0;$i<$num;$i++)
	{
		$row=mysql_fetch_array($result);
		$row['title']=preg_replace("/($searchT)/i","<b style=\"color:red\">\\1</b>",$row['title']); 
?>
        <a target="_blank" href="articlebrowse.php?aid=<?php echo $val['aid']; ?>"><?php echo $row['title'];echo " ";echo $row['date']; echo'<br/>'; ?></a>
 <?php
	}
	}
	else
		echo "搜索不到相关内容";	
	
?>

</body>
</html>