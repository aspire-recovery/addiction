<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dentile a Medical Category Bootstrap Responsive Website Template | Contact :: W3layouts
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
                    <center>
                        <h3 style="color:black; margin-bottom: 20px">ARE YOU?</h3>
                        <div class="">
                            <a href="../login.php">
                                <img alt="user icon" class="profile_icons" src="assets/images/userp.svg" width="100"
                                    height="100">
                            </a>
                            <a href="login.php">
                                <img style="margin-left: 20px" alt="psychaitrist icon" class="profile_icons"
                                    src="assets/images/psychaitristp.svg" width="100" height="100">
                            </a>
                        </div>
                    </center>




                    <h3 class="hny-title" style="margin-top: 20px">Login</h3>
                </div>
                <div class="row align-form-map">
                    <div class="col-lg-6 form-inner-cont">
                        <form action="login_process.php" method="post" class="signin-form">
                            <div class="form-input">
                                <input type="email"  id="w3lSender" name="mail" placeholder="E-mail"
                                    required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="ppassword"
                                    placeholder="Password">
                            </div>

                            <button type="submit" name="psubmit" class="btn btn-contact"
                                style="width: 45%">Submit</button>
                            <a href="registration.php" class="btn btn-contact"
                                style="width: 45%; float:right; text-align: center">New Account</a>
                        </form>
                    </div>

                </div>
            </div>
    </section>
    <!-- //contact-form -->
    <?php
    } }else {

        echo '<section class="w3l-contact-main">
            <div class="contact-infhny py-5">
                <div class="container py-lg-5">
        <div class="card bg-dark">
        <div class="card-header text-light" style="color:white;">
            ISSUE
        </div>
        <div class="card-body text-light"  style="color:white;">
            <h5 class="card-title"  style="color:white;">You Are Logged In as User!!!</h5>
            <p class="card-text"  style="color:white;">With supporting text below as a natural lead-in to additional content.</p>
            <a href="../logout.php" class="btn btn-danger bg-danger text-light">Logout</a>
        </div>
    </div
    
</div>
</div>
</section>';
    }
    ?>

</body>

</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<!-- disable body scroll which navbar is in active -->

<!--//-->
<script>
$(function() {
    $('.navbar-toggler').click(function() {
        $('body').toggleClass('noscroll');
    })
});
</script>
<!-- //script -->

<script src="assets/js/bootstrap.min.js"></script>