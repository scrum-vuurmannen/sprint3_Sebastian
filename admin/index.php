<?php 

// Sessie starten zodat de sessie overal beschikbaar is.
session_start();

// Include alle functies
include "../functions.php";
include "functions.php";

// Zet de pagina standaard op homepage
$page = "admin";

// Als de GET parameter page is gezet dan zetten we de pagina daar heen. 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


include "{$page}.php";