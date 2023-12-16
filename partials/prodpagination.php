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

    $sql = "SELECT * FROM `product` LIMIT {$offset},{$limit_per_page}";
    $result = mysqli_query($conn, $sql);
    $resut_num = mysqli_num_rows($result);
    $sum = $resut_num / 3;
    $rowa = ceil($sum);


    $total_pages = ceil($resut_num / $limit_per_page);
    $output = "";


    $k = 1;
    $j = 1;
    $output .= ' <br><div class="row">

        ';
    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['p_id'];
        $name = $row['p_name'];
        $descc = $row['p_description'];
        $price = $row['p_price'];
        $img = $row['p_image'];
        $cat = $row['pdt_category'];
        $quan = $row['p_quantity'];
        if ($quan > 0) {
            $quan_txt = "In Stock";
        } else {
            $quan_txt = "Out of Stock";
        }


        $output .= ' <form class="col-md-4" method="post" action="cart.php?action=add&id=' . $id . ' ">
        
        
            <div class="card mt-3">
                <div class="product-1 align-items-center p-2 text-center">
                    <img style="object-fit:cover;" src="' . $img . '" alt="" class="rounded" width="160" height="250">
                    <h3 style="margin-top:10px; color:#3b3663;">' . $name . '</h3>
    
                    <!--Card info-->
                    <div class="mt-3 info">
                    
                        <span class="text1 d-block">' . $descc . '</span>
                        
                    </div>
                    <div class="productcost1 mt-3 text-dark">
                        <span>$' . $price . '</span>
                        <div class="star mt-3 align-items-center" >
                            <span class="fa fa-star " style="color:orange;"></span>
                            <span class="fa fa-star "  style="color:orange;"></span>
                            <span class="fa fa-star "  style="color:orange;"></span>
                            <span class="fa fa-star"  style="color:orange;"></span>
                            <span class="fa fa-star"></span>
                        <span style="font-weight: bold;" class="text1 d-block">' . $quan_txt . '</span>
                       
                        </div>
                        <div class="cart-action"><input type="number" class="product-quantity" name="quantity" min="1" max="10" value="1" size="2" />
                        
                        <input type="submit" value="Add to Cart" href="cart.php" class="btn btn-primary btn-lg" style="margin-top: 15px; margin-bottom: 15px;"/>
                        </div>
                            
                    </div>
                </div>
    
                <!--Button for cards-->
                
            </div>
            
        </form>
        ';


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
    header('Location: ../e404.php');
}