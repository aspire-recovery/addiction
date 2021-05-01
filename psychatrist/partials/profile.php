<?php
session_start();
if (!isset($_SESSION["p_id"])) {
    echo '<script>window.location.href="../e404.php"</script>';
    exit(0);
}
include "../includes/config.inc.php";
$id = $_SESSION["p_id"];

if (isset($_POST['submit'])) {


    $user = "SELECT * FROM `physcho` WHERE psy_id='$id'";
    $result = $conn->query($user);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $u_img    = $row['psy_profile'];
        }
    }

    $profileArray = $_FILES['profileImage'];
    // IMAGE UPLOAD
    $fileName = $_FILES['profileImage']['name'];
    $fileTmpName = $_FILES['profileImage']['tmp_name'];
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
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = "uploads/profile/" . $fileNameNew;
                    $fileD = "../uploads/profile/" . $fileNameNew;
                    $stat =  move_uploaded_file($fileTmpName, $fileD);
                    if ($stat == true) {
                        $sqlu = "UPDATE `physcho` SET psy_profile = '$fileDestination' WHERE psy_id='$id'";
                        $resultu = mysqli_query($conn, $sqlu);

                        if ($resultu) {

                            $url = "../" . $u_img;
                            $_SESSION['p_profile'] = $fileDestination;
                            unlink($url);


                            $error = true;
                            $_SESSION['error'] = "Success!";
                            echo '<script>window.location.href="../psyprofile.php?error=true"</script>';
                        } else {
                            unlink($fileD);
                            $error = true;
                            $_SESSION['error'] = "Error Updating in Database!";
                            echo '<script>window.location.href="../psyprofile.php?error=true"</script>';
                        }
                    } else {
                        $error = true;
                        $_SESSION['error'] = "Error Uploading!";
                        echo '<script>window.location.href="../psyprofile.php?error=true"</script>';
                    }
                } else {
                    $error = true;
                    $_SESSION['error'] = "File Size is too big! Choose a lower Resolution Image.";
                    echo '<script>window.location.href="../psyprofile.php?error=true"</script>';
                }
            } else {
                $error = true;
                $_SESSION['error'] = "Error Uploading Image!! Try Again.";
                echo '<script>window.location.href="../psyprofile.php?error=true"</script>';
            }
        } else {
            $error = true;
            $_SESSION['error'] = "Image Type Not Allowed!! Try a Diffrent Format eg. JPG, PNG, JPEG";
            echo '<script>window.location.href="../psyprofile.php?error=true"</script>';
        }
    } else {
        $error = true;
        $_SESSION['error'] = "Image is Required!!!";
        echo '<script>window.location.href="../psyprofile.php?error=true"</script>';
    }
}