<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$messcard_id=$_POST['Messcard_id'];
$stud_id=$_POST['Stud_id'];
$messcard_type=$_POST['messcard_type'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$query="insert into  tbl_messcard(Messcard_id,Stud_id,messcard_type,start_date,end_date) values(?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssss',$Messcard_id,$Stud_id,$messcard_type,$start_date,$end_date);
$stmt->execute();
echo"<script>alert('data saved Succssfully ');</script>";
}
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
	<title>Mess Card</title>
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
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
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
					
						<h2 class="page-title">Mess Card</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
			<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											
										

<div class="form-group">
<label class="col-sm-2 control-label"> Messcard Id: </label>
<div class="col-sm-8">
<input type="text" name="messcard_id" id="messcard_id"  class="form-control" required="required" >
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label"> student Id: </label>
<div class="col-sm-8">
<input type="text" name="stud_id" id="stud_id"  class="form-control" required="required" >
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Messcard Type : </label>
<div class="col-sm-8">
<select name="Type" class="form-control" required="required">
<option value="">Select </option>
<option value="Type 1">Type 1</option>
<option value="Type 2">Type 2</option>
<option value="Type 3">Type 3</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label"> start Date: </label>
<div class="col-sm-8">
<input type="date" name="start_date" id="start_date"  class="form-control" required="required" >
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label"> End Date: </label>
<div class="col-sm-8">
<input type="date" name="end_date" id="end_date"  class="form-control" required="required" >
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

</script>

</html>