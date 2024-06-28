<?php
$today = date("d-m-Y");
    $firstname= $_POST["firstname"];
    $lastname= $_POST["lastname"];
    $phonenumber = $_POST["phonenumber"];
    $email= $_POST["email"];
    $subject= $_POST["subject"];
    $message= $_POST["message"];
	
if ($_REQUEST['submit']){
    $message .= "<h3>Message from QO-BOX website</h3><br/><p>Customer Name: ".$firstname.$lastname."<br/><p>Phonenumber:".$phonenumber."<br/><p>Email: ".$email."<br><p>Subject".$subject."<br><p>Message: ".$message."<br>";
}

require("/home/qoboxcom/public_html/PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "qo-box.com";
$mail->SMTPAuth = true;
$mail->Username = "mailer@qo-box.com";  // SMTP username
$mail->Password = "i4Ds(!kG9J";              // SMTP password
$mail->From = "mailer@qo-box.com";
$mail->Port = 25;                            // set the SMTP port
$mail->AddAddress("jay@qo-box.com");
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->SMTPDebug  = 1;


	
		$mail->Subject = $subject;

	
$mailBody = "Hello,<br/><br/>";
$mailBody .= "You have received enquiry:<br/><br/>";
$mailBody .= "First name: ".$firstname."<br/><br/><br/>";
$mailBody .= "Last name: ".$lastname."<br/><br/>";

$mailBody .= "Phone number: ".$phonenumber."<br/><br/>";
$mailBody .= "Please respond to the customer within 30 minutes on the following<br/><br/>";
$mailBody .= "Message is: ".$message."<br/><br/>";
$mailBody .= "Warm regards,<br/><br/>";
$mailBody .= "CODXD ROBOT.";


$mail->Body    = $mailBody;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
} else {
        header("Location: http://qo-box.com/index.html");

}
?> 
        
       
 