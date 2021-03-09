<?php
//Imports
session_start();
require 'config.php';

$pdt_name = $_POST['pdt_name'];
$pdt_category = $_POST['pdt_category'];
$pdt_qty = $_POST['pdt_qty'];
$pdt_price = $_POST['pdt_price'];
$pdt_description = $_POST['pdt_description'];


// Image
$target_dir = "../upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image2wbmp(image)
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


//Query

$insert_product = "INSERT INTO `product`(`p_name`, `p_price`, `pdt_category`, `p_quantity`, `p_description`,`p_image`) VALUES ('$pdt_name','$pdt_price','$pdt_category','$pdt_qty','$pdt_description','$target_file')";
echo $insert_product;

$result = $conn->query($insert_product);

if ($result) {
    echo '<script>window.location.href="product.php"</script>';
} else {
    echo '<script>alert("Product Not Inserted")</script>';
    echo '<script>window.location.href="product.php"</script>';

}

?>