<?php require_once('mysql.func.php')?>

<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title>IBM大型主机科普网站 | 公众</title>
    </head>
    <body>
    <?php
		$uid=$_SESSION['userid'];
		$row=select($uid);
	?>
    <div class="m-form">
    <form name="userForm" id="userForm" action="updateuser.php" method="post">
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
                    </select>
                </div>
            </div>
          	<br/>
            <div>
            <input type="submit" value="保存" />
            </div>
        </fieldset>
        </form>
        </div>
        </body>
</html>