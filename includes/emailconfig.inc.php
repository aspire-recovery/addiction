<?php

require '../phpmail/PHPMailerAutoload.php';

$mail = new PHPMailer;

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->IsSMTP();        //Sets Mailer to send message using SMTP
$mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
$mail->Port = '587';        //Sets the default SMTP server port
$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = 'aspirerecovery173@gmail.com';     //Sets SMTP username
$mail->Password = 'H79psGH7';     //Sets SMTP password
$mail->SMTPSecure = 'STARTTLS';       //Sets connection prefix. Options are "", "ssl" or "tls"

$mail->From = 'aspirerecovery173@gmail.com';   //Sets the From email address for the message
$mail->FromName = 'Aspire Recovery';   //Sets the From name of the message


?>