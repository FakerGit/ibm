<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_weblib = "localhost";
$database_weblib = "weblib";
$username_weblib = "weblib";
$password_weblib = "harry";
$weblib = mysql_pconnect($hostname_weblib, $username_weblib, $password_weblib) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names utf8");
mysql_select_db($database_weblib, $weblib);
session_start();

$lifeTime = 24 * 3600; 
setcookie(session_name(), session_id(), time() + $lifeTime, "/"); 
?>