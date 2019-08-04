<?php
session_start();
include('config.inc.php');

?>
<!DOCTYPE html> 
<html> 
<head> 
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
	
</head> 
<body> 
<div id="choisir_restau" data-role="page" data-add-back-btn="true">
	
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
		<h1 class="wow fadeIn" data-wow-delay='0.4s'><span style="color: #000;">Hey</span> <span style="color: #D8A039;">Pubz</span></h1>
	</div> 

	<div data-role="content">
        <div class="choice_list"> 
	
	<ul id="drinks" data-role="listview" data-inset="true" data-filter="true" >
	<?php
		if(isset($_GET['category'])){
			$category = $_GET['category'];
			$drinks ="";
			if(isset($_SESSION["str_no"])){
				$str_no = $_SESSION["str_no"];
			}else{
				$str_no = 1;
			}
			$sql= "SELECT * from products_list_".$str_no." WHERE category='$category'";
			$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
			while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
			{
				$p_id = $row['p_id'];
				$pos1 = strpos($p_id, "pc");
				$pos2 = strpos($p_id, "pv");
				$pos3 = strpos($p_id, "pesp");
				$pos4 = strpos($p_id, "paca");
				$drinks .= '<li><a href="#'.$row['p_id'].'" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-transition="pop"> <h5>'.$row['p_name'];
							if($row['twelve'] !== "0"){
								$drinks .= '<i class="fa fa-inr fr">'.$row['p_price'].'/'.$row['twelve'].'</i></h5></a> </li>';
							}
							else{
								$drinks .= '<i class="fa fa-inr fr">'.$row['p_price'].'</i></h5></a> </li>';
							}
	
				$drinks .= '
							<div data-role="popup" id="'.$row['p_id'].'">

								<div data-role="header">
									<h1 class="nd-title">'.$row['p_name'].'</h1>
								</div>

								<div class="item-box" data-role="content">
									<input class="qty" type="range" name="qty" id="slider2b" value="1" min="1" max="5" data-highlight="true" readonly>
									<hr>';
				if($pos1 !== false || $pos2 !== false ){					
				$drinks .= '			<fieldset data-role="controlgroup">
										<legend>Inches</legend>
										<input type="radio" name="radio_inches_'.$row['p_id'].'" id="radio_inches1_'.$row['p_id'].'" value="9" checked="">
										<label for="radio_inches1_'.$row['p_id'].'">9"</label>
										<input type="radio" name="radio_inches_'.$row['p_id'].'" id="radio_inches2_'.$row['p_id'].'" value="12">
										<label for="radio_inches2_'.$row['p_id'].'">12"</label>
										</fieldset>
										<hr>
										<fieldset data-role="controlgroup">
										<legend>Pick your Base</legend>
										<input type="radio" name="radio_bread_'.$row['p_id'].'" id="radio_bread1_'.$row['p_id'].'" value="Classic Refined Wheat Base" checked="">
										<label for="radio_bread1_'.$row['p_id'].'">Classic Refined Wheat Base</label>
										<input type="radio" name="radio_bread_'.$row['p_id'].'" id="radio_bread2_'.$row['p_id'].'" value="Whole Wheat Base">
										<label for="radio_bread2_'.$row['p_id'].'">Whole Wheat Base</label>
										<input type="radio" name="radio_bread_'.$row['p_id'].'" id="radio_bread3_'.$row['p_id'].'" value="Multigrain Base">
										<label for="radio_bread3_'.$row['p_id'].'">Multigrain Base</label>
										<input type="radio" name="radio_bread_'.$row['p_id'].'" id="radio_bread4_'.$row['p_id'].'" value="Gluten-free Base (Millets)">
										<label for="radio_bread4_'.$row['p_id'].'">Gluten-free Base (Millets)</label>
										</fieldset><hr>
										';
										//<select name="addon_'.$row['p_id'].'" id="addon_'.$row['p_id'].'" data-native-menu="false">';
										//$mix = explode(",",$row['mix_products']);
										//foreach ($mix as $value) {						 
										//	$drinks .='<option value="'.$value.'">'.$value.'</option>';
				}
										  
				$drinks .='				
									
									<fieldset data-role="controlgroup">
									<label for="textarea2b">Comments:</label>
									<textarea cols="40" rows="8" name="comments" id="comments" placeholder="Comments"></textarea>
									</fieldset>
									<hr>
									<label>Description:</label>
									<p>'.$row['p_desc'].'</p>
									<hr>
									<input class="p-code" type="hidden" value="'.$row['p_id'].'">
									<button onclick=\'$("body").trigger( "click" );\' href="dialog/index.html" data-role="toast" data-toast-message="Your Drink Added to Cart" data-ajax=\'false\' data-icon="false" data-rel="back" data-inline="true" class="ui-btn ui-btn-primary"><i class=\'zmdi zmdi-check\'></i>&nbsp;Add To cart</button>
									<a id="cancel" href="dialog/index.html" data-rel="back" data-role="button" data-inline="true" class="ui-btn ui-btn-primary"><i class=\'zmdi zmdi-cancel\'></i> Cancel</a>

								</div>
							</div>
				';
			}
			echo $drinks;
		}
		else
			header("Location: index.html");
?>
	</ul>	
	<div id="popup" class="popup">
	</div>
	</div>
	</div>
<?php

 echo '
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script><script type="text/javascript">
	(function() {
		//console.log("Callled");
		$(".shopping-cart-results").load("cart_process.php", {"load_cart":"1"}); 
		//Add Item to Cart
	$(".item-box button").click(function(e){ //user click "add to cart" button
		e.preventDefault(); 
		var jsAddon= [];
		var setInch=0;
		var button_content = $(this); //this triggered button
		var iqty = $(this).parent().find("input.qty").val(); //get quantity 
		var icode = $(this).parent().children("input.p-code").val(); //get product code
		inch = $("input[name=radio_inches_"+icode+"]:checked").val()
					if(inch == "12"){
						console.log("12 inch");
						setInch =1;
					}
					inch = inch+" inch";
		if(inch !== "undefined inch")jsAddon.push(inch.toString());
		comments = "Comments : "+$(this).parent().find("#comments").val();
		var bread = $("input[name=radio_bread_"+icode+"]:checked").val();
		//console.log("bread : "+bread);
		if(bread !== undefined)jsAddon.push(bread.toString());
			
		jsAddon.push(comments.toString());
		var jsonAddon = JSON.stringify(jsAddon);
		//var s1=document.getElementById("addon_"+icode+"-button").getElementsByTagName("span");
		//addon = s1[0].innerHTML;
		//console.log("content : "+iqty+"  "+jsonAddon);
		$(this).parent().find("#cancel").trigger( "click" );
		//button_content.html("Adding..."); //Loading button text 
		//button_content.attr("disabled","disabled"); //disable button before Ajax request
		$.ajax({ //make ajax request to cart_process.php
			url: "cart_process.php",
			type: "POST",
			dataType:"json", //expect json value from server
			data: { quantity: iqty, product_code: icode, addon: jsonAddon, comments, setInch: setInch}
		}).done(function(data){ //on Ajax success
		 	$("#cart-info").html(data.items); //total items in cart-info element
			if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
				$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				
			}
			document.getElementById("cancel").click();
			alert("Your Iteam added to cart!!!");
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
</div><!-- /page -->
</body>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="vendor/waves/waves.min.js"></script>
		<script src="vendor/wow/wow.min.js"></script>
		<script src="js/nativedroid2.js"></script>
		<script src="nd2settings.js"></script>
		<script src="functions.js"></script>
<script type="text/javascript">

$(document).ready(function(){		

				function popUp(qty){
					var data= '<input type="text" class="cart-item-count" id="cart-item-count" value="'+qty+'">';
					jQuery("#cartDiv").html(data);
				}	
				$(".cart-item-count").on("click",function(e){e.preventDefault();});
				$(".cart-item-count").parent().removeClass().css({'display':'inline'});
	//Add Item to Cart
	//jQuery("#cartDiv").html('<a href="#" class="cart-box" id="cart-info" title="View Cart">0</a><div class="shopping-cart-box" style="display:none" ><a href="#" class="close-shopping-cart-box" >Close</a><h3>Your Shopping Cart</h3><div class="shopping-cart-results"></div></div>');
	
	function cartBox(){
		console.log("Callled");
	}
	
	
	function pay(){
		
		
	}
});
</script>
</html>