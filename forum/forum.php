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
            <div class="nav">
                <div class="nav__categories js-dropdown" style="padding: 15px 0px;">
                    <div class="nav__select">


                        <div class="btn-select" data-dropdown-btn="categories"><?php
                                                                                if (isset($_GET['catid'])) {
                                                                                    $cid = $_GET['catid'];
                                                                                    $sql2 = "SELECT * FROM `forum_categories` WHERE cat_id =" . $cid . "";
                                                                                    $result2 = mysqli_query($conn, $sql2);
                                                                                    $row2 = mysqli_fetch_assoc($result2);
                                                                                    $cname = ucwords($row2['cat_name']);
                                                                                    $cdesc = $row2['cat_desc'];
                                                                                    echo $cname;
                                                                                } else {
                                                                                    echo "All Categories";
                                                                                }
                                                                                ?></div>

                        <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                            <ul class="dropdown__catalog row">
                                <?php
                                $sql = "SELECT * FROM `forum_categories`";
                                $result = mysqli_query($conn, $sql);
                                $color_array = array("f9bc64", "348aa7", "4436f8", "5dd39e", "ff755a", "bce784", "83253f", "c49bbb", "3ebafa", "c6b38e");
                                $i = rand(0, 9);
                                echo '<li class="col-xs-6"><a href="forum.php?all=true" class="category"><i class="bg-' . $color_array[$i] . '"></i> All Categories </a>
                                </li>';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $i = rand(0, 9);
                                    $catid = $row['cat_id'];
                                    $catname = $row['cat_name'];
                                    echo '<li class="col-xs-6"><a href="forum.php?catid=' . $catid . '" class="category"><i class="bg-' . $color_array[$i] . '"></i>' . $catname . '</a>
                                </li>';
                                }

                                ?>
                            </ul>
                        </nav>
                    </div>

                    <div class="nav__menu js-dropdown">
                        <div class="nav__select">
                            <div class="b" data-dropdown-btn="menu"></div>
                            <div class="" data-dropdown-list="menu">
                                <ul class="">

                                </ul>
                            </div>
                        </div>
                        <ul>
                        </ul>
                    </div>
                </div>

                <div class="posts__body" style="display:block; width:100%;">
                    <?php
                    if (isset($_GET['catid'])) {

                        echo '<div class="posts__item bg-fef2e0">
                        <div class="posts__section-left" style="width: 100%;">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="#">
                                        <h3><i><img src="fonts/icons/main/pinned.svg" alt="Pinned"></i>Welcome To
                                            ' . $cname . ' Category! We Hope You Will Find Your Answers!</h3>
                                    </a>
                                    <p>' . $cdesc . '</p>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                    <!-- MENU -->
                    <div class="posts">
                        <?php
                        if (isset($_GET['all']) && $_GET['all'] = true) {
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
                    <?php
                    $color = array("", "bg-f2f4f6", "posts__item--bg-gradient");
                    $color_array = array("f9bc64", "348aa7", "4436f8", "5dd39e", "f26522", "c49bbb", "ff755a", "bce784", "83253f", "c49bbb", "3ebafa", "c6b38e");
                    $tag = array("Photo", "Cool", "Healthy", "Good", "Horror", "Amazing!", "Fabulous!",);
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
                        $r_date = date('Y-m-d', strtotime($rowu['r_date']));;
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
                        echo '<div class="posts__item ' . $color[$i] . '">
            <div class="posts__section-left">
                <div class="posts__topic">
                    <div class="posts__content">
                        <a href="#">
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
                <div class="posts__activity">13d</div>
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