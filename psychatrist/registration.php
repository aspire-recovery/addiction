<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dentile a Medical Category Bootstrap Responsive Website Template | Contact :: W3layouts
    </title>
    <!-- Template CSS -->

    <link rel="stylesheet" href="../assets/css/style-starter.css">
    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <style>
        .profile-pic-div {
            height: 150px;
            width: 150px;
            position: relative;

            border-radius: 50%;
            overflow: hidden;
            border: 1px solid grey;
            margin: 0px auto;
            margin-bottom: 20px;
        }


        #profileDisplay {
            display: block;

            height: 150px;
            width: 150px;

            border-radius: 50%;
            object-fit: cover;
            object-position: center center;
        }

        #uploadBtn {
            height: 37px;
            width: 100%;
            position: absolute;
            bottom: -10px;
            text-align: center;
            background: rgba(29, 25, 46, 0.719);
            color: white;
            line-height: 30px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;
            display: none;
        }
    </style>


</head>


<body>

    <?php
include "../header.php"
?>

    <!-- /contact-form -->
    <section class="w3l-contact-main">
        <div class="contact-infhny py-5">
            <div class="container py-lg-5">
                <div class="title-content text-left mb-lg-5 mt-4">
                    <center>
                        <h3 style="color:black; margin-bottom: 20px">ARE YOU?</h3>
                        <div class="">
                            <a href="../register.php">
                                <img alt="user icon" class="profile_icons" src="assets/images/userp.svg" width="100"
                                    height="100">
                            </a>
                            <a href="registration.php">
                                <img style="margin-left: 20px" alt="psychaitrist icon" class="profile_icons"
                                    src="assets/images/psychaitristp.svg" width="100" height="100">
                            </a>
                        </div>
                    </center>

                    <h3 class="hny-title" style="text-align: center; margin: 30px; margin-bottom: -25px;">Register</h3>
                </div>
                <div class="row align-form-map " style="justify-content: center;">
                    <div class="col-lg-6 form-inner-cont">
                        <form action="register_process.php" method="post" class="signin-form"
                            enctype="multipart/form-data">
                            <div class="profile-pic-div">
                                <img src="../forum/fonts/icons/avatars/G.svg" onClick="triggerClick()"
                                    id="profileDisplay">
                                <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage"
                                    class="form-control" style="display: none;">

                                <label for="file" id="uploadBtn">Upload Profile</label>

                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="exampleInputPassword1"
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" id="" placeholder="Contact No." required="">
                            </div>

                            <div class="form-input">
                                <input type="email" name="email" id="w3lSender" placeholder="E-mail" required="" />
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>


                            <div class="form-group">
                                <select class="form-control" name="gender" id="exampleFormControlSelect1">
                                    <option>Select Your Gender</option>
                                    <option>male</option>
                                    <option>Female</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="form-group"> <button type="submit" class="btn btn-contact"
                                    style="margin:0px;">Submit</button>
                            </div>



                        </form>


                    </div>
                </div>
    </section>
    <!-- //contact-form -->



    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- disable body scroll which navbar is in active -->

    <!--//-->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //script -->

    <script src="assets/js/bootstrap.min.js"></script>


    <script>
        const imgDiv = document.querySelector('.profile-pic-div');
        const uploadBtn = document.querySelector('#uploadBtn');

        //if user hover on img div 

        imgDiv.addEventListener('mouseenter', function () {
            uploadBtn.style.display = "block";
        });

        //if we hover out from img div

        imgDiv.addEventListener('mouseleave', function () {
            uploadBtn.style.display = "none";
        });



        function triggerClick(e) {

            document.querySelector("#profileImage").click();

        }
        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.querySelector("#profileDisplay").setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>

</body>

</html>