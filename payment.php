<?php
session_start();
if (!isset($_POST['submit'])) {
    header('location: e404.php');
}
$purpose = "Payment";
$amount = $_POST["price"];
$name = $_POST["name"];
$phone = 9825183134;
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];

$_SESSION['amount'] = $amount;
$_SESSION['name'] = $name;
$_SESSION['phone'] = $phone;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['city'] = $city;
$_SESSION['state'] = $state;
$_SESSION['zip'] = $zip;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
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
$payload = array(
    'purpose' => $purpose,
    'amount' => $amount,
    'phone' => $phone,
    'buyer_name' => $name,
    'redirect_url' => 'http://localhost/Aspire%20Recovery/addiction/thankyou.php',

    'send_email' => true,
    'send_sms' => true,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);


$response = json_decode($response);
echo "<pre";
print_r($response);
header('location:' . $response->payment_request->longurl);