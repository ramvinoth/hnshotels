<?php
ob_start();
session_start(); //start session
include_once("config.inc.php"); //include config file
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
############# add products to session #########################
if(isset($_POST["cart_count"]))
{
	if(isset($_SESSION["products"]))
		$total_items = count($_SESSION["products"]);
	else
		$total_items = 0;
	die(json_encode(array('items'=>$total_items)));
}
if(isset($_POST["quantity"]) && isset($_POST["product_code"]))
{
	$product_code   = filter_var($_POST["product_code"], FILTER_SANITIZE_STRING); //product code
	$product_qty    = filter_var($_POST["quantity"], FILTER_SANITIZE_NUMBER_INT); //product quantity
	if(isset($_POST["store_no"]))
		$store_no    = filter_var($_POST["store_no"], FILTER_SANITIZE_NUMBER_INT); //store_no
	else	
		$store_no    = filter_var($_SESSION['store_no'], FILTER_SANITIZE_NUMBER_INT); //store_no
	$product 		= array();
	$found 			= false;
	$upsub 			= 0;
	$addon 			= "-";
	$setInch		= 0;
	if(isset($_POST["setInch"]))
		$setInch			= $_POST["setInch"];
	if(isset($_POST["addon"]))
		$addon			= $_POST["addon"];
	if(isset($_POST["sno"]))
		$sno			= $_POST["sno"];
	else
		$sno			= -1;
	
	//fetch item from Database using product code
	if($setInch == "1"){
		$statement = $mysqli_conn->prepare("SELECT p_name, twelve, p_image FROM products_list_".$store_no." WHERE p_id=? LIMIT 1");
	}else{
		$statement = $mysqli_conn->prepare("SELECT p_name, p_price, p_image FROM products_list_".$store_no." WHERE p_id=? LIMIT 1");
	}
	$statement->bind_param('s', $product_code);
	$statement->execute();
	$statement->bind_result($product_name, $product_price, $product_image);
	
	while($statement->fetch()){

		$new_product = array( array('sno'=> count($_SESSION["products"]), 'name'=> $product_name, 'price'=> ($product_price), 'upsub'=> $upsub, 'img'=> $product_image, 'code'=> $product_code, 'qty'=> $product_qty, 'addon'=> $addon)); //prepare new product
		if(isset($_SESSION["products"]))
        {
            foreach ($_SESSION["products"] as $cart_itm)  //loop though items
            {
				if($cart_itm["sno"] == $product_code){ //if item found in the list, update with new Quantity
					$product[] = array('sno'=>$cart_itm["sno"], 'name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'img'=> $cart_itm["img"], 'qty'=>$product_qty, 'price'=> $cart_itm["price"], 'upsub'=> $cart_itm["upsub"], 'addon'=> $cart_itm["addon"]);
                    $found = false;
                }else{
                   	//else continue with other items
				    $product[] = array('sno'=>$cart_itm["sno"], 'name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'img'=> $cart_itm["img"], 'qty'=>$cart_itm["qty"], 'price'=> $cart_itm["price"], 'upsub'=> $cart_itm["upsub"], 'addon'=> $cart_itm["addon"]);
                }
            }
            if(!$found){ //we did not find item, merge new product to list
                $_SESSION["products"] = array_merge($product, $new_product);
	         }else{
				$_SESSION["products"] = $product; //create new product list
            }
            
        }else{ //if there's no session variable, create new
            $_SESSION["products"] = $new_product;
			die(json_encode(array('items'=>1)));
        }
	}
	$total_items = count($_SESSION["products"]); //count items in variable
	die(json_encode(array('items'=>$total_items))); //exit script outputing json data
}

################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{
	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
		$cart_box = '<div class="cart-counter">
                        <h5><span><span>'.count($_SESSION["products"]).'</span> Items</span> In Cart</h5>
                     </div>';
		$total = 0;
		foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
			$cart_box .=  '<li><h5>' . $product["name"]. ' (Qty : ' . $product["qty"]. ') &mdash; ' . $currency. sprintf("%01.2f", ($product["price"] * $product["qty"])). ' <a href="#" class="remove-item" data-code="'.$product["sno"].'">&times;</a></h5></li>';
			
			$subtotal = ($product["price"] * $product["qty"]);
			$total = ($total + $subtotal);
		}
		
		$cart_box .= '<div class="cart-products-total"><h5>Total : '.$currency.sprintf("%01.2f",$total).' </h5><div style="width:50px;height:20px;background:#eee;border-radius:10px;margin:0 auto;color:#000;padding-top: 4px;"><a href="view_cart.php" data-ajax="false" style="color:#D8A039;font-weight: 900;" >Pay</a></div></div>';
		die($cart_box); //exit and output content
	}else{
		die("Your Cart is empty"); //we have empty cart
	}
}
################## list products in cart page ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==2)
{
	$products = array();
	//echo "<script>console.log('hi');</script>";
	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
		$cart_box = '';$string='';
		$total = 0;
		$json="";
		//unset($_SESSION["products"]);
		if(isset($_SESSION["products"])){
		foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
			//$pcode=$product["code"];
			if(isset($_POST["qty"]) && isset($_POST["sno"])){
				if($_POST["sno"] == $product["sno"]){
					$product["qty"] = $_POST["qty"];	
				}
				$products[] = array('sno'=>$product["sno"], 'name'=>$product["name"], 'code'=>$product["code"], 'qty'=>$product["qty"], 'price'=>$product["price"], 'img'=>$product["img"], 'addon'=>$product["addon"], 'upsub'=>$product["upsub"]);
				$_SESSION["products"] = $products;
			}
				$json= $product['addon'];
				$string=json_decode($json);
				//$comments = $string['comments'];
				//echo "<script>console.log('hi : $comments');</script>";
				//preg_replace('/[.,]/', '', $string);
				//$string =strtr($json, array('.' => '', ',' => ''));
				$string =str_replace(',', '<br>' , $json);
				$string =str_replace(array('[',']','"'), '' , $string);
			
				$cart_box .=  '<tr>
								<td class="item-thumb">
									<figure><img src="../images/food/'.$product["img"].'" alt="HNS" style="height:100px;"></figure></td> <td class="item-desc">' . $product["name"];
				if($product["upsub"] != 0)					
					$cart_box .=  '<span style="color:#00FF26"><i class="fa fa-check-circle">UP SUB</i></span>';
									
				$cart_box .=  '</td><td>'.print_r($string,true).'</td><td><strong>'.$product["price"].'</strong></td><td><input type="text" class="cart-item-count" id="cart-item-count_'.$product["sno"].'" onblur="cal(\''.$product["sno"].'\');" value="'.$product["qty"].'"></td><td><strong>' . $currency. sprintf("%01.2f", ($product["price"] * $product["qty"])). '</strong></td>';
				$cart_box .= '<td class="remove-item"><a href="javascript:;" class="remove-items" data-code="'.$product["sno"].'"><i class="fa fa-times-circle"></i></a></td></tr>';
				$subtotal = ($product["price"] * $product["qty"]);
				$total = ($total + $subtotal);
		}
		$subtotal = $total;
		$cart_box .= '<script>$("#subtotal span strong").html("'.$currency.sprintf("%01.2f",$subtotal).'");
								$("#total span strong").html("'.$currency.sprintf("%01.2f",$total).'"); </script>';
		//$cart_box .= '<div class="cart-products-total">Total : '.$currency.sprintf("%01.2f",$total).' <br/><br/></div>';
		die($cart_box); //exit and output content
	}else{
		die("Your Cart is empty"); //we have empty cart
	}
	}else{
		die("Your Cart is empty"); //we have empty cart
	}
}
################## Submit to Database ###################
if(isset($_POST["submit_cart"]))
{
	echo "<script>console.log('hi');</script>";
	if(isset($_POST["name"])){
		echo "<script>console.log('hi77');</script>";
		if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
			$cart_box = '';
			$total = 0;
			$sno= 0;
			$sql= 'SELECT sno FROM `transaction`';
			mysqli_query($mysqli_conn, $sql);
			$results = mysqli_query($mysqli_conn, $sql);
			while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
			{
				$sno= $row['sno'];
			}
			$sno=$sno+1;
			$json =serialize($_SESSION['products']);
			//echo "<script>confirm('hi :".$json."');</script>";
			$name = $_POST['name'];
			$mobile = $_POST['mobile'];
			if($_POST['type']){
				$type = $_POST['type'];
			}else{
				$type= "_";
			}
			if(isset($_POST['address'])){
				$address = $_POST['address'];
			}else{
				$address = "-";
			}
			$order_id="HNS000".$sno;
			if(!isset($_SESSION['allIds'])){
				$_SESSION['allIds'] = "";
			}
			$_SESSION['allIds'] = $order_id.','.$_SESSION['allIds'];
			echo "<script>console.log('hi :$address');</script>";
			$store_id= $_SESSION['store_no'];
			
			$discount = 0;
			$payment = "HeyPay";
			$status = "Order";
			foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
				$subtotal = ($product["price"] * $product["qty"]);
				$total = ($total + $subtotal);
				$discount = 15;
				$dis = $discount;
				$discount = $total*($discount/100);
				$total = $total - $discount;
			}
			if($store_id == "1"){
				$total = $total * (1 + 17.80 / 100.0);
				$total = $total + 1;
			}else if($store_id == "2"){
				$total = $total * (1 + 9.8 / 100.0);
			}else if($store_id == "8"){
				$total = $total * (1 + 5.8 / 100.0);
				$total = $total + 20;
			}else if($store_id == "5"){
				$total = $total * (1 + 24.5 / 100.0);
			}else if($store_id == "6"){
				$total = $total * (1 + 24.5 / 100.0);
			}else if($store_id == "7"){
				$total = $total * (1 + 24.5 / 100.0);
			}else if($store_id == "9"){
				$total = $total * (1 + 24.5 / 100.0);
			}else if($store_id == "4"){
				$total = $total * (1 + 24.5 / 100.0);
			}else if($store_id == "3"){
				$total = $total * (1 + 2 / 100.0);
			}
			if(isset($_SESSION['total'])){
				$total = $_SESSION['total'];
			}else{
				$total = $total;
			}
			$items = $_SESSION["items"];
			if(isset($_POST['time'])){
				$takeawayTime = $_POST['time'];
			}else{
				$takeawayTime = '-';
			}
			//echo "items : ".$items;
			$sql= "INSERT INTO transaction(name, order_id, store_id, json, items, type, takeawayTime, mobile, address, amount, payment, status) VALUES ('$name','$order_id','$store_id','$json','$items','$type','$takeawayTime','$mobile','$address','$total','$payment','$status')";
			mysqli_query($mysqli_conn, $sql) or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
			mysqli_close($mysqli_conn);
			unset($_SESSION["products"]);
			echo "<script>if(confirm('Your Order is placed successfully') === true){window.location.assign('index.php?store=1')}</script>"; //we have empty cart
			//header("Location: bill.php?order_id=$order_id");
		}else{
			echo "<script>if(confirm('Your Cart is Empty') === true){window.location.assign('index.php?store=1')}</script>"; //we have empty cart
			//header("Location: index.php");
		}
	}
	else{
		echo "<script>alert('Please Login to Place Order');</script>"; //we have empty cart
		//header("Location: index.php");
	}
}

################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
    $product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove
    $product = array();
	foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
    {
		if($cart_itm["sno"]!= $product_code){ //item does,t exist in the list
            $product[] = array('sno'=>$cart_itm["sno"], 'name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"], 'img'=>$cart_itm["img"], 'addon'=>$cart_itm["addon"], 'upsub'=>$cart_itm["upsub"]);
        }
		$_SESSION["products"] = $product;
    }

 	$total_items = count($_SESSION["products"]);
	die(json_encode(array('items'=>$total_items)));
}


if(isset($_POST["addon"]))
{
	$name=$_SESSION['name'];
	$pcode=$_POST["pcode"];
	$addons = $_POST["addon"];
	$sql= "INSERT INTO addon(name, pcode, addons) VALUES ('$name','$pcode','$addons')";
	mysqli_query($mysqli_conn, $sql);
	mysqli_close($mysqli_conn);
}
ob_end_flush();
?>