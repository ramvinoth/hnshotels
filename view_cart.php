<?php
ob_start();
session_start(); //start session
$grand_total =0;
include("config.inc.php");
if(isset($_POST['pay'])){
		if(isset($_POST['table_no']) && $_POST['table_no'] != 0){
			$table_no = $_POST['table_no'];
			$type = "Delivery";
		}else{
			$table_no = 0;
			$type = "Takeaway";
		}
		echo '<script>confirm("Are you sure?");</script>';
		$trans_id="HP".$user_id;
		$status="order";
		$counter=1;
		//$sql= "INSERT INTO transaction(name, order_id, store_id, json, type, mobile, address, amount, payment, status) VALUES ('$name','$order_id','$store_id','$json','$type','$mobile','$address','$total','$payment','$status')";
		$sql= "INSERT INTO transaction(user_id, trans, status, counter, table_no, type, items) VALUES ('$user_id','$cart_box','$status','$counter','$table_no','$type','$items')";
		mysqli_query($mysqli_conn, $sql);
		$query = "UPDATE transaction set trans_id=concat('$trans_id',sno)";
		mysqli_query($mysqli_conn, $query);
		mysqli_close($mysqli_conn);
		unset($_SESSION['products']);
		$grand_total = 0;
		header("Location: index.php");
	}
ob_end_flush();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Order Details</title>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css" />
		<link rel="stylesheet" href="vendor/waves/waves.min.css" />
		<link rel="stylesheet" href="vendor/wow/animate.css" />
		<link rel="stylesheet" href="css/nativedroid2.css" />
		<link rel="stylesheet" href="css/custom.css" />
	
		<meta name="mobile-web-app-capable" content="yes">
	 	<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
<div class="se-pre-con"></div>
<div id="view_cart">
	<div data-role="header" style="margin-bottom:10px;text-align:center">
		<h1 style="text-align:center">Confirm your Order</h1>
	</div> 
<div class="items_container">
<?php
$items = '';
if(isset($_SESSION['products']) && count($_SESSION['products'])>0){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '';
	$_SESSION['items'] ="";
	foreach($_SESSION['products'] as $product){ //Print each item, quantity and price.
		$item_price 	= sprintf("%01.2f",($product["price"] * $product["qty"]));  // price x qty = total item price
		$_SESSION['items'] .= $product["name"].' - '.$product['qty'].' ('.$product['addon'].') ,';
		$details 		= json_decode($product['addon'], true);
		$items .= $product["name"].' - '.$product['qty'].' ('.$product['addon'].') ,';
		$cart_box 		.=  '<div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right">';
		$cart_box 		.=  '<h5 style="border-radius:10px">'.$product["name"].'&mdash; <i>'.$product['qty'].'</i><i class="fa fa-inr fr">'.$item_price.'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">';
		if(isset($details[1])){					
		$cart_box .=		'	<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">'.$details[0].'<i class="fa fa-inr fr">'.$product['price'].'</i></h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">'.$details[1].'</h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">'.$details[2].'</h6></a> </li>
							</ul></div>';
		}else{
			$cart_box .=		'	<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">'.$details[0].'<i class="fa fa-inr fr">'.$product['price'].'</i></h6></a> </li>
							</ul></div>';
		}
		$subtotal 		= ($product["price"] * $product["qty"]); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
		$discount = 15;
		$dis = $discount;
		$discount = $total*($discount/100);
		$total = $total - $discount;
		
	}
		if($_SESSION['store_no'] == "1"){
		$total 			= $total * (1 + 17.80 / 100.0);
		$total 			= $total + 1; 
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total &mdash; <i>'.$product['qty'].'</i> (10% Offer) <i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Discount &mdash;  <i class=" fr">10%</i></h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">VAT &mdash;  <i class=" fr">2%</i></h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Service Tax &mdash;  <i class=" fr">5.8%</i></h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Delivery and Packing Charges &mdash;  <i class=" fr">10.00%</i></h6></a> </li>
							</ul></div>';
		}
		if($_SESSION['store_no'] == "2"){
		$total 			= $total * (1 + 9.8 / 100.0);
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total &mdash; <i>'.$product['qty'].'</i><i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">VAT &mdash;  <i class=" fr">4%</i></h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Service Tax &mdash;  <i class=" fr">5.8%</i></h6></a> </li>
								
							</ul></div>';
		}
		if($_SESSION['store_no'] == "8"){
		$total 			= $total * (1 + 5.8 / 100.0); 
		$total 			= $total + 20; 
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total  &mdash; <i>'.$product['qty'].'</i><i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Service Tax &mdash;  <i class=" fr">5.8%</i></h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Packaging Charges &mdash;  <i class=" fr">20</i></h6></a> </li>
							</ul></div>';
		}
		if($_SESSION['store_no'] == "5"){
		$total 			= $total * (1 + 24.5 / 100.0);
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total &mdash; <i>'.$product['qty'].'</i><i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">VAT &mdash;  <i class=" fr">14.5%</i></h6></a> </li>
								
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Packaging Charge &mdash;  <i class=" fr">10%</i></h6></a> </li>
							</ul></div>';
		}
		if($_SESSION['store_no'] == "6"){
		$total 			= $total * (1 + 24.5 / 100.0);
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total  &mdash; <i>'.$product['qty'].'</i><i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">VAT &mdash;  <i class=" fr">14.5%</i></h6></a> </li>
								
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Packaging Charge &mdash;  <i class=" fr">10%</i></h6></a> </li>
							</ul></div>';
		}
		if($_SESSION['store_no'] == "7"){
		$total 			= $total * (1 + 24.5 / 100.0);
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total &mdash; <i>'.$product['qty'].'</i><i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">VAT &mdash;  <i class=" fr">14.5%</i></h6></a> </li>
							
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Packaging Charge &mdash;  <i class=" fr">10%</i></h6></a> </li>
							</ul></div>';
		}
		if($_SESSION['store_no'] == "9"){
		$total 			= $total * (1 + 24.5 / 100.0);
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total  &mdash; <i>'.$product['qty'].'</i><i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">VAT &mdash;  <i class=" fr">14.5%</i></h6></a> </li>
								
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Packaging Charge &mdash;  <i class=" fr">10%</i></h6></a> </li>
							</ul></div>';
		}
		if($_SESSION['store_no'] == "4"){
		$total 			= $total * (1 + 24.5 / 100.0);
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total &mdash; <i>'.$product['qty'].'</i><i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">VAT &mdash;  <i class=" fr">14.5%</i></h6></a> </li>
								
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Packaging Charge &mdash;  <i class=" fr">10%</i></h6></a> </li>
							</ul></div>';
		}
		if($_SESSION['store_no'] == "3"){
		$total 			= $total * (1 + 2 / 100.0);
			$cart_box 	.= '<hr><div data-role="collapsible" data-inset="false"  data-collapsed-icon="carat-d" data-expanded-icon="carat-d" data-iconpos="right" style="margin-top:5%">
							<h5 style="border-radius:10px">Total (With 2% Tax) &mdash; <i>'.$product['qty'].'</i><i id="total" class="fa fa-inr fr">'.sprintf("%01.2f", $total).'</i></h5>
							<ul data-role="listview" data-inset="false" data-icon="false">
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Total (With 2% Tax) &mdash;  <i class=" fr">'.sprintf("%01.2f", $total).'</i></h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Total (With 2% Tax) &mdash;  <i class=" fr">'.sprintf("%01.2f", $total).'</i></h6></a> </li>
								<li><a href="javascript:;" data-ajax="false" data-icon="false"> <h6 style="font-weight:300;">Total (With 2% Tax) &mdash;  <i class=" fr">'.sprintf("%01.2f", $total).'</i></h6></a> </li>
							</ul></div>';
		}
	$grand_total = $total; //grand total
	/*
	foreach($taxes as $key => $value){ //list and calculate all taxes in array
			$tax_amount 	= round($total * ($value / 100));
			$tax_item[$key] = $tax_amount;
			$grand_total 	= $grand_total + $tax_amount; 
	}
	
	foreach($tax_item as $key => $value){ //taxes List
		$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br /><br/>';
	}
	*/
	if(isset($_SESSION['user_id']))
		$user_id=$_SESSION['user_id'];
	else	
		$user_id=111;

	
	//Print Shipping, VAT and Total
	$cart_box .= '';
	//Update DB
	
	echo $cart_box;
}else{
	echo "Your Cart is empty";
}
ob_end_flush();
?>
</div>
<div class="footer_container">
<form id="payment" method="post" style="position:relative;">
	
	<!-- 
			<div class="footer_total fw500" >Total(With 2% tax)&nbsp;&nbsp;&mdash;<i class="fa fa-inr fr" style="padding-right:10px;"> <?php echo sprintf("%01.2f", $grand_total);?></i></div>
		-->
	<!--<section class="row">
		<div style="display:inline;float:left;margin-left:30%; ">
			<input type="text" name="coupon" id="coupon" value="" data-clear-btn="true" placeholder="Coupon code" style="background-color:#FBF9CF">
			<input type="button" name="applyOffer" id="applyOffer" value="Apply" style="float:left;margin-right:10%;">
			<i id="tick" class="fa fa-check" style="color:green;display:none;margin:5%;"></i><i id="wrong" class="fa fa-times" style="color:red;display:none;margin:5%;"></i>
			
		</div>
	</section> -->
	<section class="row footer" style="width:100%; bottom:11%; display:block;">
		<p style="font-size:10px;">*Delivery is done within 3km radius</p>
		<p style="font-size:10px;">*Currently only Cash On Delivery is Available</p>
		<a href="#login" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-transition="pop" style="width:100%;border:1px #eee solid;border-radius:10px;">Place Order</a>
		<!--<button id="pay" class="footer fw500" type="submit" name="pay" disabled="true" >Choose Delivery or TakeAway</button> -->
	</section>
	<div data-role="popup" id="login" style="min-width:280px;">
		<div data-role="header">
				<h1 class="nd-title">Login</h1>
		</div>
		<div class="item-box" data-role="content">
			<form method="POST" id="details">
				<select name="type" id="type" data-native-menu="false">
					<?php if($_SESSION['store_no'] != "2" && $_SESSION['store_no'] != "8"){echo '<option value="delivery">Delivery</option>';} ?>
					<option value="takeaway">Takeaway</option>
				</select><br>
				<input class="name" type="text" name="name" id="name" placeholder="Name" required=""><br>
				<input class="mobile" type="text" name="mobile" id="mobile" placeholder="Mobile" required=""><br>
				<textarea cols="40" rows="8" name="address" id="address" placeholder="Address"></textarea>
				<div id="timeSelect" style="display:none;">
				<select name="time" id="time" data-native-menu="false">
					<option value="12pm">12pm</option>
					<option value="12:30pm">12:30pm</option>
					<option value="1pm">1pm</option>
					<option value="1:30pm">1:30pm</option>
					<option value="2pm">2pm</option>
					<option value="2:30pm">2:30pm</option>
					<option value="3pm">3pm</option>
					<option value="3:30pm">3:30pm</option>
					<option value="7pm">7pm</option>
					<option value="7:30pm">7:30pm</option>
					<option value="8pm">8pm</option>
					<option value="8:30pm">8:30pm</option>
					<option value="9pm">9pm</option>
					<option value="9:30pm">9:30pm</option>
					<option value="10pm">10pm</option>
					<option value="10:30pm">10:30pm</option>
					<option value="11pm">11pm</option>
				</select>
				</div><br>
				
				<input class="p-code" type="hidden" value="123">
				<button onclick="validate()" id="pay" class="fw500" type="submit" name="pay">Place Order</button>
				<a id="cancel" name="pay" href="dialog/index.html" data-rel="back" data-role="button" data-inline="true" class="ui-btn ui-btn-primary"><i class=\'zmdi zmdi-cancel\'></i> Cancel</a>
			</form>
		</div>
	</div>
</form>
</div>
</div>
</body>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="vendor/waves/waves.min.js"></script>
		<script src="vendor/wow/wow.min.js"></script>
		<script src="js/nativedroid2.js"></script>
		<script src="nd2settings.js"></script>
		<script src="functions.js"></script>
		<script>
		$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");
		});
		$("#type").on('change', function(){
			var type = $(this).val();
			console.log("type :: "+ type);
			if(type == "takeaway"){
				$("#timeSelect").show();
				$("#address").hide();
			}else{
				$("#timeSelect").hide();
				$("#address").show();
			}
		});
			function validate(e){
				var name = document.getElementById("name").value;
				var mobile = document.getElementById("mobile").value;
				var address = document.getElementById("address").value;
				var e = document.getElementById("type");
				var type = e.options[e.selectedIndex].value;
				if(type == "takeaway"){
					var e2 = document.getElementById("time");
					address = e2.options[e2.selectedIndex].value;
				}
				if(name != "" && mobile != ""){
					$.ajax({ //make ajax request to cart_process.php
							url: "cart_process.php",
							type: "POST",
							data: {submit_cart: "1", name: name, mobile: mobile, address: address, type: type}
						}).done(function(data){
							//console.log("Done");
							window.location.assign('index.php');
						});
				}else{
					alert("Please fill all details");
				}
			}
		jQuery("#applyOffer").on("click",function(){
			console.log("clicked");
			var coupon = jQuery("#coupon").val();
			var total = jQuery("#total").html();
			if(coupon != ""){
				$.ajax({
					type: "post",
					url: "functions.php",
					dataType:"json",
					data: {
						applyOffer: 1,coupon :coupon,total: total
					},
					success: function( data ) {
						//console.log("bars : "+data.bars);
						//$("#showMsg").html(data.msg);
						//discount = jQuery('#discount').val();
						if(data.check == "1"){
							jQuery("#total").html(data.total);
							alert(data.msg);
							//$("#wrong").hide();
							//$("#tick").show();
						}else{
							alert(data.msg);
							//$("#tick").hide();
							//$("#wrong").show();
						}
					}
				});
			}else{
				alert("Invalid Coupon Code");
			}
		});	
		</script>
</html>