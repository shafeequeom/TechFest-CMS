<!DOCTYPE html>
<html>
<?php
session_start();
include('db.php');
$name = $_GET["name"];

$query=mysql_fetch_array(mysql_query("SELECT * FROM events WHERE name='$name'"));
$cord=mysql_query("SELECT name,contact_no FROM coordinators where event_name='$name' and role=1");
if(isset($_SESSION['email'])){ 
	$email=$_SESSION['email'];
	  $online=mysql_query("SELECT * FROM registration WHERE email='$email' AND eventname='$name'");
  $num=mysql_num_rows($online);  

	$email=$_SESSION['email'];
	 $regg=mysql_fetch_array(mysql_query("SELECT * FROM online WHERE email='$email'"));
$clg=$regg[2];
$usn=$regg[4];
$ct=$regg[3];
$regd=date('Y-m-d');
$regname=$regg[0];
$id=uniqid();

	$url = "http://localhost/advay/event/myevent.php?name=$name&email=$email&clg=$clg&usn=$usn&ct=$ct&regname=$regname&id=$id&grp=$query[4]";
}
	$idd=$query[0];
	$next=mysql_fetch_array(mysql_query("SELECT * FROM events WHERE id > '$idd' and status=0 ORDER BY id LIMIT 1"));
		$previous=mysql_fetch_array(mysql_query("SELECT * FROM events WHERE id < '$idd' and status=0 ORDER BY id LIMIT 1"));
?>

<head>
	<title>Advay 16 Event | <?php echo $name ?></title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

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

		<section class="top">
			<?php
			echo'<img src="http://localhost/advay/admin/'.$query[17].'" class="top" alt=""/>';	?>
			<div class="wrapper content_header clearfix">
				<div class="work_nav">
							
					<ul class="btnn clearfix">
						<?php
						if(isset($previous[1])){
						echo '<li><a href="inner.php?name='.$previous[1].'" class="previous" data-title="Previous"></a></li>';
				}
				
						echo'<li><a href="index.php" class="grid" data-title="Portfolio"></a></li>';	
						if(isset($next[1])){	
						echo'<li><a href="inner.php?name='.$next[1].'" class="next" data-title="Next"></a></li>';
						}
						?>
					</ul>							
					
				</div><!-- end work_nav -->
				<h1 class="title"><?php echo $query[1]; ?></h1>
			</div>		
		</section><!-- end top -->

		<section class="wrapper">
			<div class="content">
			 <p><?php echo $query[15]; ?></p>
<?php
echo'<div class="container">';

echo '<table class="table table-bordered table-hover">';
echo'<tr>';
echo'<td>Category</td>';
echo'<td>'.$query[2].'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Event Date</td>';
echo'<td>'.$query[3].'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>No of Participants </td>';
echo'<td>'.$query[4].'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Registration Fee(TIST)</td>';
echo'<td>'.$query[5].'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Registration Fee(Other Collges)</td>';
echo'<td>'.$query[6].'</td>';
echo'</tr>';
echo'<tr class="info">';
echo'<td>First Prize</td>';
echo'<td>'.$query[7].'</td>';
echo'</tr>';
echo'<tr class="warning">';
echo'<td>Second Prize</td>';
echo'<td>'.$query[8].'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Event Location</td>';
echo'<td>'.$query[14].'</td>';
echo'</tr>';
echo'<tr>';
echo'<th>Event coordinators</th>';
echo'<th>Contact</th>';

echo'</tr>';

while($coor=mysql_fetch_array($cord)){
	echo'<tr>';

echo'<td>'.$coor[0].'</td>';
echo'<td>'.$coor[1].'</td>';

echo'</tr>';

}
if ($query[9]!=0) {
echo'<tr>';
echo'<th>Winner Reg No</th>';
echo'<th>'.$query[9].'</th>';

echo'</tr>';
}
if ($query[11]!=0) {
echo'<tr>';
echo'<th>Runner Reg No</th>';
echo'<th>'.$query[11].'</th>';

echo'</tr>';
}
echo '</table>';
echo'</div>';
		if(isset($_SESSION['email']) and $num==1){
			echo '<a href="myevent.php?del='.$name.'"  class="btn btn-danger btn-block btn-lg">Un Register</a>';
		}
		elseif(isset($_SESSION['email'])){ 
echo '<a href="'.$url.'" class="bt
n btn-success btn-block btn-lg">Register</a>';
		}
			else{
							echo	'<a href="login.php"  class="btn btn-warning btn-block btn-lg">Please Signin/Signup To Register</a>';
						}

?>


			</div><!-- end content -->
		</section>
	</section><!-- end main -->
	
</body>
</html>