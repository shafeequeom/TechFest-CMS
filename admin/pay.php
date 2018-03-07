<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
function clean_string($string) {
      $bad = array(";","<",">","$","*");
      return str_replace($bad,"",$string);
}
if($_SESSION['username']=='admin1' || $_SESSION['username']=='admin2' || $_SESSION['username']=='admin3'){
	$username=$_SESSION['username'];
if(isset($_GET['amount']) && isset($_GET['regid'])) { 
	$amount=clean_string($_GET['amount']);
	$regid=clean_string($_GET['regid']);
	$event=clean_string($_GET['event']);
	$updatepaid="UPDATE registration SET paid=1 where id='$regid'";
	mysql_query($updatepaid);
	date_default_timezone_set('Asia/Calcutta');
	$tmstamp = date('Y-m-d h:i:s');
	$createtransaction="INSERT INTO `appuser_transactions`(`appuserid`, `regid`, `amount`, `time`, `eventname`)  VALUES ('$username', '$regid', '$amount', '$tmstamp', '$event')";
	mysql_query($createtransaction);
	echo "Paid";
		   header("location:showlist.php?mode=1");	
   } elseif(!isset($_GET['amount']) && isset($_GET['regid'])) {
	   $regid=clean_string($_GET['regid']);
	   $updatepaid="UPDATE registration SET paid=0 where id='$regid'";
	   mysql_query($updatepaid);
	   $deletetransaction="DELETE FROM `appuser_transactions` WHERE regid='$regid'";
	   mysql_query($deletetransaction);
	
   echo "Transaction deleted.";
		   header("location:showlist.php?mode=2");	

   }

}
?>
   