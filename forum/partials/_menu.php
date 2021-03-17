<div class="nav">
    <div class="nav__categories js-dropdown" style="padding: 15px 0px;">
        <div class="nav__select">


            <div class="btn-select" data-dropdown-btn="categories"><?php
if (isset($_GET['catid'])) {
    $cid = $_GET['catid'];
    $sql2 = "SELECT * FROM `forum_categories` WHERE cat_id =" . $cid . "";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $cname = ucwords($row2['cat_name']);
    $cdesc = $row2['cat_desc'];
    echo $cname;
} else {
    echo "All Categories";
}
?></div>

            <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                <ul class="dropdown__catalog row">
                    <?php
$sql = "SELECT * FROM `forum_categories`";
$result = mysqli_query($conn, $sql);
$color_array = array("f9bc64", "348aa7", "4436f8", "5dd39e", "ff755a", "bce784", "83253f", "c49bbb", "3ebafa", "c6b38e");
$i = rand(0, 9);
echo '<li class="col-xs-6"><a href="forum.php?all=true" class="category"><i class="bg-' . $color_array[$i] . '"></i> All Categories </a>
                                </li>';
while ($row = mysqli_fetch_assoc($result)) {
    $i = rand(0, 9);
    $catid = $row['cat_id'];
    $catname = $row['cat_name'];
    echo '<li class="col-xs-6"><a href="forum.php?catid=' . $catid . '" class="category"><i class="bg-' . $color_array[$i] . '"></i>' . $catname . '</a>
                                </li>';
}

?>
                </ul>
            </nav>
        </div>

        <div class="nav__menu js-dropdown">
            <div class="nav__select">
                <div class="b" data-dropdown-btn="menu"></div>
                <div class="" data-dropdown-list="menu">
                    <ul class="">

                    </ul>
                </div>
            </div>
            <ul>
            </ul>
        </div>
    </div>
    <div class="nav__thread">
        <p>Thread Navigation:</p>
        <a href="#" class="nav__thread-btn nav__thread-btn--prev"><i class="icon-Arrow_Left"></i>Previous</a>
        <a href="#" class="nav__thread-btn nav__thread-btn--next">Next<i class="icon-Arrow_Right"></i></a>
    </div>