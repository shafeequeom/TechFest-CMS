<?php
session_start();
if(!isset($_SESSION['email'])){
header("location:login.php");
} else {
   header("location:index.php");	
}
?>