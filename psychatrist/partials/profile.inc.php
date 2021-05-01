<?php
require 'includes/config.inc.php';
$id = $_SESSION['p_id'];
$sql = "SELECT * FROM `physcho` WHERE psy_id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['psy_name'];
$email = $row['psy_email'];
$quali = $row['psy_qualification'];
$bio = $row['psy_bio'];
$gender = $row['psy_gender'];
$image = $row['psy_profile'];

echo '<div class="col-md-4">
    <div class="card card-user">
        <div class="card-body">
            <p class="card-text">
                <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>

                    <a href="javascript:void(0)">
                       
                        <form action="partials/profile.php" method="post" enctype="multipart/form-data">
                    <div class="profile-pic-div">

                        <img class="avatar" style="object-fit:cover; object-position:center center;" src="' . $image . '" onClick=" triggerClick()" id="profileDisplay"
                            alt="Profile">
                        <input type="file" name="profileImage" onChange="displayImage(this)"
                            id="profileImage" class="form-control" style="display: none;">
                        <label for="file" id="uploadBtn">Change</label>


                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-secondary">
                                            Change </button>
                                            </form>
                                          <br>  <h5 class="title">' . $name . '</h5>
                                            </a>
                                           
            <p class="description">
               ' . $quali . '
            </p>
        </div>
        </p>
        <div class="card-description">
           ' . $bio . '
        </div>
    </div>
    <div class="card-footer">
        <div class="button-container">
            <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                <i class="fab fa-facebook"></i>
            </button>
            <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                <i class="fab fa-twitter"></i>
            </button>
            <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                <i class="fab fa-google-plus"></i>
            </button>
        </div>
    </div>
</div>
</div>';