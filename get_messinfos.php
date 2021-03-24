<?php 
session_start();
if(!isset($_SESSION['cuser'])){}
require_once 'dbconfig.php';

$mes_id=$_POST['mess_id'];
$stu_id=$_SESSION['cuser'];



$stmt1 = $db_con->prepare("SELECT * FROM `tbl_messbill` WHERE mess_bill_id='$mes_id' and stud_id='$stu_id'"); 

$stmt1->execute();
$infoarray = $stmt1->fetchAll();
if($stmt1->rowCount()==1){
	
	echo "Mess Bill Paid Already";
}
else{

$stmt2 = $db_con->prepare("SELECT m.messid, s.no_days, m.amount, m.electricity_bill, m.other FROM tbl_messbill_masters m inner join tbl_student_attendence s on m.messid=s.messbill_id WHERE m.messid='$mes_id' and s.stud_id='$stu_id'"); 

$stmt2->execute();
$infoarray = $stmt2->fetchAll();
	
foreach ($infoarray as $infor) 
{
	$total=($infor['amount']*$infor['no_days'])+$infor['electricity_bill']+$infor['other'];
}	
	
 ?>
 
 	<div class="form-group">
<label class="col-sm-2 control-label">Total  Amount: </label>
<div class="col-sm-8">
<input type="text" name="tamount" id="tamount"  class="form-control" required="required" value="<?php echo $total;?>" readonly >
</div>
</div>
 
	<div class="form-group">
<label class="col-sm-2 control-label"> Amount: </label>
<div class="col-sm-8">
<input type="text" name="amount" id="amount"  class="form-control" required="required" onkeyup="get_balance();" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"> Balance: </label>
<div class="col-sm-8">
<input type="text" name="Balance" id="Balance"  class="form-control" required="required" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label"> Transation Id: </label>
<div class="col-sm-8">
<input type="text" name="transation_id" id="transation_id"  class="form-control" required="required" >
</div>
</div>


	
	<?php
}


?>
