<!DOCTYPE html>
<html lang="en">
<head>
        <title>Advay Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap-modal.js"></script> 
        <script type="text/javascript">
    $(window).load(function(){
        $('#regform').modal('show');
    });
</script>  
    </head>

    <head>
        <title>Advay 16</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap-modal.js"></script>   
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
<?php
session_start();
    $name = "";
    if(isset($_POST['name'])){
        $_SESSION['name'] = $_POST['name'];
    }
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');

function clean_string($string) {
      $bad = array(";","<",">","$");
      return str_replace($bad,"",$string);
}

if(isset($_POST['name'])){
  if(!isset($_POST['name']) ||
        !isset($_POST['category']) ||
        !isset($_POST['date']) ||
        !isset($_POST['location']) ||
        !isset($_POST['discription'])) {
    echo "There were error(s) found with the form you submitted. ";
        die();       
    }
$name= $_POST['name'];
$name = clean_string($name);
echo $name;
$_SESSION['name'] = $_POST['name'];
$category= $_POST['category'];
$category= clean_string($category);
echo $category;
$size = $_POST['size'];
$size = clean_string($size);
echo $size;
$date = $_POST['date'];
$date = clean_string($date);
echo $date;
$location = $_POST['location'];
$location = clean_string($location);
echo $location;
$discription = $_POST['discription'];
$discription = clean_string($discription);
echo $discription;
$first= $_POST['fprize'];
$second= $_POST['sprize'];
$feehome=$_POST['home'];
$feehost= $_POST['host'];

$sql="INSERT INTO events(name,category,groupSize,timing,location,Discription,feeHome,feeRemote, firstCashPrize,secondCashPrize) VALUES('$name','$category','$size','$date','$location','$discription','$feehome','$feehost','$first','$second')";
    mysql_query('SET FOREIGN_KEY_CHECKS=0');

    mysql_query($sql); 
    mysql_query('SET FOREIGN_KEY_CHECKS=1');

    }
    if (isset($_POST['ievent'])) {
      $event=$_POST['ievent'];
      $_SESSION['name']= $event;
    }
?>

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
                  <h4 style="float:left; width:20%; margin-left:23px;">Step 2 Image</h4>

                  <br/><br/><br/>
               <div id="insideblock">
               <form action="saveimage.php" enctype="multipart/form-data" method="post">

<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr>
<td>
                     <label>Thumb Image</label>
<input name="uploadedimage" type="file">
</td>
<td>
                         <label>Main Image</label>
<input name="uploadedimaget" type="file">
</td>

</tr>

<tr>
<td>
<input name="Upload Now" type="submit" value="Upload Image">
</td>
</tr>


</tbody></table>

</form>
              
               </div>                 
               </div>
        
        <div id="footer"> <p id="leftContent">Advay Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>    