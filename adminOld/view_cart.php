<?php
session_start(); //start session
ob_start();
include("../config.inc.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Order Details</title>
<link href="../style/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<h3 style="text-align:center; font-size:35px;">Order Details</h3>
<?php

	$trans_id=$_GET['trans_id'];
	
	$results=$mysqli_conn->query("SELECT * from transaction where trans_id='$trans_id'");
	while($row = $results->fetch_assoc()) {
		$cart_box= $row["trans"];
		$user_id=$row['user_id'];
		echo $cart_box;
	}
	if(isset($_POST['on-process'])){
		$status="on-process";
		$query = "UPDATE transaction set status='$status' where trans_id='$trans_id'";
		mysqli_query($mysqli_conn, $query);
		/*
		$results1=$mysqli_conn->query("SELECT * from login where user_id='$user_id'");
		while($row1 = $results1->fetch_assoc()) {
			$email= $row1['username'];
		}
		$email="followsuryz@gmail.com";
		mysqli_close($mysqli_conn);
		$sname = "HeyFooD";
		$mail_from = "admin@heyfood.viyaus.in";
		$mail_to = $email;
		$mail_body = "Your HeyFood order(".$trans_id.") is being processed. ";
		$mail_subject = "HeyFood- On Process";
		$mail_header = "From: ".$sname." <".$mail_from.">\r\n";
		
		$sendmail = mail($mail_to, $mail_subject, $mail_body, $mail_header);
		*/
		header("Location: index.php");
	}
	if(isset($_POST['ready'])){
		$status="ready";
		$query = "UPDATE transaction set status='$status' where trans_id='$trans_id'";
		mysqli_query($mysqli_conn, $query);
		/*
		$results1=$mysqli_conn->query("SELECT * from login where user_id='$user_id'");
		while($row1 = $results1->fetch_assoc()) {
			$email= $row1['username'];
		}
		$email="followsuryz@gmail.com";
		mysqli_close($mysqli_conn);
		$sname = "HeyFooD";
		$mail_from = "admin@heyfood.viyaus.in";
		$mail_to = $email;
		$mail_body = "Your HeyFood order(".$trans_id.") is Ready, Please come and collect it. ";
		$mail_subject = "HeyFood- Ready";
		$mail_header = "From: ".$sname." <".$mail_from.">\r\n";
		
		$sendmail = mail($mail_to, $mail_subject, $mail_body, $mail_header);
		*/
		header("Location: index.php");

	}
	if(isset($_POST['delivered'])){
		$status="delivered";
		$query = "UPDATE transaction set status='$status' where trans_id='$trans_id'";
		mysqli_query($mysqli_conn, $query);
		/*
		$results1=$mysqli_conn->query("SELECT * from login where user_id='$user_id'");
		while($row1 = $results1->fetch_assoc()) {
			$email= $row1['username'];
		}
		$email="followsuryz@gmail.com";
		mysqli_close($mysqli_conn);
		$sname = "HeyFooD";
		$mail_from = "admin@heyfood.viyaus.in";
		$mail_to = $email;
		$mail_body = "Your HeyFood order(".$trans_id.") is Delivered. Thank you ";
		$mail_subject = "HeyFood- Delivered";
		$mail_header = "From: ".$sname." <".$mail_from.">\r\n";
		
		$sendmail = mail($mail_to, $mail_subject, $mail_body, $mail_header);
		*/
		header("Location: index.php");
	}
ob_end_flush();	
?>
<form method="post">
<div class="button-holder" >
	<button class="button" type="submit" name="on-process" >On Process</button>
	<button class="button" type="submit" name="ready" >Ready</button>
	<button class="button" type="submit" name="delivered" >Delivered</button>
</div>
</form>
</body>
</html>