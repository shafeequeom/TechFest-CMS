<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

include_once("connection.php"); // connection call

if(isset($_POST['Submit']))
{   
    //(mysql_real_escape_string) to prevent sql ejection 
	
	// ** variable declaration **
	
	$fname = mysql_real_escape_string($_POST['fname']); 
	$fgender = mysql_real_escape_string($_POST['fgender']);
	$fdepartment=  mysql_real_escape_string($_POST['fdepartment']);
	$employee_id =mysql_real_escape_string($_POST['employee_id']);   
	$femail = mysql_real_escape_string($_POST['femail']);
	$fpassword = md5(mysql_real_escape_string($_POST['fpassword']));  //  md5 used to encripte the password
	$repassword = md5(mysql_real_escape_string($_POST['repassword']));
	
	// ****************************************   //

    // (trim) used to avoid white space btween words
	$femail = trim($femail);
	// *********************//
	
	   // email exist or not
	$query = "SELECT `faemp` FROM `validation_faculty` WHERE  `faemp` = '$employee_id'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	$query1 = "SELECT `femail_id` FROM `faculty` WHERE `femail_id` = '$femail'";
	$result1 = mysql_query($query1);
	
	$count1 = mysql_num_rows($result1);
	if($count == 1 && $count1== 0 ){
		
		mysql_query("INSERT INTO `faculty`(`fname`, `fgender`, `fdepartment`, `employee_id`, `femail_id`, `fpassword`) VALUES ('$fname','$fgender','$fdepartment','$employee_id','$femail','$fpassword')")
		
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
			<script>alert('Sorry Emplyee ID already taken ...');</script>
			<?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/css-table.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="js/style-table.js"></script>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="702" height="456" border="1">
    <tr>
      <td width="375">Name</td>
      <td width="311"><label for="fname"></label>
      <input type="text" name="fname" id="fname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label for="fgender"></label>
      <input type="text" name="fgender" id="fgender" /></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="fdepartment"></label>
      <input type="text" name="fdepartment" id="fdepartment" /></td>
    </tr>
    <tr>
      <td>Employee ID</td>
      <td><label for="employee_id"></label>
      <input type="text" name="employee_id" id="employee_id" /></td>
    </tr>
    <tr>
      <td>Email ID</td>
      <td><label for="femail"></label>
      <input type="text" name="femail" id="femail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="fpassword"></label>
      <input type="password" name="fpassword" id="fpassword" /></td>
    </tr>
    <tr>
      <td>Re_Enter password</td>
      <td><input type="password" name="repassword" id="repassword" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><p>
        <label for="repassword"></label>
        <input type="submit" name="Submit" id="Submit" value="Submit" />
      </p></td>
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