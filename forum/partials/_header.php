<!-- HEADER -->
<header>

    <div class="header js-header js-dropdown">
        <div class="container">
            <div class="header__logo" style="width: auto;">
                <h1>
                    <img src="fonts/icons/main/Logo_Forum.svg" alt="logo">
                </h1>
                <div class="header__logo-btn" data-dropdown-btn="logo">
                    Aspire Recovery<i class="icon-Arrow_Below"></i>
                </div>
                <nav class="dropdown dropdown--design-01" id="top" data-dropdown-list="logo">
                    <ul class="dropdown__catalog">
                        <li><a href="forum.php">Home Page</a></li>
                        <li><a href="single-topic.php">Single Topic Page</a></li>
                        <li><a href="simple-signup.php">Sign up Page</a></li>
                        <li><a href="create-topic.php">Create Topic Page</a></li>
                    </ul>
                </nav>
            </div>

            <div class="header__search" style="padding-left:0px; width: 700px;">
                <form action="search.php" method="get">
                    <label style="">
                        <i class="icon-Search js-header-search-btn-open"></i>
                        <input type="search" name="search" placeholder="Search all forums" class="form-control">
                    </label>
                </form>
                <div class="header__search-close js-header-search-btn-close"><i class="icon-Cancel"></i></div>
                <div class="header__search-btn" data-dropdown-btn="search">
                </div>
                <div class="dropdown dropdown--design-01" data-dropdown-list="search">

                </div>
            </div>

            <div class="header__notification">
                <div class="header__notification-btn" data-dropdown-btn="notification">
                </div>
            </div>
            <div class="header__offset-btn">
                <a href="create-topic.php"><img src="fonts/icons/main/New_Topic.svg" alt="New Topic"></a>
            </div>
        </div>

    </div>
</header>