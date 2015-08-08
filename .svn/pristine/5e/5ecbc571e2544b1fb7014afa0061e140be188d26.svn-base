<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title>public_topbar</title>
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
$uid = $_SESSION['userid'];
$sql = "select * from users where uid = '$uid'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
?>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <ul class="navbar-list clearfix">
                <li><a class="on" href="#">IBM大型主机科普网站</a></li>
                <li><a href="index.php" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><p><?php echo "您好，".$row["username"]; ?></p></li>
                <li><a href="index.php" target="_top">退出</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>