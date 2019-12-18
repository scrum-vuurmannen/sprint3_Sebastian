<?php

function product($id) {
    global $conn;

    $query = $conn->prepare("SELECT * FROM product WHERE naam = ?");
    $query->execute([$id]);
    $product = $query->fetch(PDO::FETCH_ASSOC);

    return $product;
}


function productAanmaken($data) {
    global $conn;

    $query = $conn->prepare("INSERT INTO product (naam, prijs, vooraad, categorieen, url_afbeelding) VALUES (?,?,?,?,?)");
    if ( $query->execute([
        $data['naam_add'],
        $data['prijs'],
        $data['vooraad'],
        $data['categorie'],
        $data['url_afbeelding'],
    ]) ){
        
        header('location: /vuurwerk/admin');
        return "aangemaakt";
    } else{
        return "Niet aangemaakt :(";
    }

}

function productWijzigen($data) {
    global $conn;

    $query = $conn->prepare("UPDATE product SET naam = ?, prijs = ?, vooraad = ?, categorieen = ?, url_afbeelding = ? WHERE naam = ?");
    if ( $query->execute([
        $data['naam_edit'],
        $data['prijs'],
        $data['vooraad'],
        $data['categorie'],
        $data['url_afbeelding'],
        $data['naam'],
    ]) ){
        header('location: /vuurwerk/admin');
        return "Gewijzigd";
    } else{
        return "Niet Gewijzigd :(";
    }

}