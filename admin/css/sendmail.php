<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
error_reporting(E_ALL);
require("PHPMailer_5.2.4/class.phpmailer.php");
 

 $event = $_POST['event'];
 $query = $_POST['msg'];
 $subject = $_POST['sub'];


$mailreg=mysql_query("SELECT * FROM registration where eventname='$event'");

 $message="   
             
  $query <br>    

 ";


$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPDebug  = 2; 
$mail->From = "mail@advay.org";
$mail->FromName = "Advay 2k16";
$mail->Host = "smtp.gmail.com"; // specif smtp server
$mail->SMTPSecure= "ssl"; // Used instead of TLS when only POP mail is selected
$mail->Port = 465; // Used instead of 587 when only POP mail is selected
$mail->SMTPAuth = true;
$mail->Username = "shafeeque524@gmail.com"; // SMTP username
$mail->Password = "petwfdcdpckbsywq"; // SMTP password
$mail->AddAddress( "shafeeque19@gmail.com", "Advay"); //replace myname and mypassword to yours
$mail->AddReplyTo("mail@advay.org", "Advay");
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
//$mail->AddAttachment("c:/temp/11-10-00.zip");

$mail->IsHTML(true); // set email format to HTML
$mail->Subject = $subject;
$mail->Body = $message;
while($qry = mysql_fetch_array($mailreg)){
   $id= $qry[9];
   echo $id;
   $address = ($id);
   $mail->AddBcc($id);    
}
if($mail->Send()) {echo "Send mail successfully";}
else {echo "Send mail fail";} 

?>
