<?php
include('connection.php');
$id=$_GET['id'];
mysql_query("DELETE FROM `online_examination`.`student` WHERE `student`.`id` = '$id'");
header("Location: test.php");

?>
