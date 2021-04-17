<?php
//Imports
session_start();
require '../includes/config.inc.php';

if (isset($_GET['delete'])) {
    $reply_id = $_GET['delete'];

    $delete_sql = "DELETE FROM `forum_reply` WHERE 	reply_id='$reply_id'";
    $result = $conn->query($delete_sql);

    if ($result) {
        echo '<script>window.location.href="forum_reply.php"</script>';
    } else {
        echo '<script>alert("Content not deleted")</script>';
        echo '<script>window.location.href="forum_reply.php"</script>';
    }

}
echo '<script>window.location.href="../forum_reply.php"</script>';


?>