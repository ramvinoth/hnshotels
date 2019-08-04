<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HNS Bill</title>
        <meta name="description" content="Food And Restaurant HTML Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <meta name="theme-color" content="#23292c"> <!-- Android 5.0 Tab Color -->
        <link rel="shortcut icon" href="favicon.ico">
		<style>
			table,td,tr,th{
				border:1px solid black;
				padding:2px;
				text-align:center;
			}
			table{
				width:auto;
				margin:0px auto;
			}
			header{
				text-align:center;
				margin:3%;
			}
			img{
			}
			body{
				color: #000000;
			}
		</style>
    </head>
    <body>
	<header>
		<img src="img/logo/logo.jpg" alt="logo">
	</header>
        <table>
            <thead>
                <tr>
                    <th class="item-thumb">Item</th>
                    <th>Product Code</th>
                    <th>Addons</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>         
				<?php
				ob_start();
				session_start(); //start session
				include_once("config.inc.php");
				################## list products in cart page ###################
					if(isset($_GET['order_id']))
					{
						$order_id = $_GET['order_id'];
						//$emp_name = $_GET['emp_name'];
						//$emp_no = $_GET['emp_no'];
						$sql= "select * from transaction where order_id='$order_id'";
							$results = mysqli_query($mysqli_conn, $sql);
							while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
							{
								$json= $row['json'];
								$name= $row['name'];
								$mobile= $row['mobile'];
								$order_id= $row['order_id'];
								$date= $row['date'];
								$address= $row['address'];
								$type= $row['type'];
								$store= $row['store'];
								$takeawayTime= $row['takeawayTime'];
							}
							$json = unserialize($json);
							$_SESSION['products'] = $json;
					}else{
						header("Location: index.php");
					}
					if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
						$cart_box = '';
						$total = 0;
						
						foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
						$pcode=$product["code"];
						if(isset($_POST["qty"])){
							$product["qty"] = $_POST["qty"];
						}
						$sql= "select addons from addon where pcode='$pcode'";
						$results = mysqli_query($mysqli_conn, $sql);
						while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
						{
							$json= $row['addons'];
						}
						if($json != "")
							$string=json_decode($json);
						else
							$string="";
						//$comments = $string['comments'];
						//echo "<script>console.log('hi : $comments');</script>";
						//preg_replace('/[.,]/', '', $string);
						//$string =strtr($json, array('.' => '', ',' => ''));
						$string =str_replace(',', '<br>' , $json);
						$string =str_replace(array('[',']','"'), '' , $string);
							$cart_box .=  '<tr>
											<td class="item-desc">' . $product["name"]. '</td><td>'.$product["code"].'</td><td>'.print_r($string,true).'</td><td><strong>'.$product["price"].'</strong></td><td>'.$product["qty"].'</td><td><strong>' . $currency. sprintf("%01.2f", ($product["price"] * $product["qty"])). '</strong></td>';
							$cart_box .= '</tr>';
							$subtotal = ($product["price"] * $product["qty"]);
							$total = ($total + $subtotal);
						}
						$cart_box .= '<tr><td></td><td></td><td></td><td></td><td>Total</td><td>'.$currency.sprintf("%01.2f",$total).'</td></tr>';
						//$cart_box .= '<div class="cart-products-total">Total : '.$currency.sprintf("%01.2f",$total).' <br/><br/></div>';
						echo $cart_box; //exit and output content
					}else{
						die("Your Cart is empty"); //we have empty cart
					}
				mysqli_close($mysqli_conn);
				ob_end_flush();
				?>
            </tbody>
        </table>
		<div id="emp_details" style="text-align:center; padding-top:5px;">
			<?php 
				//echo "Employee Name :<p style='color:#000;margin:2px; display: inline;'><u>".$emp_name."</u></p><br> Employee No: <p style='color:#000;margin:2px;display: inline;'><u>".$emp_no."</u></p>";
			?>
		</div>
        <table style="width:43%;margin-top:1%">
			<tbody>
				<thead>
				<tr>
					<th>Date&Time</th>
					<th>Name</th>
					<th>Mobile</th>
					<?php
					if($type == "Delivery"){
						$th = '<th>Address</th>';
					}else{
						$th = '<th>Store and Time</th>';
					}
					echo $th;
					?>
					<th>Order ID</th>
					<th>Order Type</th>
					<th>Payment Type</th>
				</tr>
				</thead>
				<tr>
				<?php
					$table  = "	<td>".$date."</td>;
								<td>".$name."</td>
								<td>".$mobile."</td>";
					if($type == "Delivery"){	
						$table .=  "	<td>".$address."</td>";
					}else{
						$table .=  "	<td>".$store." - ".$takeawayTime."</td>";
					}
					$table .=  "	<td>".$order_id."</td>
								<td>".$type."</td>";
					echo $table;
				?>
					<td>COD</td>
				</tr>
				
			</tbody>
		</table>
		
    </body>
</html>
