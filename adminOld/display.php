<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title> HeyFood - Admin</title>
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
	<div class="header" style="text-align: center;">
		<img src="../images/heyfood.png" rel="image" />
	</div>
    <div class="container">  

        <ul class="nav nav-tabs" id="myTab">
			<div class="list-group">
			<a data-toggle="tab" href="#queue" class="list-group-item active tab">
				Order-Queue <span class="badge"> </span>
			</a>
			
			<a data-toggle="tab" href="#on-process" class="list-group-item tab">
				On Process <span class="badge">145</span>
			</a>
			<a data-toggle="tab" href="#ready" class="list-group-item tab">
				Ready <span class="badge">50</span>
			</a>
			<a data-toggle="tab" href="#history" class="list-group-item tab">
				History <span class="badge">8</span>
			</a>
			</div>
		</ul>
		<div class="tab-content">
			<div id="queue" class="tab-pane fade in active">
					<div class="list-group">
						<a href="#" class="list-group-item list-group-item-success">200 OK: The server successfully processed the request.</a>
						<a href="#" class="list-group-item list-group-item-info active">100 Continue: The client should continue with its request.</a>
						<a href="#" class="list-group-item list-group-item-warning">503 Service Unavailable: The server is temporarily unable to handle the request.</a>
						<a href="#" class="list-group-item list-group-item-danger">400 Bad Request: The request cannot be fulfilled due to bad syntax.</a>
					</div>
			</div>
			<div id="on-process" class="tab-pane fade">
					<div class="list-group">
						<a href="#" class="list-group-item list-group-item-success">200 OK: The server successfully processed the request.</a>
						<a href="#" class="list-group-item list-group-item-info active">100 Continue: The client should continue with its request.</a>
						<a href="#" class="list-group-item list-group-item-warning">503 Service Unavailable: The server is temporarily unable to handle the request.</a>
						<a href="#" class="list-group-item list-group-item-danger">400 Bad Request: The request cannot be fulfilled due to bad syntax.</a>
					</div>
			</div>

			<div id="ready" class="tab-pane fade">
					<div class="list-group">
						<a href="#" class="list-group-item list-group-item-success">200 OK: The server successfully processed the request.</a>
						<a href="#" class="list-group-item list-group-item-info active">100 Continue: The client should continue with its request.</a>
						<a href="#" class="list-group-item list-group-item-warning">503 Service Unavailable: The server is temporarily unable to handle the request.</a>
						<a href="#" class="list-group-item list-group-item-danger">400 Bad Request: The request cannot be fulfilled due to bad syntax.</a>
					</div>
			</div>

			<div id="queue" class="tab-pane fade">
					<div class="list-group">
						<a href="#" class="list-group-item list-group-item-success">200 OK: The server successfully processed the request.</a>
						<a href="#" class="list-group-item list-group-item-info active">100 Continue: The client should continue with its request.</a>
						<a href="#" class="list-group-item list-group-item-warning">503 Service Unavailable: The server is temporarily unable to handle the request.</a>
						<a href="#" class="list-group-item list-group-item-danger">400 Bad Request: The request cannot be fulfilled due to bad syntax.</a>
					</div>
			</div>
			<div id="history" class="tab-pane fade">
					<div class="list-group">
						<a href="#" class="list-group-item list-group-item-success">200 OK: The server successfully processed the request.</a>
						<a href="#" class="list-group-item list-group-item-info active">100 Continue: The client should continue with its request.</a>
						<a href="#" class="list-group-item list-group-item-warning">503 Service Unavailable: The server is temporarily unable to handle the request.</a>
						<a href="#" class="list-group-item list-group-item-danger">400 Bad Request: The request cannot be fulfilled due to bad syntax.</a>
					</div>
			</div>
		</div>
		
		

</body>

	<!-- Javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->  	
</html>