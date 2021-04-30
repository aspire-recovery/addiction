<?php
session_start();
unset($_SESSION["u_name"]);
unset($_SESSION["u_email"]);
unset($_SESSION["u_id"]);
unset($_SESSION["u_img"]);
session_unset();
session_destroy();
echo '<script>window.location.href="login.php"</script>';