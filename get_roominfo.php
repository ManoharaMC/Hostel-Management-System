<?php 
require_once 'dbconfig.php';

$room_id=$_POST['room_id'];



$stmt1 = $db_con->prepare("SELECT r.room_id, r.block, r.floor, t.type, r.capacity, r.occupaid, r.available FROM tbl_room r inner join tbl_roomtype t on r.room_type=t.type_id WHERE  r.room_id='$room_id'"); 

$stmt1->execute();
$infoarray = $stmt1->fetchAll();

foreach ($infoarray as $infor) 
{


Echo "Room :". $infor['room_id'] ."<br> Room Type :". $infor['type'] . "<br> Floor - Block :". $infor['floor']."Floor -".$infor['block'];

echo "<br>Capacity :" .$infor['capacity']."<br> Occupaid :".$infor['occupaid']."<br> Available :".$infor['available'];
	}



?>