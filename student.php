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
	<title>Student</title>
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
					
						<h2 class="page-title">Student Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
			<form   name="student_info" class="form-horizontal" id="student_info" method="POST" action="studentdb.php">
											
										



<div class="form-group">
<label class="col-sm-2 control-label">Student Name: </label>
<div class="col-sm-8">
<input type="text" name="student_name" id="student_name"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Class : </label>
<div class="col-sm-8">
<input type="text" name="class" id="class"  class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Department: </label>
<div class="col-sm-8">
<select name="dept_name" Id="dept_name" class="form-control"  required="required">
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
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">phone number : </label>
<div class="col-sm-8">
<input type="number" name="phone_number" id="phone_number"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Admission Id: </label>
<div class="col-sm-8">
<input type="text" name="admission_id" id="admission_id"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Fee payed: </label>
<div class="col-sm-8">
<input type="text" name="fee_payed" id="fee_payed"  class="form-control" required="required">
</div>
</div>						


<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Submit" class="btn btn-primary">
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
	url: "get_dept.php",
	data:'fl_id='+val,
	success: function(data){
		$("#dept_name").html(data);
	}
	});
}
	
</script>
</body>
</html>