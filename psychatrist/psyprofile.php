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
      Profile
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="./assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
<style>
    
    .profile-pic-div {
        height: 150px;
        width: 150px;
        position: relative;

        border-radius: 50%;
        overflow: hidden;
        border: 1px solid grey;
        margin: 0px auto;
        margin-bottom: 20px;
    }


    #profileDisplay {
        display: block;
        height: 150px;
        width: 150px;



        border-radius: 50%;
        object-fit: cover;
        object-position: center center;
    }

    #uploadBtn {
        height: 30px;
        width: 100%;
        position: absolute;
        bottom: -10px;
        text-align: center;
        background: rgba(29, 25, 46, 0.719);
        color: white;
        line-height: 30px;

        font-weight: bold;
        font-size: 12px;
        cursor: pointer;
        display: none;
    }
</style>
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
                } elseif (isset($_GET['error']) && !isset($_SESSION['error'])) {
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
                <?php

        if (isset($_GET['error']) && $_GET['error'] == true && isset($_SESSION['error'])) {

            echo ' <div class="alert alert-danger alert-with-icon" data-notify="container">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
                <span data-notify="icon" class="tim-icons icon-bell-55"></span>
                <span data-notify="message">' . $_SESSION['error'] . '</span>
            </div>
';
            unset($_SESSION['error']);
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
                                                    placeholder="<?php echo $email; ?>" readonly  value="<?php echo $email; ?>">
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
                </div>
            </footer>
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
 //   <script src="../assets/js/plugins/chartjs.min.js"></script>
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

<script>
    const imgDiv = document.querySelector('.profile-pic-div');
    const uploadBtn = document.querySelector('#uploadBtn');

    //if user hover on img div 

    imgDiv.addEventListener('mouseenter', function() {
        uploadBtn.style.display = "block";
    });

    //if we hover out from img div

    imgDiv.addEventListener('mouseleave', function() {
        uploadBtn.style.display = "none";
    });

    function triggerClick(e) {

        document.querySelector("#profileImage").click();

    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector("#profileDisplay").setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);


        }
    }
    </script>
</body>

</html>