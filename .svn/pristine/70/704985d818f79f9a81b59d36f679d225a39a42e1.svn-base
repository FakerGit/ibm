<?php require_once('../Connections/weblib.php'); ?>

<!DOCTYPE <html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=gbk" /> 
  <title>报名参观 | 大型主机科普网站</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <link type="text/css" rel="stylesheet" href="../css/style.css"/> 
   <script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
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
     <span> <a href="" target="_blank">登录</a>| <a href="" target="_blank">注册</a>| <a href="" target="_blank">管理员入口</a> </span> 
    </div> 
   </div> 
  </div> 
  <div id="header"> 
   <div class="wrapper"> 
    <div class="logo"> 
     <a href="/"><img src="../images/logo3.png" alt="大型主机科普网站" /></a> 
    </div> 
   </div> 
  </div> 
  <div id="nav"> 
   <ul> 
    <li><a href="../index.html" class="a1">首页</a></li> 
    <li><a href="../recent.html" class="a2">科技快讯</a></li> 
    <li><a href="../technology.html" class="a3">主机技术</a></li> 
    <li><a href="../medias.html" class="a4">科普乐园</a></li> 
    <li><a href="../q_a.html" class="a5">知识问答</a></li> 
    <form class="search" method="get" action="" target="_blank"> 
     <p> <input class="searchTxt" value="" maxlength="30" name="wd" type="text" style="background-image:url('../images/search_bg.png') " /> <input src="../images/search_icon.png" class="search_icon" name="" type="image" /> </p> 
    </form> 
   </ul> 
  </div> 
  <script type="text/javascript">
function select_search_type(n){
	document.getElementById('search_type1').className='';
	document.getElementById('search_type2').className='';
	document.getElementById('search_type3').className='';
	document.getElementById('search_type'+n).className='current';
	document.getElementById('search_type').value=n;
}
</script> 
  <div id="main"> 
   <div id="page"> 
    <div class="pageLeft"> 
     <div id="bmMenu">
     </div>
	 <div class="map2">
	 <a target="_blank" href="http://j.map.baidu.com/f_v1z" ><img src="../images/ditu.png" /></a>
	 </div>
    </div> 
    <div class="pageRight"> 
      <div class="title_pic"> 
       <img src="../images/bm_pic.png" /> 
      </div> 
<div id="current">
   所在位置：&nbsp;&nbsp;
   <a href="" class="curr">首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
   <a href="" class="curr">报名参观</a>
  </div>
      <div id="bmMain"> 
<div class="m-form">
    <form name="apply" action="applying.php" method="post" target="_self">
        <fieldset>
            <legend>欢迎报名参观</legend>
            <input type="hidden" name="mb" value="1" />
            <div class="formitm">
                <label class="lab">姓名：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt"  name="name" id="name"/>
                </div>
            </div>
            <div class="formitm">
                <label class="lab">邮箱：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt"  name="mail" id="mail"/>
                </div>
            </div>
            <div class="formitm">
                <label class="lab">年龄：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt"  name="age" id="age"/>
                </div>
            </div>
			<div class="formitm">
                <label class="lab">联系方式：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt" name="tel" id="tel"/>
                </div>
            </div>
			<div class="formitm">
                <label class="lab">本网站用户名：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt" name="username" />
                </div>
            </div>
			<div class="formitm">
                <label class="lab">参观时间：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt-date" name="time" id="time"/>
                    <img  onclick="WdatePicker({el:'time'})" src="../js/My97DatePicker/skin/datePicker.gif" width="16" height="22" align="absmiddle">
                </div>
            </div>
			<div class="formitm">
                <label class="lab">备注（填写参观理由）：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt"  name="reason"/>
                </div>
            </div>
            <div class="formitm formitm-1">  <input type="submit" name="submit" value="报名" onclick="return check()"/></div>
        </fieldset>
    </form>
</div>

      </div> 
    </div> 
    
     <script language="javascript">
  	function check(){
		var name = document.getElementById('name');
		var mail = document.getElementById('mail');
		var age  = document.getElementById('age');
		var tel  = document.getElementById('tel');
		var time = document.getElementById('time');
		if(name.value==""||mail.value==""){
			alert("请把必填的填完！");
			return false;
		}
		if(age.value==""||tel.value==""){
			alert("请把必填的填完！");
			return false;
		}
		if(time.value==""){
			alert("请把必填的填完！");
			return false;
		}
		return true;
	}
  </script>
  
    <div class="clearit"></div> 
   </div> 
  </div> 
  <div id="footer"> 
   <div class="nav"> 
    <ul> 
     <li class="jianjie"><a href="#" class="a1">华工IBM中心简介</a></li> 
     <li><a href="#" class="a2">网站简介</a></li> 
     <li><a href="#" class="a3">联系我们</a></li> 
     <li><a href="#" class="a4">留言建议</a></li> 
     <li><a href="#" class="a5">友情链接</a></li> 
    </ul> 
   </div> 
   <!-- 		<div class="friendlink">
		<ul>
		<li><a href="#" class="a1">科学松鼠会</a></li>
		<li><a href="#" class="a2">蝌蚪五线谱</a></li>
		<li><a href="#" class="a3">中国科普网</a></li>
		<li><a href="#" class="a4"></a></li>
		</ul>
		</div> --> 
   <!-- 		<div class="copyright">
			<div class="l">&copy; Copyright &copy; 2014.</div>
		</div> --> 
  </div> 
  <a href="#" title="返回顶部" id="goTop"></a>   
 </body>
</html>