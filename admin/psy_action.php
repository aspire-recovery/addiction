<?php
//Import
session_start();
require 'config.php';
//Block User
if (isset($_GET['block'])) {
    $u_id = $_GET['block'];
    $block = $conn->query("UPDATE `physcho` SET psy_status='1' WHERE psy_id='$u_id'");
    if ($block) {
        echo '<script>alert("User Blocked")</script>';
        header('Location:psycho.php');
    } else {
        echo '<script>alert("Error in blocking")</script>';
        header('Location:psycho.php');

    }
}
if (isset($_GET['unblock'])) {
    $u_id = $_GET['unblock'];
    $block = $conn->query("UPDATE `physcho` SET psy_status='0' WHERE psy_id='$u_id'");
    if ($block) {
        echo '<script>alert("User Blocked")</script>';
        header('Location:psycho.php');

    } else {
        echo '<script>alert("Error in blocking")</script>';
        header('Location:psycho.php');

    }
}
header("Location:../psycho.php");
?>