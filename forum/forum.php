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
            <?php include 'partials/_menu.php';?>
            <div class="posts__body" style="display:block; width:100%;">

                <?php if (isset($_GET['catid'])) {
                    echo '<div class="posts__item bg-fef2e0">
<div class="posts__section-left"style="width: 100%;"><div class="posts__topic"><div class="posts__content"><a href="#"><h3><i><img src="fonts/icons/main/pinned.svg"alt="Pinned"></i>Welcome To ' . $cname . 'Category ! We Hope You Will Find Your Answers !</h3></a><p>' . $cdesc . '</p></div></div></div></div>';
                }
?>
                <div class="posts"><?php if (isset($_GET['all']) && $_GET['all'] = true) {
    echo '<div class="posts__head  bg-fef2e0">';
} else {
    echo '<div class="posts__head">';
}

?>
                    <div class="posts__topic">Topic</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Created By</div>
                    <div class="posts__replies">Replies</div>
                    <div class="posts__views">Views</div>
                    <div class="posts__activity">Activity</div>
                </div>

                <?php $color = array("", "bg-f2f4f6", "posts__item--bg-gradient");
$color_array = array("ff5200", "3b3663", "333333", "0a0a0a", "b9b9b9", "fe346e", "0d001a", "ffc107", "83253f", "c49bbb", "3ebafa", "c6b38e");
$tag = array("Photo", "Cool", "Healthy", "Good", "Horror", "Amazing!", "Fabulous!");
$x = rand(0, 6);

if (isset($_GET['catid'])) {
    $cat_id = $_GET['catid'];
    $sqla = "SELECT * FROM `threads` WHERE c_id='$cat_id'";
    $resulta = mysqli_query($conn, $sqla);
} else {
    $sqla = "SELECT * FROM `threads`";
    $resulta = mysqli_query($conn, $sqla);
}

$i = 0;
$k = false;

while ($rowa = mysqli_fetch_assoc($resulta)) {
    $thread_id = $rowa['thread_id'];
    $thread_desc = $rowa['thread_desc'];
    $thread_title = $rowa['thread_title'];
    $thread_user = $rowa['user_id'];
    $thread_c_id = $rowa['c_id'];
    $sqlu = "SELECT u_name,r_date FROM `user` where u_id= $thread_user";
    $resultu = mysqli_query($conn, $sqlu);
    $rowu = mysqli_fetch_assoc($resultu);
    $input = $rowu['u_name'];
    $r_date = date('Y-m-d', strtotime($rowu['r_date']));
    $logo = userlogo($input);
    $sqlc = "SELECT * FROM `forum_categories` where cat_id= $thread_c_id";
    $resultc = mysqli_query($conn, $sqlc);
    $rowc = mysqli_fetch_assoc($resultc);
    $c_name = $rowc['cat_name'];
    $j = rand(0, 11);
    $f = rand(0, 11);
    $x = rand(0, 6);
    $y = rand(0, 6);

    if ($x == $y) {
        $x = rand(0, 6);
    }

    $sqlr = "SELECT * FROM `forum_reply` where fu_id='" . $thread_id . "'";
    $resultr = mysqli_query($conn, $sqlr);
    $rowcount = mysqli_num_rows($resultr);

    $sql_last = "SELECT created_at FROM `forum_reply` WHERE fu_id=$thread_id ORDER BY `forum_reply`.`created_at` DESC LIMIT 1";
    $resultl = mysqli_query($conn, $sql_last);
    $rowl = mysqli_fetch_assoc($resultl);
    $l_date = date_create(date('Y-m-d', strtotime($rowl['created_at'])));
    $now = date_create(date('y-m-d'));
    $diff = date_diff($l_date, $now);

    echo '<div class="posts__item ' . $color[$i] . '">
<div class="posts__section-left"><div class="posts__topic"><div class="posts__content"><a href="topic.php?id=' . $thread_id . '&title=' . $thread_title . '"><h3>' . $thread_title . '</h3></a><div class="posts__tags tags"><a href="#"class="bg-' . $color_array[$j] . '">' . $tag[$x] . '</a><a href="#"class="bg-' . $color_array[$f] . '">' . $tag[$y] . '</a></div></div></div><div class="posts__category"><a href="forum.php?catid=' . $rowc['cat_id'] . '"class="category"><i class="bg-' . $color_array[$j] . '"></i>' . ucwords($c_name) . '</a></div></div><div class="posts__section-right"><div class="posts__users js-dropdown"><div><a href="#"class="avatar"><img src="fonts/icons/avatars/' . $logo . '.svg"alt="avatar"data-dropdown-btn="user-b"></a><div class="posts__users-dropdown dropdown dropdown--user dropdown--reverse-y"data-dropdown-list="user-b"><div class="dropdown__user"><a href="#"class="dropdown__user-label bg-' . $color_array[$f] . '">' . substr($logo, 0, 1) . '</a><div class="dropdown__user-nav"><a href="#"><i class="icon-Add_User"></i></a><a href="#"><i class="icon-Message"></i></a></div><div class="dropdown__user-info"><a href="#">' . $input . '</a><p>Last post 4 hours ago. Joined ' . $r_date . '</p></div><div class="dropdown__user-icons"><a href="#"><img src="fonts/icons/badges/Intermediate.svg"alt="user-icon"></a><a href="#"><img src="fonts/icons/badges/Bot.svg"alt="user-icon"></a><a href="#"><img src="fonts/icons/badges/Animal_Lover.svg"alt="user-icon"></a></div><div class="dropdown__user-statistic"><div>Threads - <span>1184</span></div><div>Posts - <span>5,
        863</span></div></div></div></div></div></div><div class="posts__replies">' . $rowcount . '</div><div class="posts__views">14.5k</div><div class="posts__activity">' . $diff->format("%d days") . '</div></div></div>';

    if ($i == 0 && $k == false) {
        $i = 1;
    } elseif ($k == true) {
        $i = 2;
        $k = false;
    } elseif ($i == 2) {
        $i = 0;
    } else {
        $i = 0;

        if ($k == false) {
            $k = true;
        } else {
            $k = false;
        }
    }
}

?>
            </div>
        </div>
        </div>
    </main>
    <?php
require 'partials/_footer.php';
?>
    <script src="../assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->

    <script src="../assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->
    <script src="../assets/js/owl.carousel.js"></script>

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
</style>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/velocity/velocity.min.js"></script>
<script src="js/app.js"></script>
<script></script>
</body>

</html>