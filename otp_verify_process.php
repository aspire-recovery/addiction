<?php
//Imports
require 'config.php';
session_start();

//Data Fetch
$otp = $_SESSION["OTP"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$password = $_SESSION["password"];
$phone = $_SESSION["phone"];
$gender = $_SESSION["gender"];
$addiction = $_SESSION["addiction"];
$status = 0;
$otpv = $_POST['otp'];

$encrypted_pass = md5($password);
if ($otp == $otpv) {
//Query
    $insert_sql = "INSERT INTO `user`(`addiction_id`, `u_name`, `u_contact`, `u_email`, `u_status`, `u_gender`,`u_password`) VALUES
                ('$addiction','$name','$phone','$email','$status','$gender','$encrypted_pass')";

    $result = $conn->query($insert_sql);

    if ($result) {
        // Give Sucess Alert Later
        echo '<script>window.location.href="login.php"</script>';
    } else {
        // Give Error Alert Later
        echo '<script>window.location.href="register.php"</script>';
    }

    unset($_SESSION['OTP']);
    unset($_SESSION['name']);
    unset($_SESSION['password']);
    unset($_SESSION['phone']);
    unset($_SESSION['gender']);
    unset($_SESSION['addiction']);
    session_destroy();

} else {
    echo '<script>alert("WRONG OTP")</script>';
    echo '<script>window.location.href="register.php"</script>';

}