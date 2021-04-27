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

    $sql = "SELECT * FROM `physcho` LIMIT {$offset},{$limit_per_page}";
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

        $id = $row['psy_id'];
        $name = $row['psy_name'];
        $email = $row['psy_email'];
        $quali = $row['psy_qualification'];
        $bio = $row['psy_bio'];
        $gender = $row['psy_gender'];


        $output .= '<div class="col-md-4">
            <div class="card mt-3">
                <div class="product-1 align-items-center p-2 text-center">
                    <img src="images/image01.jpg" alt="" class="rounded" width="160">
                    <h5>Product 1</h5>
    
                    <!--Card info-->
                    <div class="mt-3 info">
                        <span class="text1 d-block">Product description ( TBD ).</span>
                        <span class="text1">Product description line-2</span>
                    </div>
                    <div class="productcost1 mt-3 text-dark">
                        <span>$69.99</span>
                        <div class="star mt-3 align-items-center">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <a href="cart.php" class="btn btn-primary btn-lg" style="margin-top: 105px;">Add To
                            Cart</a>
                    </div>
                </div>
    
                <!--Button for cards-->
                <div class="p-3 pro-1 text-center text-white mt-3 cursor">
                    <span class="text-uppercase">Add to cart</span>
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









    
   