<?php
session_start();
?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
     <title>Psychiatrist Login
    </title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style-starter.css">
    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
</head>

<body>

<?php
include "../header.php"
?>
<?php
if (!isset($_SESSION['loggedin'])) {
    if (isset($_SESSION['ploggedin'])) {
        echo '<script>window.location.href="index.php"</script>';
    } else {
?>

<!-- /contact-form -->
<section class="w3l-contact-main">
    <div class="contact-infhny py-5">
        <div class="container py-lg-5">
            <div class="title-content text-left mb-lg-5 mt-4">
                <div style="text-align: center;">
                    <h3 style="color:black; margin-bottom: 20px">ARE YOU?</h3>
                    <div class="">
                        <a href="../login.php">
                            <img alt="user icon" class="profile_icons" src="assets/images/user.png" width="125px"
                                 height="125px">
                        </a>
                    </div>
                </div>
                <h3 class="hny-title" style="margin-top: 20px">Login</h3>
            </div>

            <div class="row align-form-map">
                <div class="col-lg-6 form-inner-cont">
                    <?php
                    if (isset($_GET['login'])){
                        echo ' <h3 class="title-big" style=" margin-bottom:25px;">
                            Forbidden!!!
                            </h3>
                            <br>
                            <br>

                            <div class="alert alert-primary">
                            You Must be Logged in to use this Feature. 
                            </div>';

                    }
              
                    if (isset($_GET['error']) && isset($_SESSION['error'])) {
                        echo ' <div class="alert alert-primary" style="">
          ' . $_SESSION['error'] . '
        </div>';
                        unset($_SESSION['error']);
                    }

                    ?>
                    <form action="login_process.php" method="post" class="signin-form">
                        <div class="form-input">
                            <input type="email" name="mail" id="w3lSender"  placeholder="E-mail"
                                   required="">
                        </div>

                        <div class="form-group">
                          
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   name="ppassword" placeholder="Password">
                        </div>

                        <button type="submit" name="psubmit" class="btn btn-contact" style="width: 45%">Submit</button>
                        <a href="register.php" class="btn btn-contact"
                           style="width: 45%; float:right; text-align: center">New Account</a>
                    </form>
                </div>
            </div>
        </div>
</section>
<?php

}
} else {

echo '<section class="w3l-contact-main">
<div class="contact-infhny py-5">
    <div class="container py-lg-5"><div class="card bg-dark">
<div class="card-header text-light" style="color:white;">
    ISSUE
</div>
<div class="card-body text-light"  style="color:white;">
    <h5 class="card-title"  style="color:white;">You Are Logged In as User!!!</h5>
    <p class="card-text"  style="color:white;">With supporting text below as a natural lead-in to additional content.</p>
    <a href="../logout.php" class="btn btn-danger bg-danger text-light">Logout</a>
</div>
</div>
</div>
        </div>
</section>';
}
?>
<!-- //contact-form -->

</body>

</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/theme-change.js"></script>
<!-- disable body scroll which navbar is in active -->

<!--//-->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- //script -->

<script src="assets/js/bootstrap.min.js"></script>