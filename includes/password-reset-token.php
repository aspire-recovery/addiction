<?php
if (isset($_POST['password-reset-token']) && $_POST['email']) {
    require "../config.php";

    $emailId = $_POST['email'];
    $sql = "SELECT * FROM user WHERE u_email='" . $emailId . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {

        $token = md5($emailId) . rand(10, 9999);

        $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y")
        );

        $expDate = date("Y-m-d H:i:s", $expFormat);

        $sqli = "INSERT INTO `pwd_reset` (`reset_link_token`, `exp_date`, `reset_email`) VALUES ('$token', '$expDate', '$emailId');";
        $update = mysqli_query($conn, $sqli);

        $link = "<a href='http://localhost/addiction/reset-password.php?key=" . $emailId . "&token=" . $token . "'>Click To Reset password</a>";

        require '../emailconfig.php';

        $mail->addAddress($emailId, 'Person Name'); // Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');

        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Reset Password'; // Message
        $mail->Body .= '<p style="color:black;"><b>Click On This Link to Reset Password:- </b> ' . $link . '</p>';

        if ($mail->send()) {
            $error = 0;
            echo '<script>window.location.href="../reset-password.php?error=' . $error . '"</script>';

        } else {

            $error = 1;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo '<script>window.location.href="../reset-password.php?error=' . $error . '"</script>';
        }

    } else {
        echo "Heo";
        $error = 2;
        echo '<script>window.location.href="../reset-password.php?error=' . $error . '"</script>';

    }
}