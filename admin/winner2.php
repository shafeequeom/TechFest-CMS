<!DOCTYPE html>
<?php
session_start();
include('db.php');

if(!isset($_SESSION['username'])){
header("location:index.php");
}
if (isset($_POST['submit'])) {
  $event=$_POST['event'];
  $_SESSION['mevent']=$event;
$query=mysql_query("SELECT name,id FROM registration where eventname='$event' order by name");
$query1=mysql_query("SELECT name,id FROM registration where eventname='$event' order by name");

}
if(isset($_POST['email']))
 {
 $event = $_SESSION['mevent'];
 $winnerid=$_POST['winner'];
 $runnerid=$_POST['runner'];
 $winnerc=mysql_fetch_array(mysql_query("SELECT contactno FROM registration where id='$winnerid' and eventname='$event'"));
 $runnerc=mysql_fetch_array(mysql_query("SELECT contactno FROM registration where id='$runnerid' and eventname='$event'"));
 $winner=$winnerc[0];
  $runner=$runnerc[0];
  echo $runner;
$sql="UPDATE events SET winnerreg='$winnerid',winnercontactno='$winner',runnerreg='$runnerid', runnercontactno='$runner' where name='$event'";
$sqlquery=mysql_query($sql);
}

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
                  <h4 style="float:left; width:20%; margin-left:23px;">Select Winner and Runner</h4>
 
                 
                  <br/><br/><br/>
               <div id="insideblock">
                 <form action="win.php" method="post">
                  <div class="form-group">
                 <label for="winner">Winner Name - Reg ID</label>
                 <select name="winner" style="width:150px;">
                  <?php 
         while ($row = mysql_fetch_array($query)) {
                echo '<option value="'.$row[1].'">'.$row[0]."-".$row[1].'</option>';
         }
          ?>

                 </select>
                 </div>
                            <div class="form-group">
                 <label for="runner">Runner Name - Reg ID</label>
                 <select name="runner" style="width:150px;">
                  <?php 
         while ($roww = mysql_fetch_array($query1)) {
                echo '<option value="'.$roww[1].'">'.$roww[0]."-".$roww[1].'</option>';
         }
          ?>

                 </select>
                 </div>
                
   				 <button type="submit" class="btn btn-primary" name="email">Go</button>
		         </form>
              
               </div>
            

				  
              
             
                 
               </div>
        
        <div id="footer"> <p id="leftContent">Advay Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>