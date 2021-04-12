<!doctype html>
<html lang="en-US">

<head>

    <title>Aspire Recovery</title>

    <!-- STYLESHEET -->
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="fonts/icons/main/mainfont/style.css">
    <link rel="stylesheet" href="fonts/icons/font-awesome/css/font-awesome.min.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="vendor/bootstrap/v3/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/v4/bootstrap-grid.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/style.css">


    <style>
    .dropdown {
        position: absolute;
        top: auto;
    }

    #top {
        top: 100% !important;
    }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- HEADER -->

    <?php

require 'partials/_header.php';
require '../config.php';
include 'partials/_functions.php';
?>


    <!-- MAIN -->
    <main>
        <div class="container">

            <div class="posts__body" style="display:block; width:100%;">
                <?php
if (isset($_GET['search']) && !empty($_GET['search'])) {

    $term = mysqli_real_escape_string($conn, $_GET['search']);
    $s = "  ";
    echo '<div class="posts__item bg-fef2e0" style="margin-top:25px;">
                        <div class="posts__section-left" style="width: 100%;">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="#">
                                        <h3><i><img src="fonts/icons/main/pinned.svg" alt="Pinned"></i>We Hope You Will Find Your Answers! Search Result for
                                             <b>' . ucwords($term) . ' </b>  ! </h3>
                                    </a>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>';

    echo '  <div class="posts">

  <div class="posts__head">


                <div class="posts__topic">Topic</div>
                <div class="posts__category">Category</div>
                <div class="posts__users">Created By</div>
                <div class="posts__replies">Replies</div>
                <div class="posts__views">Views</div>
                <div class="posts__activity">Activity</div>
            </div>';

    $color = array("", "bg-f2f4f6", "posts__item--bg-gradient");
    $color_array = array("f9bc64", "348aa7", "4436f8", "5dd39e", "f26522", "c49bbb", "ff755a", "bce784", "83253f", "c49bbb", "3ebafa", "c6b38e");
    $tag = array("Photo", "Cool", "Healthy", "Good", "Horror", "Amazing!", "Fabulous!");
    $x = rand(0, 6);

    $r_sql = "SELECT * FROM threads WHERE thread_title LIKE '%" . $term . "%'";
    $r_query = mysqli_query($conn, $r_sql);
    $i = 0;
    $k = false;
    while ($rowa = mysqli_fetch_assoc($r_query)) {
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
        $sqlc = "SELECT cat_name FROM `forum_categories` where cat_id= $thread_c_id";
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

        $sql_last = "SELECT created_at FROM `forum_reply` WHERE fu_id=$thread_id ORDER BY `forum_reply`.`created_at` DESC LIMIT 1";
        $resultl = mysqli_query($conn, $sql_last);
        $rowl = mysqli_num_rows($resultl);
        $l_date = date_create(date('Y-m-d', strtotime($rowl['created_at'])));
        $now = date_create(date('y-m-d'));
        $diff = date_diff($l_date, $now);

        echo '<div class="posts__item ' . $color[$i] . '">
            <div class="posts__section-left">
                <div class="posts__topic">
                    <div class="posts__content">
                        <a href="topic.php?id=' . $thread_id . '&title=' . $thread_title . '">
                            <h3>' . $thread_title . '</h3>
                        </a>
                        <div class="posts__tags tags">
                        <a href="#" class="bg-' . $color_array[$j] . '">' . $tag[$x] . '</a>

                        <a href="#" class="bg-' . $color_array[$f] . '">' . $tag[$y] . '</a>
                    </div>
                    </div>

                </div>
                <div class="posts__category"><a href="#" class="category"><i
                            class="bg-' . $color_array[$j] . '"></i>' . ucwords($c_name) . '</a>
                </div>

            </div>
            <div class="posts__section-right">
                <div class="posts__users js-dropdown">
                    <div>
                    <a href="#" class="avatar"><img src="fonts/icons/avatars/' . $logo . '.svg" alt="avatar" data-dropdown-btn="user-b"></a>
                    <div class="posts__users-dropdown dropdown dropdown--user dropdown--reverse-y" data-dropdown-list="user-b">
                        <div class="dropdown__user">
                            <a href="#" class="dropdown__user-label bg-' . $color_array[$f] . '">' . substr($logo, 0, 1) . '</a>
                            <div class="dropdown__user-nav">
                                <a href="#"><i class="icon-Add_User"></i></a>
                                <a href="#"><i class="icon-Message"></i></a>
                            </div>
                            <div class="dropdown__user-info">
                                <a href="#">' . $input . '</a>
                                <p>Last post 4 hours ago. Joined ' . $r_date . '</p>
                            </div>
                            <div class="dropdown__user-icons">
                                <a href="#"><img src="fonts/icons/badges/Intermediate.svg" alt="user-icon"></a>
                                <a href="#"><img src="fonts/icons/badges/Bot.svg" alt="user-icon"></a>
                                <a href="#"><img src="fonts/icons/badges/Animal_Lover.svg" alt="user-icon"></a>
                            </div>
                            <div class="dropdown__user-statistic">
                                <div>Threads - <span>1184</span></div>
                                <div>Posts - <span>5,863</span></div>
                            </div>
                        </div>
                    </div>

                    </div>

                </div>
                <div class="posts__replies">31</div>
                <div class="posts__views">14.5k</div>
                <div class="posts__activity">' . $diff->format("%d days") . '</div>
            </div>
        </div>';

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
} else {

}
?>



            </div>
        </div>
        </div>
    </main>

    <?php
require 'partials/_footer.php';
?>

    <!-- JAVA SCRIPT -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/velocity/velocity.min.js"></script>
    <script src="js/app.js"></script>

    <script>

    </script>

</body>

</html>