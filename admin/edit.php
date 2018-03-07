<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
$eventquery=mysql_query('SELECT name FROM events order by name');
$event=mysql_query('SELECT name FROM events order by name');

?>
<html lang="en">
    <head>
        <title>Advay Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap-modal.js"></script>   
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>

    </head>
    <body onload='show_select()'>
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
 
                 
                  <br/><br/><br/>
               <div id="insideblock">
                                 <h4 style="float:left; width:20%; margin-left:23px;">EDIT EVENT DETAILS</h4>

                 <form action="editevent.php" method="post">
                  <div class="form-group">
                 <label for="event">Event*</label>
                 <select name="event" style="width:150px;">
                  <?php 
         while ($row = mysql_fetch_array($eventquery)) {
                echo '<option value="'.$row[0].'">'.$row[0].'</option>';
         }
          ?>

                 </select>
                 </div>
                
   				 <button type="submit" class="btn btn-primary" name="submit">EDIT</button>
		         </form>
              
                  <h4 style="float:left; width:20%; margin-left:23px;">EDIT EVENT IMAGE</h4>
 
                 
                  <br/><br/><br/>
                 <form action="newevent.php" method="post">
                  <div class="form-group">
                 <label for="event">Event*</label>
                 <select name="ievent" style="width:150px;">
                  <?php 
         while ($roww = mysql_fetch_array($event)) {
                echo '<option value="'.$roww[0].'">'.$roww[0].'</option>';
         }
          ?>

                 </select>
                 </div>
                               <h4 style="float:left; width:20%; margin-left:23px;"></h4>
   
           <button type="submit" class="btn btn-primary" name="submit">EDIT IMAGE</button>
             </form>
              
               </div>
                 </div>
        <div id="footer"> <p id="leftContent">Advay Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>