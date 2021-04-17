<?php
// Imports
require 'includes/config.inc.php';
session_start();
//Data Fetch
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$addiction = $_POST['addiction'];

$sql = "SELECT * FROM `user` WHERE u_email='$email'";
$result1 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result1);


if ($row > 0) {
    $email_exist = true;
    echo '<script>window.location.href="register.php?exist=true"</script>';
    exit();
} else {

    // OTP Generation
    $otp = rand(000000, 999999);
    $_SESSION["OTP"] = $otp;
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["phone"] = $phone;
    $_SESSION["gender"] = $gender;
    $_SESSION["addiction"] = $addiction;
    $_SESSION["loggedin"] = true;

    // Sending Otp Through Mail
    require 'includes/emailconfig.inc.php';

    $mail->addAddress($email, 'Person Name'); // Add a recipient

    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->isHTML(true); // Set email format to HTML

    $mail->Subject = 'OTP';
    // Message
    $mail->Body .= '<h3 style="color:black;">OTP:-  ' . $_SESSION["OTP"] . '</h3>';

    if ($mail->send()) {

        echo '<script>window.location.href="verify_otp.php"</script>';
    } else {

   
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo '<script>window.location.href="register.php"</script>';
    }
}