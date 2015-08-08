<?php require_once('../Connections/weblib.php'); ?>

<!DOCTYPE >
<html>
<body>
<center>
       <?php
	   		header("Content-Type:text/html; charset=utf-8");
			//更新表
	   		function updateApply($deal){
			if(is_array($deal) && !empty($deal)){  
			foreach($deal as $key=>$value){
	        $sql= "UPDATE apply SET deal=1 WHERE id='$key';";
		 	mysql_query($sql);
			header("refresh:1;url=mail.php");
			}
		}
}
			//分页码
			$num_pages=5;
			 function pagebar($page_count, $page, $num) {   
			 $num = min($page_count, $num); //处理显示的页码数大于总页数的情况   
	         if($page >$page_count || $page < 1) return; //处理非法页号的情况	
	         $end = $page + floor($num/2) <= $page_count ? $page + floor($num/2) : $page_count; //计算结束页号
	         $start = $end - $num + 1; //计算开始页号 
		     if($start < 1) { //处理开始页号小于1的情况 
		      $end -= $start - 1;     
			  $start = 1;  
			 }   
			for($i=$start; $i<=$end; $i++) { //输出分页条，添加链接样式
				     if($i == $page){
			?>
            <a href="manageApply.php?page=<?php echo $i ;?>"  ><?php echo "[$i]" ;?></a>
            <?php
					 }
					  else {
			?>
            <a href="manageApply.php?page=<?php echo $i ;?>"  ><?php echo $i ;?></a>
            <?php
					  }
			}   
		}   
		
			if(isset($_POST['save'])){
			if(isset($_POST['id'])){
				$deal = $_POST['id'];
				updateApply($deal);
			}
		}
			//获取当前页数
			if(isset($_GET['page'])){
				$page=intval($_GET['page']);
			}
			else{
				$page=1;
			}
				//每页数量
				$pageSize=4;
				mysql_select_db($database_weblib, $weblib);
				$sql="select count(*) as amount from apply where deal=0" ;
				$result=mysql_query($sql)or die(mysql_error());
				$num=mysql_fetch_array($result);
				$amount=$num[0];
				//获取页数
				if($amount){
					if($amount<$pageSize){$page_count=1;}
					if($amount%$pageSize){
						$page_count=(int)($amount/$pageSize)+1;
					}else{
						$page_count=$amount/$pageSize;
					}
				}else{
					$page_count=0;
				}

			
			//获取数据
			$pages=($page-1)*$pageSize;
			if($amount){
				mysql_select_db($database_weblib, $weblib);
				$sql="select* from apply where deal=0 order by id  limit $pages,$pageSize ";    
				$result=mysql_query($sql)or die(mysql_error());
				while($row=mysql_fetch_array($result)){
					$rowset[]=$row;
				}
			}else{
				$rowset=array();
			}
		?>
      <!--  使用for循环循环输出-->
       <div class="glist">   
        <div class="gtitle"> 
        <form  id="sub"  method="post" action="manageApply.php" name="applyform" target="_self">
        <?php
		if($amount>0){
		echo "<table align='center' border='1' cellpadding='10'>";
		echo "<tr>";
		echo "<th></th>";
		echo "<th>id</th>";
		echo "<th>邮箱</th>";
		echo "<th>姓名</th>";
		echo "<th>年龄</th>";
		echo "<th>电话</th>";
		echo "<th>参观时间</th>";
		echo "<th>参观人数</th>";
		echo "</tr>";
		$records=$pageSize;
		if($page==$page_count)
			$records=$amount-($pageSize*($page-1));
		for($i=0;$i<$records;$i++){
			?><tr>
            <td>
         <input type="checkbox" name="id[<?php echo $rowset[$i]['id'];?>]" value="1" />
         </td>
          <?php
		  echo "<td>".$rowset[$i]['id']."</td>";
		  echo "<td>".$rowset[$i]['mail']."</td>";
		  echo "<td>".$rowset[$i]['name']."</td>"; 
		  echo "<td>".$rowset[$i]['age']."</td>";
		  echo "<td>".$rowset[$i]['tel']."</td>"; 
		  echo "<td>".$rowset[$i]['time']."</td>"; 
		  echo "<td>".$rowset[$i]['members']."</td>";
		  echo "</tr>";
		  ?>
  		<?php
		}
			}else{
				echo "暂时没有报名的人";
			}
			?>
            </table>
        <p><input type="submit" name="save" value="通过" onClick="return sure();"/>&nbsp;&nbsp;<input type="submit" name="save" value="拒绝" onClick="refuse();"/></p>
		</form>
        </div> 
       </div> 
       </div> 
       
<script type = "text/javascript" language = "javascript">  
	function sure(){   
		return confirm("确定要提交吗？");
	}
	
	function refuse(){
			if(confirm("确认提交？")){
			document.applyform.action="refuseApply.php";
			document.applyform.submit();
			}
		}
</script>


       
		 <?php
	  	if($page!=1){
	  ?>
      <a href="manageApply.php?page=1" >首页</a>
      <?php
	  }
	  	pagebar($page_count,$page,$num_pages);
		
	  	if($page!=$page_count){
		?>
        <a href="manageApply.php?page=<?php echo $page_count;?>">末页</a>
        <?php
		}
		?>
 </center>
 </body>
</html>

