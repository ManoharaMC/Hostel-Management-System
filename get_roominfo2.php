

<?php 
require_once 'dbconfig.php';

$room_id=$_POST['room_id'];



$stmt2 = $db_con->prepare("SELECT room_id, block, floor, capacity, occupaid, available, room_type FROM tbl_room  where room_id='$room_id' "); 
  $stmt2->execute();
$infoarray = $stmt2->fetchAll();

foreach ($infoarray as $infor) 
{

echo "<br><br><b>ROOM INFO :</b> <br> Room NO :".$infor['room_id']."     Bloock / Floor :". $infor['block']." / ".$infor['floor'];
echo "<br> Capacity : ".$infor['capacity']."      Occupaid :".$infor['occupaid']."   Available :".$infor['available'];
$room_id=$infor['room_id'];
$stmt3 = $db_con->prepare("SELECT a.stud_id,s.student_name, s.class,d.dept_name,s.phone_number, a.occupaid_date, a.total_paid, a.permite_admin, a.create_date FROM tbl_assignroom a inner join tbl_student s inner join tbl_dept d on a.stud_id=s.stud_id and s.dept=d.dept_id WHERE  a.room_id='$room_id' "); 
  $stmt3->execute();
$infoarray2= $stmt3->fetchAll();
echo "<table ><tr> <td>Student Name </td> <td>Class / Dept</td>  <td>Phone Number</td><td>Occupaid Date</td><td>Total Paid</td></tr>";
foreach ($infoarray2 as $infor2) 
{

echo "<tr><td>".$infor2['student_name']."</td><td>".$infor2['class']."/".$infor2['dept_name']."</td><td>".$infor2['phone_number']."</td><td>".$infor2['occupaid_date']."</td><td>".$infor2['total_paid']."</td></tr>";


}
echo "</table>";
	}

?>