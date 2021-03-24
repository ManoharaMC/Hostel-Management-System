<?php
session_start();

require_once 'dbconfig.php';
if(isset($_POST['submit']))
{
$userd='rg12.clk@gmail.com';
$month=$_POST['month'];
$years=$_POST['years'];
$no_days=$_POST['no_days'];
$amount=$_POST['amount'];
$electricity_bill=$_POST['electricity_bill'];
$other=$_POST['other'];
$messid=$month.$years;
$query="insert into  tbl_messbill_masters(messid,month,years,no_days,amount,electricity_bill,other,user) values('$messid','$month','$years','$no_days','$amount','$electricity_bill','$other','$userd')";
$stmt = $db_con->prepare($query);
//$rc=$stmt->bind_param('sssssisssss',$month,$years,$no_days,$amount,$other);
$stmt->execute();
$stmt1 = $db_con->prepare("SELECT stud_id FROM tbl_assignroom"); 

$stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{
	$stu_ids=$infor['stud_id'];
	$query= "INSERT INTO `tbl_student_attendence`(`stud_id`, `messbill_id`, `no_days`, `created_user`) VALUES ('$stu_ids','$messid','$no_days','$userd')";
	$stmt2 = $db_con->prepare($query); 

	$stmt2->execute();

}

//echo"<script>alert('messbill master Succssfully register');</script>";
header('Location: messbill master.php');
}
?>