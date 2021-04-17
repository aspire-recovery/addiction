<?php
//Imports
require '../includes/config.inc.php';
session_start();
//Data Fetch

$name = $_POST['addiction_name'];
$description = $_POST['description'];

//echo $name,$description;


//Query

$insert_addict_sql = "INSERT INTO `addiction_types` (`add_name`, `add_desp`) VALUES ('$name','$description')";
echo $insert_addict_sql;
$result = $conn->query($insert_addict_sql);

if ($result) {
    header('Location:addictions.php');
} else {
    echo '<script>alert("Data Not Inserted")</script>';
    echo '<script>window.location.href="addictions.php"</script>';
}

?>