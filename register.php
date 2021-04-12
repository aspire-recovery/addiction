<?php
//Imports
require 'config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Aspire Recovery</title>

    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    </style>
</head>

<body>
    <!--header-->
    <?php
include "header.php";
?>
    <!-- //header -->
    <div class="inner-banner" style="background-color: #269abc">
        <section class="w3l-breadcrumb py-5">
            <div class="container py-lg-5 py-md-3">
                <center>
                    <h3 style="color:black; margin-bottom: 20px">ARE YOU?</h3>
                    <div class="">
                        <a href="register.php">
                            <img  alt="user icon" class="profile_icons" src="../addiction/assets/images/userp.svg" width="100" height="100">
                        </a>
                        <a href="psychatrist/registration.php">
                            <img style="margin-left: 20px" alt="psychaitrist icon" class="profile_icons" src="../addiction/assets/images/psychaitristp.svg" width="100" height="100">
                        </a>
                    </div>
                </center>
            </div>
        </section>
    </div>
    <!-- banner bottom shape -->
    <div class="position-relative">
        <div class="shape overflow-hidden">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- banner bottom shape -->
    <!-- contacts -->
    <section class="w3l-contact-7 py-5" id="contact">
        <div class="container">
            <div class="top-map">
                <div class="row map-content-9">
                    <?php

if (isset($_GET['exist']) && $_GET['exist'] == true) {

    echo ' <div class="alert alert-primary" style="left: 20px;">
                        Email Already Exist!
                    </div>';
}
?>

                    <div class="col-lg-8">
                        <h3 class="title-big">Register</h3>
                        <br>

                        <form action="register_process.php" method="post" class="text-right" style="width: 70%">
                            
                            
                            <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10">
                                <input type="text" name="name" id="" placeholder="Name" required="">
                            </div>
                            <br>
                            <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10">
                                <input type="email" name="email" id="" placeholder="Email" required="">
                            </div>
                            <br>
                            <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10">
                                <input type="password" name="password" id="" placeholder="Password" required="">
                            </div>
                            <br>
                            <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10">
                                <input type="number" name="phone" id="" placeholder="Contact No." required="">
                            </div>
                            <br>
                            <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10">
                                <select name="gender" class="form-control" style="margin-top: 10px">
                                    <option style="width: 40%" value="">Select Gender...</option>
                                    <option style="width: 40%" value="male">Male</option>
                                    <option style="width: 40%" value="female">Female</option>
                                    <option style="width: 40%" value="others">Others</option>
                                </select>
                            </div>
                            <br>
                            <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10">
                                <select name="addiction" class="form-control" style="margin-top: 10px">
                                    
                                    <?php
$addiction_sql = "SELECT add_id,add_name FROM `addiction_types`";
$result = $conn->query($addiction_sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['add_id'] . '">' . $row['add_name'] . '</option>';
    }
}
?>
                                </select>
                            </div>
                            <br>
                           
                            <button type="submit" class="btn btn-primary" name="submit"
                                style="float: left;width: 30%;padding:  10px;margin-top: 10px;margin-left: 20px;">Create
                                Account
                            </button>
                       
                            <a href="login.php" class="btn btn-primary"
                                style="float: left;width: 30%;padding: 10px;margin-top: 10px;margin-left: 20px;">Login</a>
                            <br>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contacts -->
    <!-- footer 14 -->
    <div class="w3l-footer-main">
        <div class="w3l-sub-footer-content">
            <!-- Footers-14 -->
            <footer class="footer-14">
                <div id="footers14-block">
                    <div class="container">
                        <div class="footers20-content">
                            <div class="d-grid grid-col-4 grids-content">
                                <div class="column">
                                    <h4>Our Address</h4>
                                    <p>MSU Polytechnic,Pandya Bridge,Sayaji Gunj,vadodara</p>
                                </div>
                                <div class="column">
                                    <h4>Call Us</h4>
                                    <p>Mon - Fri 10:30 -18:00</p>
                                    <p><a href="tel:+916351301322">6351301322</a></p>
                                </div>
                                <div class="column">
                                    <h4>Mail Us</h4>
                                    <p><a href="mailto:info@example.com">umang.kalavadiya@gmail.com</a></p>
                                    <p><a href="mailto:no.reply@example.com">Salatd0852@gmail.com</a></p>
                                    <p><a href="mailto:no.reply@example.com">ajay.rathod0801@gmail.com</a></p>
                                </div>
                                <div class="column">
                                    <h4>Follow Us On</h4>
                                    <ul>
                                        <li><a href="#facebook"><span class="fa fa-facebook"
                                                                      aria-hidden="true"></span></a>
                                        </li>
                                        <li><a href="#linkedin"><span class="fa fa-linkedin"
                                                                      aria-hidden="true"></span></a>
                                        </li>
                                        <li><a href="#twitter"><span class="fa fa-twitter"
                                                                     aria-hidden="true"></span></a>
                                        </li>
                                        <li><a href="#google"><span class="fa fa-google-plus"
                                                                    aria-hidden="true"></span></a>
                                        </li>
                                        <li><a href="https://github.com/valentinos2077"><span class="fa fa-github" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- move top -->
                <button onclick="topFunction()" id="movetop" title="Go to top">
                    &uarr;
                </button>
                <script>
                    // When the user scrolls down 20px from the top of the document, show the button
                    window.onscroll = function () {
                        scrollFunction()
                    };

                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            document.getElementById("movetop").style.display = "block";
                        } else {
                            document.getElementById("movetop").style.display = "none";
                        }
                    }

                    // When the user clicks on the button, scroll to the top of the document
                    function topFunction() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    }
                </script>
                <!-- /move top -->

            </footer>
            <!-- Footers-14 -->
        </div>
    </div>
    <!-- //footer 14 -->

    <script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->

    <script src="assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->
    <script src="assets/js/owl.carousel.js"></script>

    <!-- script for banner slider-->
    <script>
    $(document).ready(function() {
        $('.owl-one').owlCarousel({
            loop: true,
            dots: false,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                667: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    })
    </script>
    <!-- //script -->

    <!-- script for tesimonials carousel slider -->
    <script>
    $(document).ready(function() {
        $("#owl-demo1").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                736: {
                    items: 1
                },
                1000: {
                    items: 2,
                    loop: false
                }
            }
        })
    })
    </script>
    <!-- //script for tesimonials carousel slider -->

    <script src="assets/js/counter.js"></script>

    <!--/MENU-JS-->
    <script>
    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function() {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function() {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
    </script>
    <!--//MENU-JS-->

    <!-- disable body scroll which navbar is in active -->
    <script>
    $(function() {
        $('.navbar-toggler').click(function() {
            $('body').toggleClass('noscroll');
        })
    });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- //bootstrap-->
</body>

</html>