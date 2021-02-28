<?php
// Imports
require 'config.php';
session_start();
//Data Fetch
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$addiction = $_POST['addiction'];

echo $name, $email, $password, $phone, $gender, $addiction;


// OTP Generation
$otp = rand(000000, 999999);
$_SESSION["OTP"] = $otp;
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
$_SESSION["password"] = $password;
$_SESSION["phone"] = $phone;
$_SESSION["gender"] = $gender;
$_SESSION["addiction"] = $addiction;


// Sending Otp Through Mail
require 'emailconfig.php';


$mail->addAddress($email, 'Person Name');     // Add a recipient

// $mail->addReplyTo('info@example.com', 'Information');
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'OTP';
// Message
$mail->Body .= '<h3 style="color:black;">OTP:-  ' . $_SESSION["OTP"] . '</h3>';

if ($mail->send()) {

    echo 'Success.';
    header('location:verify_otp.php');

} else {

    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    header('location:index.php');
}


?>
