<!--header-->
<?php
if (!isset($_SESSION['u_id'])) {
    ?>
<header id="site-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg stroke" style="margin-bottom:0px;display:grid; ">
            <h1><a class="navbar-brand mr-lg-5" href="../index.php">
                    <img src="assets/images/logo.png" alt="Your logo" title="Your logo" />Aspire
                </a></h1>
            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav w-100">
                    <li class="nav-item @@home__active">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @@about__active">
                        <a class="nav-link" href="../about.php">About</a>
                    </li>
                    <li class="nav-item @@causes__active">
                        <a class="nav-link" href="../causes.php">Causes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../register.php">Register</a>
                    </li>
                    <li class="ml-lg-auto mr-lg-0 m-auto">
                    </li>
                    <li class="align-self">
                        <a href="../donate.html" class="btn btn-style btn-primary ml-lg-3 mr-lg-2"><span
                                class="fa fa-heart mr-1"></span> Donate</a>
                    </li>
                </ul>
            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
<?php
} else {

    ?>
<header id="site-header" style="display:grid;">
    <div class="container">
        <nav class="navbar navbar-expand-lg stroke" style="margin-bottom:0px; ">
            <h1><a class="navbar-brand mr-lg-5" href="../index.php">
                    <img src="assets/images/logo.png" alt="Your logo" title="Your logo" />Save Poor
                </a></h1>
            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav w-100">
                    <li class="nav-item @@home__active">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../product.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../forum/forum.php">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../profile.php"><?php echo $_SESSION['u_name']; ?></a>
                    </li>
                    <li class="nav-item @@about__active">
                        <a class="nav-link" href="../cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                    <li class="ml-lg-auto mr-lg-0 m-auto">
                    </li>
                    <li class="align-self">
                        <a href="../donate.html" class="btn btn-style btn-primary ml-lg-3 mr-lg-2"><span
                                class="fa fa-heart mr-1"></span> Donate</a>
                    </li>
                </ul>
            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
<?php
}
?>