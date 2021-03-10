<!doctype html>
<html lang="en-US">

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Custom -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tiny.cloud/1/c7z8wx5m5u6j9yj237a233drpztw21qo2l4k45cxbzch4qov/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    

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
    $alert=false;
    session_start();

    $u_id = $_SESSION['u_id'];
    require 'partials/_header.php';
    require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['description'])  && !empty($_POST['title'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $desc = $_POST['description'];  
        $sql = "INSERT INTO `threads` (`thread_desc`, `thread_title`, `user_id`, `c_id`) VALUES ('$desc' , '$title' , '$u_id', '$category')";
        $result = mysqli_query($conn, $sql);
        if($result=true){
            $alert=true;
        $error ='<div class="alert alert-success alert-dismissible show" role="alert">
      <strong>Success!</strong> Thread Published Sucessfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
    }
    else{
        $alert=true;
        $error ='<div class="alert alert-danger alert-dismissible show" role="alert">
        <strong>Error!!!</strong> Cannot Field Empty.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    }


    ?>


    <!-- MAIN -->
    <main>
        <div class="container">
            <div class="create">
                <div class="create__head">
                    <div class="create__title"><img src="fonts/icons/main/New_Topic.svg" alt="New topic">Create New
                        Thread</div>
                    <span>Forum Guidelines</span>
                </div>
                <?php
if($alert)
{
    echo $error;
}
?>
                <form action="create-topic.php" method="post">
                    <div class="create__section">
                        <label class="create__label" for="title">Thread Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Add here">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="create__section">

                                <label class="create__label" for="category">Select Category</label>
                                <label class="custom-select">
                                    <select id="category" name="category">

                                        <?php
                                        $sql = "SELECT * FROM `forum_categories`";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $catid = $row['cat_id'];
                                            $catname = ucwords($row['cat_name']);
                                            echo ' <option value="' . $catid . '">' . $catname . '</option>';
                                        }
                                        ?>


                                    </select>
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="create__section create__textarea">
                        <label class="create__label" for="description">Description</label>

                        <textarea class="form-control" name="description" id="mytextarea"
                            cols="200">Enter Your Thread Here.</textarea>
                    </div>
                    <div class="create__footer">
                        <a href="#" class="create__btn-cansel btn">Cancel</a>
                        <button type="submit" name="submit" class="create__btn-create btn btn--type-02">Create
                            Thread</button>
                    </div>

                </form>

            </div>
            <div class="posts" data-visible="desktop">
                <div class="posts__head">
                    <div class="posts__topic">Topic</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Users</div>
                    <div class="posts__replies">Replies</div>
                    <div class="posts__views">Views</div>
                    <div class="posts__activity">Activity</div>
                </div>
                <div class="posts__body">
                    <div class="posts__item">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="#">
                                        <h3>Current news and discussion</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="posts__category"><a href="#" class="category"><i
                                        class="bg-368f8b"></i>Politics</a></div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/A.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/G.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/P.svg" alt="avatar"></a>
                                </div>
                            </div>
                            <div class="posts__replies">31</div>
                            <div class="posts__views">14.5k</div>
                            <div class="posts__activity">13d</div>
                        </div>
                    </div>
                    <div class="posts__item bg-f2f4f6">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="#">
                                        <h3>Get your username drawn by the other users of unity! or a drawing based on
                                            what you do</h3>
                                    </a>
                                    <div class="posts__tags tags">
                                        <a href="#" class="bg-4f80b0">gaming</a>
                                        <a href="#" class="bg-424ee8">nature</a>
                                        <a href="#" class="bg-36b7d7">entertainment</a>
                                    </div>
                                </div>
                            </div>
                            <div class="posts__category"><a href="#" class="category"><i class="bg-4436f8"></i>Video</a>
                            </div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/L.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/T.svg" alt="avatar"></a>
                                </div>
                            </div>
                            <div class="posts__replies">252</div>
                            <div class="posts__views">396</div>
                            <div class="posts__activity">13m</div>
                        </div>
                    </div>
                    <div class="posts__item">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="#">
                                        <h3>Which movie have you watched most recently?</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="posts__category"><a href="#" class="category"><i class="bg-3ebafa"></i>
                                    Exchange</a></div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/E.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/I.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/R.svg" alt="avatar"></a>
                                </div>
                            </div>
                            <div class="posts__replies">207</div>
                            <div class="posts__views">7.5k</div>
                            <div class="posts__activity">41m</div>
                        </div>
                    </div>
                    <div class="posts__item posts__item--bg-gradient">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="#">
                                        <h3><span>This post contails spoiler about</span> Star Wars Movie.</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="posts__category"><a href="#" class="category"><i class="bg-777da7"></i>
                                    Q&amp;As</a></div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/F.svg" alt="avatar"></a>
                                </div>
                            </div>
                            <div class="posts__replies">2.3k</div>
                            <div class="posts__views">2.0k</div>
                            <div class="posts__activity">1h</div>
                        </div>
                    </div>
                    <div class="posts__item">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="#">
                                        <h3>Take a picture of what you’re doing at this very moment</h3>
                                    </a>
                                    <div class="posts__tags tags">
                                        <a href="#" class="bg-ec008c">selfie</a>
                                        <a href="#" class="bg-7cc576">camera</a>
                                    </div>
                                </div>
                            </div>
                            <div class="posts__category"><a href="#" class="category"><i class="bg-c6b38e"></i> Pets</a>
                            </div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__users">
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/C.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/U.svg" alt="avatar"></a>
                                </div>
                                <div>
                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/I.svg" alt="avatar"></a>
                                </div>
                            </div>
                            <div class="posts__replies">441</div>
                            <div class="posts__views">3.1k</div>
                            <div class="posts__activity">6h</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer js-dropdown">
            <div class="container">
                <div class="footer__logo">
                    <div>
                        <img src="fonts/icons/main/Logo_Forum.svg" alt="logo">Unity
                    </div>
                </div>
                <div class="footer__nav">
                    <div class="footer__tline">
                        <i class="icon-Support"></i>
                        <ul class="footer__menu">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">The Team</a></li>
                        </ul>
                        <div class="footer__language">
                            <div class="footer__language-btn" data-dropdown-btn="language">Americas - English<i
                                    class="icon-Arrow_Below"></i></div>
                            <div class="footer__language-dropdown dropdown dropdown--design-01 dropdown--reverse-y"
                                data-dropdown-list="language">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h3>Region</h3>
                                        <ul class="dropdown__catalog">
                                            <li class="active"><a href="#"><i></i>America</a></li>
                                            <li><a href="#"><i></i>Europe</a></li>
                                            <li><a href="#"><i></i>Asia</a></li>
                                            <li><a href="#"><i></i>China</a></li>
                                            <li><a href="#"><i></i>Australia</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <h3>Language</h3>
                                        <ul class="dropdown__catalog">
                                            <li class="active"><a href="#"><i></i>English</a></li>
                                            <li><a href="#"><i></i>Espanol</a></li>
                                            <li><a href="#"><i></i>Portugues</a></li>
                                            <li><a href="#"><i></i>Chinese</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer__bline">
                        <ul class="footer__menu">
                            <li class="footer__copyright"><span>&copy; 2017 azyrusthemes.com</span></li>
                            <li><a href="#">Teams</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Send Feedback</a></li>
                        </ul>
                        <ul class="footer__social">
                            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-cloud" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                        </ul>
                        <div class="footer__language-btn-m" data-dropdown-btn="language">Americas - English<i
                                class="icon-Arrow_Below"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVA SCRIPT -->
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/velocity/velocity.min.js"></script>
    <script>
    $( document ).ready(function() {
     $(".dropdown").removeClass("dropdown--open");
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>

</body>

</html>