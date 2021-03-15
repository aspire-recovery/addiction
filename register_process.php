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

$sql = "SELECT * FROM `user` WHERE u_email='$email'";
$result1 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result1);
var_dump($row);
if ($row > 0) {
    $email_exist = true;
    echo '<script>window.location.href="register.php?exist=true"</script>';
    exit();
} else {
    echo $name, $email, $password, $phone, $gender, $addiction;

// OTP Generation
    $otp = rand(000000, 999999);
    echo $_SESSION["OTP"] = $otp;
    echo $_SESSION["name"] = $name;
    echo $_SESSION["email"] = $email;
    echo $_SESSION["password"] = $password;
    echo $_SESSION["phone"] = $phone;
    echo $_SESSION["gender"] = $gender;
    echo $_SESSION["addiction"] = $addiction;
    echo $_SESSION["loggedin"] = true;

// Sending Otp Through Mail
    require 'emailconfig.php';

    $mail->addAddress($email, 'Person Name'); // Add a recipient

// $mail->addReplyTo('info@example.com', 'Information');
    $mail->isHTML(true); // Set email format to HTML

    $mail->Subject = 'OTP';
// Message
    $mail->Body .= '<h3 style="color:black;">OTP:-  ' . $_SESSION["OTP"] . '</h3>';

    if ($mail->send()) {

        echo 'Success.';
        echo '<script>window.location.href="verify_otp.php"</script>';

    } else {

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo '<script>window.location.href="register.php"</script>';
    }
}