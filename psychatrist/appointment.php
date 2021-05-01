<?php

include('class/Appointment.php');

$object = new Appointment;
if (!isset($_SESSION['ploggedin'])) {
    header('Location: login.php');
    exit(0);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/images/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/images/favicon.png">
    <title>
     Appointment
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="./assets/css/black-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="vendor/parsley/parsley.css" />

    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-select/bootstrap-select.min.css" />

    <link rel="stylesheet" type="text/css" href="vendor/datepicker/bootstrap-datepicker.css" />
    <!-- Custom fonts for this template-->




</head>

<body class="">
    <div class="wrapper">
        <?php
        include 'partials/sidebar.php';
        ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php
            include 'partials/header.php';
            ?>
            <!-- End Navbar -->
            <div class="content">
               <!-- Page Heading -->
               <h1 class="h3 mb-4 text-gray-800">Appointment Management</h1>

               <!-- DataTales Example -->
               <span id="message"></span>
               <div class="card shadow mb-4">
                   <div class="card-header py-3">
                       <div class="row">
                           <div class="col-sm-6">
                               <h6 class="m-0 font-weight-bold text-primary">Appointment List</h6>
                           </div>
                           <div class="col-sm-6" align="right">
                               <div class="row">
                                   <div class="col-md-9">
                                       <div class="row input-daterange">
                                           <div class="col-md-6">
                                               <input type="text" name="start_date" id="start_date" class="form-control form-control-sm" readonly />
                                           </div>
                                           <div class="col-md-6">
                                               <input type="text" name="end_date" id="end_date" class="form-control form-control-sm" readonly />
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="row">
                                           <button type="button" name="search" id="search" value="Search" class="btn btn-info btn-sm"><i class="fas fa-search"></i></button>
                                           &nbsp;<button type="button" name="refresh" id="refresh" class="btn btn-secondary btn-sm"><i class="fas fa-sync-alt"></i></button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-striped table-bordered" id="appointment_table">
                               <thead>
                                   <tr>
                                       <th>Appointment No.</th>
                                       <th>Patient Name</th>
                                       
                                       <th>Appointment Date</th>
                                       <th>Appointment Time</th>
                                       <th>Appointment Day</th>
                                       <th>Appointment Status</th>
                                       <th>View</th>
                                   </tr>
                               </thead>
                               <tbody></tbody>
                           </table>
                       </div>
                   </div>
               </div>

          

<div id="viewModal" class="modal fade">
<div class="modal-dialog">
   <form method="post" id="edit_appointment_form">
       <div class="modal-content">
           <div class="modal-header">
               <h4 class="modal-title" id="modal_title">View Appointment Details</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
               <div id="appointment_details"></div>
           </div>
           <div class="modal-footer">
               <input type="hidden" name="hidden_appointment_id" id="hidden_appointment_id" />
               <input type="hidden" name="action" value="change_appointment_status" />
               <input type="submit" name="save_appointment" id="save_appointment" class="btn btn-primary" value="Save" />
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
       </div>
   </form>
</div>
</div>


            </div>
            <?php
            include 'partials/footer.php';
            ?>
        </div>
    </div>

    

    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/black-dashboard.min.js?v=1.0.0"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->

    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .background-color span').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data', new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr('data', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data', new_color);
                    }
                });

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                    } else {
                        $('body').addClass('sidebar-mini');
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage('Sidebar mini activated...');
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (white_color == true) {

                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').removeClass('white-content');
                        }, 900);
                        white_color = false;
                    } else {

                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').addClass('white-content');
                        }, 900);

                        white_color = true;
                    }


                });

                $('.light-badge').click(function() {
                    $('body').addClass('white-content');
                });

                $('.dark-badge').click(function() {
                    $('body').removeClass('white-content');
                });
            });
        });
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" src="vendor/parsley/dist/parsley.min.js"></script>

    <script type="text/javascript" src="vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="vendor/datepicker/bootstrap-datepicker.js"></script>


  
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
    </script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />


<script>
    $(document).ready(function(){
    
        fetch_data('no');
    
        function fetch_data(is_date_search, start_date='', end_date='')
        {
            var dataTable = $('#appointment_table').DataTable({
                "processing" : true,
                "serverSide" : true,
                "order" : [],
                "ajax" : {
                    url:"appointment_action.php",
                    type:"POST",
                    data:{
                        is_date_search:is_date_search, start_date:start_date, end_date:end_date, action:'fetch'
                    }
                },
                "columnDefs":[
                    {
                       
                        "targets":[6],
                        "orderable":false,
                    },
                ],
            });
        }
    
        
    
        $(document).on('click', '.view_button', function(){
    
            var appointment_id = $(this).data('id');
    
            $.ajax({
    
                url:"appointment_action.php",
    
                method:"POST",
    
                data:{appointment_id:appointment_id, action:'fetch_single'},
    
                success:function(data)
                {
                    $('#viewModal').modal('show');
    
                    $('#appointment_details').html(data);
    
                    $('#hidden_appointment_id').val(appointment_id);
    
                }
    
            })
        });
    
        $('.input-daterange').datepicker({
            todayBtn:'linked',
            format: "yyyy-mm-dd",
            autoclose: true
        });
    
        $('#search').click(function(){
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            if(start_date != '' && end_date !='')
            {
                $('#appointment_table').DataTable().destroy();
                fetch_data('yes', start_date, end_date);
            }
            else
            {
                alert("Both Date is Required");
            }
        });
    
        $('#refresh').click(function(){
            $('#appointment_table').DataTable().destroy();
            fetch_data('no');
        });
    
        $('#edit_appointment_form').parsley();
    
        $('#edit_appointment_form').on('submit', function(event){
            event.preventDefault();
            if($('#edit_appointment_form').parsley().isValid())
            {       
                $.ajax({
                    url:"appointment_action.php",
                    method:"POST",
                    data: $(this).serialize(),
                    beforeSend:function()
                    {
                        $('#save_appointment').attr('disabled', 'disabled');
                        $('#save_appointment').val('wait...');
                    },
                    success:function(data)
                    {
                        $('#save_appointment').attr('disabled', false);
                        $('#save_appointment').val('Save');
                        $('#viewModal').modal('hide');
                        $('#message').html(data);
                        $('#appointment_table').DataTable().destroy();
                        fetch_data('no');
                        setTimeout(function(){
                            $('#message').html('');
                        }, 5000);
                    }
                })
            }
        });
    
    });
    </script>
   
   <style>
    bootstrap-datetimepicker-widget {
    z-index: 100000 !important;
    }

</style>
</body>


</html>