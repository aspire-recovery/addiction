<?php
//Imports
require '../includes/config.inc.php';
session_start();

$id = $_POST['add_id'];
//echo $id;


//Query

$delete_sql = "DELETE FROM `addiction_types` WHERE add_id='$id'";
//echo $delete_sql;
$result = $conn->query($delete_sql);

if ($result) {
    header('Location:addictions.php');
} else {
    echo '<script>alert("Data Not Deleted")</script>';
    echo '<script>window.location.href="addictions.php"</script>';
}


?>