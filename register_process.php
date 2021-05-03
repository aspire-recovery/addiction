<?php
// Imports
require 'includes/config.inc.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: e404.php");
    exit(0);
}
//Data Fetch
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = $_POST['cpassword'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$addiction = $_POST['addiction'];

$sql = "SELECT * FROM `user` WHERE u_email='$email'";
$result1 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result1);

if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['addiction'])) {


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $_SESSION['error'] = "Enter a Legit Email";
        echo '<script>window.location.href="register.php?error=true"</script>';
        exit();
    }
    if (!preg_match('/[^\w -.]/', $cname)) {
    } else {
    if (preg_match("#[0-9]+#", $name) || preg_match('@[^\w]@', $name)) {
        $_SESSION['error'] = "Your Name Cannot Contain Numbers or Illegal Characters!";
        echo '<script>window.location.href="register.php?error=true"</script>';
        exit();
    }
}


    if ($_POST['password'] == $_POST['cpassword']) {

        if (strlen($password) < 8) {

            $error = true;
            $_SESSION['error'] = "Password Length should be greater than 8";
            echo '<script>window.location.href="register.php?error=true"</script>';
            exit();
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $_SESSION['error'] = "Your Password Must Contain At Least 1 Number!";
            echo '<script>window.location.href="register.php?error=true"</script>';

            exit();
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $_SESSION['error'] = "Your Password Must Contain At Least 1 Capital Letter!";
            echo '<script>window.location.href="register.php?error=true"</script>';

            exit();
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $_SESSION['error']  = "Your Password Must Contain At Least 1 Lowercase Letter!";
            echo '<script>window.location.href="register.php?error=true"</script>';
            exit();
        } elseif (!preg_match('@[^\w]@', $password)) {
            $_SESSION['error'] = "Your Password Must Contain At Least 1 Special Character !";
            echo '<script>  window.location.href = "register.php?error=true"  </script>';

            exit();
        } else {

            if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $_POST['phone'])) {
                $error = true;
                $_SESSION['error'] = "Enter a Legit Phone Number";
                echo '<script>
    window.location.href = "register.php?error=true"
    </script>';

                exit();
            }


            if ($row > 0) {
                $email_exist = true;
                echo '<script>
    window.location.href = "register.php?exist=true"
    </script>';
                exit();
            } else {

                // OTP Generation
                $otp = rand(000000, 999999);
                $_SESSION["OTP"] = $otp;
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $_SESSION["phone"] = $phone;
                $_SESSION["gender"] = $gender;
                $_SESSION["addiction"] = $addiction;


                // Sending Otp Through Mail
                require 'includes/emailconfig.inc.php';

                $mail->addAddress($email, 'Person Name'); // Add a recipient

                // $mail->addReplyTo('info@example.com', 'Information');
                $mail->isHTML(true); // Set email format to HTML

                $mail->Subject = 'OTP';
                // Message
                $mail->Body .= '<h3 style="color:black;">OTP:- ' . $_SESSION["OTP"] . '</h3>';

                if ($mail->send()) {

                    echo '<script>
    window.location.href = "verify_otp.php"
    </script>';
                } else {



                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    echo '<script>
    window.location.href = "register.php"
    </script>';
                }
            }
        }
    } else {

        $_SESSION['error'] = "Password And Confirm Password Doesn't Match Password!";
        echo '<script>
    window.location.href = "register.php?error=true"
    </script>';
        exit();
    }
} else {

    $error = true;
    $_SESSION['error'] = "All Field Cannot be Empty";
    echo '<script>
    window.location.href = "register.php?error=true"
    </script>';

    exit();
}