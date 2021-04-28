<?php

session_start();
if (!isset($_SESSION['ploggedin'])) {
    header('Location: login.php');
    exit(0);
}
require 'includes/config.inc.php';

$id = $_SESSION['p_id'];
$sql = "SELECT * FROM `physcho` WHERE psy_id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['psy_name'];
$email = $row['psy_email'];
$quali = $row['psy_qualification'];
$contact = $row['psy_contact'];
$bio = $row['psy_bio'];
$gender = $row['psy_gender'];
$image = $row['psy_profile'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>
        Black Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="./assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->

</head>

<body class="">
    <div class="wrapper">
        <?php
        include 'partials/sidebar.php';
        ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include 'partials/header.php';
            ?>
            <!-- End Navbar -->

            <div class="content">

                <?php if (isset($_GET['success'])) {

                    echo ' <div class="alert alert-success alert-with-icon" data-notify="container">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span data-notify="icon" class="tim-icons icon-bell-55"></span>
                    <span data-notify="message">Updated Succesfuly!!!</span>
                </div>';
                } elseif (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger alert-with-icon" data-notify="container">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span data-notify="icon" class="tim-icons icon-bell-55"></span>
                    <span data-notify="message">Error Updating!!!</span>
                </div>';
                } else {
                    echo "";
                }
                ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <form action="includes/edit_profile.inc.php" method="POST">
                                    <div class="row ">

                                        <div class="col-md-4 px-md-1">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Name"
                                                    value="<?php echo $name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="e.g. mike@gmail.com" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Qualification</label>
                                                <input type="text" class="form-control" placeholder="Qualification"
                                                    name="quali" value="<?php echo $quali; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-md-1">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input type="number" class="form-control" placeholder="Contact"
                                                    name="contact" value="<?php echo $contact; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-md-1">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender" style="margin-top: 10px">
                                                    <option style="width: 40%" value="<?php echo $gender; ?>">
                                                        <?php
                                                        if ($gender == 0) {
                                                            echo "male";
                                                        } elseif ($gender == 1) {
                                                            echo "female";
                                                        } else {
                                                            echo "Others";
                                                        }  ?></option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Bio</label>
                                                <textarea rows="4" cols="80" class="form-control"
                                                    placeholder="Here can be your description" name="bio"
                                                    value="<?php echo $bio; ?>"><?php echo $bio; ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-fill btn-primary"
                                            name="submit">Save</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <?php
                    include 'partials/profile.inc.php';

                    ?>

                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                Creative Tim
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                Blog
                            </a>
                        </li>
                    </ul>
                    <div class="copyright">
                        ©
                        <script>
                        document.write(new Date().getFullYear())
                        </script>2018 made with <i class="tim-icons icon-heart-2"></i> by
                        <a href="javascript:void(0)" target="_blank">Creative Tim</a> for a better web.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors text-center">
                            <span class="badge filter badge-primary active" data-color="primary"></span>
                            <span class="badge filter badge-info" data-color="blue"></span>
                            <span class="badge filter badge-success" data-color="green"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line text-center color-change">
                    <span class="color-label">LIGHT MODE</span>
                    <span class="badge light-badge mr-2"></span>
                    <span class="badge dark-badge ml-2"></span>
                    <span class="color-label">DARK MODE</span>
                </li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/black-dashboard" target="_blank"
                        class="btn btn-primary btn-block btn-round">Download Now</a>
                    <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html"
                        target="_blank" class="btn btn-default btn-block btn-round">
                        Documentation
                    </a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot;
                        45</button>
                    <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot;
                        50</button>
                    <br>
                    <br>
                    <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
            </ul>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/black-dashboard.min.js?v=1.0.0"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->

    <script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');
            $navbar = $('.navbar');
            $main_panel = $('.main-panel');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = true;
            white_color = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



            $('.fixed-plugin a').click(function(event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data', new_color);
                }

                if ($main_panel.length != 0) {
                    $main_panel.attr('data', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data', new_color);
                }
            });

            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    blackDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);
            });

            $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (white_color == true) {

                    $('body').addClass('change-background');
                    setTimeout(function() {
                        $('body').removeClass('change-background');
                        $('body').removeClass('white-content');
                    }, 900);
                    white_color = false;
                } else {

                    $('body').addClass('change-background');
                    setTimeout(function() {
                        $('body').removeClass('change-background');
                        $('body').addClass('white-content');
                    }, 900);

                    white_color = true;
                }


            });

            $('.light-badge').click(function() {
                $('body').addClass('white-content');
            });

            $('.dark-badge').click(function() {
                $('body').removeClass('white-content');
            });
        });
    });
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
    window.TrackJS &&
        TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "black-dashboard-free"
        });
    </script>
</body>

</html>