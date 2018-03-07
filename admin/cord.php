<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
if (isset($_POST['submit'])) {
  $number=$_POST['number'];
  $role=$_POST['role'];
  $event=$_POST['event'];
  }

if (isset($_POST['edit'])) {
  $role=$_POST['erole'];
    $event=$_POST['evente'];

  $number=mysql_num_rows(mysql_query("SELECT * FROM coordinators where event_name='$event' and role='$role'"));
  $sql=mysql_query("SELECT name,contact_no FROM coordinators where event_name='$event' and role='$role'");

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
                                  <h4 style="float:left; width:20%; margin-left:23px;">COORDINATOR DETAILS</h4>

                 
                  <br/><br/><br/>
               <div id="insideblock">

                 
                 <?php 
                 if (isset($_POST['submit'])) {
           echo'<form action="cord2.php" method="post">';
for($i=0;$i<$number;$i++){
   echo'<div class="form-group">';
                echo 'Enter Name'.($i+1).' Name : <input type="text" name="name'.($i+1).'">';  
                    echo'</div>';
                       echo'<div class="form-group">';
                echo 'Enter Contact'.($i+1).' Contact : <input type="text" name="contact'.($i+1).'">';  
                    echo'</div>';     
                    }                 
             echo '<input type="hidden" name="role" value="'.$role.'">';
             echo '<input type="hidden" name="number" value="'.$number.'">';
             echo '<input type="hidden" name="event" value="'.$event.'">';


   				 echo'<button type="submit" class="btn btn-primary" name="cord">Assign</button>';
		         echo'</form>';
}


                 if (isset($_POST['edit'])) {
           echo'<form action="cord2.php" method="post">';
$i=0;
while(($i<$number) && ($name=mysql_fetch_array($sql))){
   echo'<div class="form-group">';
                echo 'Enter Name'.($i+1).' Name : <input type="text" name="ename'.($i+1).'" value="'.$name[0].'">';  
                    echo'</div>';
                       echo'<div class="form-group">';
                echo 'Enter Contact'.($i+1).' Contact : <input type="text" name="econtact'.($i+1).'" value="'.$name[1].'">';  
                    echo'</div>';     
                    $i++;
                    }                 
             echo '<input type="hidden" name="role" value="'.$role.'">';
             echo '<input type="hidden" name="number" value="'.$number.'">';
             echo '<input type="hidden" name="event" value="'.$event.'">';


           echo'<button type="submit" class="btn btn-primary" name="edit">Assign</button>';
             echo'</form>';
}

?>                   
               </div>
                 </div>
        <div id="footer"> <p id="leftContent">Advay Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>