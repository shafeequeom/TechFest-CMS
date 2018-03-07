<!DOCTYPE html>
<?php
include('db.php');
session_start();
if (isset($_GET["category"])) {
$category=$_GET["category"];
if ($category=="Technical") {
	$query=mysql_query("SELECT * FROM events WHERE status=0 and category='Technical'");
			}
elseif ($category=="Cultural") {
	$query=mysql_query("SELECT * FROM events WHERE status=0 and category='Cultural'");
			}
elseif ($category=="Sports") {
	$query=mysql_query("SELECT * FROM events WHERE status=0 and category='Sports'");
			}
elseif ($category=="Cultural") {
	$query=mysql_query("SELECT * FROM events WHERE status=0 and category='Cultural'");
			}
elseif ($category=="Fun") {
	$query=mysql_query("SELECT * FROM events WHERE status=0 and category='Fun'");
		}
				}
else{
	$query=mysql_query("SELECT * FROM events WHERE status=0");

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
		   <?php
                      while ($row = mysql_fetch_array($query)) {
        echo'<div class="work">';
			echo '<a href="inner.php?name='.$row[1].'">';
				echo'<img src="http://localhost/advay/admin/'.$row[16].'" class="media" alt=""/>';
				echo'<div class="caption">';
					echo'<div class="work_title">';
						 echo "<h1>$row[1]</h1>";
					echo'</div>';
				echo'</div>';
			echo'</a>';
		echo'</div>';
	}
		?>

	</section><!-- end main -->
	
</body>
</html>