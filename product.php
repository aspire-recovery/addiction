<?php
//Imports
require 'includes/config.inc.php';
include "header.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Aspire recovery</title>

    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Template CSS -->
    <link rel="stylesheet" href="psychatrist/assets/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <!--    <style>-->
    <!--        /* Bootstrap for CSS */-->
    <!---->
    <!--        @import "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css";-->
    <!---->
    <!--        /*Universal styling for all cards */-->
    <!--        body {-->
    <!--            background: #000;-->
    <!--        }-->
    <!---->
    <!--        .container {-->
    <!--            margin-top: 110px !important;-->
    <!--        }-->
    <!---->
    <!--        .card {-->
    <!--            border: none;-->
    <!--            outline: none;-->
    <!--            background-color: #fff;-->
    <!--            border-radius: 20px;-->
    <!--            transition: transform .3s;-->
    <!--        }-->
    <!---->
    <!--        .card:hover {-->
    <!--            transform: translateY(-15px);-->
    <!--            transition: transform .3s;-->
    <!--        }-->
    <!---->
    <!--        .text1 {-->
    <!--            font-size: 13px;-->
    <!--            color: #cbcbcb;-->
    <!--        }-->
    <!---->
    <!--        .info {-->
    <!--            line-height: 17px;-->
    <!--        }-->
    <!---->
    <!--        .star {-->
    <!--            color: #fbc02d;-->
    <!--        }-->
    <!---->
    <!--        /* card 1 */-->
    <!--        .productcost1 span {-->
    <!--            color: #fb3531;-->
    <!--            font-weight: bold;-->
    <!--            font-size: 20px;-->
    <!--        }-->
    <!---->
    <!--        .pro-1 {-->
    <!--            background: #dc3545;-->
    <!--        }-->
    <!---->
    <!--        /* card 2 */-->
    <!--        .productcost2 span {-->
    <!--            color: #206783;-->
    <!--            font-weight: bold;-->
    <!--            font-size: 20px;-->
    <!--        }-->
    <!---->
    <!--        .pro-2 {-->
    <!--            background: #206783;-->
    <!--        }-->
    <!---->
    <!--        /* card 3 */-->
    <!--        .productcost3 span {-->
    <!--            color: #0012b2;-->
    <!--            font-weight: bold;-->
    <!--            font-size: 20px;-->
    <!--        }-->
    <!---->
    <!--        .pro-3 {-->
    <!--            background: #0012b2;-->
    <!--        }-->
    <!---->
    <!--        /*Universal styling for all product cards */-->
    <!--        .pro-1:hover, .pro-2:hover, .pro-3:hover {-->
    <!--            opacity: .8;-->
    <!--        }-->
    <!---->
    <!--        .cursor {-->
    <!--            cursor: pointer;-->
    <!--            border-bottom-left-radius: 20px;-->
    <!--            border-bottom-right-radius: 20px;-->
    <!--        }-->
    <!--    </style>-->
</head>
<body>
<section class="w3-services-ab py-5" id="mission" style="margin-top: 55px">
    <div class="container py-lg-5 py-md-4">
        <h3 class="title-big text-center mb-5">Recovery Aids</h3>
        <div class="w3-services-grids">
            <div class="fea-gd-vv row">
                <div class="container mb-5 mt-5">
                    <div class="container" id="container">
                        <!-- end row -->
            
            
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
function loadTable(page) {
    $.post("partials/psypagination.php", {
            page_no: page

        },
        function(data, status) {
            $("#container").html(data);
        }
    );
}
loadTable();


//Pagination Code
$(document).on("click", "#pagination li a", function(e) {
    e.preventDefault();
    page_id = $(this).attr("id");

    loadTable(page_id);

});

});
</script>
</body>
</html>
