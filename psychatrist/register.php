<?php
session_start();
require 'includes/config.inc.php';

?>

<!doctype html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
     <title>Psychaitrist Register
    </title>
    <!-- Template CSS -->

    <link rel="stylesheet" href="../assets/css/style-starter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <style>
    .profile-pic-div {
        height: 150px;
        width: 150px;
        position: relative;

        border-radius: 50%;
        overflow: hidden;
        border: 1px solid grey;
        margin: 0px auto;
        margin-bottom: 20px;
    }


    #profileDisplay {
        display: block;

        height: 150px;
        width: 150px;

        border-radius: 50%;
        object-fit: cover;
        object-position: center center;
    }

    #uploadBtn {
        height: 37px;
        width: 100%;
        position: absolute;
        bottom: -10px;
        text-align: center;
        background: rgba(29, 25, 46, 0.719);
        color: white;
        line-height: 30px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        font-size: 12px;
        cursor: pointer;
        display: none;
    }
    </style>


</head>


<body>

    <?php
    include "../header.php"
    ?>

    <!-- /contact-form -->
    <?php
    if (!isset($_SESSION['loggedin'])) {
        if (isset($_SESSION['ploggedin'])) {
            echo '<script>window.location.href="index.php"</script>';
        } else {
    ?>

    <section class="w3l-contact-main">
        <div class="contact-infhny py-5">
            <div class="container py-lg-5">
                <div class="title-content text-left mb-lg-5 mt-4">
                    <center>
                        <h3 style="color:black; margin-bottom: 20px">ARE YOU?</h3>
                        <div class="">
                            <a href="../register.php">
                                <img alt="user icon" class="profile_icons" src="../assets/images/userp.svg" width="100"
                                    height="100">
                            </a>
                            <a href="register.php">
                                <img style="margin-left: 20px" alt="psychaitrist icon" class="profile_icons"
                                    src="assets/images/psychaitristp.svg" width="100" height="100">
                            </a>
                        </div>
                    </center>

                    <h3 class="hny-title" style="text-align: center; margin: 30px; margin-bottom: -25px;">Register</h3>
                </div>
                <?php

                        if (isset($_GET['error']) && isset($_SESSION['error'])) {
                            echo ' <div class="alert alert-primary" style="left: 20px;">
              ' . $_SESSION['error'] . '
            </div>';
                            unset($_SESSION['error']);
                        }

                        ?>
                <div class="row align-form-map " style="justify-content: center;">

                    <div class="col-lg-6 form-inner-cont">
                        <form action="register_process.php" method="post" class="signin-form"
                            enctype="multipart/form-data">
                            <div class="profile-pic-div">
                                <img src="assets/images/default.png" onClick="triggerClick()" id="profileDisplay">
                                <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage"
                                    class="form-control" style="display: none;">

                                <label for="file" id="uploadBtn">Upload Profile</label>

                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="exampleInputPassword1"
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" id="" placeholder="Contact No." required="">
                            </div>

                            <div class="form-input">
                                <input type="email" name="email" id="w3lSender" placeholder="E-mail" required="" />
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
                            </div>
                            <div class="form-group"> <button type="submit" class="btn btn-contact"
                                    style="margin:5px;">Submit</button>

                            </div>



                        </form>


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


    <script>
    const imgDiv = document.querySelector('.profile-pic-div');
    const uploadBtn = document.querySelector('#uploadBtn');

    //if user hover on img div 

    imgDiv.addEventListener('mouseenter', function() {
        uploadBtn.style.display = "block";
    });

    //if we hover out from img div

    imgDiv.addEventListener('mouseleave', function() {
        uploadBtn.style.display = "none";
    });



    function triggerClick(e) {

        document.querySelector("#profileImage").click();

    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector("#profileDisplay").setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>


</body>

</html>