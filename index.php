<?php 
// Sessie starten zodat de sessie overal beschikbaar is.
session_start();

// Include alle functies
include "functions.php";

// Zet de pagina standaard op homepage
$page = "index";
$folder = "shop";

// Als de GET parameter page is gezet dan zetten we de pagina daar heen. 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


include "{$folder}/{$page}.php";