<?php
/*Imports*/
session_start();
require 'config.php';
/*Data Fetch*/

$Email = $_POST['email'];
$Password = $_POST['password'];

/*Query*/

$sql = "SELECT * FROM `admin` WHERE a_email='$Email' AND a_password='$Password' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $a_id = $row['a_id'];
        $a_email = $row['a_email'];
        $a_password = $row['a_password'];
    }
    $_SESSION['a_id'] = $a_id;
    $_SESSION['a_email'] = $a_email;
    $_SESSION['a_password'] = $a_password;
    header('Location:index.php');
} else {
    echo '<script>window.location.href="login.php"</script>';
}


?>