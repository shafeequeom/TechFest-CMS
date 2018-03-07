<?php
session_start();
include('db.php');

if(!isset($_SESSION['username'])){
header("location:index.php");
}
function clean_string($string) {
      $bad = array(";","<",">","$");
      return str_replace($bad,"",$string);
}
if (isset($_POST['cord'])) {
  $number=$_POST['number'];
  $role=$_POST['role'];
  $event=$_POST['event'];
  	for($i=0;$i<$number;$i++)
	{
	  if(isset($_POST['name'.($i+1)]) && $_POST['name'.($i+1)] != "") {
	  			  $name = clean_string($_POST['name'.($i+1)]);
	  			  $contact=clean_string($_POST['contact'.($i+1)]);
	    $sql="INSERT INTO coordinators(role, name, event_name, contact_no) VALUES ('$role','$name','$event','$contact')";
	    mysql_query($sql);}
  }
  $_SESSION['cord']=$event;

          header("location:coordinator.php");

}
if (isset($_POST['edit'])) {
  $number=$_POST['number'];
  $role=$_POST['role'];
  $event=$_POST['event'];
    for($i=0;$i<$number;$i++)
  {
    if(isset($_POST['ename'.($i+1)]) && $_POST['ename'.($i+1)] != "") {
            $name = clean_string($_POST['ename'.($i+1)]);
            $contact=clean_string($_POST['econtact'.($i+1)]);
      $sql="UPDATE coordinators SET name='$name', contact_no='$contact' WHERE role='$role' AND event_name='$event'";
      mysql_query($sql);}
  }
  $_SESSION['cord']=$event;

          header("location:coordinator.php");

}
?>