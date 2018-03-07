
<?php

include('db.php');
error_reporting(E_ALL);
require("PHPMailer_5.2.4/class.phpmailer.php");
 


 $message='<p align="right">
    <strong>ITI Limited</strong>
</p>
<p align="right">
    <strong>Dooravaninagar,</strong>
</p>
<p align="right">
    <strong>Bangalore-560 016</strong>
</p>
<p align="right">
    <strong> Phone: 080-28593678</strong>
</p>
<p align="right">
    Email: <strong>pro_bg@itiltd.co.in</strong> <strong>/ www.itiltd-india.com</strong>
</p>
<p>
    Our Ref: AET/16/PJT/8122 Date 20/08/2016
</p>
<p>
    <strong>
        The Prof &amp; Head /Principal
        <br/>
        Toc H Institute of Science &amp; Technology
        <br/>
        Kerala
    </strong>
</p>
<p>
    Dear Sir/Madam,
</p>
<p>
    Sub: <strong><u>INDUSTRIAL VISIT IN ITI LIMITED, BANGALORE-560 016</u></strong>
</p>
<p>
    We are pleased to inform you that we are agreeable to provide Industrial visit to the students as mentioned in your list 46 Students studying in your
    College/Institution along with 2 teachers. The visit will commence on <strong>23th August 2016</strong>. Please advise the students to report at Reception
    by 10.00 AM on the Scheduled date.
</p>
<p>
    Please ensure that the data/information collected by your students is used only for academic purpose.
</p>

<p>
    <strong>Please confirm through return Email or Telephone regarding your attendance immediately. </strong>
</p>
<p>
    For any more information you could get in touch with Mr. Reghu B G , DGM, 08025657990.
</p>
<p>
    Thanking you,
</p>
<br/>
<p>
    Yours faithfully
</p>
<br/>
<p>
    For
</p>
<strong>ITI Limited</strong>
<br/>
<strong>DGM –PRO(B)</strong>'; 


$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPDebug  = 2; 
$mail->From = "bhasker@itiltd.co.in";
$mail->FromName = "Bhasker";
$mail->Host = "sg2plcpnl0183.prod.sin2.secureserver.net"; // specif smtp server
$mail->SMTPSecure= "ssl"; // Used instead of TLS when only POP mail is selected
$mail->Port = 465; // Used instead of 587 when only POP mail is selected
$mail->SMTPAuth = true;
$mail->Username = "mail@xidtindia.com"; // SMTP username
$mail->Password = "Xidtindia2016"; // SMTP password
$mail->AddAddress( "treesaami@gmail.com", "Amanda George"); //replace myname and mypassword to yours
$mail->AddReplyTo("pro_bg@itiltd.co.in", "ITL LIMITED");
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
//$mail->AddAttachment("c:/temp/11-10-00.zip");

$mail->IsHTML(true); // set email format to HTML
$mail->Subject = "INDUSTRIAL VISIT  IN  ITI  LIMITED,  BANGALORE-560 016";
$mail->Body = $message;
if($mail->Send()) {echo "Send mail successfully";}
else {echo "Send mail fail";} 

?>
