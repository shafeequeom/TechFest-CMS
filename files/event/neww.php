<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');

$query=mysql_fetch_array(mysql_query("SELECT * FROM events"));

?>
<html lang="en">
    <head>
        <title>Fest Management System</title>
        <meta charset="UTF-8" />

    </head>
    <body>
    	
                
               
         


      <?php echo $query[1]; ?> <br><br>

            
       
    </body>
</html>