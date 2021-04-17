<?php
require 'config.php';
session_start();
if (!isset($_SESSION['a_id'])) {
    echo '<script>window.location.href="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASPIRE Admin - Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar" style="margin-left: 10px;">
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $_SESSION['a_name']; ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li><a href="addictions.php"><em class="fa fa-calendar">&nbsp;</em> Addictions</a></li>
        <li><a href="product_category.php"><em class="fa fa-bar-chart">&nbsp;</em> Product Category</a></li>
        <li><a href="product.php"><em class="fa fa-bar-chart">&nbsp;</em> Product</a></li>
        <li><a href="user.php"><em class="fa fa-user">&nbsp;</em> Patient</a></li>
        <li><a href="psycho.php"><em class="	fa fa-plus-square">&nbsp;</em>Psychiatrist</a></li>
        <li><a href="forum_content.php"><em class="	fa fa-television">&nbsp;</em>Forum Content</a></li>
        <li><a href="forum_reply.php"><em class="	fa fa-reply">&nbsp;</em>Forum Reply</a></li>
        <li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>