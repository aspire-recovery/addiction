<!doctype html>
<html lang="en-US">
<?php

session_start();

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Responsive HTML5 Template">
    <meta name="author" content="author.com">
    <title>Responsive HTML5 Template</title>

    <!-- STYLESHEET -->
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="fonts/icons/main/mainfont/style.css">
    <link rel="stylesheet" href="fonts/icons/font-awesome/css/font-awesome.min.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="vendor/bootstrap/v3/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/v4/bootstrap-grid.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Custom -->

    <script src="https://cdn.tiny.cloud/1/c7z8wx5m5u6j9yj237a233drpztw21qo2l4k45cxbzch4qov/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="css/style.css">
    <script>
    tinymce.init({
        selector: '#mytextarea'
    });
    </script>
    <style>
    body main.container {
        max-width: 85% !important;
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
    <?php require 'partials/_header.php';?>

    <!-- MAIN -->
    <main>
        <div class="container">
            <?php
require '../includes/config.inc.php';
include 'partials/_menu.php';
include 'partials/_functions.php';
$thread_id = $_GET['id'];
$sql = "SELECT * FROM `threads` WHERE thread_id='" . $thread_id . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$thread_user = $row['user_id'];
$cid = $row['c_id'];
$sqlu = "SELECT u_name FROM `user` where u_id='" . $thread_user . "'";
$resultu = mysqli_query($conn, $sqlu);
$rowu = mysqli_fetch_assoc($resultu);
$sqlc = "SELECT cat_name FROM `forum_categories` where cat_id='" . $cid . "'";

$resultc = mysqli_query($conn, $sqlc);
$rowc = mysqli_fetch_assoc($resultc);
$input = $rowu['u_name'];
$c_date = date('Y-m-d', strtotime($row['created_at']));
$logo = userlogo($input);
$sqlr = "SELECT * FROM `forum_reply` where fu_id='" . $thread_id . "'";
$resultr = mysqli_query($conn, $sqlr);
$rowr = mysqli_fetch_assoc($resultr);

$sql_last = "SELECT created_at FROM `forum_reply` WHERE fu_id=$thread_id ORDER BY `forum_reply`.`created_at` DESC LIMIT 1";
$resultl = mysqli_query($conn, $sql_last);
$rowl = mysqli_fetch_assoc($resultl);
$l_date = date_create(date('Y-m-d', strtotime($rowl['created_at'])));
$now = date_create(date('y-m-d'));
$diff = date_diff($l_date, $now);

$rowcount = mysqli_num_rows($resultr);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['u_id'];
    $sqli = "INSERT INTO `forum_reply` (`fu_id`, `u_id`, `message`) VALUES ('" . $thread_id . "', '" . $user_id . "', '" . $_POST['description'] . "');";
    $resulti = mysqli_query($conn, $sqli);

}
echo '<div class="topics" style="flex-basis:100%">
                         <div class="topics__heading">
                             <h2 class="topics__heading-title">' . $row['thread_title'] . '</h2>
                                    <div class="topics__heading-info">
                                        <a href="#" class="category"><i class="bg-3ebafa"></i>' . $rowc['cat_name'] . '</a>
                                        <div class="tags">
                                            <a href="#" class="bg-4f80b0">gaming</a>
                                            <a href="#" class="bg-424ee8">nature</a>
                                            <a href="#" class="bg-36b7d7">entertainment</a>
                                        </div>
                    </div>
                </div>
                <div class="topics__body" style="">
                    <div class="topics__content">
                        <div class="topic">
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/' . $logo . '.svg"
                                            alt="avatar"></a>
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="#">' . $input . '</a>
                                    </div>
                                    <div class="topic__date"><i class="icon-Watch_Later"></i>' . $c_date . '</div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                    ' . $row['thread_desc'] . '
                                </div>
                                <div class="topic__footer">
                                    <div class="topic__footer-likes">
                                    <div>
                                    <a href="#"><i class="icon-Favorite_Topic"></i></a>
                                    <span>49</span>
                                </div>

                                    </div>
                                    <div class="topic__footer-share">
                                        <div data-visible="desktop">

                                        </div>
                                        <div data-visible="mobile">
                                            <a href="#"><i class="icon-More_Options"></i></a>
                                        </div>
                                        <a href="#"><i class="icon-Reply_Fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>';

?>

            <!-- Main Forum Topic -->

            <div class="topic">
                <div class="topic__content">
                    <div class="topic__info">
                        <div class="topic__info-section">
                            <div>
                                <span class="topic__info-title">Created</span>
                                <div class="topic__info-avatar">
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/<?php echo $logo; ?>.svg"
                                            alt="avatar"></a>
                                    <span><?php $c_date2 = date_create(date('Y-m-d', strtotime($row['created_at'])));
$now2 = date_create(date('y-m-d'));
$diff2 = date_diff($c_date2, $now2);
echo $diff2->format("%d d");?></span>
                                </div>
                            </div>
                            <div>
                                <span class="topic__info-title">Last reply</span>
                                <div class="topic__info-avatar">
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/A.svg" alt="avatar"></a>
                                    <span><?php

echo $diff->format("%d d"); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="topic__info-section">
                            <div>
                                <span class="topic__info-title">Replies</span>
                                <div class="topic__info-count">
                                    <?php echo $rowcount; ?>
                                </div>
                            </div>


                            <div>
                                <span class="topic__info-title">Likes</span>
                                <div class="topic__info-count">315</div>
                            </div>

                        </div>
                        <a href="#" class="topic__info-more"><i class="icon-Arrow_Down"></i></a>
                    </div>


                    <div class="topic__title">

                    </div>

                    <div class="create__section create__textarea">
                        <?php
if (isset($_SESSION['loggedin'])) {
    echo '<form action="topic.php?id=' . $thread_id . '" method="post">
                            <label class="create__label" for="description">
                                <h4>Reply</h4>
                            </label>

                            <textarea class="form-control" name="description" id="mytextarea" rows="13"></textarea>
                            <br>
                            <div class="create__footer">
                                <a href="#" class="create__btn-cansel btn">Cancel</a>
                                <button type="submit" name="submit" class="create__btn-create btn btn--type-02">Create
                                    Thread</button>
                            </div>
                        </form>';
} else {
    echo '<div class="card bg-dark">
            <div class="card-header text-light">
                ISSUE
            </div>
            <div class="card-body text-light">
                <h5 class="card-title">You Are Not Logged In!!!</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="../login.php" class="btn btn-danger bg-danger text-light">Login</a>
            </div>
        </div>';

}
?>
                    </div>

                </div>
            </div>

            <!-- Replies -->

            <?php
$sqls = "SELECT * FROM `forum_reply` where fu_id='" . $thread_id . "'";
$results = mysqli_query($conn, $sqls);
while ($rows = mysqli_fetch_assoc($results)) {
    $c_date = date('Y-m-d', strtotime($rows['created_at']));
    $u_id = $rows['u_id'];
    $sqlc = "SELECT * FROM `user` where u_id='$u_id'";
    $resultc = mysqli_query($conn, $sqlc);
    $rowc = mysqli_fetch_assoc($resultc);
    $u_name = $rowc['u_name'];
    $logo1 = userlogo($u_name);
    echo '<div class="topic">
                <div class="topic__head">
                    <div class="topic__avatar">
                        <a href="#" class="avatar"><img src="fonts/icons/avatars/' . $logo1 . '.svg" alt="avatar"></a>
                    </div>
                    <div class="topic__caption">
                        <div class="topic__name">
                            <a href="#">' . $u_name . '</a>
                        </div>
                        <div class="topic__date">
                            <div class="topic__user topic__user--pos-r">
                                <i class="icon-Reply_Fill"></i>
                                <a href="#" class="avatar"><img src="fonts/icons/avatars/' . $logo . '.svg" alt="avatar"></a>
                                <a href="#" class="topic__user-name">' . $input . '</a>
                            </div>
                            <i class="icon-Watch_Later"></i>' . $c_date . '
                        </div>
                    </div>
                </div>
                <div class="topic__content">
                    <div class="topic__text">
                        ' . $rows['message'] . '
                    </div>
                    <div class="topic__footer">
                        <div class="topic__footer-likes">
                            <div>
                                <a href="#"><i class="icon-Upvote"></i></a>
                                <span>137</span>
                            </div>
                        </div>
                        <div class="topic__footer-share">

                            <a href="#"><i class="icon-Reply_Fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>';
}

?>



        </div>


        <div class="topics__control">
        </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer js-dropdown">
            <div class="container">
                <div class="footer__logo">
                    <div>
                        <img src="fonts/icons/main/Logo_Forum.svg" alt="logo">Unity
                    </div>
                </div>
                <div class="footer__nav">
                    <div class="footer__tline">
                        <i class="icon-Support"></i>
                        <ul class="footer__menu">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">The Team</a></li>
                        </ul>
                        <div class="footer__language">
                            <div class="footer__language-btn" data-dropdown-btn="language">Americas - English<i
                                    class="icon-Arrow_Below"></i></div>
                            <div class="footer__language-dropdown dropdown dropdown--design-01 dropdown--reverse-y"
                                data-dropdown-list="language">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h3>Region</h3>
                                        <ul class="dropdown__catalog">
                                            <li class="active"><a href="#"><i></i>America</a></li>
                                            <li><a href="#"><i></i>Europe</a></li>
                                            <li><a href="#"><i></i>Asia</a></li>
                                            <li><a href="#"><i></i>China</a></li>
                                            <li><a href="#"><i></i>Australia</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <h3>Language</h3>
                                        <ul class="dropdown__catalog">
                                            <li class="active"><a href="#"><i></i>English</a></li>
                                            <li><a href="#"><i></i>Espanol</a></li>
                                            <li><a href="#"><i></i>Portugues</a></li>
                                            <li><a href="#"><i></i>Chinese</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer__bline">
                        <ul class="footer__menu">
                            <li class="footer__copyright"><span>&copy; 2017 azyrusthemes.com</span></li>
                            <li><a href="#">Teams</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Send Feedback</a></li>
                        </ul>
                        <ul class="footer__social">
                            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-cloud" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                        </ul>
                        <div class="footer__language-btn-m" data-dropdown-btn="language">Americas - English<i
                                class="icon-Arrow_Below"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVA SCRIPT -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/velocity/velocity.min.js"></script>
    <script src="js/app.js"></script>

</body>

</html>