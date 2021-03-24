<?php
session_start();
if(!isset($_SESSION['user']))
header('Location: adminlogin.php');

require_once 'dbconfig.php';

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
<script type="text/javascript">

</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Room map </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
			<form   name="room_info" class="form-horizontal" id="room_info" method="POST" action="assigndb.php">
											
										

<div class="form-group">
<label class="col-sm-2 control-label">Department: </label>
<div class="col-sm-8">
<select name="dept_name" Id="dept_name" class="form-control"  required="required" onchange="getstu(this.value);">
<option value="">Select department</option>
<?php $stmt1 = $db_con->prepare("SELECT dept_id, dept_name  FROM tbl_dept"); 

 $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	    <option value="<?php echo $infor['dept_id']; ?>"><?php echo $infor['dept_name']; ?></option>

<?php
	}
?>
</select>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Student: </label>
<div class="col-sm-8">
<select name="Stu_name" id="Stu_name" class="form-control" required="required" onChange="getroomtype(this.value);">
<option value="">Select </option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Room Type : </label>
<div class="col-sm-8">
<select name="type-list" id="type-list" class="form-control" required="required" onChange="getroom(this.value);">
<option value="">Select </option>

</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Room  : </label>
<div class="col-sm-8">
<select name="room" id="room" class="form-control" required="required" onChange="getroominfo(this.value);">

<option value="">Select </option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"> Occupaid Date: </label>
<div class="col-sm-8">
<input type="date" name="oc_date" id="oc_date"  class="fees" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"> Fees: </label>
<div class="col-sm-8">
<input type="text" name="fees" id="fees"  class="fees" required="required" >
</div>
</div>
<div class="form-group">
<div class="col-sm-8">
<div id="info" align="center">

</div>
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
function getstu(val) {
	
	$.ajax({
	type: "POST",
	url: "get_student.php",
	data:'dept_id='+val,
	success: function(data){
		$("#Stu_name").html(data);
	}
	});
}


function getroomtype(val) {
	
	$.ajax({
	type: "POST",
	url: "get_type.php",
	data:'stu_id='+val,
	success: function(data){
		$("#type-list").html(data);
	}
	});
}

function getroom(val) {
	
	$.ajax({
	type: "POST",
	url: "get_room.php",
	data:'type_id='+val,
	success: function(data){
		$("#room").html(data);
	}
	});
}

function getroominfo(val) {
	
	$.ajax({
	type: "POST",
	url: "get_roominfo.php",
	data:'room_id='+val,
	success: function(data){
		$("#info").html(data);
	}
	});
}
	</script>
</body>
	<script>

</script>

</html>