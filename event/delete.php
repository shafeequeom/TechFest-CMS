<?php
session_start();

include('db.php');
if (isset($_SESSION['email']) && isset($_GET["del"])) {
	$name=$_GET["del"];
	$email=$_SESSION['email'];

	   $delete="DELETE FROM `registration` WHERE email='$email' and eventname='$name'";

	mysql_query($delete);
}
?>