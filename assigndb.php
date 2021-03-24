<?php
session_start();
require_once 'dbconfig.php';
if(isset($_POST['submit']))
{
	$user="rg12.clk@gmail.com";
$stud_id=$_POST['Stu_name'];
$room_id=$_POST['room'];
$occupaid_date=$_POST['oc_date'];
$total_paid=$_POST['fees'];
$permite_admin=$_POST['permite_admin'];


$query="insert into  tbl_assignroom(stud_id,room_id,occupaid_date,total_paid,permite_admin) values('$stud_id','$room_id','$occupaid_date','$total_paid','$user')";

$stmt = $db_con->prepare($query);
if($stmt->execute()){
	
	$query="UPDATE `tbl_room` SET occupaid=occupaid+1,available=capacity-occupaid  WHERE room_id='$room_id'";

$stmt = $db_con->prepare($query);
	
	$stmt->execute();
	
	
	
}
//echo"<script>alert('data saved Succssfully ');</script>";
header('Location: room map.php');
}
?>