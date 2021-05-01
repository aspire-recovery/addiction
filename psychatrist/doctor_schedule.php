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


    <title>
        Doctor Schedule
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
    <link rel="stylesheet" type="text/css" href="vendor/timepicker/jquery.timepicker.css" />
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
                <h1 class="h3 mb-4 text-gray-800">Doctor Schedule Management</h1>

                <!-- DataTales Example -->
                <span id="message"></span>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col">
                                <h6 class="m-0 font-weight-bold text-primary">Doctor Schedule List</h6>
                            </div>
                            <div class="col" align="right">
                                <button type="button" name="add_exam" id="add_doctor_schedule" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="doctor_schedule_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th>Schedule Date</th>
                                        <th>Schedule Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Consulting Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div id="doctor_scheduleModal" class="modal fade">
                    <div class="modal-dialog">
                        <form method="post" id="doctor_schedule_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modal_title">Add Doctor Schedule</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <span id="form_message"></span>

                                    <div class="form-group">
                                        <label>Schedule Date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" name="doctor_schedule_date" id="doctor_schedule_date" class="form-control" required readonly />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <input type="text" name="doctor_schedule_start_time" id="doctor_schedule_start_time" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#doctor_schedule_start_time" required onkeydown="return false" onpaste="return false;" ondrop="return false;" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <input type="text" name="doctor_schedule_end_time" id="doctor_schedule_end_time" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#doctor_schedule_end_time" required onkeydown="return false" onpaste="return false;" ondrop="return false;" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Average Consulting Time</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <select name="average_consulting_time" id="average_consulting_time" class="form-control" required>
                                                <option value="">Select Consulting Duration</option>
                                                <?php
                                                $count = 0;
                                                for ($i = 1; $i <= 15; $i++) {
                                                    $count += 5;
                                                    echo '<option value="' . $count . '">' . $count . ' Minute</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="hidden_id" id="hidden_id" />
                                    <input type="hidden" name="action" id="action" value="Add" />
                                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
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
    <script type="text/javascript" src="vendor/timepicker/jquery.timepicker.js"></script>

  
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
        $(document).ready(function() {

            var dataTable = $('#doctor_schedule_table').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "doctor_schedule_action.php",
                    type: "POST",
                    data: {
                        action: 'fetch'
                    }
                },
                "columnDefs": [{

                    "targets": [5, 6],

                    "orderable": false,
                }, ],
            });

            var date = new Date();
            date.setDate(date.getDate());

            $('#doctor_schedule_date').datepicker({
                startDate: date,
                format: "yyyy-mm-dd",
                autoclose: true
            
            });

            $('#doctor_schedule_start_time').timepicker({
                'scrollDefault': 'now'
               
            });

            $('#doctor_schedule_end_time').timepicker({
     
            });

            $("#doctor_schedule_start_time").on("change.datetimepicker", function(e) {
                console.log('test');
                $('#doctor_schedule_end_time').datetimepicker('minDate', e.date);
            });

            $("#doctor_schedule_end_time").on("change.datetimepicker", function(e) {
                $('#doctor_schedule_start_time').datetimepicker('maxDate', e.date);
            });

            $('#add_doctor_schedule').click(function() {

                $('#doctor_schedule_form')[0].reset();

                $('#doctor_schedule_form').parsley().reset();

                $('#modal_title').text('Add Doctor Schedule Data');

                $('#action').val('Add');

                $('#submit_button').val('Add');

                $('#doctor_scheduleModal').modal('show');

                $('#form_message').html('');

            });

            $('#doctor_schedule_form').parsley();

            $('#doctor_schedule_form').on('submit', function(event) {
                event.preventDefault();
                if ($('#doctor_schedule_form').parsley().isValid()) {
                    $.ajax({
                        url: "doctor_schedule_action.php",
                        method: "POST",
                        data: $(this).serialize(),
                        dataType: 'json',
                        beforeSend: function() {
                            $('#submit_button').attr('disabled', 'disabled');
                            $('#submit_button').val('wait...');
                        },
                        success: function(data) {
                            $('#submit_button').attr('disabled', false);
                            if (data.error != '') {
                                $('#form_message').html(data.error);
                                $('#submit_button').val('Add');
                            } else {
                                $('#doctor_scheduleModal').modal('hide');
                                $('#message').html(data.success);
                                dataTable.ajax.reload();

                                setTimeout(function() {

                                    $('#message').html('');

                                }, 5000);
                            }
                        }
                    })
                }
            });

            $(document).on('click', '.edit_button', function() {

                var doctor_schedule_id = $(this).data('id');

                $('#doctor_schedule_form').parsley().reset();

                $('#form_message').html('');

                $.ajax({

                    url: "doctor_schedule_action.php",

                    method: "POST",

                    data: {
                        doctor_schedule_id: doctor_schedule_id,
                        action: 'fetch_single'
                    },

                    dataType: 'JSON',

                    success: function(data) {
                        $('#doctor_schedule_date').val(data.doctor_schedule_date);

                        $('#doctor_schedule_start_time').val(data.doctor_schedule_start_time);

                        $('#doctor_schedule_end_time').val(data.doctor_schedule_end_time);

                        $('#modal_title').text('Edit Doctor Schedule Data');

                        $('#action').val('Edit');

                        $('#submit_button').val('Edit');

                        $('#doctor_scheduleModal').modal('show');

                        $('#hidden_id').val(doctor_schedule_id);

                    }

                })

            });

            $(document).on('click', '.status_button', function() {
                var id = $(this).data('id');
                var status = $(this).data('status');
                var next_status = 'Active';
                if (status == 'Active') {
                    next_status = 'Inactive';
                }
                if (confirm("Are you sure you want to " + next_status + " it?")) {

                    $.ajax({

                        url: "doctor_schedule_action.php",

                        method: "POST",

                        data: {
                            id: id,
                            action: 'change_status',
                            status: status,
                            next_status: next_status
                        },

                        success: function(data) {

                            $('#message').html(data);

                            dataTable.ajax.reload();

                            setTimeout(function() {

                                $('#message').html('');

                            }, 5000);

                        }

                    })

                }
            });

            $(document).on('click', '.delete_button', function() {

                var id = $(this).data('id');

                if (confirm("Are you sure you want to remove it?")) {

                    $.ajax({

                        url: "doctor_schedule_action.php",

                        method: "POST",

                        data: {
                            id: id,
                            action: 'delete'
                        },

                        success: function(data) {

                            $('#message').html(data);

                            dataTable.ajax.reload();

                            setTimeout(function() {

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