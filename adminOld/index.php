<?php
	include("../config.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title> HeyPubz - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Styles -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <!-- HTML5, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<script>
	$(document).ready(function() {
		$(".tab").click(function () {
			$(".tab").removeClass("active");
			// $(".tab").addClass("active"); // instead of this do the below 
			$(this).addClass("active");   
		});
	});
</script>
</head>

<body>
	<?php $sno=0; ?>
	<div class="header" style="text-align: center;">
		<!--<img src="../images/heyfood.png" rel="image" /> -->
		<h1>HeyPubz</h1>
	</div>
    <div class="container">  

        <ul class="nav nav-tabs" id="myTab">
			<div class="list-group">
			<a data-toggle="tab" href="#queue" class="list-group-item active tab">
				<?php
					$results = $mysqli_conn->query("SELECT * FROM transaction where status='order'");
					$count = $results->num_rows;
					echo '<br>Order-Queue <span class="badge">'.$count;
					echo "</span>";
				?>
			</a>
			
			<a data-toggle="tab" href="#on-process" class="list-group-item tab">
				<?php 
					$results = $mysqli_conn->query("SELECT * FROM transaction where status='on-process'");
					$count = $results->num_rows;
					echo '<br>On Process <span class="badge">'.$count;
					echo "</span>";
				?>
			</a>
			<a data-toggle="tab" href="#ready" class="list-group-item tab">
				<?php 
					$results = $mysqli_conn->query("SELECT * FROM transaction where status='ready'");
					$count = $results->num_rows;
					echo '<br/>Ready <span class="badge">'.$count;
					echo "</span>";
				?>
			</a>
			<a data-toggle="tab" href="#delivered" class="list-group-item tab">
				<?php 
					$results = $mysqli_conn->query("SELECT * FROM transaction where status='delivered'");
					$count = $results->num_rows;
					echo '<br/>History <span class="badge">'.$count;
					echo "</span>";
				?>
			</a>
			</div>
		</ul>
		<div class="tab-content">
			<div id="queue" class="tab-pane fade in active">
					<div class="list-group">
						<div class="table-responsive">
							<table class="table" width="80%">
								<th>S.no</th>
								<th>User ID</th>
								<th>Trans ID</th>
								<th>Token</th>
							</table>
						</div>
						<?php
							$sno=0;
							$results = $mysqli_conn->query("SELECT * FROM transaction where status='order'");
							//Display fetched records as you please
							
							while($row = $results->fetch_assoc()) {
								echo '<a href="view_cart.php?trans_id='.$row['trans_id'];
								echo '"class="list-group-item list-group-item-info"><span class="space"> '.++$sno;
								echo '.</span><span class="space">'.$row['user_id'];
								echo '</span><span class="space">'.$row['trans_id'];
								echo '</span><span class="space">'.$row['token'];
								echo '</span> </a>';
	
							}
						?>
					
						
					</div>
			</div>
			<div id="on-process" class="tab-pane fade">
					<div class="list-group">
						<div class="table-responsive">
							<table class="table" width="80%">
								<th>S.no</th>
								<th>User ID</th>
								<th>Trans ID</th>
								<th>Token</th>
							</table>
						</div>
						<?php
							$sno=0;
							$results = $mysqli_conn->query("SELECT * FROM transaction where status='on-process'");
							//Display fetched records as you please
							
							while($row = $results->fetch_assoc()) {
								echo '<a href="view_cart.php?trans_id='.$row['trans_id'];
								echo '"class="list-group-item list-group-item-info"><span class="space"> '.++$sno;
								echo '.</span><span class="space">'.$row['user_id'];
								echo '</span><span class="space">'.$row['trans_id'];
								echo '</span><span class="space">'.$row['token'];
								echo '</span> </a>';
							}
						?>
					
						
					</div>
			</div>
			<div id="ready" class="tab-pane fade">
					<div class="list-group">
						<div class="table-responsive">
							<table class="table" width="80%">
								<th>S.no</th>
								<th>User ID</th>
								<th>Trans ID</th>
								<th>Token</th>
							</table>
						</div>
						<?php
							$sno=0;
							$results = $mysqli_conn->query("SELECT * FROM transaction where status='ready'");
							//Display fetched records as you please
							
							while($row = $results->fetch_assoc()) {
								echo '<a href="view_cart.php?trans_id='.$row['trans_id'];
								echo '"class="list-group-item list-group-item-info"><span class="space"> '.++$sno;
								echo '.</span><span class="space">'.$row['user_id'];
								echo '</span><span class="space">'.$row['trans_id'];
								echo '</span><span class="space">'.$row['token'];
								echo '</span> </a>';
	
							}
						?>
					
						
					</div>
			</div>
			<div id="delivered" class="tab-pane fade">
					<div class="list-group">
						<div class="table-responsive">
							<table class="table" width="80%">
								<th>S.no</th>
								<th>User ID</th>
								<th>Trans ID</th>
								<th>Token</th>
							</table>
						</div>
						<?php
							$sno=0;
							$results = $mysqli_conn->query("SELECT * FROM transaction where status='delivered'");
							//Display fetched records as you please
							
							while($row = $results->fetch_assoc()) {
								echo '<a href="view_cart.php?trans_id='.$row['trans_id'];
								echo '" class="list-group-item list-group-item-info">'.++$sno;
								echo '.&nbsp&nbsp&nbsp&nbspUser_id:'.$row['user_id'];
								echo '&nbsp&nbsp&nbsp&nbspOrder_id: '.$row['trans_id'];
								echo '</a>';
	
							}
						?>
					
						
					</div>
			</div>
			
		</div>
		
		

</body>

	<!-- Javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->  	
</html>