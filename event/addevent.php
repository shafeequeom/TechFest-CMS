<?php
session_start();

include('db.php');
if (isset($_SESSION['email'])){

$id = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$clg = $_GET['clg'];
$cnt = $_GET['ct'];
$clg = $_GET['clg'];
$usn = $_GET['usn'];
$regd=date('Y-m-d');
$regname=$_GET['regname'];
$sql="INSERT INTO registration(id,name,usn,collegename,contactno,eventname,regdate,email) VALUES('$id' ,'$regname','$usn','$clg','$cnt','$name','$regd','$email')";
	mysql_query($sql);
header("location:myevent.php");

}
?>