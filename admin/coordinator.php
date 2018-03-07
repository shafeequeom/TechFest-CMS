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
            </ul>					</nav>
            </div><!-- content -->
            <div id="block">

                 
                  <br/><br/><br/>
               <div id="insideblock">
               <?php
               if (isset($_SESSION['cord'])) {
                echo '<div class=well>';
                echo'<p style="color:red;">Details Updated for '.$_SESSION['cord'].'</p>';
                echo'</div>';
               }
               unset($_SESSION['cord']);
?>                                  <h4 >COORDINATOR DETAILS</h4>

                 <form action="cord.php" method="post">
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
                                   <div class="form-group">
                 <label for="event">Role</label>
                 <select name="role" style="width:150px;">
<option value="1">Student-Coordinator</option>
<option value="0">Faculty-Coordinator</option>
<option value="2">Volunteer</option>
<option value="3">Judges</option>

                 </select>
                 </div>
              <div class="form-group" >
                 <label for="event">Number</label>
                 <select name="number" style="width:150px;">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>

                 </select>
                 </div>

   				 <button type="submit" class="btn btn-primary" name="submit" >Assign</button>

		         </form>
                                               <h4>EDIT COORDINATOR DETAILS</h4>

               <form action="cord.php" method="post">
                  <div class="form-group">
                 <label for="event">Event*</label>
                 <select name="evente" style="width:150px;">
                  <?php 
         while ($roww = mysql_fetch_array($event)) {
                echo '<option value="'.$roww[0].'">'.$roww[0].'</option>';
         }
          ?>

                 </select>
                 </div>
                                   <div class="form-group">
                 <label for="event">Role</label>
                 <select name="erole" style="width:150px;">
<option value="1">Student-Coordinator</option>
<option value="0">Faculty-Coordinator</option>
<option value="2">Volunteer</option>
<option value="3">Judges</option>

                 </select>
                 </div>


           <button type="submit" class="btn btn-primary" name="edit">GO</button>
             </form>
               </div>
                 </div>
        <div id="footer"> <p id="leftContent">Advay Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>