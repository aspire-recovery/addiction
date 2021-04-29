<!doctype html>
<html lang="en-US">
<?php
?>

<head>
    <meta charset="utf-8">
    <title>Create Thread</title>

    <!-- STYLESHEET -->
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="fonts/icons/main/mainfont/style.css">
    <link rel="stylesheet" href="fonts/icons/font-awesome/css/font-awesome.min.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="vendor/bootstrap/v3/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/v4/bootstrap-grid.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Custom -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tiny.cloud/1/c7z8wx5m5u6j9yj237a233drpztw21qo2l4k45cxbzch4qov/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>


    <script>
    tinymce.init({
        selector: '#mytextarea'
    });
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- HEADER -->

    <?php
$alert = false;
$loggedin = false;
session_start();
if (isset($_SESSION['loggedin'])) {
    $u_id = $_SESSION['u_id'];
}

require '../includes/config.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['description']) && !empty($_POST['title'])) {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $desc = $_POST['description'];
        $sql = "INSERT INTO `threads` (`thread_desc`, `thread_title`, `user_id`, `c_id`) VALUES ('$desc' , '$title' , '$u_id', '$category')";
        $result = mysqli_query($conn, $sql);
        if ($result = true) {
            $alert = true;
            $error = '<div class="alert alert-success alert-dismissible show" role="alert">
      <strong>Success!</strong> Thread Published Sucessfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
    } else {
        $alert = true;
        $error = '<div class="alert alert-danger alert-dismissible show" role="alert">
        <strong>Error!!!</strong> Cannot Field Empty.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}

?>


    <!-- MAIN -->
    <main>

        <div class="container">
            <div class="nav__thread">
                <p>Navigation:</p>
                <a onclick="history.back()" class="nav__thread-btn nav__thread-btn--prev"><i
                        class="icon-Arrow_Left"></i>Previous</a>

            </div>
            <div class="create" style="margin-top: 0px;">

                <div class="create__head">
                    <div class="create__title"><img src="fonts/icons/main/New_Topic.svg" alt="New topic">Create New
                        Thread</div>
                    <span>Forum Guidelines</span>
                </div>
                <?php
if ($alert) {
    echo $error;
}
?>
                <?php
if (isset($_SESSION['loggedin'])) {
    echo ' <form action="create-topic.php" method="post">
                    <div class="create__section">
                        <label class="create__label" for="title">Thread Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Add here">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="create__section">

                                <label class="create__label" for="category">Select Category</label>
                                <label class="custom-select">
                                    <select id="category" name="category">';

    $sql = "SELECT * FROM `forum_categories`";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $catid = $row['cat_id'];
        $catname = ucwords($row['cat_name']);
        echo ' <option value="' . $catid . '">' . $catname . '</option>';
    }
    echo '  </select>
                </label>
            </div>
        </div>

        </div>
        <div class="create__section create__textarea">
            <label class="create__label" for="description">Description</label>

            <textarea class="form-control" name="description" id="mytextarea"
                rows="20">Enter Your Thread Here.</textarea>
        </div>
        <div class="create__footer">
            <a href="#" class="create__btn-cansel btn">Cancel</a>
            <button type="submit" name="submit" class="create__btn-create btn btn--type-02">Create
                Thread</button>
        </div>

        </form>

        </div>';

} else {
    echo '<div class="card bg-dark">
            <div class="card-header text-light">
                ISSUE
            </div>
            <div class="card-body text-light">
                <h5 class="card-title">You Are Not Logged In!!!</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="../login.php" class="btn btn-danger bg-danger text-light">Login</a>
            </div>
        </div>';

}
?>


            </div>
        </div>
        </div>
        </div>
    </main>

    <!-- FOOTER -->

    <!-- JAVA SCRIPT -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/velocity/velocity.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".dropdown").removeClass("dropdown--open");
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="js/app.js"></script>

</body>

</html>