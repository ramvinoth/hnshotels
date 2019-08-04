<?php
ob_start();
@session_start();
include('config.inc.php');
include('mail.php');
if(isset($_POST['register'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$role="user";
		$sql= "INSERT INTO login(name, username, mobile, address, pass, role) VALUES ('$name','$email','$mobile','$address','$pass','$role')";
		mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
		mysqli_close($mysqli_conn);
		header("Location: index.html");
	}
if(isset($_GET['logout'])){
	unset($_SESSION['str_no']);
	header("Location: admin/pages/index.php");
}
if(isset($_POST['login'])){
	ob_start();
	$error=''; // Variable To Store Error Message
	
	if (empty($_POST['username']) || empty($_POST['pass'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['pass'];
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($mysqli_conn,$username);
		$password = mysqli_real_escape_string($mysqli_conn,$password);
		// SQL query to fetch information of register the users and finds user match.
		$sql= "select * from login where pass='$password' AND username='$username'";
		$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
		while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
		{
			$name= $row['name'];
			$mobile= $row['mobile'];
			$address= $row['address'];
			$role= $row['role'];
			$str_no= $row['store_no'];
		}
		$rows = mysqli_num_rows($results);
		if ($rows > 0) {
			$_SESSION['login_user']=$username; // Initializing Session
			$_SESSION['name']=$name; // Initializing Session
			$_SESSION['mobile']=$mobile; // Initializing Session
			$_SESSION['address']=$address; // Initializing Session
			$_SESSION['role']=$role; // Initializing Session
			$_SESSION['str_no']=$str_no; // Initializing Session
			if($role == "call")
				header("Location: admin/pages/call.php");
			else if($role == "admin")
				header("Location: admin/pages/admin.php");
			else if($role == "emp")
				header("Location: admin/pages/update.php");
			else if($role == "user"){
				$error = "Login Successful";
			}
			
		} else {
			$error = "Username or Password is invalid pass:";
		}
	}
	die(json_encode(array('result'=>$error))); 
	mysqli_close($mysqli_conn); // Closing Connection
	ob_end_flush();
}
if(isset($_POST['pincode'])){
		$pincode = $_POST['pincode'];
		$sql= "select * from pincode where pincode='$pincode'";
		$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
		while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
		{
			$_SESSION['pincode']= $row['pincode'];
			$_SESSION['store_no']= $row['store_no'];
		}
		$_SESSION['type']= "Delivery";
		if(isset($_POST['name'])) $_SESSION['name']= $_POST['name'];
		$rows = mysqli_num_rows($results);
		
		if ($rows > 0) {
			$flag = 1;
		} else {
			$flag = 0;
		}
		if(isset($_SESSION['store_no']))
			die(json_encode(array('flag'=>$flag, 'store'=>$_SESSION['store_no'])));
		else
			die(json_encode(array('flag'=>$flag)));
		mysqli_close($mysqli_conn);
		//header("Location: store.html");
	}
if(isset($_POST['tstore'])){
		$tstore = $_POST['tstore'];
		$_SESSION['store_no']= $tstore;
		$_SESSION['type']= "Takeaway";
		echo "1";
		//header("Location: store.html");
	}
if(isset($_POST['store_no']) && isset($_SESSION['store_no'])){
		$store_no = $_SESSION['store_no'];
		$sql= 'select * from products_list_'.$store_no;
		$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
		while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
		{
			if($row['available'] == 1)
			{
				if($row["category"] == "dc" || $row["category"] == "bvg" ){
					$ptype ='<a class="product" onclick="addonSubmit(\''.$row['p_id'].'\',\''.$store_no.'\',\'dc\')" >
								<img src="img/gallery/'.$row['p_image'].'" alt="Marine Food Store">
							</a>';
					$addCart ='<a href="#" class="add-to-cart-link" onclick="addonSubmit(\''.$row['p_id'].'\',\''.$store_no.'\',\'dc\')">Add To Cart</a>';
				}
				else{
					$ptype ='<a class="product" data-toggle="modal" data-target="#myModal" >
								<img src="img/gallery/'.$row['p_image'].'" alt="Marine Food Store">
							</a>';
					$addCart ='<a href="#" class="add-to-cart-link" data-toggle="modal" data-target="#myModal">Add To Cart</a>';
				}
				echo '<div class="col-md-4 col-sm-6 col-xs-12 mix '.$row['category'].'">
						<div class="store-item wow fadeInDown" onclick="modals(\''.$row['p_id'].'\');">
							<figure>'.$ptype.'
							</figure>
							<h3 class="food-name"><a href="#">'.$row['p_name'].'</a></h3>
							<ul class="food-category">
								<li>Green,Fresh</li>
							</ul>
							<div class="food-order">
								<p class="food-price">Rs.'.$row['p_price'].'</p>
								'.$addCart.'
							</div><!-- /food-order -->
						</div><!-- /store-item -->
					</div><!-- /col-md-4 -->';
			}
		}
		mysqli_close($mysqli_conn);
		//header("Location: store.html");
	}
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql= "select * from login where username='$id'";
	$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
	while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{
		$name= $row['name'];
		$mobile= $row['mobile'];
		$address= $row['address'];
	}
	$rows = mysqli_num_rows($results);
	if ($rows > 0) {
		$_SESSION['id']=$id; // Initializing Session
		$_SESSION['name']=$name; // Initializing Session
		$_SESSION['mobile']=$mobile; // Initializing Session
		$_SESSION['address']=$address; // Initializing Session
		//echo $_SESSION['id']."\n".$_SESSION['name']."\n".$_SESSION['mobile']."\n".$_SESSION['address'];
		header("Location: store.html");
	} else {
		$error = "Username or Password is invalid pass:";
	}
}
if(isset($_POST['bars'])){
	$bars = '';
	$sql= "select * from pubs";
	$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
	while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{
		$bars .= '<li><a href="choose_category.php" data-transition="slidedown"> <img src="beer_bottle.png"/> <h5> '.$row['name'].'</h5></a></li>';
	}
	die(json_encode(array('bars'=>$bars)));
}
if(isset($_POST['category'])){
	$store_no = $_POST['category'];
	$category ="";
	$sql= "SELECT DISTINCT category from products_list_34440";
	$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
	while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{
		$category .= '<li><a href="javascript:;" onclick="loadDrinks(\''.$row['category'].'\')"  data-transition="slidedown"> '.$row['category'].'</a> </li>';
	}
	die(json_encode(array('category'=>$category)));
}
if(isset($_POST['setCategory'])){
	$_SESSION['category'] = $_POST['setCategory'];
	die(json_encode(array('drinks'=>$_SESSION['category'])));
}
if(isset($_POST['drinks'])){
	$category = $_SESSION['category'];
	$drinks ="";
	$sql= "SELECT * from products_list_34440 WHERE category='$category'";
	$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
	while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{
		$drinks .= '<li><a href="choose_restaurant.php"  data-transition="slidedown"> '.$row['p_name'].'</a> </li>';
	}
	die(json_encode(array('drinks'=>$drinks)));
}
if(isset($_POST['update'])){
	$orders = '';
	$results = $mysqli_conn->query("SELECT * FROM transaction WHERE store_id='".$_SESSION['str_no']."' ORDER BY sno DESC;");
	while($row = $results->fetch_assoc()) {
		if($row['status'] == "Order"){
		$items = "";$count=0;
		$mix = explode(",", $row['items']);
		foreach ($mix as $value) {						 
			$items .=$value.'<br/>';
			$count++;
		}
		$orders .= '<div class="col-lg-12">';
		if($row['status'] == 'Order') $orders .= '		<div class="panel panel-red">';
		else if($row['status'] == 'On-Process') $orders .= '		<div class="panel panel-yellow">';
		else if($row['status'] == 'Ready') $orders .= '		<div class="panel panel-green">';
		else if($row['status'] == 'Delivered') $orders .= '		<div class="panel panel-primary">';
		$orders .= '<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12" style= "font-size:20px;font-weight:800; min-height:80px;max-height:80px; overflow:auto;">
								<u>'.$row['order_id'].'</u><span> (Total items : '.($count-1).')</span><br/>'.$items.'
							</div>
						</div>
					</div>
					<div class="panel-footer" style="background-color:#D6D6D6">
						<table width="100%"><tbody>
						<tr>
							<td>
								<span style="padding-left:10px;">
									<span class="cardDetails">Name : <span>'.$row['name'].'
								</span>
							</td>
							<td>
								<span style="padding-left:10px;">
									<span class="cardDetails">Mobile : </span> '.$row['mobile'].'
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<span style="padding-left:10px;">
									<span class="cardDetails">Address : </span>'.$row['address'].'
								</span>
							</td>
							<td>
								<span style="padding-left:10px;">
									<span class="cardDetails">Total : </span>'.$row['amount'].'
								</span>
							</td>
						</tr>
						</tbody></table>
						<div class="clearfix"></div>
					</div>
					<div class="panel-footer">
						<span style="padding-left:10px;">
							<form method="POST" style="display: inline;">
								<input type="hidden" name="order_id" value="'.$row['order_id'].'"/>
								<input type="submit" class="button_icon_D" name="status" value="Delivered"/>
								<input type="submit" class="button_icon_D" name="status" value="Reject"/>
							</form>
						</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<span class="pull-right" style="padding-right:5px;">'.$row['type'].'</span>
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>';
		}
	}
	echo $orders;
}

if(isset($_POST['sendEmail'])){
	$email = $_POST['offerEmail'];
	$msg ="";
	$sql= "select * from offers where email='$email'";
	$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
	$rows = mysqli_num_rows($results);
	if($rows == 0){
		$rand = rand(100000,999999);
		$sql= "INSERT INTO offers(email,code) VALUES ('$email','$rand')";
		mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
		mysqli_close($mysqli_conn);
		$mail = sendmail($email,$rand);
		if($mail != "0"){
			$msg = "Offer code is sent to your mail id (Please also check SPAM folder)"; 
		}else{
			$msg = "Something went wrong. Please try after sometime"; 
		}
	}else{
		$msg = "You can avail 50% offer only one time";
	}
	die(json_encode(array('msg'=>$msg)));
}
if(isset($_POST['applyOffer'])){
	$coupon = $_POST['coupon'];
	$msg =""; 
	$total = $_POST['total'];
	$sql= "select * from offers where code='$coupon' AND offer=0";
	$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
	$rows = mysqli_num_rows($results);
	if($rows != 0){
		$rand = rand(100000,999999);
		$sql= "UPDATE offers SET offer='1' WHERE code='$coupon' AND offer=0";
		mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
		mysqli_close($mysqli_conn);
		$msg = "Coupon Applied Successfully";
		$check = 1;
		$discount = 40;
		$dis = $discount;
		$discount = $total*($discount/100);
		$d_amt = $total - $discount;
	}else{
		$msg = "You can avail 50% offer only one time";
		$check = 0;
		$d_amt = $total;
	}
	$_SESSION['total'] = $d_amt;
	die(json_encode(array('msg'=>$msg,'check'=>$check, 'total'=>$d_amt)));
}
ob_end_flush();
?>