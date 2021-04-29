<?php
require '../../includes/config.inc.php';
include '_functions.php';
session_start();

$color = array("", "bg-f2f4f6", "posts__item--bg-gradient");
$color_array = array("ff5200", "3b3663", "333333", "0a0a0a", "b9b9b9", "fe346e", "0d001a", "ffc107", "83253f", "c49bbb", "3ebafa", "c6b38e");
$tag = array("sad", "Cool", "Healthy", "Good", "Horror", "Amazing!", "Fabulous!");
$x = rand(0, 6);

//Pagination
$limit_per_page = 5;


if (isset($_POST["page_no"])) {
    $page = $_POST["page_no"];
} else {
    $page = 1;
}


$offset = ($page - 1) * $limit_per_page;

$cat_id = "";
if (isset($_SESSION['cat_id'])) {
    $cat_id = $_SESSION['cat_id'];

    $sqla = "SELECT * FROM `threads` WHERE c_id='$cat_id' LIMIT {$offset},{$limit_per_page}";
    $resulta = mysqli_query($conn, $sqla);
    $sqlt = "SELECT * FROM `threads` WHERE c_id='$cat_id'";
    $resultt = mysqli_query($conn, $sqlt);
} else {


    $sqla = "SELECT * FROM `threads` LIMIT {$offset},{$limit_per_page}";
    $resulta = mysqli_query($conn, $sqla);
    $sqlt = "SELECT * FROM `threads`";
    $resultt = mysqli_query($conn, $sqlt);
}

$total_record = mysqli_num_rows($resultt);
$total_pages = ceil($total_record / $limit_per_page);
$output = "";
if (mysqli_num_rows($resulta) > 0) {

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
        $num = mysqli_num_rows($resultl);

        $rowl = mysqli_fetch_assoc($resultl);

        if (isset($rowl['created_at'])) {
            $l_date = date_create(date('Y-m-d', strtotime($rowl['created_at'])));
            $now = date_create(date('y-m-d'));
            $diff = date_diff($l_date, $now);

            $output .= '<div class="posts__item ' . $color[$i] . '">
<div class="posts__section-left"><div class="posts__topic"><div class="posts__content"><a href="topic.php?id=' . $thread_id . '&title=' . $thread_title . '"><h3>' . $thread_title . '</h3></a><div class="posts__tags tags"><a href="#"class="bg-' . $color_array[$j] . '">' . $tag[$x] . '</a><a href="#"class="bg-' . $color_array[$f] . '">' . $tag[$y] . '</a></div></div></div><div class="posts__category"><a href="forum.php?catid=' . $rowc['cat_id'] . '"class="category"><i class="bg-' . $color_array[$j] . '"></i>' . ucwords($c_name) . '</a></div></div><div class="posts__section-right"><div class="posts__users js-dropdown"><div><a href="#"class="avatar"><img src="fonts/icons/avatars/' . $logo . '.svg"alt="avatar"data-dropdown-btn="user-b"></a><div class="posts__users-dropdown dropdown dropdown--user dropdown--reverse-y"data-dropdown-list="user-b"><div class="dropdown__user"><a href="#"class="dropdown__user-label bg-' . $color_array[$f] . '">' . substr($logo, 0, 1) . '</a><div class="dropdown__user-nav"><a href="#"><i class="icon-Add_User"></i></a><a href="#"><i class="icon-Message"></i></a></div><div class="dropdown__user-info"><a href="#">' . $input . '</a><p>Last post 4 hours ago. Joined ' . $r_date . '</p></div><div class="dropdown__user-icons"><a href="#"><img src="fonts/icons/badges/Intermediate.svg"alt="user-icon"></a><a href="#"><img src="fonts/icons/badges/Bot.svg"alt="user-icon"></a><a href="#"><img src="fonts/icons/badges/Animal_Lover.svg"alt="user-icon"></a></div><div class="dropdown__user-statistic"><div>Threads - <span>1184</span></div><div>Posts - <span>5,
        863</span></div></div></div></div></div></div><div class="posts__replies">' . $rowcount . '</div><div class="posts__views">14.5k</div><div class="posts__activity">' . $diff->format("%d days ago") . '</div></div></div>';
        } else {
            $output .= '<div class="posts__item ' . $color[$i] . '">
            <div class="posts__section-left"><div class="posts__topic"><div class="posts__content"><a href="topic.php?id=' . $thread_id . '&title=' . $thread_title . '"><h3>' . $thread_title . '</h3></a><div class="posts__tags tags"><a href="#"class="bg-' . $color_array[$j] . '">' . $tag[$x] . '</a><a href="#"class="bg-' . $color_array[$f] . '">' . $tag[$y] . '</a></div></div></div><div class="posts__category"><a href="forum.php?catid=' . $rowc['cat_id'] . '"class="category"><i class="bg-' . $color_array[$j] . '"></i>' . ucwords($c_name) . '</a></div></div><div class="posts__section-right"><div class="posts__users js-dropdown"><div><a href="#"class="avatar"><img src="fonts/icons/avatars/' . $logo . '.svg"alt="avatar"data-dropdown-btn="user-b"></a><div class="posts__users-dropdown dropdown dropdown--user dropdown--reverse-y"data-dropdown-list="user-b"><div class="dropdown__user"><a href="#"class="dropdown__user-label bg-' . $color_array[$f] . '">' . substr($logo, 0, 1) . '</a><div class="dropdown__user-nav"><a href="#"><i class="icon-Add_User"></i></a><a href="#"><i class="icon-Message"></i></a></div><div class="dropdown__user-info"><a href="#">' . $input . '</a><p>Last post 4 hours ago. Joined ' . $r_date . '</p></div><div class="dropdown__user-icons"><a href="#"><img src="fonts/icons/badges/Intermediate.svg"alt="user-icon"></a><a href="#"><img src="fonts/icons/badges/Bot.svg"alt="user-icon"></a><a href="#"><img src="fonts/icons/badges/Animal_Lover.svg"alt="user-icon"></a></div><div class="dropdown__user-statistic"><div>Threads - <span>1184</span></div><div>Posts - <span>5,
                    863</span></div></div></div></div></div></div><div class="posts__replies">' . $rowcount . '</div><div class="posts__views">14.5k</div><div class="posts__activity"> No Reply</div></div></div>';
        }

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




    $output .= ' </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="text-right">
                        <ul class="pagination pagination-split mt-0 float-right"  id="pagination">';

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            $class_name = "page-item active";
        } else {
            $class_name = "page-item";
        }
        $output .= "<li class='{$class_name}'  ><a class='page-link' id='{$i}' href=''>{$i}</a></li>";
    }
    $output .= ' </ul>
                    </div>
                </div>
            </div>';
    echo $output;
} else {
    echo "<h2>No Record Found.</h2>";
}