<?php
session_start();
include('config.inc.php');
if(isset($_GET['str_no'])){
	$_SESSION['store_no'] = $_GET['str_no'];
}else{
	$_SESSION['store_no'] = "1";
}
?>
<!DOCTYPE html> 
<html> 
<head> 
	 <meta charset="UTF-8">
	<title>HNS</title> 
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
		
</head> 
<body> 
<div id="choisir_ville" data-role="page" class="nd2-no-menu-swipe">
	
	<div data-role="header" data-position="fixed" class="wow fadeIn"> 
		<div id="cartDiv">
			<?php
				$count = 0;
				if(isset($_SESSION["products"])){
					$count = count($_SESSION["products"]); 
				}
				echo '<a href="#" class="cart-box" id="cart-info" title="View Cart">'.$count.'</a><div class="shopping-cart-box" style="display:none" ><a href="#" class="close-shopping-cart-box" >Close</a><h3>Your Shopping Cart</h3><div class="shopping-cart-results"></div></div>';
			?>
		</div>
		<h1 class="wow fadeIn" data-wow-delay='0.4s'><span style="color: #000;">Zaica</span> <span style="color: #D8A039;">Chennai</span></h1>
		<ul data-role="nd2tabs" data-swipe="true" style="margin:0px auto">
			<li data-tab="drinks" data-tab-active="true" style="width:40%">Meal in a box</li>
			<li data-tab="food" style="width:40%">A la carte</li>
		</ul>
	</div> 
	
	<div data-role="content">
        <div class="choice_list"> 
            <div data-role="nd2tab" data-tab="drinks">
                <ul id="categories" data-role="listview" data-inset="true" data-filter="true" class="fw300"  >
                    <li><a href="#veg" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-transition="pop"> <h5>Veg box</h5><i class="fa fa-inr fr">199</i> </a> </li>
                    <li><a href="#nonveg" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-transition="pop"> <h5>Non-Veg box</h5><i class="fa fa-inr fr">240</i> </a> </li>
                </ul>
            </div>
            
            <div data-role="nd2tab" data-tab="food">
                <ul id="categories" data-role="listview" data-inset="true" data-filter="true" class="fw300"  >
                    <li><a href="choose_drinks.php?category=Pane Breads" data-transition="slidedown"><h5> Pane Breads</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Antipasto" data-transition="slidedown"><h5> Antipasto</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Zuppa" data-transition="slidedown"><h5> Zuppa</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Insalata" data-transition="slidedown"><h5> Insalata</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Pizza vegetariana" data-transition="slidedown"><h5> Pizza Vegetariana</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Pizza Classica" data-transition="slidedown"><h5> Pizza Classica</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Pasta e Second Piatti" data-transition="slidedown"><h5> Pasta e Second Piatti</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Pasta e Second Piatti Classica" data-transition="slidedown"><h5> Pasta e Second Piatti Classica</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Dolce" data-transition="slidedown"><h5> Dolce</h5></a> </li>
                    <li><a href="choose_drinks.php?category=Beverages" data-transition="slidedown"><h5> Beverages</h5></a> </li>
                </ul>
            </div>
        </div>
	</div>
    <!-- POPUP VEG START-->
    <div data-role="popup" id="veg">
        <div data-role="header">
            <h1 class="nd-title">Veg Box</h1>
        </div>
        <div class="item-box" data-role="content">
            <input class="qty" type="range" name="qty" id="slider2b" value="1" min="1" max="5" data-highlight="true" readonly>
            <hr>	
            <fieldset data-role="controlgroup">
                <label for="textarea2b">Comments:</label>
                <textarea cols="40" rows="8" name="comments" id="comments" placeholder="Comments"></textarea>
            </fieldset>
            <hr>
            <label>Description:</label>
                <p>Description</p>
            <hr>
            <input class="p-code" type="hidden" value="v01">
            <button onclick='jQuery("body").trigger( "click" );' href="dialog/index.html" data-role="toast" data-toast-message="Your Drink Added to Cart" data-ajax='false' data-icon="false" data-rel="back" data-inline="true" class="ui-btn ui-btn-primary"><i class='zmdi zmdi-check'></i>&nbsp;Add To cart</button>
            <a id="cancel" href="dialog/index.html" data-rel="back" data-role="button" data-inline="true" class="ui-btn ui-btn-primary"><i class='zmdi zmdi-cancel'></i> Cancel</a>
        </div>
    </div>
    <!-- /POPUP VEG END-->
    <!-- POPUP NON-VEG START-->
    <div data-role="popup" id="nonveg">
        <div data-role="header">
            <h1 class="nd-title">Non Veg Box</h1>
        </div>
        <div class="item-box" data-role="content">
            <input class="qty" type="range" name="qty" id="slider2b" value="1" min="1" max="5" data-highlight="true" readonly>
            <hr>	
            <fieldset data-role="controlgroup">
                <label for="textarea2b">Comments:</label>
                <textarea cols="40" rows="8" name="comments" id="comments" placeholder="Comments"></textarea>
            </fieldset>
            <hr>
            <label>Description:</label>
                <p>Description</p>
            <hr>
            <input class="p-code" type="hidden" value="nv01">
            <button onclick='$("body").trigger( "click" );' href="dialog/index.html" data-role="toast" data-toast-message="Your Drink Added to Cart" data-ajax='false' data-icon="false" data-rel="back" data-inline="true" class="ui-btn ui-btn-primary"><i class='zmdi zmdi-check'></i>&nbsp;Add To cart</button>
            <a id="cancel" href="dialog/index.html" data-rel="back" data-role="button" data-inline="true" class="ui-btn ui-btn-primary"><i class='zmdi zmdi-cancel'></i> Cancel</a>
        </div>
    </div>
    <!-- /POPUP NON-VEG END-->
    <div id="popup" class="popup">
	</div>
</div><!-- /page -->
<?php

 echo '
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script><script type="text/javascript">
	(function() {
		console.log("Callled");
		$(".shopping-cart-results").load("cart_process.php", {"load_cart":"1"}); 
		//Add Item to Cart
	$(".item-box button").click(function(e){ //user click "add to cart" button
		e.preventDefault(); 
		var button_content = $(this); //this triggered button
		var iqty = $(this).parent().find("input.qty").val(); //get quantity 
		var icode = $(this).parent().children("input.p-code").val(); //get product code
		//var s1=document.getElementById("addon_"+icode+"-button").getElementsByTagName("span");
		//addon = s1[0].innerHTML;
		addon = "";
		console.log("content : "+iqty+"  "+icode);
		
		//button_content.html("Adding..."); //Loading button text 
		//button_content.attr("disabled","disabled"); //disable button before Ajax request
		$.ajax({ //make ajax request to cart_process.php
			url: "cart_process.php",
			type: "POST",
			dataType:"json", //expect json value from server
			data: { quantity: iqty, product_code: icode, addon_name:addon}
		}).done(function(data){ //on Ajax success
			console.log("call");
		 	$("#cart-info").html(data.items); //total items in cart-info element
			if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
				$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				
			}
		})
	});
	
	//Show Items in Cart
	$(".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn();
		$(".shopping-cart-results").html("<img src=\'images/ajax-loader.gif\'>");
		$(".shopping-cart-results").load("cart_process.php", {"load_cart":"1"}); 
	});
	
	//Close Cart
	$(".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});
	
	//Remove items from cart
	$(".shopping-cart-results").on("click", "a.remove-item", function(e) {
		e.preventDefault(); 
		console.log("call");
		var pcode = $(this).attr("data-code"); //get product code
		$(this).parent().fadeOut(); //remove item element from box
		$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
			$("#cart-info").html(data.items); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		});
	});
	})();
	</script>';
	
?>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="vendor/waves/waves.min.js"></script>
		<script src="vendor/wow/wow.min.js"></script>
		<script src="js/nativedroid2.js"></script>
		<script src="nd2settings.js"></script>
		<script src="functions.js"></script>
		<script type="text/javascript">

$(document).ready(function(){		
			

});
</script>
</html>