<?php
require 'includes/config.inc.php';

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
     <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <style>
    .header__user-btn {
        color: #8e9091;
        cursor: pointer;
        align-items: center;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        border-radius: 50%;
        border: 3px solid white;

    }

    .header__user-btn:hover {
        border: 3px solid rgb(212, 212, 212);

    }


    .header__user-btn>i {
        margin-top: 2px;
        margin-left: 15px;
        font-size: 6px;
    }
    .cart-btn{
        display: inline-block;
    color: #394047;
    height: 38px;
    padding: 8px 15px;
    margin:0 10px;
    font-size: 16px;
    border-radius: 0;
    background-color: #e9ecee;
    justify-content: center;
    align-items: center;
    display: -moz-inline-box;
    display: -ms-inline-flexbox;
    display: -webkit-inline-flex;
    display: inline-flex;
    }
    nav ul li a:hover{
        color: #394047 !important;
    }
    .cart-btn span{
        margin-left: 4px;
        margin-right: 4px;

    }
    </style>
</head>

<body>
    <!--header-->
    <?php
if (!isset($_SESSION['u_id'])) {
    ?>
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke">
                <h1><a class="navbar-brand mr-lg-5" href="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../index.php";
    } else {
        echo "index.php";
    }?>">
                        <?php ?> Aspire</a></h1>
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item @@home__active">
                            <a class="nav-link" href="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../index.php";
    } else {
        echo "index.php";
    }?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../about.php";
    } else {
        echo "about.php";
    }?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../articles.php";
    } else {
        echo "articles.php";
    }?>">Articles</a>
                        </li>


                        <li class="ml-lg-auto mr-lg-0 m-auto">
                        </li>
                        <li class="align-self">
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>

                        </li>
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <?php
} else {

    ?>
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke">
                <h1><a class="navbar-brand mr-lg-5" href="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../index.php";
    } else {
        echo "index.php";
    }?>">
                        Aspire </a></h1>
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item @@home__active">
                            <a class="nav-link" href="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../index.php";
    } else {
        echo "index.php";
    }?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../product.php";
    } else {
        echo "product.php";
    }?>">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" <?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../forum/forum.php";
    } else {
        echo "forum/forum.php";
    }?>">Forum</a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href=" <?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psychatrist') !== false) {
        echo "../about.php";
    } else {
        echo "about.php";
    }?>">About</a>
                        </li>
                        <li class="ml-lg-auto mr-lg-0 m-auto">
                        </li>
                        <li class="align-self">

                            <div class="header__user-btn" style="overflow: hidden;">
                                <img style="height:40px; width: 40px; object-fit: cover;" src="<?php $u_img = $_SESSION['u_img'];
    if (strpos($u_img, 'fonts') !== false) {
        echo "forum/" . $u_img;
    } else {
        echo $u_img;
    }?>"
                                    onclick="location.href='profile.php'" class="" alt=" avatar">

                            </div>

                        </li>
                        <li class="align-self">


<a href="./cart.php" class="cart-btn"><span
        class="fa fa-shopping-cart"></span> CART</a>

</li>
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <?php
}
?>
    <!-- //header -->
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