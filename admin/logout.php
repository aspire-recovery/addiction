<?php
session_start();
unset($_SESSION["a_name"]);
unset($_SESSION["a_email"]);
unset($_SESSION["a_id"]);
echo '<script>window.location.href="login.php"</script>';
?>