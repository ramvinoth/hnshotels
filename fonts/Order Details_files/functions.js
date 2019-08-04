				if(window.location.pathname == "/heypubz/material/index.html" ){
					$.ajax({
						type: 'post',
						url: 'functions.php',
						dataType:'json',
						data: {
							bars: 1,
						},
						success: function( data ) {
							console.log("bars : "+data.bars);
							$("#list_bars").html(data.bars);
						},
					async:false
					});
				}
				else if(window.location.pathname == "/heypubz/material/choose_drinks.php" ){
					
				}
$(document).ready(function(){	
				//Update Cart counter
				
				
				//Add Item to Cart
				$("div .add-to-cart-link").click(function(e){ //user click "add to cart" button
					e.preventDefault(); 
					var button_content = $(this); //this triggered button
					//var iqty = $(this).parent().children("select.p-qty").val(); //get quantity 
					var icode = $(this).parent().children("input.p-code").val(); //get product code
					var iqty = 1;
					button_content.html('Adding...'); //Loading button text 
					//button_content.attr('disabled','disabled'); //disable button before Ajax request
					$.ajax({ //make ajax request to cart_process.php
						url: "cart_process.php",
						type: "POST",
						dataType:"json", //expect json value from server
						data: { quantity: iqty, product_code: icode}
					}).done(function(data){ //on Ajax success
						$("#cart-count").html(data.items); //total items in cart-info element
						button_content.html('Add to Cart'); //reset button text to original text
						alert("Item added to Cart!"); //alert user
						if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
							$(".cart-link").trigger( "click" ); //trigger click to update the cart box.
						}
					});
				});
				
				//Show Items in Cart
				$( ".cart-link").click(function(e) { //when user clicks on cart box
					e.preventDefault(); 
					$(".shopping-cart-box").fadeIn(); //display cart box
					$("#shopping-cart-results").html('<img src="img/loading1.gif">'); //show loading image
					$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
				});
				
				//Close Cart
				$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
					e.preventDefault(); 
					$(".shopping-cart-box").fadeOut(); //close cart-box
				});
				
				//Remove items from cart
				$("#shopping-cart-results").on('click', 'a.remove-items', function(e) {
					e.preventDefault(); 
					var pcode = $(this).attr("data-code"); //get product code
					$(this).parent().fadeOut(); //remove item element from box
					$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
						$("#cart-count").html(data.items); //update Item count in cart-info
						$(".cart-link").trigger( "click" ); //trigger click on cart-box to update the items list
					});
				});
			});
			//Addon Submit
			function addonSubmit(p_id,store_no,dc,sal) {
				var iqty = 1,upsub=0,addon= '-';
				
				if(dc != 'dc')
				{
					$('#upsub :checkbox').each(function () {
						$this = $(this);
						$.data($this, $this.attr('value'), $this.is(':checked'));
						$.each($.data($this), function(key, value) {
							 if(value==true){
								//console.log('key= '+key);
								if(key == "{UPSUB :Double Meat}")
									upsub = upsub + 60;
								if(key == "{UPSUB :Premium Veggie}")
									upsub = upsub + 40;
								if(key == "{UPSUB :Egg}")
									upsub = upsub + 20;
								if(key == "{UPSUB :Cheese}")
									upsub = upsub + 10;
							}
						});
					});
					$('#addon_default :checkbox').each(function () {
						$this = $(this);
						$.data(document.body, $this.attr('value'), $this.is(':checked'));
						//console.log('Name= ');
					});
					var jsAddon= [];
					bread = $('input[name=bread]:checked').val();
					jsAddon.push(bread.toString());
					cheese = $('input[name=cheese]:checked').val();
					jsAddon.push(cheese.toString());
					salt = $('input[name=salt]:checked').val();
					jsAddon.push(salt.toString());
					toasted = $('input[name=toasted]:checked').val();
					jsAddon.push(toasted.toString());
					$.each($.data(document.body), function(key, value) {
						 if(value==true){
							jsAddon.push(key.toString());
						}
					});
					comments = $("#comments").val();
					jsAddon.push({comments:comments.toString()});
						//console.log('Name= '+ key + ' Value= ' + value);
						console.log("array : "+jsAddon);
						var jsonAddon = JSON.stringify(jsAddon);
						var icode = p_id;
						$.ajax({ //make ajax request to cart_process.php
							url: "cart_process.php",
							type: "POST",
							dataType:"json", //expect json value from server
							data: {pcode: icode, addon: jsonAddon, comments}
						}).done(function(data){
						});
				}
				else{
					console.log("entered");
					var jsAddon= [];
					jsAddon.push("-");
					comments = '-';
						var icode = p_id;
						$.ajax({ //make ajax request to cart_process.php
							url: "cart_process.php",
							type: "POST",
							dataType:"json", //expect json value from server
							data: {pcode: icode, addon: jsonAddon}
						}).done(function(data){
							console.log("done");
						});
				}
					$.ajax({ //make ajax request to cart_process.php
						url: "cart_process.php",
						type: "POST",
						dataType:"json", //expect json value from server
						data: { quantity: iqty, product_code: p_id, store_no: store_no, upsub: upsub, addon :jsonAddon}
					}).done(function(data){ //on Ajax success
						$("#cart-count").html(data.items); //total items in cart-info element
						alert("Item added to Cart!"); //alert user
						if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
							$(".cart-container").trigger( "click" ); //trigger click to update the cart box.
						}
					});
			}
// Load or Populate the Modal with data
function modals(p_id)
{
	console.log("p_id  error :"+p_id);
	$.ajax({
		type: 'post',
		url: 'modals.php',
		dataType: "json",
		data: {
			p_id: p_id, getinfo:1,
		},
		success: function( data ) {
			$("#modals").html(data.disp);
		}
	});
}				
function addonModal(p_id)
{
	var address = $("#address").val();
 	if(address != "")
	{
		$.ajax({
			type: 'post',
			url: 'modals.php',
			data: {
				p_id: p_id, next : 1, address:address,
			},
			success: function( data ) {
				$("#addonModal").html(data);
			}
		});
	}
	else
		alert("Please fill all required fields");
}
function dismiss()
{
	var address = $("#address").val();
 	if(address != "")
	{
		$("#nextBtn").trigger( "click" );
	}
}	
function verify()
{
	var pincode = $("#pincode").val();
	var s1=document.getElementById("tstore");
    var tstore=s1.options[s1.selectedIndex].value;
	
	var name=document.getElementById("tstore").value;
 	if(pincode != "" && tstore == "-1")
	{
		$.ajax({
			type: 'post',
			url: 'functions.php',
			dataType:"json",
			data: {
				pincode: pincode,name: name
			},
			success: function( data ) {
				if(data.flag == "1"){
					$("#nextBtnAddon").trigger( "click" );
					console.log(data.store);
					loadStore(data.store);
				}
				else{
					$("#tick").hide();
					$("#wrong").show();
					alert("This Pincode is not supported");
				}
			}
		});
	}
 	else if(tstore != "-1" && pincode == "")
	{
		$.ajax({
			type: 'post',
			url: 'functions.php',
			dataType:"json",
			data: {
				tstore: tstore,
			},
			success: function( data ) {
					$("#nextBtnAddon").trigger( "click" );
					console.log(tstore);
					loadStore(tstore);
			}
		});
	}
	else{
		alert("Please Enter Valid Pincode");
	}
}	
function check(store_no)
{
	var pincode = $("#pincode").val();
 	if(pincode != "")
	{
		$.ajax({
			type: 'post',
			url: 'functions.php',
			dataType:"json",
			data: {
				pincode: pincode,
			},
			success: function( data ) {
				console.log(data.flag);
				if(data.flag == "1"){
					$("#wrong").hide();
					$("#tick").show();
				}
				else{
					$("#tick").hide();
					$("#wrong").show();
				}
					
			}
		});
	}
	else{
		alert("Please Enter Valid Pincode");
	}
}		
function loadStore(store_no)
{
	console.log("Store no : "+store_no);
 	if(store_no != "")
	{
		console.log("CALLING AJAX");
		$.ajax({
			type: 'post',
			url: 'functions.php',
			data: {
				store_no: store_no,
			},
			success: function( data ) {
					console.log(data);
					$("#store_items").html(data);
				}
		});
	}
	else{
		alert("Please Enter Valid Pincode");
	}
}	