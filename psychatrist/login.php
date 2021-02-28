<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aspire Recovery
    </title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
</head>

<body>
<?php
include "header.php";
?>
<!-- /specification-6-->
<!-- //specification-6-->
<section class="w3l-about5">
    <div class="container-fluid px-0">
        <div class="history-info position-relative">
            <div class="heading text-center mx-auto">
                <h3 class="hny-title two">Two Line Text</p>
                    <a href="#small-dialog" class="popup-with-zoom-anim play-view text-center position-absolute">
						<span class="video-play-icon">
							<span class="fa fa-play"></span>
						</span>
                    </a>
            </div>
            <div class="position-relative">


                <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                    <iframe src="https://player.vimeo.com/video/169036704" frameborder="0" allow="autoplay; fullscreen"
                            allowfullscreen></iframe>
                </div>

                <style type="text/css">
                    /* Styles for dialog window */
                    #small-dialog {
                        background: white;
                        padding: 5px;
                        max-width: 750px;
                        margin: 40px auto;
                        position: relative;
                    }

                    div#small-dialog iframe {
                        width: 100%;
                        height: 400px;
                        display: block;
                    }


                    /**
       * Fade-zoom animation for first dialog
       */

                    /* start state */
                    .my-mfp-zoom-in .zoom-anim-dialog {
                        opacity: 0;

                        -webkit-transition: all 0.2s ease-in-out;
                        -moz-transition: all 0.2s ease-in-out;
                        -o-transition: all 0.2s ease-in-out;
                        transition: all 0.2s ease-in-out;


                        -webkit-transform: scale(0.8);
                        -moz-transform: scale(0.8);
                        -ms-transform: scale(0.8);
                        -o-transform: scale(0.8);
                        transform: scale(0.8);
                    }

                    /* animate in */
                    .my-mfp-zoom-in.mfp-ready .zoom-anim-dialog {
                        opacity: 1;

                        -webkit-transform: scale(1);
                        -moz-transform: scale(1);
                        -ms-transform: scale(1);
                        -o-transform: scale(1);
                        transform: scale(1);
                    }

                    /* animate out */
                    .my-mfp-zoom-in.mfp-removing .zoom-anim-dialog {
                        -webkit-transform: scale(0.8);
                        -moz-transform: scale(0.8);
                        -ms-transform: scale(0.8);
                        -o-transform: scale(0.8);
                        transform: scale(0.8);

                        opacity: 0;
                    }

                    /* Dark overlay, start state */
                    .my-mfp-zoom-in.mfp-bg {
                        opacity: 0;
                        -webkit-transition: opacity 0.3s ease-out;
                        -moz-transition: opacity 0.3s ease-out;
                        -o-transition: opacity 0.3s ease-out;
                        transition: opacity 0.3s ease-out;
                    }

                    /* animate in */
                    .my-mfp-zoom-in.mfp-ready.mfp-bg {
                        opacity: 0.8;
                    }

                    /* animate out */
                    .my-mfp-zoom-in.mfp-removing.mfp-bg {
                        opacity: 0;
                    }


                    /**
       * Fade-move animation for second dialog
       */

                    /* at start */
                    .my-mfp-slide-bottom .zoom-anim-dialog {
                        opacity: 0;
                        -webkit-transition: all 0.2s ease-out;
                        -moz-transition: all 0.2s ease-out;
                        -o-transition: all 0.2s ease-out;
                        transition: all 0.2s ease-out;

                        -webkit-transform: translateY(-20px) perspective(600px) rotateX(10deg);
                        -moz-transform: translateY(-20px) perspective(600px) rotateX(10deg);
                        -ms-transform: translateY(-20px) perspective(600px) rotateX(10deg);
                        -o-transform: translateY(-20px) perspective(600px) rotateX(10deg);
                        transform: translateY(-20px) perspective(600px) rotateX(10deg);

                    }

                    /* animate in */
                    .my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
                        opacity: 1;
                        -webkit-transform: translateY(0) perspective(600px) rotateX(0);
                        -moz-transform: translateY(0) perspective(600px) rotateX(0);
                        -ms-transform: translateY(0) perspective(600px) rotateX(0);
                        -o-transform: translateY(0) perspective(600px) rotateX(0);
                        transform: translateY(0) perspective(600px) rotateX(0);
                    }

                    /* animate out */
                    .my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
                        opacity: 0;

                        -webkit-transform: translateY(-10px) perspective(600px) rotateX(10deg);
                        -moz-transform: translateY(-10px) perspective(600px) rotateX(10deg);
                        -ms-transform: translateY(-10px) perspective(600px) rotateX(10deg);
                        -o-transform: translateY(-10px) perspective(600px) rotateX(10deg);
                        transform: translateY(-10px) perspective(600px) rotateX(10deg);
                    }

                    /* Dark overlay, start state */
                    .my-mfp-slide-bottom.mfp-bg {
                        opacity: 0;

                        -webkit-transition: opacity 0.3s ease-out;
                        -moz-transition: opacity 0.3s ease-out;
                        -o-transition: opacity 0.3s ease-out;
                        transition: opacity 0.3s ease-out;
                    }

                    /* animate in */
                    .my-mfp-slide-bottom.mfp-ready.mfp-bg {
                        opacity: 0.8;
                    }

                    /* animate out */
                    .my-mfp-slide-bottom.mfp-removing.mfp-bg {
                        opacity: 0;
                    }
                </style>

                <!-- popup -->
                <div id="popup-video" class="pop-overlay">
                    <div class="popup">
                        <div class="align-popup-video">
                            <iframe src="https://www.youtube.com/embed/JemJbNJ4ZtU" frameborder="0"
                                    allowfullscreen></iframe>
                            <a class="close" href="#portfolio">&times;</a>
                        </div>

                    </div>
                </div>
                <!-- /popup -->
            </div>
        </div>
    </div>
</section>
<!--/testimonials-->
<section class="w3l-free-consultion">
    <div class="container">
        <div class="consultation-grids">
            <div class="apply-form">
                <h5>Login</h5>
                <form action="login_process.php" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<footer class="w3l-footer-66">
    <!-- footer -->
    <div class="footer-66-info">
        <div class="container">
            <div class="row footer-top">
                <div class="col-lg-4 footer-grid_section_w3layouts pr-lg-5">
                    <h2 class="logo-2 mb-lg-4 mb-3">
                        <a class="navbar-brand" href="index.html"><span>Dent</span>ile</a>
                        <!-- if logo is image enable this
                                <a class="navbar-brand" href="#index.html">
                                    <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                                </a> -->
                    </h2>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat.</p>
                    <h4 class="sub-con-fo ad-info my-4">Catch on Social</h4>
                    <ul class="w3layouts_social_list list-unstyled">
                        <li>
                            <a href="#" class="w3pvt_facebook">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="w3pvt_twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="w3pvt_dribble">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="w3pvt_google">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 footer-right">
                    <div class="w3layouts-news-letter">
                        <h3 class="footer-title mb-0">Newsletter</h3>

                        <p class="mb-3">By subscribing to our mailing list you will always get latest news and
                            updates from us.
                        </p>
                        <form action="#" method="post" class="w3layouts-newsletter">
                            <input type="email" name="Email" placeholder="Enter your email..." required="">
                            <button class="btn1"> Subscribe</button>

                        </form>
                    </div>
                    <div class="bottom-w3layouts-sec-nav">
                        <div class="row sub-content-botom mx-0">
                            <div class="col-md-4 footer-grid_section_w3layouts pl-lg-0">
                                <h3 class="footer-title">Information</h3>
                                <ul class="footer list-unstyled">
                                    <li>
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">Blog</a>
                                    </li>
                                    <li>
                                        <a href="services.html">Services</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 footer-grid_section_w3layouts">
                                <!-- social icons -->

                                <h3 class="footer-title">Treatments</h3>
                                <ul class="footer list-unstyled">

                                    <li>
                                        <a href="#">Preventative Dentistry</a>
                                    </li>
                                    <li>
                                        <a href="#">Child Dentistry</a>
                                    </li>
                                    <li>
                                        <a href="#">Affordable Dentures</a>
                                    </li>
                                    <li>
                                        <a href="#">Tooth Extraction</a>
                                    </li>

                                </ul>

                                <!-- social icons -->
                            </div>
                            <div class="col-md-4 footer-grid_section_w3layouts ">
                                <h3 class="footer-title">Working Hours</h3>
                                <ul class="wrk-schedule-block">
                                    <li>Monday<span class="schedule-time">09:00 – 17:00</span></li>
                                    <li>Tuesday<span class="schedule-time">09:00 – 17:00</span></li>
                                    <li>Wednesday<span class="schedule-time">09:00 – 17:00</span></li>
                                    <li>Thursday<span class="schedule-time">09:00 – 17:00</span></li>
                                    <li>Friday<span class="schedule-time">09:00 – 17:00</span></li>
                                    <li>Sat day-Sunday<span class="schedule-time">Closed</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cpy-right py-3">
        <p class="text-center">© 2020 Dentile. All rights reserved | Design by
            <a href="http://w3layouts.com"> W3layouts.</a>
        </p>
    </div>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-level-up"></span>
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
<!--//footer-66 -->
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
<!--/scroll-down-JS-->
<!-- stats -->
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
    $('.counter').countUp();
</script>
<!-- //stats -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
        });
    });
</script>
<!-- for blog carousel slider -->
<script src="assets/js/owl.carousel.js"></script>
<!-- script for banner slider-->
<script>
    $(document).ready(function () {
        $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                480: {
                    items: 1,
                    nav: false
                },
                667: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true
                }
            }
        })
    })
</script>
<!-- //testimonials owlcarousel -->
<script>
    $(document).ready(function () {
        $('.owl-two').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                480: {
                    items: 1,
                    nav: false
                },
                667: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: false
                }
            }
        })
    })
</script>
<!-- //script for Testimonials-->
<!-- //script -->

<script src="assets/js/bootstrap.min.js"></script>
