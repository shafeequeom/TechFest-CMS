<?php
include('connection.php');
$result=mysql_query("SELECT * FROM `student` ");

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
  <p>&nbsp;</p>
  <table width="1330" height="174" border="1">
    <tr>
      <td width="380">name</td>
      <td width="464">register no.</td>
      <td width="464">&nbsp;</td>
      <td width="464">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     <?php
  while($row=mysql_fetch_array($result))
{
	?><tr>
	
	

    <td><?php echo $row['sname']?></td>
    <td><?php echo $row['register_no']?></td>
    <td><a href="delete.php?id=<?php echo $row['id']?>">delete</a></td>
    <td><a href="edit.php?id=<?php echo $row['id']?>">edit</a></td>
    <?php
}
?>

  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>