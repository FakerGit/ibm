<?php
	require_once('Connections/weblib.php');
	
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
				$sql="select count(*) as amount from users" ;
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
				$sql="select* from users  order by uid desc limit $this->page,$this->CurrentNum";
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
     		echo " <a href='user_manage.php?CurrentPageID=".$i."'>[$i]</a>";
		 } else{
            echo " <a href='user_manage.php?CurrentPageID=".$i."'>$i</a>";
			}  
	}
}
}
	
	//删除用户信息
	function delete_user($uid){
		$sql="delete from users where uid=$uid";
		if(mysql_query($sql)or die(mysql_error()))
		{	
			echo 1;
		}else{
			echo 2;
		}
	}
	
	//增加用户信息
	function add_user($user){
		$sql="insert into users values('','$user[0]','$user[1]','$user[2]','$user[3]')";
		if(mysql_query($sql)or die(mysql_error()))
		{
			echo 1;
		}else{
			echo 2;
		}
	}
	
	//修改用户信息
	function update_user($user){
		$sql="update users set username='$user[1]', password = '$user[2]', sex = '$user[3]', email='$user[4]' where uid = $user[0]";
		if(mysql_query($sql)or die(mysql_error())){
			echo "1";
		}else
			echo "0";
	}
	
	function select($uid){
		$sql="select *from users where uid= $uid";
		$result=mysql_query($sql)or die(mysql_error());	
		$row=mysql_fetch_array($result);
		return $row;
	}
	
	function save($user){
		$sql="update users set sex='$user[0]',email='$user[1]',password='$user[2]' where uid=$user[3]";
		if(mysql_query($sql)or die(mysql_error()))
		{
			echo 1;
		}else{
			echo 0;
		}
	}


	