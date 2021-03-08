<?php
//Imports
session_start();
require 'config.php';
//Delete
if (isset($_POST['submit'])) {
    //data fetch
    $p_id = $_POST['p_id'];
//    echo $p_id;

    $product_delete = "DELETE FROM `product` WHERE p_id = '$p_id'";
//    echo $product_delete;
    $result = $conn->query($product_delete);

    if ($result) {
        header("Location:product.php");
    } else {
        echo '<script>alert("Data Not Deleted")</script>';
        echo '<script>window.location.href="product.php"</script>';
    }
}
?>