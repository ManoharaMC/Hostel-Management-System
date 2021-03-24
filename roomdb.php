<?php
require_once 'dbconfig.php';
if(isset($_POST['submit']))
{

$block=$_POST['block'];
$floor=$_POST['floor'];
$room_type=$_POST['type-list'];
$capacity=$_POST['capacity'];
$occupaid=$_POST['occupaid'];
$available=$_POST['available'];
$query="insert into  tbl_room(block,floor,room_type,capacity,occupaid,available) values('$block','$floor','$room_type','$capacity','$occupaid','$available')";

$stmt = $db_con->prepare($query);
//$rc=$stmt->bind_param('sssssss',$room_id,$block,$floor,$room_type,$capacity,$occupaid,available);
$stmt->execute();
//echo"<script>alert('data saved Succssfully ');</script>";
header('Location: room.php');
}
?>