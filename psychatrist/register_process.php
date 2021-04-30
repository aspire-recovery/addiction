<?php
// Imports
require '../includes/config.inc.php';
session_start();
if (!isset($_POST['email'])) {
    header("location: ../e404.php");
}

//Data Fetch
$profileArray = $_FILES['profileImage'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$error = false;
$_SESSION['error'] = "Error";
$sql = "SELECT * FROM physcho WHERE psy_email='$email'";
$result1 = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result1);

// IMAGE UPLOAD
$fileName = $_FILES['profileImage']['name'];
$fileTmp = $_FILES['profileImage']['tmp_name'];
$fileSize = $_FILES['profileImage']['size'];
$fileError = $_FILES['profileImage']['error'];
$fileType = $_FILES['profileImage']['type'];
if (!empty($fileName) && !empty($_FILES['profileImage']['tmp_name'])) {

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png', 'jpeg', 'svg');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError == 0) {
            if ($fileSize < 1048576) {
                $fileNameNew = uniqid("", true) . "." . $fileActualExt;
                $_SESSION['fileDestination'] = "uploads/profile/" . $fileNameNew;
                move_uploaded_file($fileTmp, $_SESSION['fileDestination']);
            } else {
                $error = true;
                $_SESSION['error'] = "File Size is too big! Choose a lower Resolution Image.";
                echo '<script>window.location.href="registration.php?error=true"</script>';
            }
        } else {
            $error = true;
            $_SESSION['error'] = "Error Uploading Image!! Try Again.";
            echo '<script>window.location.href="registration.php?error=true"</script>';
        }
    } else {
        $error = true;
        $_SESSION['error'] = "Image Type Not Allowed!! Try a Diffrent Format eg. JPG, PNG, JPEG";
        echo '<script>window.location.href="registration.php?error=true"</script>';
    }
} else {
    $error = true;
    $_SESSION['error'] = "Image is Required to Register!!!";
    echo '<script>window.location.href="registration.php?error=true"</script>';
}


if (!empty($_POST['name']) && !empty($_POST['password'])) {
    if ($row > 0) {
        $error = true;
        $_SESSION['error'] = "Email Already Exist!";
        echo '<script>window.location.href="registration.php?error=true"</script>';

        exit();
    } else {

        // OTP Generation
        $otp = rand(000000, 999999);
        $_SESSION["pOTP"] = $otp;
        $_SESSION["pname"] = $name;
        $_SESSION["pemail"] = $email;
        $_SESSION["ppassword"] = $password;
        $_SESSION["pphone"] = $phone;
        $_SESSION["pgender"] = $gender;


        // Sending Otp Through Mail
        require '../includes/emailconfig.inc.php';

        $mail->addAddress($email, 'Person Name'); // Add a recipient

        // $mail->addReplyTo('info@example.com', 'Information');
        $mail->isHTML(true); // Set email format to HTML

        $mail->Subject = 'OTP';
        // Message
        $mail->Body .= '<h3 style="color:black;">OTP:-  ' . $_SESSION["pOTP"] . '</h3>';

        if ($mail->send()) {


            echo '<script>window.location.href="verify_otp.php"</script>';
        } else {


            echo '<script>window.location.href="registeration.php"</script>';
        }
    }
} else {
    if (empty($_POST['name'])) {
        $error = true;
        $_SESSION['error'] = "Field Cannot be Empty";
        echo '<script>window.location.href="registration.php?error=true"</script>';

        exit();
    }
}