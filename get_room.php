<?php 
require_once 'dbconfig.php';

$type=$_POST['type_id'];

echo "<option value=''>Select Room </option>";

$stmt1 = $db_con->prepare("SELECT room_id, concat(room_id, ' -', block, ' Block- ',floor,' Floor') as rooms FROM `tbl_room` WHERE room_type=$type and available >0"); 

 $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	    <option value="<?php echo $infor['room_id']; ?>"><?php echo $infor['rooms']; ?></option>

<?php
	}



?>