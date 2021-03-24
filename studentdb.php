<?php
session_start();

require_once 'dbconfig.php';
require 'PHPMailer-master/PHPMailerAutoload.php';
if(isset($_POST['submit']))
{
$user=$_SESSION['user'];
$student_name=$_POST['student_name'];
$class=$_POST['class'];
$dept=$_POST['dept_name'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$pass_word=1234;
$admission_id=$_POST['admission_id'];
$fee_payed=$_POST['fee_payed'];

//$cur_date=date("Y-m-d",time());
$query="insert into  tbl_student(student_name,class,dept,email,phone_number,pass_word,admission_id,fee_payed,created_user) values('$student_name','$class','$dept','$email','$phone_number','$pass_word','$admission_id','$fee_payed','$user')";
$stmt = $db_con->prepare($query);
//$rc=$stmt->bind_param('sssssisssss',$stud_id,$student_name,$class,$dept,$email,$Phone_number,$pass_word,$admission_id,$fee_payed,$created_user,$currentdate);
if($stmt->execute()){
	
	
	


$mail = new PHPMailer();                              // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->IsSMTP(true);                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kuhostelmanagement@gmail.com';                 // SMTP username
    $mail->Password = 'hostel143@';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // or 587                                    // TCP port to connect to
	
    //Recipients
    $mail->SetFrom('sainivikas644@gmail.com', 'vikas');
    $mail->AddAddress('mmanohar468@gmail.com');     // Add a recipient
 
    //Content
    $mail->IsHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    if($mail->Send()){
    echo 'Message has been sent';
	}else{
		echo 'Message could not be sent. ';
	}
	
	
}
//echo"<script>alert('Student Succssfully register');</script>";
header('Location: student.php');


}
?>