<?php 
require_once 'dbconfig.php';

echo "<option value=''>Select month</option>";

$stmt1 = $db_con->prepare("SELECT month FROM tbl_messbill_master "); 

 $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	    <option value="<?php echo $infor['messbill_id']; ?>"><?php echo $infor['month']; ?></option>

<?php
	}



?>