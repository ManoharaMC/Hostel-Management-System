<?php 
require_once 'dbconfig.php';



echo "<option value=''>Select year</option>";

$stmt1 = $db_con->prepare("SELECT `year_id`, `year` FROM `tbl_year`"); 

 $stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


?>

	    <option value="<?php echo $infor['year_id']; ?>"><?php echo $infor['year']; ?></option>

<?php
	}



?>