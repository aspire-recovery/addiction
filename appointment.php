<?php

include('psychatrist/class/Appointment.php');

$object = new Appointment;


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        body{
            background-color: coral;
        }
    .border-top {
        border-top: 1px solid #e5e5e5;
    }

    .border-bottom {
        border-bottom: 1px solid #e5e5e5;
    }

    .box-shadow {
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
    }
    </style>
    <title>Appointment</title>
    <style>
    @import url(//fonts.googleapis.com/css?family=Montserrat:400,500,700);


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

<div class="container-fluid">

    <br />
    <div class="card">
        <span id="message"></span>
        <div class="card-header">
            <h4>My Appointment List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="appointment_list_table">
                    <thead>
                        <tr>
                            <th>Appointment No.</th>
                            <th>Doctor Name</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Appointment Day</th>
                            <th>Appointment Status</th>
                            <th>Download</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>



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

    var dataTable = $('#appointment_list_table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "action.php",
            type: "POST",
            data: {
                action: 'fetch_appointment'
            }
        },
        "columnDefs": [{
            "targets": [6, 7],
            "orderable": false,
        }, ],
    });

    $(document).on('click', '.cancel_appointment', function() {
        var appointment_id = $(this).data('id');
        if (confirm("Are you sure you want to cancel this appointment?")) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    appointment_id: appointment_id,
                    action: 'cancel_appointment'
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