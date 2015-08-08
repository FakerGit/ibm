<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色权限编辑</title>
</head>
<script language="javascript">
function changeauthority(){
	var role = document.getElementById("role").value;
	var publicauthority = document.getElementById("publicauthority");
	var editorauthority = document.getElementById("editorauthority");
	if(role==1){
		publicauthority.style.display = "block";
		editorauthority.style.display = "none";
	}
	else{
		publicauthority.style.display = "none";
		editorauthority.style.display = "block";
	}
}
</script>

<body>
<form action="authoritymodify.php" method="post">
<?php
$uid = $_GET["uid"];
//查询用户名和角色名
$role_sql = "select * from users,users_role,role where users.uid=users_role.uid and users_role.rid=role.rid and users.uid='$uid'";
$role_result = mysql_query($role_sql);
$row = mysql_fetch_array($role_result);
$rid = $row["rid"];
//输出一条权限记录
echo"<p style='size:30'>".$row["username"]."</p>";//输出用户名
echo"<p>";//输出角色名到下拉框中
echo"<select id='role' name='role' onchange='changeauthority()'>";
if($rid==1){
	echo"<option value='1' selected='selected'>".$row["rolename"]."</td>";//输出角色名
    echo"<option value='2'>发布者</option>";//设置其余可选项
}
else{
	echo"<option value='2' selected='selected'>".$row["rolename"]."</option>";//将数据库记录作为默认选中值
	echo"<option value='1'>公众</option>";//设置其余可选项
}
echo"</select>";
echo"</p>";
echo"<p>";
if($rid==1){
	echo"<div id='publicauthority' style='display:block'>
    <input type='checkbox' id='authority[]' name='authority[]' value='1' />浏览文章
    </div>
    <div id='editorauthority' style='display:none'>
    <input type='checkbox' id='authority[]' name='authority[]' value='2' />编辑文章&nbsp;
    <input type='checkbox' id='authority[]' name='authority[]' value='3' />文章管理&nbsp;
    <input type='checkbox' id='authority[]' name='authority[]' value='4' />评论管理&nbsp;
	<input type='checkbox' id='authority[]' name='authority[]' value='5' />文章审核&nbsp;
    </div>";
}
else{
	echo"<div id='publicauthority' style='display:none'>
    <input type='checkbox' id='authority[]' name='authority[]' value='1' />浏览文章
    </div>
    <div id='editorauthority' style='display:block'>
    <input type='checkbox' id='authority[]' name='authority[]' value='2' />编辑文章&nbsp;
    <input type='checkbox' id='authority[]' name='authority[]' value='3' />文章管理&nbsp;
    <input type='checkbox' id='authority[]' name='authority[]' value='4' />评论管理&nbsp;
	<input type='checkbox' id='authority[]' name='authority[]' value='5' />文章审核&nbsp;
    </div>";
}
echo"</p>";
?>
<input type="hidden" id="uid" name="uid" value="<?php echo $uid ?>" />
<input type="submit" id="submit" name="submit" value="确定"/>
<input type="button" onclick="javascript:history.go(-1)" value="取消"/>
</form>
</body>
</html>