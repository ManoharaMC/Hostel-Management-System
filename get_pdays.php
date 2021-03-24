<?php 
require_once 'dbconfig.php';

$mes_id=$_POST['mes_id'];



$stmt1 = $db_con->prepare("SELECT no_days FROM tbl_student_attendence WHERE messbill_id='$mes_id'"); 

$stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	  <input type="text" name="pdays" id="pdays"  class="form-control" value="<?php echo $infor['no_days']; ?>" required="required" >

<?php
	}



?>