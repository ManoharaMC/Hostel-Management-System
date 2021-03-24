<?php 
require_once 'dbconfig.php';

echo "<option value=''>Select department</option>";

$stmt1 = $db_con->prepare("SELECT dept_id, dept_name  FROM tbl_dept"); 

 $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	    <option value="<?php echo $infor['dept_id']; ?>"><?php echo $infor['dept_name']; ?></option>

<?php
	}



?>