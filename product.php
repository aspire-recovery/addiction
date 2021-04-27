<?php
//Imports
require 'config.php';
include "header.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Product-Aspire Recovery</title>
    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Template CSS -->
    <link rel="stylesheet" href="psychatrist/assets/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/style-starter.css">

</head>
<body>
<section class="w3-services-ab py-5" id="mission" style="margin-top: 55px">
    <div class="container py-lg-5 py-md-4">
        <h3 class="title-big text-center mb-5">Recovery Aids</h3>
        <div class="w3-services-grids">
            <div class="fea-gd-vv row">
                <div class="container mb-5 mt-5">
                    <div class="row">
                        <!--Card 1-->
                        <div class="col-md-4">
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
                                        <a href="cart.php?p_id='..'" class="btn btn-primary btn-lg" style="margin-top: 105px;">Add To
                                            Cart</a>
                                    </div>
                                </div>

                                <!--Button for cards-->
                                <div class="p-3 pro-1 text-center text-white mt-3 cursor">
                                    <span class="text-uppercase">Add to cart</span>
                                </div>
                            </div>
                        </div>
                        <!--card 1 ends here-->

                        <!--Card 2-->
                        <div class="col-md-4">
                            <div class="card mt-3">
                                <div class="product-1 align-items-center p-2 text-center">
                                    <img src="" alt="" class="rounded" width="160">
                                    <h5>Product 2</h5>

                                    <!--Card info-->
                                    <div class="mt-3 info">
                                        <span class="text1 d-block">Product description ( TBD ).</span>
                                        <span class="text1">Product description line-2</span>
                                    </div>
                                    <div class="productcost2 mt-3 text-dark">
                                        <span>$69.99</span>
                                        <div class="star mt-3 align-items-center">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="cart.php?p_id='..'" class="btn btn-primary btn-lg" style="margin-top: 105px;">Add To
                                            Cart</a>
                                    </div>
                                </div>

                                <!--Button for cards-->
                                <div class="p-3 pro-2 text-center text-white mt-3 cursor">
                                    <span class="text-uppercase">Add to cart</span>
                                </div>
                            </div>
                        </div>
                        <!--card 2 ends here-->

                        <!--Card 3-->
                        <div class="col-md-4">
                            <div class="card mt-3">
                                <div class="product-1 align-items-center p-2 text-center">
                                    <img src="images/image01.jpg" alt="" class="rounded" width="160">
                                    <h5>Product 3</h5>

                                    <!--Card info-->
                                    <div class="mt-3 info">
                                        <span class="text1 d-block">Product description ( TBD ).</span>
                                        <span class="text1">Product description line-2</span>
                                    </div>
                                    <div class="productcost3 mt-3 text-dark">
                                        <span>$69.99</span>
                                        <div class="star mt-3 align-items-center">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="cart.php?p_id='..'" class="btn btn-primary btn-lg" style="margin-top: 105px;">Add To
                                            Cart</a>
                                    </div>
                                </div>

                                <!--Button for cards-->
                                <div class="p-3 pro-3 text-center text-white mt-3 cursor">
                                    <span class="text-uppercase">Add to cart</span>
                                </div>
                            </div>
                        </div>
                        <!--card 3 ends here-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>
</body>
</html>
