<?php require_once('mysql.func.php')?>
<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title>IBM大型主机科普网站 | 公众</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <script src="../js/jquery-1.11.2.min.js">
  </script>
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
		//$uid=$_REQUEST[uid]; or = session['uid'];
		$uid=$_SESSION["userid"];
		$row=select($uid);
	?>
    <div class="m-form">
    <form name="userForm" id="userForm" action="doAdminAction.php" method="post">
        <fieldset>
        	<input type="hidden" value="<?php echo $uid ;?>" name="uid"id="uid">
            <div class="formitm">
                <label class="lab">用户名：</label>
                <div class="ipt">
                    <?php echo $row['username'];?>
                </div>
            </div>
            <div class="formitm">
                <label class="lab">邮箱：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt" name="email" id="email" value="<?php echo $row['email']; ?>"/>
                </div>
            </div>
            <div class="formitm">
                <label class="lab">密码：</label>
                <div class="ipt">
                    <input type="text" class="u-ipt" name="pwd" id="pwd" value="<?php echo $row['password']?>"/><br/>
                </div>
            </div>
            <div class="formitm">
       
                <div class="ipt">
                	 <label class="lab">性别：</label>
                    <?php 
	     				 $sex1=$row['sex'];
		 				 if($sex1=="male"){
		  					$sex_t1="男";
							$sex_t2="女";
							$sex2="female";
						}else{
							$sex_t1="女";
							$sex_t2="男";
							$sex2="male";
							}
				  ?>
    				<select name="sex"> <option value="<?php echo $sex1;?>"><?php echo $sex_t1;?></option><option value="<?php echo $sex2;?>"><?php echo $sex_t2;?></option>
                </div>
            </div>
          	<br/>
            <div>
            <input type="submit"   value="保存" />
            </div>
        </fieldset>
        </form>
</div>
      </div> 
    </div> 
</div>

<script type="text/javascript">
    $("#userForm").submit(
		function (){
			save();
			return false;
		}
	);
	
  	function save(){
		if(confirm("确认保存？")){
			var uid=$("#uid").val();
			var pwd=$("#pwd").val();
			var sex=document.getElementById("sex").value;
			var email=$("#email").val();
			var action="save";
			$.ajax({
				type:"POST",
				url:"doAdminAction.php?",
				data:'act='+action+'&uid='+uid+'&pwd='+pwd+'&sex='+sex+'&email='+email,beforeSend: function(){},
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
</script>
</body></html>