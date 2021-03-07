<?php
//    Imports
require 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino UI Elements</title>
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
    <div class="profile-sidebar">
        <div class="profile-userpic">
        </div>
        <div class="profile-usertitle" style="margin-right: 10px;">
            <div class="profile-usertitle-name"><?php echo $_SESSION['a_name'] ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
        <li><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
        <li class="active"><a href="elements.php"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
        <li><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1"
                                                                       class="icon pull-right"><em
                            class="fa fa-plus"></em></span>
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
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Addiction</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Addictions</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form class="form-group" action="addictions_process.php" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Addiction Name</label>
                                <input type="text" name="addiction_name" class="form-control" style="width: 40%;"
                                       placeholder="Addiction Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Addiction Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                          style="width: 40%;" placeholder="Addiction Description"
                                          name="description"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-block btn-lg btn-primary"
                                    style="width: 40%">Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->


            <div class="panel panel-default">
                <div class="panel-heading">Addiction Details</div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Addiction Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $addictiopn_sql = "SELECT * FROM `addiction_types`";
                    $r1 = $conn->query($addictiopn_sql);
                    $cnt1 = 0;
                    if ($r1->num_rows > 0) {
                        while ($ro1 = $r1->fetch_assoc()) {
                            $cnt1++;
                            echo '<tr>';
                            echo '<th scope="row">' . $cnt1 . '</th>';
                            echo '<td>' . $ro1['add_name'] . '</td>';
                            echo '<td>' . $ro1['add_desp'] . '</td>';
                            echo '<form action="addictions_delete.php" method="post">';
                            echo '<input type="hidden" value="' . $ro1['add_id'] . '" name="add_id">';
                            echo '<td><button type="submit" name="submit" class="btn btn-danger">Delete</button></td>';
                            echo '</form>';
                            echo '</tr>';


                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
    </div>
</div><!-- /.row -->
</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
