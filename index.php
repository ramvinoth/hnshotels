<!DOCTYPE HTML>
<?php
ob_start();
@session_start();
include('config.inc.php');
/*if(!isset($_SESSION['showOffer'])){
		$_SESSION['showOffer'] = "1";
		@header("Location: offers.php");
}else{
	$_SESSION['showOffer'] = "1";
}*/
ob_end_flush();
?>
<html>
	<head>
		<title>HNS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css" />
		<link rel="stylesheet" href="vendor/waves/waves.min.css" />
		<link rel="stylesheet" href="vendor/wow/animate.css" />
		<link rel="stylesheet" href="css/nativedroid2.css" />
		<link rel="stylesheet" href="css/custom.css?v=1.2" />
	
		<meta name="mobile-web-app-capable" content="yes">
	 	<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		
	
	</head>
	<body>
		<div class="se-pre-con"></div>
		<div data-role="page">

			<nd2-include data-src="examples/fragments/panel.left.html"></nd2-include> 

			<div data-role="panel" id="bottomsheet" data-animate="false" data-position='bottom' data-display="overlay">
				<!--<nd2-include data-src="examples/fragments/bottom.sheet.html"></nd2-include>-->
			</div>

			<div data-role="header" data-position="fixed" class="wow fadeInDown" data-wow-delay="0.2s">
				<!--<a href="#bottomsheet" class="ui-btn ui-btn-right wow fadeIn" data-wow-delay='1.2s'><i class="zmdi zmdi-more-vert"></i></a>-->
				<a href="#leftpanel" class="ui-btn ui-btn-left wow fadeIn" data-wow-delay='0.8s'><i class="zmdi zmdi-menu"></i></a>
				
				<h1 class="wow fadeIn" data-wow-delay='0.4s'>Choose Location</h1>
			</div>

			<div role="main" class="ui-content" data-inset="false">
				<div data-role="content">
					<div id="branding">
					</div>
					
					<div class="choice_list"> 
					
					<ul id= "list_bars" data-role="listview" data-inset="true" data-filter="true" >
						<li><a href="chennai.php" data-transition="slidedown"> <img src="location.png"/> <h5>Chennai</h5></a></li>
						<li><a href="bangalore.php" data-transition="slidedown"> <img src="location.png"/> <h5>Bengaluru</h5></a></li>
						<!--<li><a href="offers.php" data-transition="slidedown" data-ajax="false"> <img src="location.png"/> <h5>Offers</h5></a></li>-->
					</ul>	
					
					</div>
				</div>
			</div>

		</div>
		<?php
		echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript">
		$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");;
		});
		length = 0;
		newlength = 0;
		(function() {
			$.ajax({
						type: "post",
						url: "functions.php",
						dataType:"json",
						data: {
							bars: 1,
						},
						success: function( data ) {
							//console.log("bars : "+data.bars);
							length = data["bars"].length;
							$("#list_bars").html(data.bars);
						},
					async:false
					});
			});
			jQuery("#sendEmail").on("click",function(){
				console.log("clicked");
				var email = jQuery("#offerEmail").val();
				if(email != ""){
					$.ajax({
						type: "post",
						url: "functions.php",
						dataType:"json",
						data: {
							sendEmail: 1,offerEmail :email
						},
						success: function( data ) {
							//console.log("bars : "+data.bars);
							$("#showMsg").html(data.msg);
							window.location.assign("index.php");
						}
					});
				}else{
					alert("Invalid Email");
				}
			});	
		</script>';
		?>
		
		
	</body>
	
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="vendor/waves/waves.min.js"></script>
		<script src="vendor/wow/wow.min.js"></script>
		<script src="js/nativedroid2.js"></script>
		<script src="nd2settings.js"></script>
</html>