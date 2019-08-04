<!DOCTYPE HTML>
<?php
ob_start();
session_start();
//unset($_SESSION['allIds']);
include('config.inc.php');
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
	
					<div id="branding">
					</div>
					
					<div class="choice_list"> 
					
					<ul id="list_orders" data-role="listview" data-inset="true" data-filter="true" >
						<!--<li><a href="choose_category.php?str_no=1" data-transition="slidedown"> <img src="images/orders.png?v=1.2"/> <h5>Zaica - Cathedral Road</h5></a></li> -->
						<?php 
							$list = '';
							if(isset($_SESSION['allIds'])){
								$mix = explode(",",$_SESSION['allIds']);
								foreach ($mix as $value) {
									if(strlen($value) > 5 ){
										$list .= '<li><img src="images/orders.png?v=1.1" /> <h5>'.$value.'</h5></a></li>';
									}
								}
							}else{
								$list .= '<li><h5>You have No Previous Orders.</h5></a></li>';
							}
							echo $list;
						?>
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
							$("#list_bars").html(data.bars);
						},
					async:false
					});
			});
		</script>';
		?>
		
	<?php ob_end_flush(); ?>
	</body>
	
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="vendor/waves/waves.min.js"></script>
		<script src="vendor/wow/wow.min.js"></script>
		<script src="js/nativedroid2.js"></script>
		<script src="nd2settings.js"></script>
</html>
