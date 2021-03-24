
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
	<title>Room Wise Report</title>
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
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Reports</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Room Wise Report</div>
									<div class="panel-body">
			
											


<div class="form-group">
<label class="col-sm-2 control-label">Select Room </label>
<div class="col-sm-8">
<select name="Room" Id="room" class="form-control"  required="required" onchange="get_roominfo(this.value);" >
<option value="">Select </option>

<?php $stmt1 = $db_con->prepare("SELECT room_id, block, floor, room_type FROM tbl_room "); 
  $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{
?>

	    <option value="<?php echo $infor['room_id']; ?>"><?php echo $infor['room_id'].$infor['block'].$infor['floor'].' Floor'; ?></option>
<?php
	}
?>
</select>
</div>
<button class="btn btn-default" onclick="window.location.href = 'roomwiserep.php';" >Back to Results</button>
</div>

<div id="info">

<?php $stmt2 = $db_con->prepare("SELECT room_id, block, floor, capacity, occupaid, available, room_type FROM tbl_room "); 
  $stmt2->execute();
$infoarray = $stmt2->fetchAll();

foreach ($infoarray as $infor) 
{

echo "<br><br><b>ROOM INFO :</b> <br> Room NO :".$infor['room_id']."     Bloock / Floor :". $infor['block']." / ".$infor['floor'];
echo "<br> Capacity : ".$infor['capacity']."      Occupaid :".$infor['occupaid']."   Available :".$infor['available'];
$room_id=$infor['room_id'];
$stmt3 = $db_con->prepare("SELECT a.stud_id,s.student_name, s.class,d.dept_name,s.phone_number, a.occupaid_date, a.total_paid, a.permite_admin, a.create_date FROM tbl_assignroom a inner join tbl_student s inner join tbl_dept d on a.stud_id=s.stud_id and s.dept=d.dept_id WHERE  a.room_id='$room_id' "); 
  $stmt3->execute();
$infoarray2= $stmt3->fetchAll();
echo "<table ><tr> <td>Student Name </td> <td>Class / Dept</td>  <td>Phone Number</td><td>Occupaid Date</td><td>Total Paid</td></tr>";
foreach ($infoarray2 as $infor2) 
{

echo "<tr><td>".$infor2['student_name']."</td><td>".$infor2['class']."/".$infor2['dept_name']."</td><td>".$infor2['phone_number']."</td><td>".$infor2['occupaid_date']."</td><td>".$infor2['total_paid']."</td></tr>";


}
echo "</table>";
	}
?>




</div>


<button class="btn btn-default" onclick="print_data();" >Print</button>


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
	function get_roominfo(val) {
	
	$.ajax({
	type: "POST",
	url: "get_roominfo2.php",
	data:'room_id='+val,
	success: function(data){
		$("#info").html(data);
	}
	});
}

function print_data(){
	
var prtContent = document.getElementById("info");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
	
	
}
</script>

</html>