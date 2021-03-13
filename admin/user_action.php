<?php
//Import
session_start();
require 'config.php';
//Block User
if (isset($_GET['block'])) {
    $u_id = $_GET['block'];
    $block = $conn->query("UPDATE `user` SET u_status='1' WHERE u_id='$u_id'");
    if ($block) {
        echo '<script>alert("User Blocked")</script>';
        echo '<script>window.location.href="user.php"</script>';
    } else {
        echo '<script>alert("Error in blocking")</script>';
        echo '<script>window.location.href="user.php"</script>';

    }
}
if (isset($_GET['unblock'])) {
    $u_id = $_GET['unblock'];
    $block = $conn->query("UPDATE `user` SET u_status='0' WHERE u_id='$u_id'");
    if ($block) {
        echo '<script>alert("User Blocked")</script>';
        echo '<script>window.location.href="user.php"</script>';

    } else {
        echo '<script>alert("Error in blocking")</script>';
        echo '<script>window.location.href="user.php"</script>';

    }
}
echo '<script>window.location.href="../user.php"</script>';
?>