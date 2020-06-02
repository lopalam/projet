<?php
session_start();
if (isset($_SESSION['IS_CONNECTED'])) {
    session_destroy();
}
header('location: http://localhost:8080/projet/index.php');
exit;
?>