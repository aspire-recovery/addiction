<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Aspire-Recovery Appointment-Bookinng</title>
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
<body>
<div class="banner3">
    <div class="py-5 banner" style="background-image:url(https://media.istockphoto.com/photos/beautiful-young-psychotherapist-picture-id667192570?b=1&k=6&m=667192570&s=170667a&w=0&h=fOhglzlv5hOrvy4uxVkmLqgTqfo9Ix8Aivn5Surj_LM=);">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h3 class="my-3 text-white font-weight-medium text-uppercase">Book Appointment</h3>
                    <div class="bg-white">
                        <div class="form-row border-bottom">
                            <div class="p-4 left border-right w-50">
                                <label class="text-inverse font-12 text-uppercase">First Name</label>
                                <input type="text" class="border-0 p-0 font-14 form-control" placeholder="Your First Name" />
                            </div>
                            <div class="p-4 right w-50">
                                <label class="text-inverse font-12 text-uppercase">Last Name</label>
                                <input type="text" class="border-0 p-0 font-14 form-control" placeholder="Your Last Name" />
                            </div>
                        </div>
                        <div class="form-row border-bottom p-4">
                            <label class="text-inverse font-12 text-uppercase">Email Address</label>
                            <input type="text" class="border-0 p-0 font-14 form-control" placeholder="Enter your Email Address" />
                        </div>
                        <div class="form-row border-bottom p-4">
                            <label class="text-inverse font-12 text-uppercase">Phone Number</label>
                            <input type="text" class="border-0 p-0 font-14 form-control" placeholder="Enter your Phone Number" />
                        </div>
                        <div class="form-row border-bottom p-4 position-relative">
                            <label class="text-inverse font-12 text-uppercase">Booking Date</label>
                            <div class="input-group date">
                                <input type="text" class="border-0 p-0 font-14 form-control" id="dp" placeholder="Select the Appointment Date" />
                                <label class="mt-2" for="dp"><i class="icon-calendar mt-1"></i></label>
                            </div>
                        </div>
                        <div class="form-row border-bottom p-4">
                            <label class="text-inverse font-12 text-uppercase">Message</label>
                            <textarea col="1" row="1" class="border-0 p-0 font-weight-light font-14 form-control" placeholder="Write Down the Message"></textarea>
                        </div>
                        <div>
                            <button class="m-0 border-0 py-4 font-14 font-weight-medium btn btn-danger-gradiant btn-block position-relative rounded-0 text-center text-white text-uppercase">
                                <span>Book Yor Appointment Now</span>
                            </button>
                        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->

</body>
</html>
