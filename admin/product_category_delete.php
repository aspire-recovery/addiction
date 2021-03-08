<?php
//Imports
require 'config.php';
session_start();

$id = $_POST['pdt_id'];
//echo $id;


//Query
$delete_sql = "DELETE FROM `product_categories` WHERE pdt_id='$id'";
//echo $delete_sql;

$result = $conn->query($delete_sql);

if ($result) {
    header('Location:product_category.php');
} else {
    echo '<script>alert("Data Not Deleted")</script>';
    echo '<script>window.location.href="product_category.php"</script>';
}


?>