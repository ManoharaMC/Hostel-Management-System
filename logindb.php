<?php
session_start();

require_once 'dbconfig.php';
if(isset($_POST['submit']))
{

$email=$_POST['email'];
$password=$_POST['password'];

$query="insert into  tbl_userlogin(email,password) values('$email','$password')";
$stmt = $db_con->prepare($query);

$stmt->execute();

header('Location: userlogin.php');
}
?>