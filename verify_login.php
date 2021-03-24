<?php
session_start();

require_once 'dbconfig.php';
$user_id =($_POST["username"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "email is in not standard form";
}
if(isset($_POST['login']))
{

$user_id=$_POST['username'];
$pass_wd=$_POST['passwords'];



$query="SELECT user_id FROM tbl_admin  WHERE  user_id='$user_id' and password='$pass_wd'";
$stmt = $db_con->prepare($query);

if($stmt->execute()){
	
	if($stmt->rowCount()==1){
	$_SESSION['user']=$user_id;
	?>
	<script>alert('Login Succssfully ');
	
	 window.location.assign("student.php")
	
	</script>";
	<?php
	}	
	else{
	?>	
	<script>alert('Invalid Login ');
	 window.location.assign("adminlogin.php")
	
	</script>;
	
	<?php
	}	
	else{
	?>	
	<script>alert('Invalid Login ');
	 window.location.assign("adminlogin.php")
	
	</script>;	
	<?php	
	}
}


//echo"<script>alert('messbill master Succssfully register');</script>";
//header('Location: messbill master.php');
}
?>