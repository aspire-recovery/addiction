<?php

if (!isset($_GET['payment_id']) && !isset($_GET['payment_request_id'])) {
    header('location: e404.php');
}
session_start();
require 'includes/config.inc.php';

$payid = $_GET['payment_id'];
$r_id = $_GET['payment_request_id'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/' . $payid . '/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        "X-Api-Key:test_b3da34ea51a924f0bef6db2cedf",
        "X-Auth-Token:test_9e75e6828e45244a7637cf101ee"
    )
);

$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response);
$status = $response->payment->status;


$id = $_SESSION['u_id'];
$name = $_SESSION['name'];
$address = $_SESSION['address'];
$state = $_SESSION['state'];
$email = $_SESSION['email'];
$city = $_SESSION['city'];
$zip = $_SESSION['zip'];
$phone = $_SESSION['phone'];
$total = number_format($_SESSION['amount'], 2);
if ($status == 'Credit') {

    $status = 1;

    $query = "INSERT INTO `orders` ( `u_id`, `total`, `address`, `email`, `phone`, `state`, `city`,
    `zip`,`status`)
    VALUES ( '$id', '$total', '$address', '$email', '$phone', '$state', '$city', '$zip','$status');
    ";
    $result = mysqli_query($conn, $query);
} else {
    // Payment was unsuccessful, mark it as failed in your database.
    // You can acess payment_request_id, purpose etc here.
    $status = -1;
    $query = "INSERT INTO `orders` ( `u_id`, `total`, `address`, `email`, `phone`, `state`, `city`,
    `zip`,`status`)
    VALUES ( '$id', '$total', '$address', '$email', '$phone', '$state', '$city', '$zip','$status');
    ";
    $result = mysqli_query($conn, $query);
}

$o_id = mysqli_insert_id($conn);
foreach ($_SESSION["cart_item"] as $item) {
    $p_id = $item['id'];
    $p_quantity = $item['quantity'];
    $sql = "INSERT INTO `order_details` (`order_id`, `product_id`, `p_quantity`) VALUES ('$o_id', '$p_id', '$p_quantity');";
    $result = mysqli_query($conn, $sql);
}
$psql = "INSERT INTO `transaction` ( `u_id`, `order_id`, `payment_id`) VALUES  ('$id', '$o_id', '$payid');";
$result = mysqli_query($conn, $psql);

unset($_SESSION["cart_item"]);
?>


<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aspire recovery</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<style>
* {
    box-sizing: border-box;
    /* outline:1px solid ;*/
}

body {
    background: #ffffff;
    background: linear-gradient(to bottom, #ffffff 0%, #e1e8ed 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e1e8ed', GradientType=0);
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;

}

.wrapper-1 {

    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
}

.wrapper-2 {

    padding: 30px;
    text-align: center;
}

h1 {
    font-family: 'Kaushan Script', cursive;
    font-size: 4em;
    letter-spacing: 3px;
    color: #5892FF;
    margin: 0;
    margin-bottom: 20px;
}

.wrapper-2 p {
    margin: 0;
    font-size: 1.3em;
    color: #aaa;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing: 1px;
}

.go-home {
    color: #fff;
    background: #5892FF;
    border: none;
    padding: 10px 50px;
    margin: 30px 0;
    border-radius: 30px;
    text-transform: capitalize;
    box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
}

.footer-like {
    margin-top: auto;
    background: #D7E6FE;
    padding: 6px;
    text-align: center;
}

.footer-like p {
    margin: 0;
    padding: 4px;
    color: #5892FF;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing: 1px;
}

.footer-like p a {
    text-decoration: none;
    color: #5892FF;
    font-weight: 600;
}

@media (min-width:360px) {
    h1 {
        font-size: 4.5em;
    }

    .go-home {
        margin-bottom: 20px;
    }
}

@media (min-width:600px) {
    .content {
        max-width: 1000px;
        margin: 0 auto;
    }

    .wrapper-1 {
        height: initial;
        max-width: 620px;
        margin: 0 auto;
        margin-top: 230px;
        box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
    }

}
</style>

<body>
    <div class=content>
        <div class="wrapper-1">
            <div class="wrapper-2">
                <h1>Thank you !</h1>
                <p>Thanks for Shopping with Us.</p>
                <p>you should receive a confirmation email soon. </p>
                <button class="go-home">
                    <a href="product.php">Continue Shopping</a>
                </button>
            </div>

        </div>
    </div>



    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>