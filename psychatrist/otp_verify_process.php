<?php
//Imports
require 'config.php';
session_start();

//Data Fetch
$otp = $_SESSION["pOTP"];
$name = $_SESSION["pname"];
$email = $_SESSION["pemail"];
$password = $_SESSION["ppassword"];
$phone = $_SESSION["pphone"];
$gender = $_SESSION["pgender"];
$_SESSION["ploggedin"] = true;

$status = 0;
$filet = $_SESSION['fileTmpName'];
$filed = $_SESSION['fileDestination'];

move_uploaded_file($filet, $filed);
$encrypted_pass = md5($password);

//Query
$insert_sql = "INSERT INTO `physcho` (`psy_name`, `psy_contact`, `psy_email`, `psy_gender`, `psy_password`,`psy_profile`)  VALUES 
                ('$name','$phone','$email','$gender','$encrypted_pass' ,'$filed')";


$result = $conn->query($insert_sql);

if ($result) {

    echo '<script>window.location.href="login.php"</script>';
} else {
    echo '<script>window.location.href="register.php"</script>';
}

unset($_SESSION['pOTP']);
unset($_SESSION['pname']);
unset($_SESSION['ppassword']);
unset($_SESSION['pphone']);
unset($_SESSION['pgender']);
unset($_SESSION['fileTmpName']);
unset($_SESSION['fileDestination']);
unset($_SESSION['error']);
session_destroy();