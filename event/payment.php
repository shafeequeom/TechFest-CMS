<!DOCTYPE html>
<?php
  session_start();
  include('db.php');
  if(isset($_SESSION['email']) && isset($_GET['event'])){
  $email=$_SESSION['email'];
    $event=$_GET['event'];
    $_SESSION['pevent']=$event;
    $regis=$_GET['regid'];
    $_SESSION['preg']=$regis;
 
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
	<link rel="stylesheet" type="text/css" href="css/card.css">
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

<!-- end top -->
			<div class="content1">
						<div class="cardd">
<form action="myevent.php" method="post">
  <div class="form-container">
      <div class="personal-information">
        <h1>Payment Information</h1>
      </div> <!-- end of personal-information -->
 
     <div class="info">
        <h3>Payment Information</h3>
      </div>
    
    <div class="card-wrapper"></div>
      <input id="input-field" type="text" name="first-name" placeholder="First Name"/>
      

      
      <input id="input-field" type="text" name="number" placeholder="Card Number"/>
     
      <input id="column-left" type="text" name="expiry" placeholder="MM / YY"/>
        
      <input id="column-right" type="text" name="cvc" placeholder="CCV"/>
    
      <input id="input-button" type="submit" value="Submit"/>
    </form>
  </div> 
  </div>
	</section>
        <script src="js/index.js"></script>
	<script src='js/jquery.min.js'></script>
<script src='js/cardd.js'></script>
<script src='js/jquery.card.js'></script>

        <script src="js/card.js"></script>
</body>
</html>





