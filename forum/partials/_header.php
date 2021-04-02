<!-- HEADER -->
<header style="background-color:#f8f9fa;">

    <div class="header js-header js-dropdown" style="background-color:#f8f9fa;">
        <div class="container" style="background-color:#f8f9fa;">


            <div class="header__search" style="padding-left:0px; width: 700px; background-color:#f8f9fa;">
                <form action="search.php" method="get">
                    <label style="">
                        <i class="icon-Search js-header-search-btn-open"></i>
                        <input type="search" name="search" placeholder="Search all forums" class="form-control"
                            style="background-color:#f8f9fa;">
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