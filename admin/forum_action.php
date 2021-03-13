<?php
//Imports
session_start();
require 'config.php';

if (isset($_GET['delete'])) {
    $fu_id = $_GET['delete'];

    $delete_sql = "DELETE FROM `forum` WHERE fu_id='$fu_id'";
    $result = $conn->query($delete_sql);

    if ($result) {
        echo '<script>window.location.href="forum_content.php"</script>';
    } else {
        echo '<script>alert("Content not deleted")</script>';
        echo '<script>window.location.href="forum_content.php"</script>';
//        header("Location:forum_content.php");
    }

}
echo '<script>window.location.href="../forum_content.php"</script>';

//header("Location:../forum_content.php");


?>