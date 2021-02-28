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

echo $otp, $name, $email, $password, $phone, $gender, $addiction;

//Query
$insert_sql = "INSERT INTO `user`(`addiction_id`, `u_name`, `u_contact`, `u_email`, `u_status`, `u_gender`,`u_password`) VALUES 
                ('$addiction','$name','$phone','$email','$status','$gender','$password')";

$result = $conn->query($insert_sql);

if ($result) {
    echo 'Data Inserted';
    echo '<script>window.location.href="index.php"</script>';
} else {
    echo 'Error Occured';
    echo '<script>window.location.href="register.php"</script>';
}

unset($_SESSION['OTP']);
unset($_SESSION['name']);
unset($_SESSION['password']);
unset($_SESSION['phone']);
unset($_SESSION['gender']);
unset($_SESSION['addiction']);
session_destroy();


?>