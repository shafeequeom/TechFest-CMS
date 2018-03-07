<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once("connection.php"); // connection call

$id=$_GET['id'];
$result = mysql_query("SELECT * FROM `online_examination`.`student` WHERE `student`.`id` = '$id'");
$row = mysql_fetch_array($result);

if(isset($_POST['submit']))
{   
    //(mysql_real_escape_string) to prevent sql ejection 
	
	// ** variable declaration **
	
	$sname = mysql_real_escape_string($_POST['sname']); 
	$sgender = mysql_real_escape_string($_POST['sgender']);
	$sdepartment=  mysql_real_escape_string($_POST['sdepartment']);
	$register_no =mysql_real_escape_string($_POST['regno']); 
	$year= mysql_real_escape_string($_POST['year']);  
	$semail = mysql_real_escape_string($_POST['semail']);
	$spassword = md5(mysql_real_escape_string($_POST['spassword']));  //  md5 used to encripte the password
	$repassword = md5(mysql_real_escape_string($_POST['repassword']));
	
	// ****************************************   //
	
	// (trim) used to avoid white space btween words
	$semail = trim($semail);
	// *********************//
	    // email exist or not
	$query = "SELECT `semail_id` FROM `student` WHERE `semail_id`= '$semail' AND `id`='$id'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 1){
		
		mysql_query("UPDATE `student` SET`sname`='$sname',`sgender`='$sgender',`sdepartment`='$sdepartment',`register_no`='$register_no',`year`='$year',`semail_id`='$semail' WHERE `student`.`id` = '$id'")
		
			?>
            <script>alert('successfully registered ');</script>
			<?php
	
		/*else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}	*/	
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}
	
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="757" height="460" border="1">
    <tr>
      <td width="512">Name</td>
      <td width="229"><label for="sname"></label>
      <input type="text" name="sname" id="sname" value="<?php echo $row['sname'] ?>" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label for="sgender"></label>
      <input type="text" name="sgender" id="sgender" value="<?php echo $row['sgender'] ?>" /></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="sdepartment"></label>
      <input type="text" name="sdepartment" id="sdepartment" value="<?php echo $row['sdepartment'] ?>" /></td>
    </tr>
    <tr>
      <td>Register No</td>
      <td><label for="regno"></label>
      <input type="text" name="regno" id="regno" value="<?php echo $row['register_no'] ?>" /></td>
    </tr>
    <tr>
      <td>Year of admission</td>
      <td><label for="year"></label>
      <input type="text" name="year" id="year" value="<?php echo $row['year'] ?>" /></td>
    </tr>
    <tr>
      <td>Email id</td>
      <td><label for="semail"></label>
      <input type="text" name="semail" id="semail" value="<?php echo $row['semail_id'] ?>" /></td>
    </tr>
    
        <input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>