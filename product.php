<?php
//Imports
require 'includes/config.inc.php';
session_start();

if (!isset($_SESSION['loggedin'])){
    header('Location: login.php?login=true');

}
include "header.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"
          <title>Product</title>

    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
  
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Template CSS -->
   
    <link rel="stylesheet" href="psychatrist/assets/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/style-starter.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section class="w3-services-ab " id="mission" style="margin-top: 55px">
    <div class="container  py-md-4">
        <h3 class="title-big text-center mt-5">Recovery Aids</h3>
        <div class="w3-services-grids">
            <div class="fea-gd-vv row">
                <div class="container mb-5 ">
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
    $.post("partials/prodpagination.php", {
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
