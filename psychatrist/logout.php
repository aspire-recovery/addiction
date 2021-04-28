<?php
session_start();
unset($_SESSION["p_name"]);
unset($_SESSION["p_email"]);
unset($_SESSION["p_id"]);
session_unset();
session_destroy();
echo '<script>window.location.href="login.php"</script>';