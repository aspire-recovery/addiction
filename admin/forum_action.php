<?php
//Imports
session_start();
require 'config.php';

if (isset($_GET['delete'])) {
    $fu_id = $_GET['delete'];

    $delete_sql = "DELETE FROM `forum` WHERE fu_id='$fu_id'";
    $result = $conn->query($delete_sql);

    if ($result) {
        header("Location:forum_content.php");
    } else {
        echo '<script>alert("Content not deleted")</script>';
        header("Location:forum_content.php");
    }

}
header("Location:../forum_content.php");


?>