<?php 
$_SESSION['ingeloged'] = false;
unset($_SESSION['ingelogd']);
header('location: /vuurwerk/admin');
?>