<?php
session_start();
unset($_SESSION["a_name"]);
unset($_SESSION["a_email"]);
unset($_SESSION["a_id"]);
header("Location:login.php");
?>