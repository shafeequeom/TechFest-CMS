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
if(!isset($_POST['dateto']) && !isset($_POST['datefrom']) && !isset($_POST['username'])) {
	echo "There were error(s) found with the form you submitted. ";
        die();       
    }
	$timeto = clean_string($_POST['timeto']).":00";
	$timefrom = clean_string($_POST['timefrom']).":00";
	$dateto = clean_string($_POST['dateto'])." ";
	$datefrom = clean_string($_POST['datefrom'])." ";
	$username = clean_string($_POST['username']);
	$query=mysql_fetch_array(mysql_query("SELECT sum(amount) FROM `appuser_transactions` WHERE appuserid='$username' AND time BETWEEN '$datefrom.$timefrom' AND '$dateto.$timeto'"));
	
?>
<html lang="en">
    <head>
        <title>Advay Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
    </head>
    <body>
    	<div id="header"> 
        </div>
        
        <div class="container">
            <div class="content">
               <nav class="dr-menu">
						<div class="dr-trigger"><span id="dr-icon" class="fa fa-bars"></span><a class="dr-label">Menu</a></div>
            <ul>
              <li><a id="dr-icon" class="fa fa-compass"  href="home.php">Dashboard</a></li>
              <li><a id="dr-icon" class="fa fa-check-square-o" href="registration.php">Registration</a></li>
              <li><a id="dr-icon" class="fa fa-bar-chart-o" href="reporting.php">Reporting</a></li>
              <li><a id="dr-icon" class="fa fa-pencil" href="events.php">Events</a></li>
              <li><a id="dr-icon" class="fa fa-pencil" href="edithome.php">Events Edits</a></li>
              <li><a id="dr-icon" class="fa fa-pencil" href="coordinator.php">Supporters</a></li>
              <li><a id="dr-icon" class="fa fa-phone" href="email.php">Notification</a></li>
              <li><a id="dr-icon" class="fa fa-phone" href="contact.php">Contact Us</a></li>
              <li><a id="dr-icon" class="fa fa-power-off" href="logout.php">Logout</a></li>
            </ul>
					</nav>
            </div><!-- content -->
            <div id="block">
                  <h4 style="float:left; width:14%; margin-left:23px;">Search Results</h4>
                  <br/><br/><br/>
               <div id="insideblock">
                  <?php 
				  echo $query[0];
				  ?>
              
               </div>
            </div>
        </div>
        
        <div id="footer"> <p id="leftContent">Advay Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>
   