<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

include_once("connection.php"); // connection call

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
	$query = "SELECT `streg` FROM `validation_student` WHERE  `streg` = '$register_no'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	$query1="SELECT `semail_id` FROM `student` WHERE `semail_id`='$semail'";
     $result1= mysql_query($query1);
	$count1 = mysql_num_rows($result1);
	if($count == 1 && $count1== 0){
		
		mysql_query("INSERT INTO `student`(`sname`, `sgender`, `sdepartment`, `register_no`, `year`, `semail_id`, `spassword`) VALUES    ('$sname','$sgender','$sdepartment','$register_no','$year','$semail','$spassword')")
		
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
			<script>alert('Sorry Register No already taken ...');</script>
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
  <table width="757" height="460" border="1">
    <tr>
      <td width="512">Name</td>
      <td width="229"><label for="sname"></label>
      <input type="text" name="sname" id="sname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>Male <input type="radio"name="sgender" id="sgender1" value="male" />
     Female <input type="radio"name="sgender" id="sgender2" value="female" /></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="sdepartment"></label>
      <select name="dep"><option value="">--select--</option>
      <?php 
	  $query = "SELECT `department` FROM `department`";
	$result = mysql_query($query);
	while($row=mysql_fetch_array($result,MYSQLI_ASSOC)){?>
      <option value="<?php echo $row['department'];?>" >  <?php echo $row['department'];?> </option>
    
     <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>Register No</td>
      <td><label for="regno"></label>
      <input type="text" name="regno" id="regno" /></td>
    </tr>
    <tr>
      <td>Year of admission</td>
      <td><label for="year"></label>
      <input type="text" name="year" id="year" /></td>
    </tr>
    <tr>
      <td>Email id</td>
      <td><label for="semail"></label>
      <input type="text" name="semail" id="semail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="spassword"></label>
      <input type="password" name="spassword" id="spassword" /></td>
    </tr>
    <tr>
      <td>Re-Enter  Password</td>
      <td><input type="password" name="repassword" id="repassword" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="repassword"></label>
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