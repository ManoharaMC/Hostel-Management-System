<?php 
require_once 'dbconfig.php';

$dept_id=$_POST['dept_id'];

echo "<option value=''>Select Student</option>";

$stmt1 = $db_con->prepare("SELECT stud_id,student_name FROM `tbl_student` WHERE dept='$dept_id'"); 

$stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	    <option value="<?php echo $infor['stud_id']; ?>"><?php echo $infor['student_name']; ?></option>

<?php
	}



?>