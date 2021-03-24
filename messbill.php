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
	<title>MessBill</title>
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
					
						<h2 class="page-title">MessBill</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
<form   name="messbill_info" class="form-horizontal" id="messbill_info" method="POST" action="messbilldb.php">											
										

<div class="form-group">
<label class="col-sm-2 control-label"> MessBill Id: </label>
<div class="col-sm-8">
<input type="text" name="mess_bill_id" id="mess_bill_id"  class="form-control" required="required" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Student Id: </label>
<div class="col-sm-8">
<input type="text" name="stud_id" id="stud_id"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Amount_Paid : </label>
<div class="col-sm-8">
<input type="text" name="amount_paid" id="amount_paid"  class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Difference_Amt : </label>
<div class="col-sm-8">
<input type="text" name="difference_amt" id="difference_amt"  class="form-control" required="required">
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Exsusfees: </label>
<div class="col-sm-8">
<input type="text" name="exsusfees" id="exsusfees"  class="form-control" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Trans_no</label>
<div class="col-sm-8">
<input type="text" name="trans_no" id="trans_no"  class="form-control" required="required">
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
</body>
	<script>

</script>

</html>