

<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/
include("connection.php");
$testid = 1;
$cn=mysql_connect("localhost","root","");
if(isset($_POST["submit"]))
	{		
		
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';
// This is the file path to be uploaded.
$inputFileName = 'question.xlsx'; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for($i=2;$i<=$arrayCount;$i++){
$question = trim($allDataInSheet[$i]["A"]);
$answer1 = trim($allDataInSheet[$i]["B"]);
$answer2 = trim($allDataInSheet[$i]["C"]);
$answer3 = trim($allDataInSheet[$i]["D"]);
$answer4 = trim($allDataInSheet[$i]["E"]);
$answer = trim($allDataInSheet[$i]["F"]);




$insertTable= mysql_query("INSERT INTO `online_examination`.`question` (
`testid` ,
`ques` ,
`ans1` ,
`ans2` ,
`ans3` ,
`ans4` ,
`ans`
)
VALUES ( '1', '$question', '$answer1', '$answer2', '$answer3', '$answer4', '$answer')",$cn);
header("Location:AddQues.php");
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="AdminHome.php">Admin Home</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="Subject.php">Add Subject</a></li>
        <li class="active"><a href="Test.php">Add Test</a></li>
        <li><a href="AddQues.php">Add Question</a></li>
        <li><a href="ViewUser.php">View User</a></li>
        <li><a href="AdminReg.php">Admin Registration</a></li>
        <li><a href="Mark.php">User Performance</a></li>
      </ul>
    </div>
  </div>
</nav>


<form name="import" method="post" action="" enctype="multipart/form-data">

	Click submit store data in mysql
 <input type="submit" name="submit" value="Submit" style="margin-left:100px;"/>
    </form>
</html>
</body>

  