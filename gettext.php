<?php require_once('Connections/weblib.php'); ?>

<?php  
    header("Content-Type:text/html; charset=utf-8");
	$uid = $_SESSION["userid"];
	$title = $_POST["title"];
	$introduction = $_POST["introduction"];
	$text = $_POST["text"];
	$module = $_POST["module"];
	$dir = 'article/';
	if($title == ""){
		echo"<script>alert('文章标题不能为空');history.go(-1);</script>";
	}
	else{
		if($introduction == ""){
			echo"<script>alert('简介不能为空');history.go(-1);</script>";
		}
		else{
			if($text == ""){
				echo"<script>alert('正文不能为空');history.go(-1);</script>";
			}
			else{
				if($module == "0"){
		        echo"<script>alert('请选择要发布的模块');history.go(-1);</script>";
			    }
	            else{
					if (!file_exists($dir)){
						mkdir($dir);
					}
					$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
					preg_match_all($pattern,$text,$match);
					$pic = $match[1][0];
					$file = $dir.time().'.txt';
					file_put_contents($file,$text);
					$sql = "insert into article(uid,title,pic,source,introduction,module) values('$uid','$title','$pic','$file','$introduction','$module')";
	                $result = mysql_query($sql);
	                if($result){
						echo "<script>alert('提交成功！'); window.location.href='articlemanage.php';</script>";
	                }
					else{
						echo "<script>alert('提交失败！');history.go(-1);</script>";
					}
				}
			}
		}
	}
?>