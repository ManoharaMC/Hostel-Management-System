

<?php 
require_once 'dbconfig.php';

$stud_id=$_POST['stud_id'];


$stmt1 = $db_con->prepare("SELECT s.stud_id,s.student_name, s.class,d.dept_name,s.phone_number FROM tbl_student s inner join tbl_dept d on  s.dept=d.dept_id WHERE s.stud_id='$stud_id' "); 
 
  
  $stmt1->execute();
$infoarray1= $stmt1->fetchAll();
foreach ($infoarray1 as $infor1) 
{
echo "<table ><tr> <td>Student Name </td> <td>Class / Dept</td>  <td>Phone Number</td></tr>";
echo "<tr><td>".$infor1['student_name']."</td><td>".$infor1['class']."/".$infor1['dept_name']."</td><td>".$infor1['phone_number']."</td></tr>";
}
$stmt1 = $db_con->prepare("SELECT m.month,m.years,b.mess_bill_id, b.stud_id, b.amount_paid, b.difference_amt, b.trans_no, b.trans_date FROM tbl_messbill b inner join tbl_messbill_masters m on b.mess_bill_id=m.messid WHERE b.stud_id='$stud_id' "); 
  $stmt1->execute();
$infoarray1= $stmt1->fetchAll();

foreach ($infoarray1 as $infor1) 
{
	echo "<table ><tr> <td>month/years </td> <td>amount paid</td>  <td>difference_amt</td> <td>transcation no</td> <td>transcation date</td></tr>";
echo "<tr><td>"	.$infor1['month']."/".$infor1['years']."</td><td>".$infor1['amount_paid']."</td><td>".$infor1['difference_amt']."</td><td>".$infor1['trans_no']."</td><td>".$infor1['trans_date']."</td></tr>";
	
}
?>