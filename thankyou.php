<?php

if (!isset($_GET['payment_id'])) {
    header('location: e404.php');
}
session_start();
require 'includes/config.inc.php';

$id = $_GET['payment_id'];
$r_id = $_GET['payment_request_id'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/' . $id . '/');
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
echo "<pre>";
print_r($response);

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
    unset($_SESSION['cart-item']);
    $status = 1;

    $query = "INSERT INTO `orders` ( `u_id`, `total`, `address`, `email`, `phone`, `state`, `city`,
    `zip`,`status`)
    VALUES ( '$id', '$total', '$address', '$email', '$phone', '$state', '$city', '$zip','$status');
    ";
    $result = mysqli_query($conn, $query);
    var_dump($result);
    echo mysqli_error($conn);
} else {
    // Payment was unsuccessful, mark it as failed in your database.
    // You can acess payment_request_id, purpose etc here.
    $status = -1;
    $query = "INSERT INTO `orders` ( `u_id`, `total`, `order_time`, `address`, `email`, `phone`, `state`, `city`,
    `zip`,`status`)
    VALUES ( '$id', '$total', current_timestamp(), '$address', '$email', '$phone', '$state', '$city', '$zip','$status');
    ";
    $result = mysqli_query($conn, $query);
}