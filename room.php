<?php
session_start();
if(!isset($_SESSION['user']))
header('Location: adminlogin.php');
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Room </title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="room.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Room </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
<form   name="room_info" class="form-horizontal" id="room_info" method="POST" action="roomdb.php">
											
										




<div class="form-group">
<label class="col-sm-2 control-label">Block: </label>
<div class="col-sm-8">
<select name="block" class="form-control" Id="block" required="required" >
<option value="">Select </option>
<option value="Left">Left</option>
<option value="Right">Right</option>

</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Floor: </label>
<div class="col-sm-8">
<select name="floor" class="form-control" Id="floor" required="required" onChange="gettype(this.value);">
<option value="">Select </option>
<option value="1">1 floor</option>
<option value="2">2 floor</option>
<option value="3">3 floor</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Room Type : </label>
<div class="col-sm-8">
<select name="type-list" id="type-list" class="form-control" required="required">
<option value="">Select </option>

</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label"> Capacity: </label>
<div class="col-sm-8">
<input type="text" name="capacity" id="capacity"  class="form-control" required="required" >
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label"> Occupaid: </label>
<div class="col-sm-8">
<input type="text" name="occupaid" id="occupaid"  class="form-control" required="required" >
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label"> Available: </label>
<div class="col-sm-8">
<input type="text" name="available" id="available"  class="form-control" required="required" >
</div>
</div>

<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="submit" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
function gettype(val) {
	
	$.ajax({
	type: "POST",
	url: "get_type.php",
	data:'fl_id='+val,
	success: function(data){
		$("#type-list").html(data);
	}
	});
}
	
	
	
	</script
</body>
	<script>

</script>

</html>