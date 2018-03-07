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
	
	$faname = mysql_real_escape_string($_POST['faname']); 
	
	$faemp =mysql_real_escape_string($_POST['faemp']); 
	
	
	// ****************************************   //
	
	// (trim) used to avoid white space btween words
	$faemp = trim($faemp);
	// *********************//

    // email exist or not
	$query = "SELECT  `faemp` FROM `validation_faculty` WHERE `faemp` = '$faemp'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	if($count == 0){
		
		mysql_query("INSERT INTO `validation_faculty`(`faname`, `faemp`) VALUES ('$faname','$faemp')")
		
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
			<script>alert('Sorry Employee ID already taken ...');</script>
			<?php
	}
	
}
?>

<?php
$result=mysql_query("SELECT * FROM `validation_faculty` ");

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
  <p>&nbsp;</p>
  <table width="568" height="191" border="1">
    <tr>
      <td width="258">Name</td>
      <td width="294">Employee ID</td>
    </tr>
    <tr>
      <td><input type="text" name="faname" id="faname" /></td>
      <td><input type="text" name="faemp" id="faemp" /></td>
    </tr>
    <tr>
      <td colspan="2"><label for="faname"></label>        <label for="faemp"></label><div align="center">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="1330" height="174" border="1">
    <tr>
      <td width="380">name</td>
      <td width="464">employee_id.</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php
  while($row=mysql_fetch_array($result))
{
	?>
    <tr>
      <td><?php echo $row['faname']?></td>
      <td><?php echo $row['faemp']?></td>
      <?php
}
?>
    </tr>
  </table>
  <p></p>
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