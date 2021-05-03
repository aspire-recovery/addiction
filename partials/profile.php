<?php
session_start();
if (!isset($_SESSION["u_id"])) {
    echo '<script>window.location.href="../e404.php"</script>';
    exit(0);
}
include "../includes/config.inc.php";
$id = $_SESSION["u_id"];
if (isset($_POST['update'])) {
    $cname = mysqli_real_escape_string($conn, $_POST['name']);
    $cnum =  mysqli_real_escape_string($conn, $_POST['phone']);

    echo "<br>";

    if (!empty($cname) && !empty($cnum)) {
        if (!preg_match('/[^\w -.]/', $cname)) {
        } else {
            if (preg_match("#[0-9]+#", $cname)  || preg_match('@[^\w]@', $cname)) {
                $_SESSION['error'] = "Your Name Cannot Contain Numbers or Illegal Characters!";
                echo '<script>window.location.href="../profile.php?error=true"</script>';
                exit();
            }
        }


        if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $cnum)) {
            $error = true;
            $_SESSION['error'] = "Enter a Legit Phone Number";
            echo '<script>
window.location.href = "../profile.php?error=true"
</script>';

            exit();
        }

        $sqlu = "UPDATE user SET u_name='$cname',u_contact=$cnum WHERE u_id='$id'";
        $resultu = mysqli_query($conn, $sqlu);
        if ($resultu) {
            $error = true;
            $_SESSION['error'] = "Success!!!";

            echo '<script>window.location.href="../profile.php?error=true"</script>';
        } else {

            $error = true;
            $_SESSION['error'] = "Error Updating(" . mysqli_error($conn)  . ")";
            echo '<script>window.location.href="../profile.php?error=true"</script>';
        }
    } else {
        $error = true;
        $_SESSION['error'] = "All Fields Cannot be Empty!! ";
        echo '<script>window.location.href="../profile.php?error=true"</script>';
    }
}

if (isset($_POST['submit'])) {


    $user = "SELECT * FROM `user` WHERE user.u_id='$id'";
    $result = $conn->query($user);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $u_img    = $row['u_img'];
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
                    $fileDestination = "upload/profile/" . $fileNameNew;
                    $fileD = "../upload/profile/" . $fileNameNew;
                    $stat =  move_uploaded_file($fileTmpName, $fileD);
                    if ($stat == true) {
                        $sqlu = "UPDATE `user` SET u_img = '$fileDestination' WHERE u_id='$id'";
                        $resultu = mysqli_query($conn, $sqlu);

                        if ($resultu) {
                            if (strpos($u_img, 'fonts/icons/avatars') !== false) {
                            } else {
                                $url = "../" . $u_img;
                                unlink($url);
                            }
                            $error = true;
                            $_SESSION['error'] = "Success!";
                            echo '<script>window.location.href="../profile.php?error=true"</script>';
                        } else {
                            unlink($fileD);
                            $error = true;
                            $_SESSION['error'] = "Error Updating in Database!";
                            echo '<script>window.location.href="../profile.php?error=true"</script>';
                        }
                    } else {
                        $error = true;
                        $_SESSION['error'] = "Error Uploading!";
                        echo '<script>window.location.href="../profile.php?error=true"</script>';
                    }
                } else {
                    $error = true;
                    $_SESSION['error'] = "File Size is too big! Choose a lower Resolution Image.";
                    echo '<script>window.location.href="../profile.php?error=true"</script>';
                }
            } else {
                $error = true;
                $_SESSION['error'] = "Error Uploading Image!! Try Again.";
                echo '<script>window.location.href="../profile.php?error=true"</script>';
            }
        } else {
            $error = true;
            $_SESSION['error'] = "Image Type Not Allowed!! Try a Diffrent Format eg. JPG, PNG, JPEG";
            echo '<script>window.location.href="../profile.php?error=true"</script>';
        }
    } else {
        $error = true;
        $_SESSION['error'] = "Image is Required to Register!!!";
        echo '<script>window.location.href="../profile.php?error=true"</script>';
    }
}