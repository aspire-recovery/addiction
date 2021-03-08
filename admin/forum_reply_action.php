<?php
//Imports
session_start();
require 'config.php';

if (isset($_GET['delete'])) {
    $reply_id = $_GET['delete'];

    $delete_sql = "DELETE FROM `forum_reply` WHERE 	reply_id='$reply_id'";
    $result = $conn->query($delete_sql);

    if ($result) {
        header("Location:forum_reply.php");
    } else {
        echo '<script>alert("Content not deleted")</script>';
        header("Location:forum_reply.php");
    }

}
header("Location:../forum_reply.php");


?>