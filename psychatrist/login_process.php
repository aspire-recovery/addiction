 <?php
    // Imports
    require '../includes/config.inc.php';
    session_start();


    if (isset($_POST['psubmit'])) {
        //Data Fetch
        $email = $_POST['mail'];
        $password = $_POST['ppassword'];
        $encrypted_pass = md5($password);


        //Query
        $login_sql = "SELECT * FROM `physcho` WHERE psy_email='$email' AND psy_password='$encrypted_pass'";

        $result = $conn->query($login_sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $psy_id = $row['psy_id'];
                $psy_email = $row['psy_email'];
                $psy_name = $row['psy_name'];
                $psy_profile = $row['psy_profile'];
                $_SESSION['p_id'] = $psy_id;
                $_SESSION['p_email'] = $psy_email;
                $_SESSION['p_name'] = $psy_name;
                $_SESSION['p_profile'] = $psy_profile;
                $_SESSION['ploggedin'] = true;
            }


            echo '<script>window.location.href="index.php";</script>';
        } else {
            $error_detail = "Incorrect Credentials";
            echo $email;
            echo $password;
             echo '<script>window.location.href="login.php?error=true";</script>';
        }
    }