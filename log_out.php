<?php
session_start();
if (isset($_SESSION['IS_CONNECTED'])) {
    session_destroy();
}
header('location: http://90.120.176.23:8080/projet/index.html');
exit;
?>

