<?php
require 'includes/config.inc.php';


include('psychatrist/class/Appointment.php');

$object = new Appointment;
if(!isset($_SESSION['u_id']))
{
header('location: e404.php');
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
<title>Appointment Booking</title>

 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="psychatrist/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="psychatrist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="psychatrist/vendor/parsley/parsley.css" />

    <link rel="stylesheet" type="text/css" href="psychatrist/vendor/datepicker/bootstrap-datepicker.css" />

    <!-- Custom styles for this page -->
    <link href="psychatrist/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    .border-top {
        border-top: 1px solid #e5e5e5;
    }

    .border-bottom {
        border-bottom: 1px solid #e5e5e5;
    }

    .box-shadow {
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
    }
   
    @import url(//fonts.googleapis.com/css?family=Montserrat:400,500,700);
    body{
        background-color: coral;
    }
    .banner3 {
        font-family: "Montserrat", sans-serif;
        color: #8d97ad;
        font-weight: 300;
        max-height: 800px;
    }

    .banner3 .banner {
        position: relative;
        max-height: 700px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center top;
        width: 100%;
        display: table;
    }

    .banner3 h1,
    .banner3 h2,
    .banner3 h3,
    .banner3 h4,
    .banner3 h5,
    .banner3 h6 {
        color: #3e4555;
    }

    .banner3 .font-weight-medium {
        font-weight: 500;
    }

    .banner3 .subtitle {
        color: #8d97ad;
        line-height: 24px;
    }

    .banner3 .btn-danger-gradiant {
        background: #ff4d7e;
        background: -webkit-linear-gradient(legacy-direction(to right), #ff4d7e 0%, #ff6a5b 100%);
        background: -webkit-gradient(linear, left top, right top, from(#ff4d7e), to(#ff6a5b));
        background: -webkit-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
        background: -o-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
        background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
        border: 0px;
    }

    .banner3 .btn-danger-gradiant:hover {
        background: #ff6a5b;
        background: -webkit-linear-gradient(legacy-direction(to right), #ff6a5b 0%, #ff4d7e 100%);
        background: -webkit-gradient(linear, left top, right top, from(#ff6a5b), to(#ff4d7e));
        background: -webkit-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
        background: -o-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
        background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
    }

    .banner3 .btn-danger-gradiant.active,
    .banner3 .btn-danger-gradiant:active,
    .banner3 .btn-danger-gradiant:focus {
        -webkit-box-shadow: 0px;
        box-shadow: 0px;
        opacity: 1;
    }


    .banner3 .btn-md {
        padding: 15px 45px;
        font-size: 16px;
    }

    .banner3 .form-row {
        margin: 0;
    }

    .banner3 label.font-12 {
        font-size: 12px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .banner3 .form-control {
        color: #8d97ad;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
    }

    .banner3 .date label {
        cursor: pointer;
        margin: 0;
    }

    @media (max-width: 370px) {

        .banner3 .left,
        .banner3 .right {
            padding: 25px;
        }
    }

    @media (max-width: 320px) {

        .banner3 .left,
        .banner3 .right {
            padding: 25px 15px;
        }
    }

    .banner3 .font-14 {
        font-size: 14px;
    }

    .banner3 .text-inverse {
        color: #3e4555 !important;
    }
    </style>
</head>
<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>

<body style="background-color: coral">
    <div class="banner3">
        <div class="py-5 banner"
            style="background-image:url(https://media.istockphoto.com/photos/beautiful-young-psychotherapist-picture-id667192570?b=1&k=6&m=667192570&s=170667a&w=0&h=fOhglzlv5hOrvy4uxVkmLqgTqfo9Ix8Aivn5Surj_LM=);">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4>Doctor Schedule List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="appointment_list_table">
                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Education</th>
                                        <th>Speciality</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Day</th>
                                        <th>Available Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="appointmentModal" class="modal fade">
                <div class="modal-dialog">
                    <form method="post" id="appointment_form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal_title">Make Appointment</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <span id="form_message"></span>
                                <div id="appointment_detail"></div>
                                <div class="form-group">
                                    <label><b>Reasone for Appointment</b></label>
                                    <textarea name="reason_for_appointment" id="reason_for_appointment"
                                        class="form-control" required rows="5"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="hidden_doctor_id" id="hidden_doctor_id" />
                                <input type="hidden" name="hidden_doctor_schedule_id" id="hidden_doctor_schedule_id" />
                                <input type="hidden" name="action" id="action" value="book_appointment" />
                                <input type="submit" name="submit" id="submit_button" class="btn btn-success"
                                    value="Book" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>

    <script>
    $(function() {
        $('#dp').datepicker();
    });
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
    <script src="psychatrist/vendor/jquery/jquery.min.js"></script>
    <script src="psychatrist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="psychatrist/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script type="text/javascript" src="psychatrist/vendor/parsley/dist/parsley.min.js"></script>

    <script type="text/javascript" src="psychatrist/vendor/datepicker/bootstrap-datepicker.js"></script>

    <!-- Page level plugins -->
    <script src="psychatrist/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="psychatrist/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function() {

        var a = <?php echo $id; ?>;


        var dataTable = $('#appointment_list_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "action.php",
                type: "POST",
                data: {
                    id: a,
                    action: 'fetch_schedule'
                }
            },
            "columnDefs": [{
                "targets": [6],
                "orderable": false,
            }, ],
        });

        $(document).on('click', '.get_appointment', function() {

            var doctor_schedule_id = $(this).data('doctor_schedule_id');
            var doctor_id = $(this).data('doctor_id');

            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    action: 'make_appointment',
                    doctor_schedule_id: doctor_schedule_id
                },
                success: function(data) {
                    $('#appointmentModal').modal('show');
                    $('#hidden_doctor_id').val(doctor_id);
                    $('#hidden_doctor_schedule_id').val(doctor_schedule_id);
                    $('#appointment_detail').html(data);
                }
            });

        });

        $('#appointment_form').parsley();

        $('#appointment_form').on('submit', function(event) {

            event.preventDefault();

            if ($('#appointment_form').parsley().isValid()) {

                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('#submit_button').attr('disabled', 'disabled');
                        $('#submit_button').val('wait...');
                    },
                    success: function(data) {
                        $('#submit_button').attr('disabled', false);
                        $('#submit_button').val('Book');
                        if (data.error != '') {
                            $('#form_message').html(data.error);
                        } else {
                            window.location.href = "appointment.php";
                        }
                    }
                })

            }

        })

    });
    </script>

</body>

</html>