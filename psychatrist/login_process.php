 <?php
// Imports
require 'config.php';
session_start();

if (isset($_POST['submit'])) {
//Data Fetch
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $email, $password;

//Query
    $login_sql = "SELECT * FROM `physcho` WHERE psy_email='$email' AND psy_password'$password'";
    echo $login_sql;

    $result = $conn->query($login_sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $u_id = $row['u_id'];
            $u_email = $row['u_email'];
            $u_name = $row['u_name'];
        }

        $_SESSION['u_id'] = $u_id;
        $_SESSION['u_email'] = $u_email;
        $_SESSION['u_name'] = $u_name;

        echo '<script>window.location.href="login.php";</script>';

    } else {
        echo '<script>alert("Invalid Email and Password");</script>';
        echo '<script>window.location.href="index.php";</script>';
    }
}
?>

