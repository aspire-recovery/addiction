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
        echo '<script>window.location.href="psycho.php"</script>';
    } else {
        echo '<script>alert("Error in blocking")</script>';
        echo '<script>window.location.href="psycho.php"</script>';

    }
}
if (isset($_GET['unblock'])) {
    $u_id = $_GET['unblock'];
    $block = $conn->query("UPDATE `physcho` SET psy_status='0' WHERE psy_id='$u_id'");
    if ($block) {
        echo '<script>alert("User Blocked")</script>';
        echo '<script>window.location.href="psycho.php"</script>';

    } else {
        echo '<script>alert("Error in blocking")</script>';
        echo '<script>window.location.href="psycho.php"</script>';

    }
}
header("Location:../psycho.php");
echo '<script>window.location.href="../psycho.php"</script>';

?>