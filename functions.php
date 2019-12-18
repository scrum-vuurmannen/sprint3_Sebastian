<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vuurwerk";

try {
    $conn = new PDO("mysql:host=$servername;dbname={$database}", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




function producten($categorie = false) {
    // Verkrijg de database connectie;
    global $conn;

    $categorieQuery = "";
    $values = [];
    // Kijken of er een categorie wordt mee gestuurd in de functie, deze indien beschikbaar toevoegoen aan de de query.
    if ($categorie) {
        $categorieQuery = "WHERE categorieen = ?";
        $values[] = $categorie;
    }

    $query = $conn->prepare("SELECT * FROM product {$categorieQuery}");
    $query->execute($values);
    $producten = $query->fetchAll(PDO::FETCH_ASSOC);

    return $producten;
}

function categorien() {
    // Verkrijg de database connectie;
    global $conn;

    $query = $conn->prepare("SELECT * FROM categorie ");
    $query->execute();
    $categorien = $query->fetchAll(PDO::FETCH_ASSOC);

    return $categorien;
}

function winkelmandRemove($id){
    unset($_SESSION['winkelmand'][$id]);
}

function winkelmandAdd($data){

    // Als het aantal niet 0 is, dan bvoegen we hem toe.
    if ($data['hoeveel'] != 0){
        $_SESSION['winkelmand'][$data['hidden_name']] = [
            'naam' => $data['hidden_name'],
            'prijs' => $data['hidden_price'],
            'aantal' => $data['hoeveel'],
        ];
    }

}

function winkelmand(){
    return $_SESSION['winkelmand'];
}

function checkWinkelMand(){
    if (isset($_SESSION['winkelmand']) && !empty($_SESSION['winkelmand'])) {
        return true;
    }else {
        return false;
    }
}