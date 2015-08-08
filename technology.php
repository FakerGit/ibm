<?php require_once('Connections/weblib.php') ;?>
<!DOCTYPE <html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>主机技术 | 大型主机科普网站</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <link type="text/css" rel="stylesheet" href="css/style.css" /> 
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
				$sql="select count(*) as amount from article where module = 2 and status=3" ;
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
				$sql="select* from article where module=2 and status=3 order by aid desc limit $this->page,$this->CurrentNum";
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
     <div id="techMenu"> 
     </div> 
     <div id="left_history"> 
      <ul> 
       <li class="first"><a href="#" class="a1"></a></li> 
       <li><a href="#" class="a2"></a></li> 
       <li><a href="#" class="a3"></a></li> 
       <li><a href="#" class="a4"></a></li> 
       <li><a href="#" class="a5"></a></li> 
       <li><a href="#" class="a6"></a></li> 
       <li><a href="#" class="a7"></a></li> 
       <li><a href="#" class="a8"></a></li> 
       <li><a href="#" class="a9"></a></li> 
      </ul> 
     </div> 
	 <div class="map2">
	 <a target="_blank" href="http://j.map.baidu.com/f_v1z" ><img src="images/ditu.png" /></a>
	 </div>
    </div> 
    <div class="pageRight"> 
      <div class="title_pic"> 
       <img src="images/tech_pic.png" /> 
      </div> 
<div id="current">
   所在位置：&nbsp;&nbsp;
   <a href="" class="curr">首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
   <a href="" class="curr">主机技术</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
   <a href="" class="curr">主机体系</a>
  </div>
      <div id="techMain"> 
      <?php
	  		foreach($row as $val)
			{
				?>
       <div class="glist"> 
        <div class="gimg">
         <a href="articlebrowse.php?aid=<?php echo $val['aid']; ?>" target="_blank"><img src="<?php echo $val['pic']; ?>" height="93" width="145" /></a>
        </div> 
        <div class="gtitle"> 
         <p class="strong"><a href="articlebrowse.php?aid=<?php echo $val['aid']; ?>" target="_blank"><?php echo $val['title']; ?></a></p> 
         <p><?php echo $val['introduction']; ?></p> 
        </div> 
       </div> 
       <?php
			}
		   ?>
      </div> 
      
      <?php
	  		$user_display->pagebar();
	  ?>
      <!-- 以下是来自明智科普网的分页js --> 
       <div class="itemC"> 
       <script language="JavaScript"> <!-- 
            function createPageHTML(_nPageCount, _nCurrIndex, _sPageName, _sPageExt){ 
            if(_nPageCount == null || _nPageCount<=1){ 
            return;
            }
            var nCurrIndex = _nCurrIndex || 0;
            for(var i=0; i<_nPageCount; i++){
            var sPageName = (i == 0 ? _sPageName : (_sPageName+"_" + i)) + "."+_sPageExt;
            if(nCurrIndex == i){ document.write((i+1) + "&nbsp;");
            }else{ document.write("<a href='" + sPageName + "' class='current'>"+(i+1)+"</a>&nbsp;");
            }
            }
            } 
            //WCM置标 
            createPageHTML(0, 0, "index", "html");
            
            </script>1&nbsp;
       <a href="#" class="current">2</a>&nbsp;
       <a href="#" class="current">3</a>&nbsp;
       <a href="#" class="current">4</a>&nbsp;
       <a href="#" class="current">5</a>&nbsp;
       <a href="#" class="current">6</a>&nbsp;
       <a href="#" class="current">7</a>&nbsp;
       <a href="#" class="current">8</a>&nbsp;
       <a href="#" class="current">9</a>&nbsp;
       <a href="#" class="current">10</a>&nbsp; 
      </div>
      <!-- 以上是来自明智科普网的分页js --> 
    </div> 
    <div class="clearit"></div> 
   </div> 
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