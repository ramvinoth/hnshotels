<?php
ob_start();
session_start();
include('config.inc.php');
if(isset($_GET['str_no'])){
	$_SESSION['store_no'] = $_GET['str_no'];
}else{
	$_SESSION['store_no'] = "1";
}
ob_end_flush();
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
		<link rel="stylesheet" href="css/custom.css?v=1.7" />
	
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
				echo '	<a href="#" class="cart-box" id="cart-info" title="View Cart">
						</a>
						<div class="shopping-cart-box" style="display:none" >
							<a href="#" class="close-shopping-cart-box" >Close</a>
							<h3>Your Food Cart</h3>
							<div class="shopping-cart-results">
							</div>
						</div>';
			?>
			
		</div>	
		<h1 class="wow fadeIn" data-wow-delay='0.4s'><span style="color: #D8A039;">H<span style="font-size:23px">N</span>S GROUP</span></h1>
	</div> 

	<div data-role="content">
        <div class="choice_list"> 
	
	<ul id="drinks" data-role="listview" data-inset="true" data-filter="true" >
    <?php
		if(isset($_SESSION['store_no'])){
            $str_no = $_SESSION['store_no'];
            $list = '';
			$sql= "SELECT * from products_list_".$str_no." ORDER BY sno";
			$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
			while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
			{
				$p_id = $row['p_id'];
				//$p_id = $row['p_desc'];
				$list .= '<li><a href="#'.$row['p_id'].'" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-transition="pop"> 
									<h5>'.$row['p_name'].'</h5><i class="fa fa-inr fr">'.$row['p_price'].'</i>
									<div style="font-size:8px;">exclusive of Taxes*</div>
								</a>
							</li>';
            }
            echo $list;
        }
                 
    ?>
    </ul>
    <?php
        $popz = '';
        $sql= "SELECT * from products_list_".$str_no;
		$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
		while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
		{
			$desc = "<ol style='height:90px;overflow:auto;'>";
			$arr = explode(".", $row['p_desc']);
			foreach ($arr as $value) {						 
				$desc .= '<li>'.$value.'</li>';
			}
			$desc .= "</ol>";
            $popz .= '<div id="popup" class="popup">
                        </div>
                        <!-- POPUP VEG START-->
                        <div data-role="popup" id="'.$row['p_id'].'">
                            <div data-role="header">
                                <h1 class="nd-title">Customize</h1>
                            </div>
                            <div class="item-box" data-role="content">
                                <div style="padding: 5px 10px; position:relative; width:88%;">
									<label style="font-size: 16px;font-weight: bold;">Qty: </label> <input class="qty" type="range" name="qty" id="qty" value="1" min="1" max="10">
                                </div>
								<hr>	
                                <fieldset data-role="controlgroup" style="padding: 5px 10px;">
									<label for="radio1_'.$row['p_id'].'">Regular</label>
                                    <input type="radio" value="Regular" name="radio1_'.$row['p_id'].'" id="radio1_'.$row['p_id'].'" />
									<label for="radio2_'.$row['p_id'].'">Extra Spicy</label>
                                    <input type="radio" value="Extra Spicy" name="radio1_'.$row['p_id'].'" id="radio2_'.$row['p_id'].'" />
                                </fieldset>
                                <hr>
                                <label style="font-size: 16px;font-weight: bold;">Contents:</label>
                                    '.$desc.'
                                <hr>
                                <input class="p-code" type="hidden" value="'.$row['p_id'].'">
                                <button onclick=\'jQuery("body").trigger( "click" );\' href="dialog/index.html" data-role="toast" data-toast-message="Added to Cart" data-ajax="false" data-icon="false" data-rel="back" data-inline="true" class="ui-btn ui-btn-primary"><i class="zmdi zmdi-check"></i>&nbsp;Add To cart</button>
                                <a id="cancel" href="dialog/index.html" data-rel="back" data-role="button" data-inline="true" class="ui-btn ui-btn-primary"><i class="zmdi zmdi-cancel"></i>Continue</a>
                            </div>
                        </div>
                        <!-- /POPUP VEG END-->';
        }
        echo $popz;
    ?>
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
		//e.preventDefault(); 
		var button_content = $(this); //this triggered button
		var iqty = $(this).parent().find("input.qty").val(); //get quantity 
		var icode = $(this).parent().children("input.p-code").val(); //get product code
		//var s1=document.getElementById("addon_"+icode+"-button").getElementsByTagName("span");
		//addon = s1[0].innerHTML;
		$("input[name=name_of_your_radiobutton]:checked").val();
		addon = $("input[name=radio1_"+icode+"]:checked").val();
		console.log("content : "+iqty+"  "+icode+ "  \naddon: "+addon);
		
		//button_content.html("Adding..."); //Loading button text 
		//button_content.attr("disabled","disabled"); //disable button before Ajax request
		$.ajax({ //make ajax request to cart_process.php
			url: "cart_process.php",
			type: "POST",
			dataType:"json", //expect json value from server
			data: { quantity: iqty, product_code: icode, addon:addon}
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
		$(".shopping-cart-results").html("<div style=\"text-align:center;\"><img src=\'images/ajax-loader.gif?v=3\'></div>");
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