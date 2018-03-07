<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');

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
            <?php
            if (isset($_SESSION['editevent'])) {
          
            echo '<div class="well">';
             echo'<h4>Event Details Updated for '.$_SESSION['editevent'].'</h4>';
            echo'</div>';
            unset($_SESSION['editevent']);
          }
            ?>
                  
               <div id="insideblock">
                <h4>ADD EVENT</h4>
                  <form action="addevent.php"> <button style="margin-left:30px;" type="submit" class="btn btn-primary">Add Event</button> </form>
                   <h4>EDIT EVENT</h4>
                  <form action="edit.php"> <button style="margin-left:30px;" type="submit" class="btn btn-primary btn-lg">Edit Event</button> </form>
                                     <h4>SET WINNER AND RUNNER</h4>
                  <form action="winner.php"> <button style="margin-left:30px;" type="submit" class="btn btn-primary btn-lg">Set Winner</button> </form>
                  <br/><br/><br/>
                </div>      
              

        </div>
        
        <div id="footer"> <p id="leftContent">Advay Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>