<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');

$clgquery=mysql_query("SELECT name FROM college");
$eventquery=mysql_query('SELECT name FROM events WHERE name<>"none" AND status=0 order by name');

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
                  <h4 style="float:left; width:20%; margin-left:23px;">Add Event</h4>
 
                 
                  <br/><br/><br/>
               <div id="insideblock">
                 <form action="newevent.php" method="post">
                 <div class="form-group">
                 <label for="name">Name*</label>
                 <input type="text" class="form-control" id="name" placeholder="Event Name" name="name">
                 </div>
                 <div class="form-group">
                 <label for="Category">Category*</label>
                 <select name="category" style="width:150px;">
                     <option value="Technical" >Technical</option>
                     <option value="Cultural" >Cultural</option>
                     <option value="Fun" >Fun</option>
                     <option value="Sports" >Sports</option>
                 </select>
                 </div>
                 <div class="form-group">
                 <label for="Size">Grp Size</label>
                 <input type="text" class="form-control" id="size" placeholder="Event Size" name="size">
                 </div>
                                  <div class="form-group">
                 <label for="home">Fee Home</label>
                 <input type="text" class="form-control" id="home" placeholder="Home Fee" name="home">
                 </div>
                                                   <div class="form-group">
                 <label for="host">Fee</label>
                 <input type="text" class="form-control" id="fee" placeholder="Fee" name="host">
                 </div>
                  <div class="form-group">
                 <label for="fprize">First Prize</label>
                 <input type="text" class="form-control" id="fprize" placeholder="First Prize" name="fprize">
                 </div>
                                   <div class="form-group">
                 <label for="sprize">Second Prize</label>
                 <input type="text" class="form-control" id="sprize" placeholder="Second Prize" name="sprize">
                 </div>
                 <div class="form-group">
                 <label for="Date">Date</label>
                 <select name="date" style="width:150px;">
                   <option value="24-02-2016" >Day 1</option>
                  <option value="25-02-2016" >Day 2</option>
                    <option value="26-02-2016" >Day 3</option>
                 </select>
                 </div>
                                  <div class="form-group">
                 <label for="Location">Location</label>
                 <input type="text" class="form-control" id="location" placeholder="location" name="location">
                 </div>

                           <div class="form-group">
                 <label for="Discription">Discrition</label>
                 <textarea  name="discription" style="width:300px;"></textarea>
                 </div>


               
      
   				 <button type="submit" class="btn btn-primary">Add</button>
		         </form>
              
               </div>
            

				  
              
             
                 
               </div>
        
        <div id="footer"> <p id="leftContent">Advay Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>