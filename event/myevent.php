<!DOCTYPE html>
<?php
session_start();

include('db.php');
function clean_string($string) {
      $bad = array(";","<",">","$");
      return str_replace($bad,"",$string);
}
$value=0;
if(isset($_GET['clg']) && isset($_GET['name'])){

$id = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$clg = $_GET['clg'];
$cnt = $_GET['ct'];
$usn = $_GET['usn'];
$regd=date('Y-m-d');
$regname=$_GET['regname'];
$sql="INSERT INTO registration(id,name,usn,collegename,contactno,eventname,regdate,email) VALUES('$id' ,'$regname','$usn','$clg','$cnt','$name','$regd','$email')";
mysql_query('SET FOREIGN_KEY_CHECKS=0');
mysql_query($sql);
mysql_query('SET FOREIGN_KEY_CHECKS=1');
$grp=$_GET['grp'];

		 $regg=mysql_query("SELECT * FROM registration WHERE email='$email'");
}
if (isset($_SESSION['email']) && isset($_GET["del"])) {
	$name=$_GET["del"];
	$email=$_SESSION['email'];

	   $delete="DELETE FROM `registration` WHERE email='$email' and eventname='$name'";

	mysql_query($delete);
			 $regg=mysql_query("SELECT * FROM registration WHERE email='$email'");

}
if (isset($_SESSION['email'])) {
	$email=$_SESSION['email'];
	 $regg=mysql_query("SELECT * FROM registration WHERE email='$email'");
	}
 if(isset($_SESSION['email']) && isset($_POST['first-name'])){
 	$cardname=$_POST['first-name'];
 	$number=$_POST['number'];
 	$expiry=$_POST['expiry'];
 	$cvc=$_POST['cvc'];
 	  $email=$_SESSION['email'];
 	   	  $event=$_SESSION['pevent'];
 	   	   	   	  $regid=$_SESSION['preg'];
 	$sql=mysql_query("INSERT INTO online_transactions (name,cardno,edate,ccv,email,eventname,regid) VALUES('$cardname','$number','$expiry','$cvc','$email','$event','$regid')");
 	$updatepaid="UPDATE registration SET paid=1 where email='$email' and eventname='$event'";
	mysql_query($updatepaid);
$value=1;
$eventquery=mysql_fetch_array(mysql_query("SELECT * FROM events WHERE name='$event'"));
$query=mysql_fetch_array(mysql_query("SELECT * FROM registration WHERE id='$regid'"));
if($query[3]=='TIST' || $query[3]=='Toc H Institute of Science & Technology' || $query[3]=='Toc H Institute of Science and Technology' || $query[3]=='Toc H') {
				$amount = $eventquery[5];}
				else {
				$amount = $eventquery[6];}
	date_default_timezone_set('Asia/Calcutta');
	$tmstamp = date('Y-m-d h:i:s');
	$username="online";
	$createtransaction="INSERT INTO `appuser_transactions` (`appuserid`, `regid`, `amount`, `time`) VALUES ('$username', '$regid', '$amount', '$tmstamp')";
	mysql_query($createtransaction);


	$value=1;
		 $regg=mysql_query("SELECT * FROM registration WHERE email='$email'");
 }
 if (isset($_POST['grps'])) {
 		$id=$_POST['id'];
	$groupSize = $_POST['grp'];
	for($i=0;$i<$groupSize;$i++)
	{
	  if(isset($_POST['mate'.($i+1)]) && $_POST['mate'.($i+1)] != "") {
		  $matename = clean_string($_POST['mate'.($i+1)]);
		  $deptname = "";
		  if(isset($_POST['dept'.($i+1)]))
		      $deptname = clean_string($_POST['dept'.($i+1)]);
	    $sql="INSERT INTO participants(registrationid,name,dept) VALUES('$id','$matename','$deptname')";
	    mysql_query($sql);
	  }
	}
 }
?>
<html lang="en">
<head>
	<title>Advay'16 Events</title>
	<meta charset="utf-8">
	<meta name="author" content="tist">
	<meta name="description" content="Advay 2016"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<header>
		<div class="logo">
		</div><!-- end logo -->

				<div id="menu_icon"></div>
		<nav>
			<ul name="mode">
				<li><a href="index.php" class="selected">Home</a></li>
				<li><a href="index.php?category=Technical">Technical</a></li>
				<li><a href="index.php?category=Cultural">Cultural</a></li>
				<li><a href="index.php?category=Sports">Sports</a></li>
				<li><a href="index.php?category=Fun">Fun</a></li>
<?php
if(isset($_SESSION['email'])){ 
				echo	'<li><a href="myevent.php">My Events</a></li>';
			echo	'<li><a class="loginn" href="logout.php">Logout</a></li>';
}
			else{
							echo	'<li><a class="loginn" href="login.php">Login</a></li>';}
?>
			</ul>
		</nav><!-- end navigation menu -->

		<div class="footer clearfix">
			<ul class="social clearfix">
				<li><a href="#" class="fb" data-title="Facebook"></a></li>
				<li><a href="#" class="google" data-title="Google +"></a></li>
				<li><a href="#" class="behance" data-title="Behance"></a></li>
				<!--<li><a href="#" class="twitter" data-title="Twitter"></a></li>
				<li><a href="#" class="dribble" data-title="Dribble"></a></li>-->
				<li><a href="#" class="rss" data-title="RSS"></a></li>
			</ul><!-- end social -->

			<div class="rights">
				<p>Copyright © 2016 ADVAY<a href=""></a></p>
			</div><!-- end rights -->
		</div ><!-- end footer -->
	</header><!-- end header -->

   	<section class="main clearfix">


				<h2> My Events</h2>
				<?php

	    while ($row=mysql_fetch_array($regg)) {
echo'<div class="work" style=" border: 1px solid #a0b3b0; width:20%; text-align:center; padding:10px;margin:5px; text-decoration:none;">';
				echo'<h2>'.$row[6].'</h2>';
				echo'<p> Registration Date: '.$row[7].'<p>';

		if($row[8]==0){
			echo'<a href="payment.php?event='.$row[6].'&regid='.$row[0].'" class="btn btn-success">PAY</a> ' ; 
					}   
		else{
			echo'<button  class="btn">PAID</button>  ';
		}            
		if(isset($_SESSION['email']) and $row[8]==0){
			echo'<a href="myevent.php?del='.$row[6].'" class="btn btn-danger">Unregister</a>'; 
			}
		else{
			echo'<button  class="btn">Reg Confirmed</button>';
		}

echo'</div>';
}
?>
	</section>
	<section class="main clearfix">
	
		<div class="content">
		<?php 

		if ($value==1){  
		echo'<div class="container">';           
echo'<div class="well well-info">';
echo'<h2>Payment Recieved. Registration Conformed</h2>';
echo'</div>';
echo'</div>';
}
if(isset($_GET['clg']) && isset($_GET['name'])){
if ($grp>1) {
							echo "<h3>Enter Team Details</h3> <br>";
					   echo '<form action="myevent.php" method="post">';
					   if($clg!="Toc H Institute of Science and Technology") {
					    for($i=0;$i<$grp;$i++){
					      echo 'Enter teammate'.($i+1).' name : <input type="text" name="mate'.($i+1).'"><br>'; 
					     }
					   } else {
						  for($i=0;$i<$grp;$i++){
					      echo 'Enter teammate'.($i+1).' name : <input type="text" name="mate'.($i+1).'">'; 
                     echo'<select  name="dept'.($i+1).'" style="width:150px;">';
                     echo'<option value="" ></option>';
                     echo'<option value="CSE" >CSE</option>';
                     echo'<option value="ISE" >ISE</option>';
                     echo'<option value="Mech" >Mech</option>';
                     echo'<option value="Civil" >Civil</option>';
                     echo'<option value="EEE" >EEE</option>';
                     echo'<option value="ECE" >ECE</option>';
                     echo'<option value="MCA" >MBA</option>';
                     echo'</select> <br>';
                     }
                     }
					   echo '<input type="hidden" name="id" value="'.$id.'">';
					   echo '<input type="hidden" name="grp" value="'.$grp.'">';
					   echo '<button type="submit" class="btn btn-success" name="grps">Submit </button>';
					   echo '</form>';
}
}
?>
</div>
	</section><!-- end main -->
	    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
	
</body>
</html>