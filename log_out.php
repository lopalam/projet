<?php
session_start();
if (isset($_SESSION['IS_CONNECTED'])) {
    session_destroy();
}
header('location: http://localhost:80/projet_web/index.php');
exit;
?>