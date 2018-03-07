<?php include('connection.php'); 
if(isset($_POST['submit'])){
	$userid = $_POST['userid'];
	$password = md5($_POST['password']);
	$result = mysql_query("SELECT * FROM `student` WHERE `semail_id`='$userid' AND `spassword`='$password'");
	$numrows = mysql_num_rows($result);
	if($numrows==1){
	header("Location:yourpage.php");		
		}
		else{
			echo"<script>alert('enter a valid');</script>";
			}
	}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/animate.css">



</head>

<body>


<div id="wrapper">
<div id="container">
<div align="center">
<div id="header">TocH Institute of Science and Technology</div>
<div class="top"> 
			<h1 id="title" class="hidden animated pulse"><span id="logo"> Online<span> Examination</span></span></h1>
           
		</div>
<div class="login-box animated" >
			<div class="box-header">
				<h2>Log In</h2>
			</div>

</div>
<div id="content">

<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="377" border="0" align="center">
    <tr>
      <td width="83">User ID</td>
      <td width="284"><label for="userid"></label>
      
      
      <input type="text" name="userid" id="userid" placeholder="Enter your email" /></td>
    </tr>
    <tr> 
      <td height="37">Password</td>
      <td><label for="password"></label>
      <input type="password" name="password" id="password" placeholder="Enter your password"/> </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="submit" id="submit" value="Login" class="login-btn" />
        <a href="#"><p class="small">Forgot your password?</p></a>
      </div></td>
    </tr>
</table>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</div>
</div>
</div>
</body>

</html>