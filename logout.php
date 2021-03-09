<?php
session_start();
unset($_SESSION["u_name"]);
unset($_SESSION["u_email"]);
unset($_SESSION["u_id"]);
echo '<script>window.location.href="login.php"</script>';
?>