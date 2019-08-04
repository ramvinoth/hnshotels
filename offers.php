<!DOCTYPE HTML>
<?php
ob_start();
@session_start();
//unset($_SESSION['allIds']);
include('config.inc.php');
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
		<link rel="stylesheet" href="css/custom.css?v=1.5" />
	
		<meta name="mobile-web-app-capable" content="yes">
	 	<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		
	</head>
	<body>
		<div class="se-pre-con"></div>
		<div data-role="page">

			<nd2-include data-src="examples/fragments/panel.left.html"></nd2-include>

			<div data-role="panel" id="bottomsheet" data-animate="false" data-position='bottom' data-display="overlay">
				<nd2-include data-src="examples/fragments/bottom.sheet.html"></nd2-include>
			</div>

			<div data-role="header" data-position="fixed" class="wow fadeInDown" data-wow-delay="0.2s">
				<a href="#bottomsheet" class="ui-btn ui-btn-right wow fadeIn" data-wow-delay='1.2s'><i class="zmdi zmdi-more-vert"></i></a>
				<a href="#leftpanel" class="ui-btn ui-btn-left wow fadeIn" data-wow-delay='0.8s'><i class="zmdi zmdi-menu"></i></a>
				
				<h1 class="wow fadeIn" data-wow-delay='0.4s'>Restaurant</h1>
			</div>

			<div role="main" class="ui-content" data-inset="false">
				<div data-role="content">
	
					<div id="branding" style="text-align:center">
						<h1>Avail 50% Offer* </h1>
					</div>
					
					<div class="choice_list">  
						<form method="POST" action="functions.php">
							<label for="inputEmail">Email:</label>
							<input type="email" name="offerEmail" id="offerEmail" value="" data-clear-btn="true" placeholder="Email ID">
							<input type="button" name="sendEmail" id="sendEmail" value="Submit">
						</form>
					</div>
					<div style="text-align:center">
						<h3 id="showMsg"></h3>
					</div>
				</div>
			</div>

		</div>
		<?php
		echo '
		<script type="text/javascript">
		$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");
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
