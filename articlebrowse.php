<?php require_once('Connections/weblib.php'); ?>

<!DOCTYPE <html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>阅读文章 | 大型主机科普网站</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <link type="text/css" rel="stylesheet" href="css/style.css" /> 
  <style>
.page{width:950px; float:left; overflow:hidden;}
#bodyTitle h1{ text-align:center;color:#333; font:24px/60px "微软雅黑", "宋体"; margin-top:10px; border-top:solid 1px #e1e1e1;}

.pubDate { overflow:hidden; height:30px; line-height:30px;  color:#838383; clear:both; display:block; margin-top:7px;text-align:center;}

.daodu { background:#f3f3f3; margin:10px auto; padding:10px; font-size:14px; line-height:25px; color:#838383; text-align:left; width:830px;}

.area_body { margin:30px auto;text-align:left; width:850px;}
.area_body p { margin-bottom:20px; text-indent:2em;}

#sharebtn{ float:right; }
.bdsharebuttonbox { float:left;color:#333; width:200px;}
.bdsharebuttonbox span{ float:left;line-height:30px; height:30px;width:60px;}

.line2{height:0;font-size:0;line-height:0;overflow:hidden;clear:both; margin-top:40px; margin-bottom:20px;border-bottom:1px dotted #ccc}

.tie-area { width:948px; border: 1px solid #dcdddd; background: #f6f9fa; font-size: 12px; margin-bottom:12px;}
.tie-area strong { font-weight: bold; }
.tie-area form, .tie-area ul, .tie-area ol { margin: 0; padding: 0; }
.tie-area img { border: none; }
.tie-area a, .tie-area a:visited { color: #1e50a2; }
.tie-area .cDRed{color: #ba2636; font:12px "宋体" }
.tie-area .cDRed a{ color: #ba2636; font:12px "宋体" }
.tie-area .tieLink { margin-left:465px; font:12px "宋体"   }
.tie-area .tieLink a{ color: #000; }
.tie-hidden { display: none; }
.tie-titlebar {height: 25px;line-height: 25px;clear: both;overflow: hidden;text-align: left;margin-top: 12px;padding-left: 21px;font-size: 14px; border-bottom:1px dashed #CCC;}
/* 发贴区 */
.tie-post { padding: 8px 19px 20px 19px;zoom: 1;overflow: hidden;clear: both;}
/* 表单输入框 */
.tie-textbox {background: #fff; width: 80px; height: 14px; line-height: 14px;border: 1px solid #dcdddd;font-size: 12px;padding:0 2px;}
.tie-textbox2 {background: #fff; width: 40px; height:14px; line-height: 14px;border: 1px solid #ccc;font-size: 12px;padding:0 3px; float:left; margin-top:8px;}
/* 回复表单 */
.tie-postform .tie-textarea { width: 98%; height: 130px; padding: 5px 0 0 5px; border: 1px solid #dcdddd; background: #fff;font-size: 14px;clear: both;text-align: left;color: #555;}
.tie-postform .tie-textarea-focus { color: #000; }
.tie-postform .send { clear: both;line-height: 30px; height:30px; }
.tie-postform .send p { float: left; color: #555; margin: 0; height:30px; line-height:35px; }
.tie-postform .send .toPost { cursor: pointer; font-size: 12px; }
/* 发贴作者 */
.btn6 {background:rgba(100, 169, 236, 0.97); height:24px; width:50px; border:0px; cursor: pointer; float:right; margin-right:20px; color:#fff; border-radius:2px;}
.tie-author { clear: both; text-align: left; margin-bottom: 8px;height: 24px;line-height: 24px;overflow: hidden; margin-top:7px;}
.tie-author input  { vertical-align: middle; }
.tie-author-logon,.tie-author-nickname,.tie-author-toname { display: none; }
.tie-author .tie-button { cursor: pointer; font-size: 12px; }
.tie-author-logon { color: #1e50a2; position: relative; zoom: 1; height:24px; }

  </style>
 </head> 
 <body> 
  <div id="topBar"> 
   <div class="wrapper"> 
    <div class="l">
      您好，欢迎访问大型主机科普网站！ 
    </div> 
    <div class="r"> 
     <a href="#" onclick="window.external.AddFavorite(location.href,'');">加入收藏</a> 
     <a href="#" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage(location.href);">设为首页</a> 
     <span> <a href="login.php" target="_blank">登录</a>| <a href="register.php" target="_blank">注册</a>| <a href="manager.html" target="_blank">管理员入口</a> </span> 
    </div> 
   </div> 
  </div> 
  <div id="header"> 
   <div class="wrapper"> 
    <div class="logo"> 
     <a href="/"><img src="images/logo3.png" alt="大型主机科普网站" /></a> 
    </div> 
   </div> 
  </div> 
  <div id="nav"> 
   <ul> 
    <li><a href="index.php" class="a1">首页</a></li> 
    <li><a href="recent.php" class="a2">科技快讯</a></li> 
    <li><a href="technology.php" class="a3">主机技术</a></li> 
    <li><a href="medias.php" class="a4">科普乐园</a></li> 
    <li><a href="q_a.php" class="a5">知识问答</a></li> 
    <form class="search" method="get" action="" target="_blank"> 
     <p> <input class="searchTxt" value="" maxlength="30" name="wd" type="text" style="background-image:url('images/search_bg.png') " /> <input src="images/search_icon.png" class="search_icon" name="" type="image" /> </p> 
    </form> 
   </ul> 
  </div>
  <script type="text/javascript" src="js/jquery.js">
function select_search_type(n){
	document.getElementById('search_type1').className='';
	document.getElementById('search_type2').className='';
	document.getElementById('search_type3').className='';
	document.getElementById('search_type'+n).className='current';
	document.getElementById('search_type').value=n;
}
</script>
<script>
function praise(){
	var aid = document.getElementById('aid');
	$.post("praise.php",{aid:aid.value},function(msg){
		if(msg == 1){
			alert('点赞成功，感谢对本站的支持');
		}
	});
}
</script>
<?php
$aid = $_GET["aid"];
$sql = "select * from article where aid = '$aid'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$content = file_get_contents($row["source"]);
?>
  <div id="main">  
  <!-- 来自中国科普网的样式 开始 -->
<div class="page">
	<!--当前位置-->
		<div id="current">
   所在位置：&nbsp;&nbsp;
   <a href="index.php" class="curr">首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
   <a href="" class="curr"><?php switch($row["module"]){
			case 1:
			echo "科技快讯";
			break;
			case 2:
			echo "主机技术";
			break;
			case 3:
			echo "科普乐园";
			break;
			default:
			echo "知识问答";
		}?></a>
  </div>
	<div id="bodyTitle">
		<h1>
			<?php echo $row["title"] ?>
		</h1>
	</div>
	<div class="pubDate">
		<span id="pub_date">
			<?php echo $row["date"] ?>
		</span>
	</div>
	<div class="daodu">
		<b>
			[简介]
		</b>
		&nbsp;<?php echo $row["introduction"] ?>
	</div>
	<div style="font-size:16px" class="area_body">
		<p>
			<?php echo nl2br($content) ?>
		</p>
	</div>
	
	<div id="sharebtn">
		<div class="bdsharebuttonbox">
        <span>
        <a href="#none" class="copy">转发</a>
            </span>
            <span>
            <a onclick="praise();return false;" href="#">赞</a>
            </span>
		</div>
	</div>

	<div class="line2"></div>

	<!-- 发帖区开始 -->
	<div class="tie-area">
		<form class="tie-postform" name="newscomment" onsubmit="" action="commentcommit.php" method="post" target="_self">
			<div class="tie-post">
				<div class="tie-titlebar">
					<strong>
						评论区
					</strong>
				</div>
				<div class="tie-author">
					<label>
						用户名：
						<input type="text" class="tie-textbox" name="username" id="username">
					</label>
                    <input type="hidden" id="aid" name="aid" value="<?php echo $row["aid"] ?>" />
					<button type="submit" class="btn6" id="submit" name="submit" style="vertical-align:middle;" onclick="" />提交
				</div>
				<textarea name="content" id="content" class="tie-textarea" cols="81" rows="8"></textarea>
				<div class="send">
              <p>网友评论表达个人看法，并不表明本网同意其观点或证实其描述。</p>
            </div>
			</div>
		</form>
	</div>
	<!--发帖区结束-->
</div>
  
  <!-- 中国科普网的样式 结束 -->
  </div> 
  <div id="footer"> 
   <div class="nav"> 
    <ul> 
     <li class="jianjie"><a href="#" class="a1">华工IBM中心简介</a></li> 
     <li><a href="#" class="a2">网站简介</a></li> 
     <li><a href="#" class="a3">联系我们</a></li> 
     <li><a href="message.php" class="a4">留言建议</a></li> 
     <li><a href="#" class="a5">友情链接</a></li> 
    </ul> 
   </div> 
  </div> 
  <a href="#" title="返回顶部" id="goTop"></a>   
 </body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.zclip.js"></script>
<script type="text/javascript">
$(document).ready(function(){
/* 定义所有class为copy标签，点击后可复制被点击对象的文本 */
    $(".copy").zclip({
        path: "js/ZeroClipboard.swf",
        copy: function(){
		$.post("retweet.php",{aid:aid.value},function(msg){});
        return window.location.href;
        },
        beforeCopy:function(){/* 按住鼠标时的操作 */
            $(this).css("color","orange");
        },
        afterCopy:function(){/* 复制成功后的操作 */
            alert('链接已复制到剪贴板');
        }
    });
});
</script> 