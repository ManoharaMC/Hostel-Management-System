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
	<title>Messbill Master</title>
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
					
						<h2 class="page-title">Messbill Master</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
			<form   name="messbill_info" class="form-horizontal" id="messbill_info" method="POST" action="messdb.php">
											


<div class="form-group">
<label class="col-sm-2 control-label">month: </label>
<div class="col-sm-8">
<select name="month" Id="month" class="form-control"  required="required" onchange="get_year(this.value);" >
<option value="">Select month</option>

<?php $stmt1 = $db_con->prepare("SELECT month_id, month FROM `tbl_month` "); 
  $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{
?>

	    <option value="<?php echo $infor['month_id']; ?>"><?php echo $infor['month']; ?></option>
<?php
	}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Years: </label>
<div class="col-sm-8">
<select name="years" Id="years" class="form-control" required="required">
<option value="">Select </option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"> No of Days Worked: </label>


<div class="col-sm-8">
<input type="text" name="no_days" id="no_days"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"> Amount Per Day: </label>


<div class="col-sm-8">
<input type="text" name="amount" id="amount"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"> electricity bill: </label>
<div class="col-sm-8">
<input type="text" name="electricity_bill" id="electricity_bill"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"> Other: </label>
<div class="col-sm-8">
<input type="text" name="other" id="other"  class="form-control" required="required" >
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
</body>
	<script>
	function get_year(val) {
	
	$.ajax({
	type: "POST",
	url: "get_year.php",
	data:'month='+val,
	success: function(data){
		$("#years").html(data);
	}
	});
}

</script>

</html>