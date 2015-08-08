<?php require_once('mysql.func.php')?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IBM大型主机科普网站 | 管理员</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <style type="text/css">
        .sidebar-wrap{float: left;width: 189px;min-height:700px;background: #f2f2f2;border-right:1px solid #ccc;}
        .sidebar-content{padding-top: 5px;}
        .sidebar-list li{border:1px solid #e5e5e5;border-width:1px 0;}
        .sidebar-list li .icon-font{margin-right: 5px;color: #888;font-size: 14px;}
        .sidebar-list li a{padding: 0 16px 0 20px;display: block;height: 38px;line-height: 38px;color: #333;}
        .sidebar-list li a:hover{background: #fff;color: #1963AA;}
    </style>
    <script src="../js/jquery-1.11.2.min.js">
  </script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            
            <ul class="navbar-list clearfix">
                <li><a class="on" href="#">IBM大型主机科普网站</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><p>您好，管理员</p></li>
                <li><a href="#">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li><a href="#">用户管理</a></li>
                <li><a href="#">角色权限管理</a></li>
                <li><a href="#">留言管理</a></li>
                <li><a href="#">数据库备份与恢复</a></li>
                <li><a href="#">报名参观审核</a></li>
            </ul>
        </div>
    </div>
    <div>
<table  id="userList" align="left" border="2" cellpadding="10" >    
    <tr align="center">     
    <td>id</td>     
    <td>用户名</td>     
    <td>密码</td>     
    <td>性别</td>     
    <td>邮箱</td>     
    <td>操作</td>    
    </tr> 
<?php
	$user_display=new Show;
	$row=$user_display->display(2);
	foreach($row as $user){
		echo"
			<tr>
			<td>".$user['uid']."</td>
			<td>".$user['username']."</td>
			<td>".$user['password']."</td>
			<td>".$user['sex']."</td>
			<td>".$user['email']."</td>
			<td>
			<button onclick='edit(".$user['uid'].")'>修改</button>
			<button onClick='del(".$user['uid'].")'>删除</button>
			</td>
			</tr>";
	}
	echo "</table>";
?>
<br>
<?php
	$user_display->pagebar();
?>
<form action="doAdminAction.php?act=add" name="addForm" id="addForm" method="post">
<table align="center" border="1" cellpadding="10">
	<tr>
    <td>用户名(*):<input type="text"  name="add_name" id="add_name"/> </td>
    <td>密码(*)
    <input type="text"  name="add_pwd" id="add_pwd"/> </td>
    <td> 性别(*): 
		<select name="add_sex"> <option value="male">男</option><option value="female">女</option></td>
	<td>邮箱(*):
		<input type="text"  name="add_email" id="add_email"/></td>
     <td>
     <input type="submit"  value="增加" /></td>
     </tr>
    </table>
    </form>
</div>
</div>

<script type="text/javascript">
	$("#addForm").submit(
		function (){
			add_user();
			return false;
		}
	);
	
	
  	function add_user(){
		if(confirm("确认增加？")){
			var name=$("#add_name").val();
			var pwd=$("#add_pwd").val();
			var sex=document.getElementById("add_sex").value;
			var email=$("#add_email").val();
			var act="add";
			$.ajax({
				type:"POST",
				url:"doAdminAction.php?",
				data:"act="+act+"&name="+name+"&pwd="+pwd+"&sex="+sex+"&email="+email,beforeSend: function(){},
				success:function(msg){
					if(msg==1){
						alert('成功添加');
					}else{
						if(msg==2){
							alert('没有填写完整的信息');
						}else{
							alert('添加失败');
						}
					}
				}
			});
		}
	}
	
	 function del(uid)
	 {
		 if(confirm("确认删除"))
		 {
		 var uid=uid;
		 alert(uid);
		$.post("doAdminAction.php?act=delete",{uid:uid},function(msg){
			alert(msg);
		if(msg == 1){
			alert('删除成功!');
			location.reload(true); 
		}else{
			alert('删除失败!');
		}
		});
	  }
	}
	
	function edit(uid)
	{	
		window.open("edit.php?uid="+uid,"newwindow","height=400, width=1200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no");
	}
  </script>

</body></html>