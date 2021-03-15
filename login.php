<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Aspire Recovery</title>

    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!--header-->
    <?php
include "header.php";
?>
    <!-- //header -->
    <div class="inner-banner">
        <section class="w3l-breadcrumb py-5">
            <div class="container py-lg-5 py-md-3">
                <h2 class="title"></h2>
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

                    <div class="col-lg-8">
                        <?php
if (isset($_GET['success'])) {

    echo ' <h3 class="title-big" style=" margin-bottom:25px;">
                                   Success!!!
                                   </h3>
                                   <br>
                                   <br>

                                   <div class="alert alert-primary">
                                    Password ResetSucess
                                   </div>
                                 ';
}?>
                        <form action="login_process.php" method="post" class="text-right" style="width: 70%">
                            <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10">
                                <input type="email" name="email" id="" placeholder="Email" required="">
                            </div>
                            <br>
                            <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10">
                                <input type="password" name="password" id="" placeholder="Password" required="">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit"
                                style="float: left;width: 30%;padding:  10px;margin-top: 10px;margin-left: 20px;">Login
                            </button>
                            <a href="register.php" class="btn btn-primary"
                                style="float: left;padding:  10px;margin-top: 10px;margin-left: 20px;">Create
                                Account</a>
                            <br>
                            <br>
                            <br>
                            <a href=" reset-password.php" class="badge badge-warning"
                                style="float: left;padding:  10px;margin-top: 10px;margin-left: 20px;">Forgot Password
                                ?</a>
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
            <section class="_form-3">
                <div class="form-main">
                </div>
            </section>
            <!-- Footers-14 -->
            <footer class="footer-14">
                <div id="footers14-block">
                    <div class="container">
                        <div class="footers20-content">
                            <div class="d-grid grid-col-4 grids-content">
                                <div class="column">
                                    <h4>Our Address</h4>
                                    <p>235 Terry, 10001 20C Trolley Square,
                                        DE 19806 U.S.A.</p>
                                </div>
                                <div class="column">
                                    <h4>Call Us</h4>
                                    <p>Mon - Fri 10:30 -18:00</p>
                                    <p><a href="tel:+44-000-888-999">+44-000-888-999</a></p>
                                </div>
                                <div class="column">
                                    <h4>Mail Us</h4>
                                    <p><a href="mailto:info@example.com">info@example.com</a></p>
                                    <p><a href="mailto:no.reply@example.com">no.reply@example.com</a></p>
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
                                        <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footers14-bottom d-flex">
                            <div class="copyright">
                                <p>© 2020 Save Poor. All rights reserved. Design by <a href="https://w3layouts.com/"
                                        target="_blank">W3Layouts</a></p>
                            </div>
                            <div class="language-select d-flex">
                                <span class="fa fa-language" aria-hidden="true"></span>
                                <select>
                                    <option>English</option>
                                    <option>Estonina</option>
                                    <option>Deutsch</option>
                                    <option>Nederlan;ds</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- move top -->
                <script>
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {
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