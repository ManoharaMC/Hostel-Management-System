<?php 
require_once 'dbconfig.php';



echo "<option value=''>Select Room Type</option>";

$stmt1 = $db_con->prepare("SELECT type_id, type FROM tbl_roomtype"); 

 $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	    <option value="<?php echo $infor['type_id']; ?>"><?php echo $infor['type']; ?></option>

<?php
	}



?>