<!doctype html>
<html lang="en-US">
<?php
require '../config.php';
session_start();
?>

<head>

    <title>Aspire Recovery</title>

    <!-- STYLESHEET -->
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="fonts/icons/main/mainfont/style.css">
    <link rel="stylesheet" href="fonts/icons/font-awesome/css/font-awesome.min.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="vendor/bootstrap/v3/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/v4/bootstrap-grid.css">
    <!-- Custom -->

    <link rel="stylesheet" href="../assets/css/style-starter.css">
    <link rel="stylesheet" href="../psychatrist/assets/css/style-starter.css">

    <style>
    body {
        font-size: 16px;
    }

    .dropdown {
        position: absolute;
        top: auto;
    }

    #top {
        top: 100% !important;
    }
    </style>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

</head>

<body>
    <!-- HEADER -->

    <?php

    include 'partials/header.php';
    include 'partials/_header.php';
    include 'partials/_functions.php';
    ?>

    <link rel="stylesheet" href="css/style.css">
    <main>
        <div class="container" style="margin-bottom:30px;">
            <?php include 'partials/_menu.php'; ?>
            <div class="posts__body" style="display:block; width:100%;">

                <?php if (isset($_GET['catid'])) {
                    $cat_id = $_GET['catid'];
                    echo '<div class="posts__item bg-fef2e0">
<div class="posts__section-left"style="width: 100%;"><div class="posts__topic"><div class="posts__content"><a href="#"><h3><i><img src="fonts/icons/main/pinned.svg"alt="Pinned"></i>Welcome To ' . $cname . 'Category ! We Hope You Will Find Your Answers !</h3></a><p>' . $cdesc . '</p></div></div></div></div>';
                }
                ?>
                <div class="posts"><?php if (isset($_GET['all']) && $_GET['all'] = true) {
                                        echo '<div class="posts__head  " style="background-color:#343a40; color:#FFFFFF">';
                                    } else {
                                        echo '<div class="posts__head" style="background-color:#343a40; color:#FFFFFF">';
                                    }

                                    ?>
                    <div class="posts__topic" style="padding-left:15px;">Topic</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Created By</div>
                    <div class="posts__replies">Replies</div>
                    <div class="posts__views">Views</div>
                    <div class="posts__activity">Activity</div>
                </div>


                <div id="posts__id">

                </div>

            </div>
        </div>
    </main>
    <?php
    require 'partials/_footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Common jquery plugin -->

    <script src="../assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->
    <script src="../assets/js/owl.carousel.js"></script>

    <!-- script for banner slider-->
    <script type="text/javascript">
    $(document).ready(function() {
        function loadTable(page) {
            $.post("partials/pagination.php", {
                    page_no: page

                },
                function(data, status) {
                    $("#posts__id").html(data);
                }
            );
        }
        loadTable();


        //Pagination Code
        $(document).on("click", "#pagination li a", function(e) {
            e.preventDefault();
            page_id = $(this).attr("id");

            loadTable(page_id);

        });

    });
    </script>
    <!-- //script for tesimonials carousel slider -->

    <script src="../assets/js/counter.js"></script>

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
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap-->
</body>


<style>
.dropdown {
    position: absolute;
    top: auto;
}

#top {
    top: 100% !important;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 18px;
    font-weight: 400;
    line-height: 1.5;
}

.posts__content h3 {
    font-size: 20px;
    font-weight: bold;
}

.tags a {
    font-weight: normal;
    font-size: 12px;
}

div.posts__head {
    font-size: 18px;
    font-weight: bold;
}

.nav__select {
    font-weight: 500;
    font-size: 18px;

}

a.nav__thread-btn:hover,
div.btn-select:hover {

    background-color: #343a40;
    color: #FFFFFF;

    transition: color 0.5s, background-color 1s;
}

.posts__item {
    transition: box-shadow 0.1s ease-in-out, transform 0.2s ease-in-out;
}

.posts__item:hover {
    box-shadow: 0 11px 11px 0 rgba(0, 0, 0, .16);
    transform: translateY(-5px);
}
</style>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/velocity/velocity.min.js"></script>
<script src="js/app.js"></script>

</body>

</html>