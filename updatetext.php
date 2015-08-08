<?php require_once('Connections/weblib.php'); ?>

<?php
    header("Content-Type:text/html; charset=utf-8");
    $aid = $_POST["aid"];
	$title = $_POST["title"];
	$introduction = $_POST["introduction"];
	$text = $_POST["text"];
	$module = $_POST["module"];
	$source = $_POST["source"];
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
					file_put_contents($source,$text);
					$sql = "update article set title='$title',introduction='$introduction',module='$module',status=0 where aid='$aid'";
	                $result = mysql_query($sql);
	                if($result){
						echo "<script>alert('修改成功！'); window.location.href='articlemanage.php';</script>";
	                }
					else{
						echo "<script>alert('修改失败！');history.go(-1);</script>";
					}
				}
			}
		}
	}
?>