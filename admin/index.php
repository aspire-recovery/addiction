<?php
require '../includes/config.inc.php';
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
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Aspire </span>Admin</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
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
            <li><a href="elements.php"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
            <li><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1"
                        class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
                        </a></li>
                    <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
                        </a></li>
                    <li><a class="" href="#">
                            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
                        </a></li>
                </ul>
            </li>
            <li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                            <?php
                            $order_sql = "SELECT * FROM `order`";
                            $r1 = $conn->query($order_sql);
                            $cnt1 = 0;
                            if ($r1->num_rows > 0) {
                                while ($ro1 = $r1->fetch_assoc()) {
                                    $cnt1++;
                                }
                            }
                            ?>
                            <div class="large"><?php echo $cnt1; ?></div>
                            <div class="text-muted">New Orders</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                            <?php
                            $comment_sql = "SELECT * FROM `forum_reply`";
                            $r2 = $conn->query($comment_sql);
                            $cnt2 = 0;
                            if ($r2->num_rows > 0) {
                                while ($ro2 = $r2->fetch_assoc()) {
                                    $cnt2++;
                                }
                            }
                            ?>
                            <div class="large"><?php echo $cnt2 ?></div>
                            <div class="text-muted">Comments</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                            <?php
                            $user_sql = "SELECT * FROM `user`";
                            $r3 = $conn->query($user_sql);
                            $cnt3 = 0;
                            if ($r3->num_rows > 0) {
                                while ($ro2 = $r3->fetch_assoc()) {
                                    $cnt3++;
                                }
                            }
                            ?>
                            <div class="large"><?php echo $cnt3; ?></div>
                            <div class="text-muted">Users</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                            <?php
                            $physcho_sql = "SELECT * FROM `physcho`";
                            $r4 = $conn->query($physcho_sql);
                            $cnt4 = 0;
                            if ($r4->num_rows > 0) {
                                while ($ro2 = $r4->fetch_assoc()) {
                                    $cnt4++;
                                }
                            }
                            ?>
                            <div class="large"><?php echo $cnt4; ?></div>
                            <div class="text-muted">Psychiatrist</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>

        <div class="row">
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Products</h4>
                        <?php
                        $product_sql = "SELECT  *  FROM  `product`";
                        $r5 = $conn->query($product_sql);
                        $cnt5 = 0;
                        if ($r5->num_rows > 0) {
                            while ($ro3 = $r5->fetch_assoc()) {
                                $cnt5++;
                            }
                        }
                        ?>
                        <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $cnt5; ?>"><span
                                class="percent"><?php echo $cnt5; ?>%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3" style="float: right">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Transaction</h4>
                        <?php
                        $transaction_sql = "SELECT  *  FROM  `transaction`";
                        $r6 = $conn->query($transaction_sql);
                        $cnt6 = 0;
                        if ($r6->num_rows > 0) {
                            while ($ro4 = $r6->fetch_assoc()) {
                                $cnt6++;
                            }
                        }
                        ?>
                        <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $cnt6; ?>"><span
                                class="percent"> <?php echo $cnt6; ?>%</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin: 25px;">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                    src="https://dashboard.tawk.to/#/dashboard/60197c22c31c9117cb75144b" allowfullscreen
                    scrolling="false"></iframe>
            </div>
            <div class="col-sm-12" style="margin-top: 10px;">
                <p class="back-link"><a href="#">ASPIRE RECOVERY</a></p>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
    window.onload = function() {
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