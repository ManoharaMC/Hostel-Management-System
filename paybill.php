<?php
session_start();

require_once 'dbconfig.php';
if(isset($_POST['submit']))
{
$user=$_SESSION['cuser'];
$mess_id=$_POST['duration'];
$amount=$_POST['amount'];
$balance=$_POST['Balance'];
$tran_id=$_POST['transation_id'];



$query="INSERT INTO `tbl_messbill`(`mess_bill_id`, `stud_id`, `amount_paid`, `difference_amt`,  `trans_no`) VALUES ('$mess_id','$user','$amount','$balance','$tran_id')";

$stmt = $db_con->prepare($query);
print_r($query);
$stmt->execute();
echo"<script>alert('data Updated Succssfully ');</script>";
header('Location: studentmess.php');
}
?>