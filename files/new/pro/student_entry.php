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
	
	$stname = mysql_real_escape_string($_POST['stname']); 
	
	$streg =mysql_real_escape_string($_POST['streg']); 
	
	
	// ****************************************   //
	
	// (trim) used to avoid white space btween words
	$streg = trim($streg);
	// *********************//

    // email exist or not
	$query = "SELECT `streg` FROM `validation_student` WHERE  `streg` = '$streg'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	if($count == 0){
		
		mysql_query("INSERT INTO `validation_student`(`stname`, `streg`) VALUES ('$stname','$streg')")
		
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
			<script>alert('Sorry Register no already taken ...');</script>
			<?php
	}
	
}
?>

<?php
$result=mysql_query("SELECT * FROM `validation_student` ");

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
      <td width="294">Reg No</td>
    </tr>
    <tr>
      <td><input type="text" name="stname" id="stname" /></td>
      <td><input type="text" name="streg" id="streg" /></td>
    </tr>
    <tr>
      <td colspan="2"><label for="stname"></label>        <label for="streg"></label><div align="center">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="1330" height="174" border="1">
    <tr>
      <td width="380">name</td>
      <td width="464">register no.</td>
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
      <td><?php echo $row['stname']?></td>
      <td><?php echo $row['streg']?></td>
      <?php
}
?>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>