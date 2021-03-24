<?php
session_start();

require_once 'dbconfig.php';
if(isset($_POST['submit']))
{
$userd='rg12.clk@gmail.com';
$stu_id=$_POST['Stu_name'];
$mes_id=$_POST['messid'];
$no_days=$_POST['pdays'];


$query="UPDATE tbl_student_attendence SET no_days='$no_days' WHERE  stud_id='$stu_id' and messbill_id='$mes_id'";
$stmt = $db_con->prepare($query);
//$rc=$stmt->bind_param('sssssisssss',$month,$years,$no_days,$amount,$other);
$stmt->execute();


//echo"<script>alert('messbill master Succssfully register');</script>";
header('Location: messbill master.php');
}
?>