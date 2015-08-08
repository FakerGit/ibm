<?php require_once('Connections/weblib.php') ;?>
<!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>科普乐园 | 大型主机科普网站</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <link type="text/css" rel="stylesheet" href="css/style.css" />
    <style type="text/css">
        #container { width: 580px; height: 150px; overflow: hidden; position: relative; margin-top:60px;margin-left:20px;}
        #list { width: 3480px; height: 150px; position: absolute; z-index: 1;}
        #list img { float: left; border-radius:20px; margin:2px;;}
        #buttons { position: absolute; height: 10px; width: 80px; z-index: 2; bottom: 30px; left: 260px;}
        #buttons span { cursor: pointer; float: left; border: 1px solid #fff; width: 10px; height: 10px; border-radius: 50%; background: #333; margin-right: 5px;}
        #buttons .on {  background: orangered;}
        .arrow { cursor: pointer; display: none; line-height: 25px; text-align: center; font-size: 25px; font-weight: bold; width: 30px; height: 30px;  position: absolute; z-index: 2; top: 40px; background-color: RGBA(0,0,0,.3); color: #fff;}
        .arrow:hover { background-color: RGBA(0,0,0,.7);}
        #container:hover .arrow { display: block;}
        #prev { left: 20px;}
        #next { right: 20px;}
    </style>  
 </head> 
 <body> 
 
 <?php 
 class Show
{
   var $PageSize;             //每页的数量
   var $CurrentPageID;        //当前的页数
   var $NextPageID;           //下一页
   var $PreviousPageID;       //上一页
   var $numPages;             //总页数
   var $amount;             //总记录数
   var $isFirstPage;          //是否第一页
   var $isLastPage;           //是否最后一页
   var $sql;                  //sql查询语句
   var $num;                   //预定显示页码数
   var $CurrentNum;            //当前显示记录数   
   
   
	
	function display($currentNum){
		//获取当前页数
			if(isset($_GET['CurrentPageID'])){
				$this->CurrentPageID=intval($_GET['CurrentPageID']);
			}
			else{
				$this->CurrentPageID=1;
			}
			
		//每页数量
				$this->CurrentNum=$currentNum;
				$sql="select count(*) as amount from article where module = 3 and status=3" ;
				$result=mysql_query($sql)or die(mysql_error());
				$number=mysql_fetch_array($result);
				$this->amount=$number[0];
				//获取页数
				if($this->amount){
					if($this->amount<$this->CurrentNum){$this->page_count=1;}
					if($this->amount%$this->CurrentNum){
						$this->numPages=(int)($this->amount/$this->CurrentNum)+1;
					}else{
						$this->numPages=$this->amount/$this->CurrentNum;
					}
				}else{
					$this->numPages=0;
				}
			
			//获取数据
			$this->page=($this->CurrentPageID-1)*$this->CurrentNum;
			if($this->amount){
				$sql="select* from article where module=3 and status=3 order by aid desc limit $this->page,$this->CurrentNum";
				$result=mysql_query($sql)or die(mysql_error());
				while($row=mysql_fetch_array($result)){
					$rowset[]=$row;
				}
			}else{
				$rowset=array();
			}		
			return $rowset;
		
	}
	
	//分页码函数
	function pagebar(){
	$num=5;  
	$num = min($this->numPages, $num); //处理显示的页码数大于总页数的情况   
	if($this->CurrentPageID >$this->numPages || $this->CurrentPageID < 1) return $this->numPages; //处理非法页号的情况	
	$end = $this->CurrentPageID + floor($num/2) <= $this->numPages ? $this->CurrentPageID + floor($num/2) : $this->numPages; //计算结束页号
	$start = $end - $num + 1; //计算开始页号 
    if($start < 1) { //处理开始页号小于1的情况 
    $end -= $start - 1;     
	$start = 1;  
	}   
	for($i=$start; $i<=$end; $i++) { //输出分页条，添加链接样式
		if($i == $this->CurrentPageID){
     		echo " <a href='Admin_user.php?CurrentPageID=".$i."'>[$i]</a>";
		 } else{
            echo " <a href='Admin_user.php?CurrentPageID=".$i."'>$i</a>";
			}  
	}
}
}
	$user_display=new Show;
	$row=$user_display->display(7);

 ?>
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
     <div id="mediasMenu"> 
     </div> 
	 <div class="map2">
	 <a target="_blank" href="http://j.map.baidu.com/f_v1z" ><img src="images/ditu.png" /></a>
	 </div>
    </div> 
    <div class="pageRight"> 
      <div class="title_pic"> 
       <img src="images/medias_pic.png" /> 
      </div> 
<div id="current">
   所在位置：&nbsp;&nbsp;
   <a href="" class="curr">首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
   <a href="" class="curr">科普乐园</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
   <a href="" class="curr">主机图片</a>
  </div>
      <div id="mediasMain"> 
	  <div id="photoTop">
	  <div id="photoLeft">
	  <a href="articlebrowse.php?aid=<?php echo $row[0]['aid']; ?>" target="_blank"><img src="<?php echo $row[0]['pic']?>" /> </a>
	  </div>
	  <div id="photoRight">
	  <p class="strong"><a href="articlebrowse.php?aid=<?php echo $row[0]['aid']; ?>" target="_blank"><?php echo $row[0]['title']?></a></p>
	  <p><?php echo $row[0]['introduction']?></p> 
	  <a href="" target="_blank"><img src="images/click.png" /></a>
	  </div>
	  </div>
	  <div id="photoBottom">
<div id="container">
    <div id="list" style="left: -580px;">
        <img src="images/slider7.jpg" alt="1"/>
        <img src="images/slider1.jpg" alt="1"/>
        <img src="images/slider2.jpg" alt="1"/>
        <img src="images/slider3.jpg" alt="1"/>
        <img src="images/slider4.jpg" alt="1"/>
        <img src="images/slider5.jpg" alt="1"/>
        <img src="images/slider6.jpg" alt="1"/>
        <img src="images/slider7.jpg" alt="1"/>
        <img src="images/slider1.jpg" alt="1"/>
        <img src="images/slider2.jpg" alt="1"/>
        <img src="images/slider3.jpg" alt="1"/>
        <img src="images/slider4.jpg" alt="1"/>
        <img src="images/slider5.jpg" alt="1"/>
        <img src="images/slider6.jpg" alt="1"/>
        <img src="images/slider7.jpg" alt="1"/>
        <img src="images/slider1.jpg" alt="1"/>
        <img src="images/slider2.jpg" alt="1"/>
        <img src="images/slider3.jpg" alt="1"/>
        <img src="images/slider4.jpg" alt="1"/>
        <img src="images/slider5.jpg" alt="1"/>
        <img src="images/slider6.jpg" alt="1"/>
        <img src="images/slider7.jpg" alt="1"/>
        <img src="images/slider1.jpg" alt="1"/>
        <img src="images/slider2.jpg" alt="1"/>
    </div>
    <div id="buttons">
        <span index="1" class="on"></span>
        <span index="2"></span>
        <span index="3"></span>
        <span index="4"></span>
    </div>
    <a href="javascript:;" id="prev" class="arrow">&lt;</a>
    <a href="javascript:;" id="next" class="arrow">&gt;</a>
</div>
	  </div>
      </div> 
    </div> 
    <div class="clearit"></div> 
   </div> 
  </div> 
    <script type="text/javascript">
        window.onload = function () {
            var container = document.getElementById('container');
            var list = document.getElementById('list');
            var buttons = document.getElementById('buttons').getElementsByTagName('span');
            var prev = document.getElementById('prev');
            var next = document.getElementById('next');
            var index = 1;
            var len = 4;
            var animated = false;
            var interval = 3000;
            var timer;


            function animate (offset) {
                if (offset == 0) {
                    return;
                }
                animated = true;
                var time = 300;
                var inteval = 10;
                var speed = offset/(time/inteval);
                var left = parseInt(list.style.left) + offset;

                var go = function (){
                    if ( (speed > 0 && parseInt(list.style.left) < left) || (speed < 0 && parseInt(list.style.left) > left)) {
                        list.style.left = parseInt(list.style.left) + speed + 'px';
                        setTimeout(go, inteval);
                    }
                    else {
                        list.style.left = left + 'px';
                        if(left>-100){
                            list.style.left = -580 * len + 'px';
                        }
                        if(left<(-580 * len)) {
                            list.style.left = '-580px';
                        }
                        animated = false;
                    }
                }
                go();
            }

            function showButton() {
                for (var i = 0; i < buttons.length ; i++) {
                    if( buttons[i].className == 'on'){
                        buttons[i].className = '';
                        break;
                    }
                }
                buttons[index - 1].className = 'on';
            }

            function play() {
                timer = setTimeout(function () {
                    next.onclick();
                    play();
                }, interval);
            }
            function stop() {
                clearTimeout(timer);
            }

            next.onclick = function () {
                if (animated) {
                    return;
                }
                if (index == 4) {
                    index = 1;
                }
                else {
                    index += 1;
                }
                animate(-580);
                showButton();
            }
            prev.onclick = function () {
                if (animated) {
                    return;
                }
                if (index == 1) {
                    index = 4;
                }
                else {
                    index -= 1;
                }
                animate(580);
                showButton();
            }

            for (var i = 0; i < buttons.length; i++) {
                buttons[i].onclick = function () {
                    if (animated) {
                        return;
                    }
                    if(this.className == 'on') {
                        return;
                    }
                    var myIndex = parseInt(this.getAttribute('index'));
                    var offset = -580 * (myIndex - index);

                    animate(offset);
                    index = myIndex;
                    showButton();
                }
            }

            container.onmouseover = stop;
            container.onmouseout = play;

            play();

        }
    </script>
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