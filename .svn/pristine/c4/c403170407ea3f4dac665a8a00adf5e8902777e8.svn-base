<?php require_once('../Connections/weblib.php'); ?>

<!DOCTYPE <html>
<html>
<body>
 <?php
 	require_once('class.phpmailer.php'); //载入PHPMailer类 
 	function sendmail($from,$to,$body){
		$mail = new PHPMailer; //实例化
		$mail->IsSMTP(); //启用SMTP
		$mail->Port = 25;  //邮件发送端口 
		$mail->SMTPAuth   = true;  //启用SMTP认证  
		
		$mail->CharSet  = "UTF-8"; //字符集 
		$mail->Encoding = "base64"; //编码方式 
		
		$mail->Username = $from;  //你的邮箱 
		$mail->Password = "ibmlab";  //你的密码 
		$mail->Subject = "你好,关于参观IBM中心的回复"; //邮件标题 
	
		$mail->From = $from;  //发件人地址
		$mail->FromName = "IBM中心";  //发件人姓名  
		
		$address = $to;//收件人email 
		$mail->AddAddress($address, "您好");//添加收件人（地址，昵称） 
		
		$mail->IsHTML(true); //支持html格式内容 
		
		$mail->Body = $body; //邮件主体内容  
		//发送 
		if(!$mail->Send()) {   
		echo "Mailer Error: " . $mail->ErrorInfo;
		 } else {   
		 echo "Message sent!"; 
		 } 
	}
 ?>
      <div id="bmMain"> 
<div class="m-form">
        <fieldset>
            <legend>邮件</legend>
            <input type="text" id="textbody">
        </fieldset>

</div>
      </div> 
    </div> 
 </body>
</html>