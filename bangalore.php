<!DOCTYPE HTML>
<?php
ob_start();
session_start();
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
		<link rel="stylesheet" href="css/custom.css?v=1.1" />
	
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
				<!--<a href="#bottomsheet" class="ui-btn ui-btn-right wow fadeIn" data-wow-delay='1.2s'><i class="zmdi zmdi-more-vert"></i></a>-->
				<a href="#leftpanel" class="ui-btn ui-btn-left wow fadeIn" data-wow-delay='0.8s'><i class="zmdi zmdi-menu"></i></a>
				
				<h1 class="wow fadeIn" data-wow-delay='0.4s'>Pick a Restaurant</h1>
			</div>

			<div role="main" class="ui-content" data-inset="false">
				<div data-role="content">
	
					<div id="branding">
					</div>
					
					<div class="choice_list"> 
					
					<ul id="list_bars" data-role="listview" data-inset="true" data-filter="true" >
						<li><a href="choose_category.php?str_no=5" data-transition="slidedown"> <img src="beer_bottle.png"/> <h5>Zaica - Brookefield</h5></a></li>
						<li><a href="choose_category.php?str_no=6" data-transition="slidedown"> <img src="beer_bottle.png"/> <h5>Zaica - Indira Nagar</h5></a></li>
						<li><a href="choose_category.php?str_no=7" data-transition="slidedown"> <img src="beer_bottle.png"/> <h5>Zaica - Nagawara</h5></a></li>
						<!--<li><a href="choose_category.php?str_no=2" data-transition="slidedown"> <img src="beer_bottle2.png?v=1.1"/> <h5>Pathankot - Manyata</h5></a></li>
						<li><a href="choose_category.php?str_no=8" data-transition="slidedown"> <img src="beer_bottle2.png?v=1.1"/> <h5>Pathankot - Ecospace</h5></a></li>-->
                        <li><a href="choose_category.php?str_no=9" data-transition="slidedown"> <img src="beer_bottle3.png?v=1.0"/> <h5>Chef's Gallery - Ecospace</h5></a></li>
                        <li><a href="choose_category.php?str_no=4" data-transition="slidedown"> <img src="beer_bottle3.png?v=1.0"/> <h5>Chef's Gallery - EGL</h5></a></li>
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