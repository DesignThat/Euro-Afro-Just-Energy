<?php
if(isset($_POST) && !empty($_POST)){
	$full_name = (isset($_POST['full_name']))?$_POST['full_name']:'';
	$email = (isset($_POST['email']))?$_POST['email']:'';
	$subject = (isset($_POST['subject']))?$_POST['subject']:'';
	$message = (isset($_POST['message']))?$_POST['message']:'';
	$company_name = (isset($_POST['company_name']))?$_POST['company_name']:'';
	$city_name = (isset($_POST['city_name']))?$_POST['city_name']:'';
	$center_type= (isset($_POST['center_type']))?$_POST['center_type']:'';
	
	$form_type = 'contact';
	$sendMessage = $mailSubject = '';
	
	if($form_type == 'contact'){
		$mailSubject = 'Contact Details';
		$sendMessage = "<p>Hello,</p><p>".$full_name." from .$company_name. , city .$city_name. , center type , .$center_type. has sent a message having </p><p><b>Subject:</b> ".$subject."</p><p><b>Email id:</b> ".$email."</p><p><b>Query is:</b> ".$message."</p>";
	}elseif($_POST['form_type'] == 'inquiry'){
		$mailSubject = 'Inquiry Details';
		$sendMessage = '';
	}
	
	if($sendMessage != ''){
		$fromEmail = 'testing@designthat.digital';
		$toEmail = '$email';
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: <$fromEmail>" . "\r\n";

		if(mail($toEmail , $mailSubject , $sendMessage , $headers )){
		    
			echo 1;
			
		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
}else{
	echo 0;
}
die();
?>

