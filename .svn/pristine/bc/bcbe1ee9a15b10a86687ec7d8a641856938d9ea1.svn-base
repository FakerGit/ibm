<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title>editor_navbar</title>
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <style type="text/css">
        .sidebar-wrap{float: left;width: 189px;min-height:700px;background: #f2f2f2;border-right:1px solid #ccc;}
        .sidebar-content{padding-top: 5px;}
        .sidebar-list li{border:1px solid #e5e5e5;border-width:1px 0;}
        .sidebar-list li .icon-font{margin-right: 5px;color: #888;font-size: 14px;}
        .sidebar-list li a{padding: 0 16px 0 20px;display: block;height: 38px;line-height: 38px;color: #333;}
        .sidebar-list li a:hover{background: #fff;color: #1963AA;}
    </style>
</head>

<body>
<?php
$uid = $_SESSION["userid"];
$sql1 = "select * from users_authority where uid = '$uid' and auid = 2";
$sql2 = "select * from users_authority where uid = '$uid' and auid = 3";
$sql3 = "select * from users_authority where uid = '$uid' and auid = 4";
$sql4 = "select * from users_authority where uid = '$uid' and auid = 5";
$result1 = mysql_query($sql1);
$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);
$result4 = mysql_query($sql4);
$num1 = mysql_num_rows($result1);
$num2 = mysql_num_rows($result2);
$num3 = mysql_num_rows($result3);
$num4 = mysql_num_rows($result4);
$editref = "noauthority.html";//初始化文章编辑超链接，默认为无权限页面链接
$articleref = "noauthority.html";//初始化文章管理超链接，默认为无权限页面链接
$commentref = "noauthority.html";//初始化评论管理超链接，默认为无权限页面链接
$reviewref = "noauthority.html";//初始化文章审核超链接，默认为无权限页面链接
if($num1){//若权限记录存在
	$editref = "textedit.php";//设置相关操作页面链接
}
if($num2){//若权限记录存在
	$articleref = "articlemanage.php";//设置相关操作页面链接
}
if($num3){//若权限记录存在
	$commentref = "commentmanage_editor.php";//设置相关操作页面链接
}
if($num4){//若权限记录存在
	$reviewref = "articlereview.php";//设置相关操作页面链接
}
?>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li><a href="<?php echo $editref ?>" target="mainframe">文章编辑</a></li>
                <li><a href="<?php echo $articleref ?>" target="mainframe">文章管理</a></li>
                <li><a href="<?php echo $commentref ?>" target="mainframe">评论管理</a></li>
                <li><a href="<?php echo $reviewref ?>" target="mainframe">文章审核</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>