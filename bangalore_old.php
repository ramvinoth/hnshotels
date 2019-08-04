<!DOCTYPE HTML>
<?php
session_start();
include('config.inc.php');
?>
<html>
	<head>
		<title>HeyPubz</title>
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
				<a href="#bottomsheet" class="ui-btn ui-btn-right wow fadeIn" data-wow-delay='1.2s'><i class="zmdi zmdi-more-vert"></i></a>
				<a href="#leftpanel" class="ui-btn ui-btn-left wow fadeIn" data-wow-delay='0.8s'><i class="zmdi zmdi-menu"></i></a>
				
				<h1 class="wow fadeIn" data-wow-delay='0.4s'><span style="color: #000;">Hey</span> <span style="color: #D8A039;">Pubz</span></h1>
			</div>

			<div role="main" class="ui-content" data-inset="false">
				<div data-role="content">
	
					<div id="branding">
					</div>
					
					<div class="choice_list"> 
					<form id="reserve-form" class="reserve-form contact-form" method="post" action="functions.php">
                                    <div class="note"></div>
                                    <div class="input-wrap date">
                                        <input type="text" value="" tabindex="1" placeholder="Pick a date *" name="date" id="datepicker" required="">
                                        <span class="datepick"><span>
                                    </div>
                                    <div class="input-wrap people">
                                        <select class="small-input white-bg" name="people" id="people" required="" style="width: 100%;">
                                            <option value="-1" disabled selected>No. of People</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="4">5</option>
                                            <option value="4">6</option>
                                            <option value="4">7</option>
                                            <option value="4">8</option>
                                            <option value="4">9</option>
                                            <option value="4">10</option>
                                            <option value="4">11</option>
                                            <option value="4">12</option>
                                            <option value="4">13</option>
                                            <option value="4">14</option>
                                            <option value="4">15</option>
                                        </select>
                                    </div>
                                    <div class="input-wrap fullname">
                                        <input type="text" value="" tabindex="3" placeholder="Fullname *" name="name" id="name" required="">
                                    </div>
                                    <div class="input-wrap telephone">
                                        <input type="text" value="" tabindex="5" placeholder="Telephone *" name="mobile" id="mobile" required="">
                                    </div>
                                    <div class="input-wrap store">
                                        <select class="small-input white-bg" name="store" id="store" required="" style="width: 100%;">
										<option value="-1" disabled selected>Choose Store</option>
										<option value="WALLACE GARDEN">WALLACE GARDEN</option>
										<option value="CHAMIERS">CHAMIERS ROAD</option>
										<option value="ECR">EAST COAST ROAD</option>
										<option value="SHASTRI NAGAR">SHASTRI NAGAR</option>
										</select>
                                    </div>
                                    <div class="input-wrap fullname" id="timeSelect" style="display:none;">
                                    </div>
                                    <div class="send-wrap" style="text-align:center;margin-top:20px;">
                                        <input type="submit" value="Reserve" id="submit" name="reserve" class="submit">
                                    </div>
                                </form><!-- /.reserve-form -->
					
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
		
		
	</body>
	
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="vendor/waves/waves.min.js"></script>
		<script src="vendor/wow/wow.min.js"></script>
		<script src="js/nativedroid2.js"></script>
		<script src="nd2settings.js"></script>
</html>
