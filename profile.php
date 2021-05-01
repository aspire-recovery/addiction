<?php
include 'includes/config.inc.php';
session_start();
if (!isset($_SESSION["u_id"])) {
    echo '<script>window.location.href="login.php"</script>';
    exit(0);
}
$uid = $_SESSION['u_id'];

$user = "SELECT * FROM `user` JOIN addiction_types on addiction_types.add_id = user.addiction_id WHERE user.u_id='$uid'";

$result = $conn->query($user);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $u_id = $row['u_id'];
        $name = $row['u_name'];
        $u_contact = $row['u_contact'];
        $u_email = $row['u_email'];
        $u_gender = $row['u_gender'];
        $add_name = $row['add_name'];
        $add_desp = $row['add_desp'];
        $u_status = $row['u_status'];
        $u_img    = $row['u_img'];
        $_SESSION['u_img'] = $u_img;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Profile</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <style type="text/css">
    * {
        font-family: Poppins, sans-serif;
    }

    body {
        margin: 0;
        padding-top: 40px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;

    }

    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }

    .profile-pic-div {
        height: 90px;
        width: 90px;
        position: relative;

        border-radius: 50%;
        overflow: hidden;
        border: 1px solid grey;
        margin: 0px auto;
        margin-bottom: 20px;
    }


    #profileDisplay {
        display: block;
        height: 90px;
        width: 90px;



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

<body>
    <?php
    include "header.php";
    ?>
    <div class="container" style="margin-top: 120px;">
        <?php

        if (isset($_GET['error']) && $_GET['error'] == true && isset($_SESSION['error'])) {

            echo ' <div class="alert alert-primary">
' . $_SESSION['error'] . '
</div>';
            unset($_SESSION['error']);
        }
        ?>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">

                <div class="card">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <form action="partials/profile.php" method="post" enctype="multipart/form-data">
                                        <div class="profile-pic-div">

                                            <img src="<?php
                                                        if (strpos($u_img, 'fonts') !== false) {
                                                            echo "forum/" . $u_img;
                                                        } else {
                                                            echo $u_img;
                                                        } ?>" onClick=" triggerClick()" id="profileDisplay"
                                                alt="Profile">
                                            <input type="file" name="profileImage" onChange="displayImage(this)"
                                                id="profileImage" class="form-control" style="display: none;">
                                            <label for="file" id="uploadBtn">Change</label>


                                        </div>
                                        <button type="submit" name="submit" id="submit" class="btn btn-secondary">
                                            Change </button>
                                    </form>
                                </div>
                                <h4 class="user-name">
                                    <?php echo $name; ?>
                                </h4>
                            </div>
                            <div class="card-subtitle">
                                <center>
                                    <h4><b style="color: goldenrod;">Addiction</b>
                                        <h4>
                                            <h5>
                                                <?php
                                                echo '<p class="text-secondary">' . $add_name . '</p>';

                                                echo '<p class="text-secondary">' . $add_desp . '</p>';
                                                ?>
                                            </h5>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mt-3">
                    <ul class="list-group list-group-flush">



                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <img src="assets/images/app.svg" height="24" width="24">
                                <a href="appointment.php" class="text-dark">My Appointment</a>
                            </h6>
                            <span class="text-secondary">Details</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <img src="assets/images/log.png" height="24" width="24">
                                <a href="logout.php" class="text-dark">Logout</a>
                            </h6>
                            <span class="text-secondary">Reset</span>
                        </li>

                    </ul>
                </div>
            </div>




            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row gutters">


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h3 class="mb-2 text-primary">Personal Details</h3>
                                <br>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <form action="partials/profile.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="fullName"
                                            value="<?php echo $name; ?>" placeholder="Enter full name">
                                    </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" name="email" id="eMail"
                                        value="<?php echo $u_email; ?>" placeholder="Enter email ID" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="<?php echo $u_contact; ?>" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">Gender</label>
                                    <input type="text" class="form-control" value="<?php echo $u_gender; ?>"
                                        placeholder="Gender" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-left" style="margin-top: 20px;">
                                    <button type="reset" id="reset" name="reset" class="btn btn-secondary">Cancel
                                    </button>
                                    <button type="submit" id="update" name="update"
                                        class="btn btn-primary">Update</button>

                                    <?php
                                    if ($u_status == 1) {
                                        echo '<a href="certi?u_id=' . $u_id . '" class="text-right btn btn-primary" style="float: right">Get Certificate</a>';
                                    }
                                    ?>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    <footer style="margin-top: 80px;">
        <?php
        include "footer.php";
        ?>
    </footer>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
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
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>