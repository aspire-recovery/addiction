<?php
$data = $_POST;
$mac_provided = $data['mac']; // Get the MAC from the POST data
unset($data['mac']); // Remove the MAC key from the data.
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];
if ($major >= 5 and $minor >= 4) {
    ksort($data, SORT_STRING | SORT_FLAG_CASE);
} else {
    uksort($data, 'strcasecmp');
}
// You can get the 'salt' from Instamojo's developers page(make sure to log in first):
https: //www.instamojo.com/developers
// Pass the 'salt' without <>
$mac_calculated = hash_hmac("sha1", implode("|", $data), "48b6e960cfc949668615aaa1219a7097");
if ($mac_provided == $mac_calculated) {
    $id = $_SESSION['u_id'];
    $name = $_SESSION['name'];
    $address = $_SESSION['address'];
    $state = $_SESSION['state'];
    $email = $_SESSION['email'];
    $city = $_SESSION['city'];
    $zip = $_SESSION['zip'];
    $phone = $_SESSION['phone'];

    $total = $_SESSION['amount'];
    if ($data['status'] == "Credit") {
        $status = 1;



        $query = "INSERT INTO `order` ( `u_id`, `total`, `order_time`, `address`, `email`, `phone`, `state`, `city`,
        `zip`,`status`)
        VALUES ( '|$id', '$total', current_timestamp(), '$address', '$email', '$phone', '$state', '$city', '$zip','$status');
        ";
    } else {
        // Payment was unsuccessful, mark it as failed in your database.
        // You can acess payment_request_id, purpose etc here.
        $status = -1;
        $query = "INSERT INTO `order` ( `u_id`, `total`, `order_time`, `address`, `email`, `phone`, `state`, `city`,
        `zip`,`status`)
        VALUES ( '|$id', '$total', current_timestamp(), '$address', '$email', '$phone', '$state', '$city', '$zip','$status');
        ";
    }
} else {
    echo "MAC mismatch";
}