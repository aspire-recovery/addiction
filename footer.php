<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Aspire recovery</title>

    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="psychatrist/assets/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<body>
<!-- //stats -->
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
                                <p><a href="mailto:info@example.com">aspirerecovery173@gmail.com</a></p>
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
                                    <li><a href="https://github.com/valentinos2077"><span class="fa fa-github"
                                                                                          aria-hidden="true"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- //footer 14 -->

            <script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->

            <script src="assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->
            <script src="assets/js/owl.carousel.js"></script>

            <!-- script for banner slider-->
            <script>
                $(document).ready(function () {
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
                $(document).ready(function () {
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
                $(window).on("scroll", function () {
                    var scroll = $(window).scrollTop();

                    if (scroll >= 80) {
                        $("#site-header").addClass("nav-fixed");
                    } else {
                        $("#site-header").removeClass("nav-fixed");
                    }
                });

                //Main navigation Active Class Add Remove
                $(".navbar-toggler").on("click", function () {
                    $("header").toggleClass("active");
                });
                $(document).on("ready", function () {
                    if ($(window).width() > 991) {
                        $("header").removeClass("active");
                    }
                    $(window).on("resize", function () {
                        if ($(window).width() > 991) {
                            $("header").removeClass("active");
                        }
                    });
                });
            </script>
            <!--//MENU-JS-->

            <!-- disable body scroll which navbar is in active -->
            <script>
                $(function () {
                    $('.navbar-toggler').click(function () {
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