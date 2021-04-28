<?php
//Imports
session_start();
require '../includes/config.inc.php';

$pdt_name = $_POST['pdt_name'];
$pdt_category = $_POST['pdt_category'];
$pdt_qty = $_POST['pdt_qty'];
$pdt_price = $_POST['pdt_price'];
$pdt_description = $_POST['pdt_description'];



//Image Upload
$profileArray = $_FILES['fileToUpload'];
// IMAGE UPLOAD
$fileName = $_FILES['fileToUpload']['name'];
$fileTmpName = $_FILES['fileToUpload']['tmp_name'];
$fileSize = $_FILES['fileToUpload']['size'];
$fileError = $_FILES['fileToUpload']['error'];
$fileType = $_FILES['fileToUpload']['type'];

if (!empty($fileName) && !empty($_FILES['fileToUpload']['tmp_name'])) {

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png', 'jpeg', 'svg');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError == 0) {
            if ($fileSize < 1048576) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = "upload/product/" . $fileNameNew;
                $fileD = "../upload/product/" . $fileNameNew;
                $stat =  move_uploaded_file($fileTmpName, $fileD);
                if ($stat == true) {
                    $insert_product = "INSERT INTO `product`(`p_name`, `p_price`, `pdt_category`, `p_quantity`, `p_description`,`p_image`) VALUES ('$pdt_name','$pdt_price','$pdt_category','$pdt_qty','$pdt_description','$fileDestination')";
                    $result = $conn->query($insert_product);
                } else {
                    $error = true;
                    $_SESSION['error'] = "Error Uploading!";
                    echo '<script>window.location.href="product.php?error=true"</script>';
                }
            } else {
                $error = true;
                $_SESSION['error'] = "File Size is too big! Choose a lower Resolution Image.";
                echo '<script>window.location.href="product.php?error=true"</script>';
            }
        } else {
            $error = true;
            $_SESSION['error'] = "Error Uploading Image!! Try Again.";
            echo '<script>window.location.href="product.php?error=true"</script>';
        }
    } else {
        $error = true;
        $_SESSION['error'] = "Image Type Not Allowed!! Try a Diffrent Format eg. JPG, PNG, JPEG";
        echo '<script>window.location.href="product.php?error=true"</script>';
    }
} else {
    $error = true;
    $_SESSION['error'] = "Image is Required to Register!!!";
    echo '<script>window.location.href="product.php?error=true"</script>';
}


//Query



if ($result) {
    $error = true;
    $_SESSION['error'] = "Success!";
    echo '<script>window.location.href="product.php?error=true"</script>';
} else {
    echo '<script>alert("Product Not Inserted")</script>';
    echo '<script>window.location.href="product.php"</script>';
}