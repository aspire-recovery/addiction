<?php
/*Imports*/
session_start();
require 'config.php';
/*Data Fetch*/

$Email = $_POST['email'];
$Password = $_POST['password'];
$pwd = md5($Password);

/*Query*/

$sql = "SELECT * FROM `admin` WHERE a_email='$Email' AND a_password='$pwd' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $a_id = $row['a_id'];
        $a_email = $row['a_email'];
        $a_name = $row['a_name'];
    }
    $_SESSION['a_id'] = $a_id;
    $_SESSION['a_email'] = $a_email;
    $_SESSION['a_name'] = $a_name;
    header('Location:index.php');
} else {
    echo '<script>window.location.href="login.php"</script>';
}


?>