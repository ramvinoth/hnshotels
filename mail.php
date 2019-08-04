<?php
function sendmail($email,$rand){
	$sname = "HNS HOTELS OFFERS";
	//$mail_from = "offers@viya.biz";
	//$mail_to = $email;
	$mail_body = "Offer Code : ".$rand;
	//$mail_subject = "Offer code";
	//$mail_header = "From: ".$sname." <".$mail_from.">\r\n";
	
	$mail_from = 'offers@viya.biz';
	$mail_to = $email;
	$mail_subject = 'Offer code.';
	
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "From: ".$sname." <".$mail_from.">\r\n";
	
	$sendmail = mail($mail_to, $mail_subject, $mail_body, $header);
	if($sendmail == true)
	{
		$msg = '<script type="text/javascript">
			  window.onload = function () { alert("Mail Sent"); }
	</script>';
	}
	else
	{
		$msg =  "0";
	}
	return $msg;
}

?>