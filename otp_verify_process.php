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

?>