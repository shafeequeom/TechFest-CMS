<!DOCTYPE html>
<?php

  include('db.php');
        $name=$_POST['name'];

        $contact=$_POST['contact'];
     
        $usn = $_POST['usn'];

	$college=$_POST['college'];

	$password=md5($_POST['password']);

	$regemail=$_POST['regemail'];

        $regdate=date('Y-m-d');

	$sql="INSERT INTO online(name,password,college,contact,usn,date,email) VALUES('$name','$password','$college','$contact','$usn','$regdate','$regemail')";
	mysql_query($sql);
	$reg="INSERT INTO college(name) VALUES('$college')";
	mysql_query($reg);
?>
<html lang="en">
<head>
	<title>Advay 16 Event | <?php echo $name ?></title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
	<link rel="stylesheet" type="text/css" href="css/reset.css">
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
				<p>Copyright © 2016 Advay.</p>
				
			</div><!-- end rights -->
		</div ><!-- end footer -->
	</header><!-- end header -->

	<section class="main clearfix">

<!-- end top -->

		<section>
			<div class="content">
       <h1>Registration Successfull</h1>
       <?php
echo'<h2>Welcome '.$name.'<br> Thank You for being part of Advay 2016. Invite your friends from '.$college.' and other colleges<br> We will mail you at '.$regemail.' if there any updates or notification</h2>';
       							echo	'<a href="login.php"  class="btn btn-warning btn-block">Please Signin</a>';

       ?>
	</section><!-- end main -->
	    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
	
</body>
</html>





