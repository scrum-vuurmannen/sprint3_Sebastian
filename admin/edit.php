<?php 
$product = product($_GET['id']);

if (isset($_POST) && !empty($_POST)) {
    productWijzigen($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>vuurwerk</title>
    <link rel="stylesheet" href="/vuurwerk/shop/css/style.css">
</head>

<body>
    <div id="shop">
        <div id="head-text">
            <a href="index"><img src="/vuurwerk/shop/img/logo.jpg" height="50" width="50"></a>
            <h1>Vuurwerk</h1>
        </div>
        <form id="edit-form" action="" method="post">
        <table>
            <tr>
                <th>Naam:</th>
                <td><input type="text" name="naam_edit" value="<?php echo $product['naam']; ?>"></td>
            </tr>
            <tr>
                <th>Prijs:</th>
                <td><input type="text" name="prijs" value="<?php echo $product['prijs']; ?>"></td>
            </tr>
            <tr>
                <th>Vooraad:</th>
                <td><input type="text" name="vooraad" value="<?php echo $product['vooraad']; ?>"></td>
            </tr>
            <tr>
                <th>Categorie:</th>
                <td><input type="text" name="categorie" value="<?php echo $product['categorieen']; ?>"></td>
            </tr>
            <tr>
                <th>Url_afbeelding:</th>
                <td><input type="text" name="url_afbeelding" value="<?php echo $product['url_afbeelding']; ?>"></td>
            </tr>
            <td><input type="hidden" name="naam" value="<?php echo $product['naam']; ?>"></td>
            <tr><td colspan='2'><input type="submit" id="edit-sub" value="verander"></td></tr>
        </table>
    </form>

    </div>
</body>