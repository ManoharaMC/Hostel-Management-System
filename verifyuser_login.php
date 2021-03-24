<?php
session_start();
require_once 'dbconfig.php';
$user_id =($_POST["username"]);
if (!preg_match("/^[a-zA-Z ]*$/",$user_id))
	{
  $nameErr = "email is in not standard form";
}


 if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = ($_POST["email"]);
    
      $emailErr = "Invalid email format";
    }
  

 
?>