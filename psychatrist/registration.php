<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dentile a Medical Category Bootstrap Responsive Website Template | Contact :: W3layouts
    </title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
</head>

<body>

<?php
include "header.php"
?>

<!-- /contact-form -->
<section class="w3l-contact-main">
    <div class="contact-infhny py-5">
        <div class="container py-lg-5">
            <div class="title-content text-left mb-lg-5 mt-4">

                <h3 class="hny-title">Sigin</h3>
            </div>
            <div class="row align-form-map">
                <div class="col-lg-6 form-inner-cont">
                    <form action="register_process.php" method="post" class="signin-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="exampleInputPassword1"
                                   placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" id="" placeholder="Contact No." required="">
                        </div>

                        <div class="form-input">
                            <input type="email" name="email" id="w3lSender" placeholder="E-mail" required=""/>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="gender" id="exampleFormControlSelect1">
                                <option>Select Your Gender</option>
                                <option>male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>



                        <button type="submit" class="btn btn-contact" style="width: 45%">Submit</button>

                    </form>
                </div>

            </div>
        </div>
</section>
<!-- //contact-form -->

</body>

</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
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