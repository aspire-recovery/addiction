<?php
// Imports
require 'config.php';
session_start();
//Data Fetch
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

echo $name, $phone, $email, $password, $gender;


// OTP Generation
$otp = rand(000000, 999999);
echo $_SESSION["OTP"] = $otp;
echo $_SESSION["name"] = $name;
echo $_SESSION["phone"] = $phone;
echo $_SESSION["email"] = $email;
echo $_SESSION["password"] = $password;
echo $_SESSION["gender"] = $gender;


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
    echo '<script>window.location.href="verify_otp.php"</script>';

} else {

    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo '<script>window.location.href="login.php"</script>';
}


?>
