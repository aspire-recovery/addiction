<?php
require '../includes/config.inc.php';
session_start();

$limit_per_page = 9;

if (isset($_POST["page_no"])) {
    $page = $_POST["page_no"];
} else {
    $page = 1;
}

$offset = ($page - 1) * $limit_per_page;


if (isset($_SESSION['loggedin'])) {

    $sql = "SELECT * FROM `` LIMIT {$offset},{$limit_per_page}";
    $result = mysqli_query($conn, $sql);
    $resut_num = mysqli_num_rows($result);
    $sum = $resut_num / 3;
    $rowa = ceil($sum);


    $total_pages = ceil($resut_num / $limit_per_page);
    $output = "";


    $k = 1;
    $j = 1;
    $output .= ' <br><div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row[''];
        $name = $row[''];
        $email = $row[''];
        $quali = $row[''];
        $bio = $row[''];
        $gender = $row[''];


        $output .= '
           
    <div class="col-lg-4">
        <div class="text-center card-box">
            <div class="member-card pt-2 pb-2">
                <div class="thumb-lg member-thumb mx-auto"><img
                        src="https://bootdey.com/img/Content/avatar/avatar' . $k . '.png"
                        class="rounded-circle img-thumbnail" alt="profile-image"></div>
                <div class="">
                    <h4>' . $name . '</h4>
                    <p class="text-muted">Qualification <span>| </span><span><a href="#"
                                class="text-pink">' . $quali . '</a></span></p>
                </div>
                <ul class="social-links list-inline">
                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip"
                            class="tooltips" href="" data-original-title="Facebook"><i
                                class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip"
                            class="tooltips" href="" data-original-title="Twitter"><i
                                class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip"
                            class="tooltips" href="" data-original-title="Skype"><i
                                class="fa fa-skype"></i></a></li>
                </ul>
                <a href="apbooking.php?id=' . $id . '"> <button type="button"
                        class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Book
                        Appointment</button> </a>
                <div class="mt-4">
                    <div class="row">
                        <p style="font-size:16px;">' . mb_strimwidth($bio, 0, 150, "...") . '

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>';
        if ($k == 9) {
        } else {
            $k++;
        }
    }
    $output .= ' </div>';


    $output .= ' </div>
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
    </div>
    ';
    echo $output;
} else {
    echo '<section class="w3l-contact-main">
    <div class="contact-infhny py-5">
        <div class="container py-lg-5"><div class="card bg-dark">
    <div class="card-header text-light" style="color:white;">
        ERROR 403
    </div>
    <div class="card-body text-light"  style="color:white;">
        <h5 class="card-title"  style="color:white;">You need to be logged in to book pyschiatrist!!!</h5>
        <p class="card-text"  style="color:white;">With supporting text below as a natural lead-in to additional content.</p>
        <br>
        <a href="login.php" class="btn btn-danger bg-danger text-light">Login</a>
    </div>
</div>
</div>
            </div>
</section>';
}