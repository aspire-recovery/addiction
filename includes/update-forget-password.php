<?php
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
if ($_POST['password'] == $_POST['cpassword']) {
    include "../includes/config.inc.php";

    $password = md5($_POST['password']);
    $query = mysqli_query($conn, "SELECT * FROM `pwd_reset` WHERE reset_link_token='" . $token . "' and reset_email='" . $emailId . "'");
    var_dump($query);
    $row = mysqli_num_rows($query);
    if ($row) {
        mysqli_query($conn, "UPDATE `user` set  u_password='" . $password . "' WHERE u_email='" . $emailId . "'");
        mysqli_query($conn, "DELETE FROM `pwd_reset` WHERE `pwd_reset`.`reset_link_token` = '" . $token . "'");
        echo '<script>window.location.href="../login.php?success=true"</script>';
    } else {
        echo "<p>Something goes wrong. Please try again</p>";
    }

} else {
    echo '<script>window.location.href="../reset-password.php?key=' . $emailId . '&token=' . $token . '&match=false"</script>';
}