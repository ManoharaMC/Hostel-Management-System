<?php
session_start();

require_once 'dbconfig.php';
if(isset($_POST['submit']))
{

$mess_bill_id=$_POST['mess_bill_id'];
$stud_id=$_POST['stud_id'];
$amount_paid=$_POST['amount_paid'];
$difference_amt=$_POST['difference_amt'];
$exsusfees=$_POST['exsusfees'];
$trans_no=$_POST['trans_no'];

$query="insert into  tbl_messbill(mess_bill_id,stud_id,amount_paid,difference_amt,exsusfees,trans_no) values('$mess_bill_id','$stud_id','$amount_paid','$difference_amt','$exsusfees','$trans_no')";
$stmt = $db_con->prepare($query);

$stmt->execute();
//echo"<script>alert('messbill  Succssfully register');</script>";
header('Location: messbill.php');
}
?>