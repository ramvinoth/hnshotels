<!DOCTYPE html>
<?php
	ob_start();
	include_once("config.inc.php");
	@session_start();
	if(!isset($_SESSION['str_no']))
	{
		header("Location: index.php");
	}
	if(isset($_GET['status']) && isset($_GET['order_id']))
	{
		$status = $_GET['status'];
		$order_id = $_GET['order_id'];
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

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
		function changeStatus(order_id)
		{
			id="changeStatus_"+order_id
			var s1=document.getElementById(id);
			var status=s1.options[s1.selectedIndex].value;
			window.location.assign("?status="+status+"&order_id="+order_id);
		}
    </script>
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
                        <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="orders.php"><i class="fa fa-dashboard fa-fw"></i> Orders</a>
                        </li>
                        <li>
                            <a href="update.php"><i class="fa fa-dashboard fa-fw"></i> Update Menu</a>
                        </li>
                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Card View</a>
                        </li>
                        <!--<li>
                            <a href="reservation.php"><i class="fa fa-dashboard fa-fw"></i>Reservation</a>
                        </li>-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Available Items on <?php echo $_SESSION['str_no']; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-Available">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Order ID</th>
                                            <th>Store</th>
                                            <th>amount</th>
                                            <th>type</th>
                                            <th>Address</th>
                                            <th>status</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										//List products from database
										$results = $mysqli_conn->query("SELECT * FROM transaction WHERE store_id='".$_SESSION['str_no']."' ORDER BY sno DESC;");
										//Display fetched records as you please
										$disp = '';
										while($row = $results->fetch_assoc()) {
											if($row["status"] == 'On-Process')
												$disp .= '<tr class="gradeA" style="background-color: #E05959;">';
											else
												$disp .= '<tr class="gradeA" style="background-color: #f9f9f9;">';
											
											
												$disp.= '<td>'.$row["sno"].'</td>';
												$disp.= '<td>'.$row["date"].'</td>';
												$disp.= '<td>'.$row["name"].'</td>';
												$disp.= '<td>'.$row["mobile"].'</td>';
												$disp.= '<td><a onclick="viewBill(\''.$row["order_id"].'\')" style="cursor:pointer">'.$row["order_id"].'</a></td>';
												$disp.= '<td>'.$row["store_id"].'</td>';
												$disp.= '<td>'.$row["amount"].'</td>';
												$disp.= '<td>'.$row["type"].'</td>';
												$disp.= '<td>'.$row["address"].'</td>';
												$disp.= '<td>'.$row["status"].'</td>';
												$disp.= '<td><select class="" id="changeStatus_'.$row["order_id"].'"  name="changeStatus" onchange="javascript:changeStatus(\''.$row["order_id"].'\');" >
															<option value="" selected disabled>Select</option>
															<option value="Delivered">Delivered</option>
															<option value="Ready">Reject</option>
														</select> </td>';
											$disp.= '</tr>';
										}  
										echo $disp;
										?>
                                       
                                    </tbody>
                                </table>
								<input id="order_id" type="hidden" name="user_id" value="">
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
		<div class="modal fade" id="deliveryBoy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Delivery Boy details</h4>
                    </div>
                    <div class="modal-body">
                        <?php
							$delivery = '';
							$store_id = $_SESSION['str_no'];
							$sql= "SELECT * FROM emp WHERE store_id='$store_id'";
							$results = mysqli_query($mysqli_conn, $sql)or die ('Unable to execute query. '. mysqli_error($mysqli_conn));
							$delivery .= '<div class="form-group">
											<select id="emp_name"  name="emp" class="form-control" required="" onchange="javascript:update(-1);">
											<option value="-1" selected disabled>Select Store</option>';
							while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
								$delivery .= '<option value="'.$row["emp_no"].','.$row["emp_name"].'">'.$row["emp_name"].' ('.$row["emp_id"].')</option>';
							}	
							$delivery .= '</select></div>';
							echo $delivery;
						?>
						<div class="form-group">
							<input class="form-control" id="emp_no" name="tmobile" placeholder="Mobile No." >
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="viewBill()">Save changes</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /#page-wrapper -->

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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-Available').DataTable({
                responsive: true,
				"order": [[ 1, "desc" ]]
        });
        $('#dataTables-Unavailable').DataTable({
                responsive: true
        });
    });
	var emp_no= -1,arr;
	function update(order_id){
		if(order_id == -1)
		{
			var s=document.getElementById("emp_name");
			var emp_det=s.options[s.selectedIndex].value;
			arr = emp_det.split(',');
			emp_no = arr[0];
			console.log("arr :"+arr);
			jQuery("#emp_no").val(arr[0]);
		}
		else
		{
			jQuery("#order_id").val(order_id);
		}
	}
	function viewBill(order_id)
	{
		//	id = jQuery("#order_id").val();
			id = order_id;
			window.location.assign("bill.php?&order_id="+id);
	}
	setInterval(update,8000);
	newlength = 0;
	function update(){
		//console.log("called");
		$.ajax({
			type: "post",
			url: "../../../functions.php",
			dataType:"json",
			data: {
				update: 1,
			},
			success: function( data ) {
				Sno = jQuery("#dataTables-Available").find("td:first").html();
				console.log("Sno : "+Sno+" checkVal : "+data.checkSno);
				if(data.checkSno != Sno){
					alert("You have a new order !");
					jQuery("#dataTables-Available").find("tbody").html(data.disp);
				}
			}
		});
	}
    </script>
<?php ob_end_flush(); ?>
</body>

</html>
