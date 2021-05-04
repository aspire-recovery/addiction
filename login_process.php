<?php
// Imports
require 'includes/config.inc.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: e404.php");
    exit();
}

if (isset($_POST['submit'])) {
    //Data Fetch
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_pass = md5($password);

    //Query
    $login_sql = "SELECT * FROM `user` WHERE u_email='$email' AND u_password = '$encrypted_pass'";

    $result = $conn->query($login_sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $u_id = $row['u_id'];
            $u_email = $row['u_email'];
            $u_name = $row['u_name'];
            $u_img = $row['u_img'];
           
            $_SESSION['loggedin'] = true;
            $_SESSION['u_id'] = $u_id;
            $_SESSION['u_email'] = $u_email;
            $_SESSION['u_name'] = $u_name;
            $_SESSION['u_img'] = $u_img;
        }

        echo '<script>window.location.href="index.php"</script>';
    } else {

        $error = true;
        $_SESSION['error'] = "Incorrect Credentials!";
        echo '<script>window.location.href="login.php?error=true"</script>';

        exit();
    }
}