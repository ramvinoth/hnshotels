<!DOCTYPE html>
<?php
	ob_start();
	include_once("../../config.inc.php");
	@session_start();
	if($_SESSION['role'] != "admin")
	{
		header("Location: index.php");
	}
	if(isset($_POST['status']) && isset($_POST['order_id']))
	{
		$status = $_POST['status'];
		$order_id = $_POST['order_id'];
		$sql= "UPDATE `transaction` SET `status`='$status' WHERE order_id='$order_id'" ;
		mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
	}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>HNS ADMIN PANEL</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">HNS ADMIN PANEL v1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="admin.php">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> All Orders
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="reject.php">
                                <div>
                                    <i class="fa fa-times fa-fw"></i> Rejected Orders
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="superadmin.php">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> Table View
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>

        <div id="page-wrapper" style="margin:0px;">
            <!-- /.row -->
                    <div class="panel panel-default col-lg-6" style ="padding-left: 0px;padding-right: 0px;margin: 1px 0px 0px 0px;min-height: 1000px;">
                        <div class="panel-heading">
                            Delivered
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- /.row -->
							<div id="updateDiv" class="row">
						<?php
						$orders = '';
						$results = $mysqli_conn->query("SELECT * FROM transaction WHERE store_id='".$_SESSION['str_no']."' ORDER BY sno DESC;");
						while($row = $results->fetch_assoc()) {
							if($row['status'] == "Delivered"){
							$items = "";$count=0;
							$mix = explode(",", $row['items']);
							foreach ($mix as $value) {						 
								$items .=$value.'<br/>';
								$count++;
							}
							$orders .= '<div class="col-lg-12">';
							if($row['status'] == 'Order') $orders .= '		<div class="panel panel-red">';
							else if($row['status'] == 'Reject') $orders .= '		<div class="panel panel-yellow">';
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
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<span class="pull-right" style="padding-right:5px;">'.$row['type'].'</span>
											<div class="clearfix"></div>
										</div>
									</div>
									
								</div>';
                            }
						}
							echo $orders;
							?>
							</div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    
                
                <div class="panel panel-default col-lg-6" style ="padding-left: 0px;padding-right: 0px;margin: 1px 0px 0px 0px;min-height: 1000px;">
                        <div class="panel-heading">
                            Rejected Orders
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- /.row -->
							<div class="row">
						<?php
						$orders = '';
						$results = $mysqli_conn->query("SELECT * FROM transaction WHERE store_id='".$_SESSION['str_no']."' ORDER BY sno DESC;");
						while($row = $results->fetch_assoc()) {
							if($row['status'] == "Reject"){
                            $items = "";$count = 0;
							$items .= '';
							$mix = explode(",", $row['items']);
							foreach ($mix as $value) {						 
								$items .=$value.'<br/>';
								$count++;
							}
							$orders .= '<div class="col-lg-12">';
							if($row['status'] == 'order') $orders .= '		<div class="panel panel-red">';
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
										<a href="#">
											<div class="panel-footer">
												<span style="padding-left:10px;">
													<form method="POST" style="display: inline;">
														<input type="hidden" name="order_id" value="'.$row['order_id'].'"/>
													</form>
												</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<span class="pull-right" style="padding-right:5px;">'.$row['type'].'</span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
									
								</div>';
                            }
						}
							echo $orders;
							?>
							</div>
							<!-- /.row -->
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                
            <!-- /.row -->
          
        </div>
        <!-- /#page-wrapper -->
	<audio id="alertAudio"><source src="ringAlert.mp3" type="audio/mpeg"></audio>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	<script>
		setInterval(update,8000);
		newlength = 0;
		alertSound = jQuery('#alertAudio')[0];
		function update(){
			//console.log("called");
				$.ajax({
						type: "post",
						url: "../../functions.php",
						data: {
							update: 1,
						},
						success: function( data ) {
							//console.log("bars : "+data.bars);
							//newlength = data.length;
							length = jQuery("#updateDiv").html().length;
							console.log("length : "+length);
							//jQuery("#updateDiv").html(data);
							newlength = jQuery("#updateDiv").html().length;
							if(newlength > length){
								//jQuery.playSound("ringAlert.mp3");
								alertSound.play();
								if(confirm("You have a new order !")){
									alertSound.pause();
									alertSound.currentTime = 0;
								}
							}
							console.log("newlength : "+newlength);
						}
					});
			}
	</script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
 <?php ob_end_flush(); ?>
</body>

</html>
