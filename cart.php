<?php
include 'includes/config.inc.php';
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: login.php?login?true');
}
if (!empty($_GET["action"])) {

    switch ($_GET["action"]) {
        case "add":
            $id = $_GET["id"];
            if (!empty($_POST["quantity"])) {
                $query = "SELECT * FROM product WHERE p_id='$id'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $arraya[] = $row;
                }
                $productByCode = $arraya;


                $itemArray = array($productByCode[0]["p_id"] => array(
                    'name' => $productByCode[0]["p_name"],
                    'id' => $productByCode[0]["p_id"],
                    'quantity' => $_POST["quantity"],
                    'price' => $productByCode[0]["p_price"],
                    'image' => $productByCode[0]["p_image"],
                    'descc' => $productByCode[0]["p_description"]
                ));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["p_id"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["p_id"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;

        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["id"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>


<!------ Include the above in your HEAD tag ---------->



<!DOCTYPE html>
<html lang='en' class=''>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style class="cp-pen-styles">
    @import url(https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Montserrat:400,700);

    body {
        font-family: Arial;
        color: #211a1a;
        font-size: 1.1em !important;
    }

    #shopping-cart {
        margin: 40px;
    }

    #product-grid {
        margin: 40px;
    }

    #shopping-cart table {
        width: 100%;
        background-color: #F0F0F0;
    }

    #shopping-cart table td {
        background-color: #FFFFFF;
    }

    .txt-heading {
        color: #211a1a;
        border-bottom: 1px solid #E0E0E0;
        overflow: auto;
    }

    #btnEmpty {
        background-color: #ffffff;
        border: #d00000 1px solid;
        padding: 5px 10px;
        color: #d00000;
        float: right;
        text-decoration: none;
        border-radius: 3px;
        margin: 10px 0px;
    }

    .btnAddAction {
        padding: 5px 10px;
        margin-left: 5px;
        background-color: #efefef;
        border: #E0E0E0 1px solid;
        color: #211a1a;
        float: right;
        text-decoration: none;
        border-radius: 3px;
        cursor: pointer;
    }

    #product-grid .txt-heading {
        margin-bottom: 18px;
    }

    .product-item {
        float: left;
        background: #ffffff;
        margin: 30px 30px 0px 0px;
        border: #E0E0E0 1px solid;
    }

    .product-image {
        height: 155px;
        width: 250px;
        background-color: #FFF;
    }

    .clear-float {
        clear: both;
    }

    .demo-input-box {
        border-radius: 2px;
        border: #CCC 1px solid;
        padding: 2px 1px;
    }

    .tbl-cart {
        font-size: 0.9em;
    }

    .tbl-cart th {
        font-weight: normal;
    }

    .product-title {
        margin-bottom: 20px;
    }

    .product-price {
        float: left;
    }

    .cart-action {
        display: flex;
        justify-content: center;

    }

    .product-quantity {
        padding: 5px 10px;
        border-radius: 3px;
        border: #E0E0E0 1px solid;
    }

    .product-tile-footer {
        padding: 15px 15px 0px 15px;
        overflow: auto;
    }

    .cart-item-image {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: #E0E0E0 1px solid;
        padding: 2px;
        vertical-align: middle;
        margin-right: 15px;
    }

    .no-records {
        text-align: center;
        clear: both;
        margin: 38px 0px;
    }

    .sticky {
        position: static;
        bottom: 0px;
    }

    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif;
        font-size: 14px
    }

    .container-fluid {
        margin-top: 70px
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.40rem
    }

    .img-sm {
        width: 80px;
        height: 80px
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .table-shopping-cart .price-wrap {
        line-height: 1.2
    }

    .table-shopping-cart .price {
        font-weight: bold;
        margin-right: 5px;
        display: block
    }

    .text-muted {
        color: #969696 !important
    }

    a {
        text-decoration: none !important
    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 0px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .dlist-align {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex
    }

    [class*="dlist-"] {
        margin-bottom: 5px
    }

    .coupon {
        border-radius: 1px
    }

    .price {
        font-weight: 600;
        color: #212529
    }

    .btn.btn-out {
        outline: 1px solid #fff;
        outline-offset: -5px
    }

    .btn-main {
        border-radius: 2px;
        text-transform: capitalize;
        font-size: 15px;
        padding: 10px 19px;
        cursor: pointer;
        color: #fff;
        width: 100%
    }

    .btn-light {
        color: #ffffff;
        background-color: #F44336;
        border-color: #f8f9fa;
        font-size: 12px
    }

    .btn-light:hover {
        color: #ffffff;
        background-color: #F44336;
        border-color: #F44336
    }

    .btn-apply {
        font-size: 11px
    }
    </style>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <br>
    <br>
    <br>
    <br>


    <div class="container">
        <div class="row " style="margin: 20px 0px;">
            <aside class="col-lg-9">
                <div id="shopping-cart">

                    <div class="txt-heading">Shopping Cart</div>


                    <?php
                    if (isset($_SESSION["cart_item"])) {
                        $total_quantity = 0;
                        $total_price = 0;
                    ?>

                    <table class="tbl-cart" cellpadding="10" cellspacing="1">
                        <tbody>
                            <tr>
                                <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
                                <th style="text-align:left;" width="20%">Name</th>
                                <th style=" text-align:left;">Description</th>
                                <th style="text-align:right;" width="5%">Quantity</th>
                                <th style="text-align:right;" width="15%">Unit Price</th>
                                <th style="text-align:right;" width="15%">Price</th>
                                <th style="text-align:center;" width="5%">Remove</th>
                            </tr>
                            <?php
                                $_SESSION["cart_item"];
                                foreach ($_SESSION["cart_item"] as $item) {
                                    $item_price = $item["quantity"] * $item["price"];

                                ?>
                            <tr>
                                <td><img src="<?php echo $item["image"]; ?>"
                                        class="cart-item-image" /><?php echo $item["name"]; ?></td>
                                <td><?php echo $item["descc"]; ?></td>
                                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                <td style="text-align:right;"><?php echo "$ " . $item["price"]; ?></td>
                                <td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
                                <td style="text-align:center;"><a
                                        href="cart.php?action=remove&id=<?php echo $item["id"]; ?>"
                                        class="btnRemoveAction"><img src="assets\images\icon-delete.png"
                                            alt="Remove Item" /></a></td>
                            </tr>
                            <?php
                                    $total_quantity += $item["quantity"];
                                    $total_price += ($item["price"] * $item["quantity"]);
                                }
                                ?>


                        </tbody>
                    </table>
                </div>
            </aside>
            <aside class="col-lg-3">

                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total Product:</dt>
                            <dd class="text-right ml-3"><?php echo $total_quantity; ?></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3">- $0.00</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Fees:</dt>
                            <dd class="text-right text-dark ml-3"><?php $tax = (0.02 * $total_price) + 3;
                                                                    echo number_format($tax, 2); ?></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>GST:</dt>
                            <dd class="text-right text-dark ml-3"><?php $gst = 0.18 * $tax;
                                                                    echo number_format($gst, 2); ?></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3">
                                <strong><?php echo "$ " . number_format($total_price + $tax + $gst, 2); ?></strong>
                            </dd>
                        </dl>
                        <hr>
                        <?php
                        $price = number_format($total_price + $tax + $gst, 2);
                        ?>
                        <form action="pay.php" method="post">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">

                            <input type="submit" name="pay" class="btn btn-out btn-primary btn-square btn-main"
                                data-abc="true">
                        </form>
                        <a href="product.php" class="btn btn-out btn-success btn-square btn-main mt-2"
                            data-abc="true">Continue
                            Shopping</a>
                    </div>
                </div>
            </aside>
            </row>

            <?php
                    } else {
        ?>
            <div class="no-records ">Your Cart is Empty</div>
            </aside>
            <aside class="col-lg-3">

                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3"></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3"></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong></strong></dd>
                        </dl>
                        <hr> <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"
                            disabled="true">
                            Make
                            Purchase
                        </a> <a href="product.php" class="btn btn-out btn-success btn-square btn-main mt-2"
                            data-abc="true">Continue
                            Shopping</a>
                    </div>
                </div>
            </aside>
            <?php
                    }
        ?>
        </div>
    </div>
    <div class="sticky">
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>