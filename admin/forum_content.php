<?php
//    Imports
require '../includes/config.inc.php';
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
<?php
include 'leftmenu.php';
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Forum Content</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Forum Content</div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Psychiatrist</th>
                        <th scope="col">Caption</th>
                        <th scope="col">POST</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $forum_sql = "SELECT physcho.psy_name, forum.fu_id ,forum.fu_caption, forum.post_path FROM `forum` JOIN physcho ON physcho.psy_id = forum.psy_id";
                    $r1 = $conn->query($forum_sql);
                    $cnt1 = 0;
                    if ($r1->num_rows > 0) {
                        while ($ro1 = $r1->fetch_assoc()) {
                            $cnt1++;
                            echo '<tr>';
                            echo '<th scope="row">' . $cnt1 . '</th>';
                            echo '<td>' . $ro1['psy_name'] . '</td>';
                            echo '<td>' . $ro1['fu_caption'] . '</td>';
                            echo '<td><img src="../upload/' . $ro1['post_path'] . '" alt="Image" width="150px" height="150px"></td>';
                            echo '<td>';
                            echo '<a href="forum_action.php/?delete=' . $ro1['fu_id'] . '" class="btn btn-danger">Delete</a>';
                            echo '</td>';
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
        <p class="back-link"><a href="#">ASPIRE RECOVERY</a></p></div>
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
