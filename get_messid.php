<?php 
require_once 'dbconfig.php';

$stu_id=$_POST['stu_id'];

echo "<option value=''>Select MessBill</option>";

$stmt1 = $db_con->prepare("SELECT  a.messbill_id, mo.month, m.years FROM tbl_student_attendence a inner join tbl_messbill_masters m inner join tbl_month mo on m.messid=a.messbill_id and mo.month_id=m.month WHERE  stud_id='$stu_id'"); 

$stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	    <option value="<?php echo $infor['messbill_id']; ?>"><?php echo $infor['month'].' - '.$infor['years']; ?></option>

<?php
	}



?>