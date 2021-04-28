<?php
//Imports
require '../includes/config.inc.php';
session_start();
//Data Fetch

$name = $_POST['product_name'];
$description = $_POST['description'];

//echo $name, $description;


//Query

$pdt_category = "INSERT INTO `product_categories` (`pdt_name`, `pdt_description`) VALUES ('$name','$description')";
//echo $pdt_category;
$result = $conn->query($pdt_category);

if ($result) {
    echo '<script>window.location.href="product_category.php"</script>';

} else {
    echo '<script>alert("Data Not Inserted")</script>';
    echo '<script>window.location.href="product_category.php"</script>';
}

?>