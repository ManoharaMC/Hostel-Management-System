<?php
session_start();
if(!isset($_SESSION['cuser']))
header('Location: userlogin.php');
$stu_id=$_SESSION['cuser'];
require_once 'dbconfig.php';
?>

<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>studentmess </title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
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
	
	<div class="ts-main-content">
		
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Studentmess </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
<form   name="room_info" class="form-horizontal" id="room_info" method="POST" action="paybill.php">
<div class="form-group">
<label class="col-sm-2 control-label">month: </label>
<div class="col-sm-8">
<select name="duration" Id="duration" class="form-control"  required="required" onchange="get_amount(this.value);" >
<option value="">Select Duration</option>
<?php 

$stmt1 = $db_con->prepare("SELECT m.messid,o.month,m.years FROM tbl_messbill_masters m inner join tbl_student_attendence s inner join tbl_month o on m.messid=s.messbill_id  and m.month=o.month_id WHERE  s.stud_id='$stu_id'"); 

 $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{



?>											
										

	    <option value="<?php echo $infor['messid']; ?>"><?php echo $infor['month'].$infor['years']; ?></option>
<?php
	}
?>
</select>
</div>
</div>

<div id="info">

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
function get_amount(val) {
	
	$.ajax({
	type: "POST",
	url: "get_messinfos.php",
	data:'mess_id='+val,
	success: function(data){
		$("#info").html(data);
	}
	});
}
	
	
function get_balance() {
	var val1=document.getElementById('amount').value;
	var val2=document.getElementById('tamount').value;
	
	document.getElementById('Balance').value=val2-val1;
	
}
		
	</script
</body>
	<script>

</script>

</html>