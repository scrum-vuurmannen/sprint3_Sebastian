<?php
    if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == "addProduct") {
        productAanmaken($_POST);
    }elseif(isset($_POST) && !empty($_POST)) {
        if ($_POST['gebruiker'] == "admin" && $_POST['wachtwoord'] == "admin") {
            $_SESSION['ingelogd'] = true;
            header("location: /vuurwerk/admin");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>vuurwerk</title>
    <link rel="stylesheet" href="/vuurwerk/shop/css/style.css">
</head>

<body>
    <a href="/vuurwerk/admin/logout">Uitloggen</a>

    <div id="shop">
        <div id="head-text">
            <a href="index"><img src="/vuurwerk/shop/img/logo.jpg" height="50" width="50"></a>
            <h1>Vuurwerk</h1>
        </div>
        <?php if (isset($_SESSION['ingelogd']) && $_SESSION['ingelogd'] == true) { ?>
            <table>
                <tr>
                    <th>Naam</th>
                    <th>Prijs</th>
                    <th>Categorie</th>
                    <th>Voorraad</th>
                </tr>
                <?php foreach(producten() as $product) {?>
                    <tr>
                        <td><?= $product['naam']; ?></td>
                        <td><?= $product['prijs']; ?></td>
                        <td><?= $product['categorieen']; ?></td>
                        <td><?= $product['vooraad']; ?></td>
                        <td>
                            <a href="/vuurwerk/admin/edit?id=<?= $product['naam']; ?>">Wijzigen</a>
                        </td>
                    </tr>

                <?php } ?>
            </table>
            <h1>Voeg Toe</h1>
                <form id="edit-form" action="?action=addProduct" method="post">
                    <table>
                        <tr>
                            <th>Naam:</th>
                            <td><input type="text" name="naam_add"></td>
                        </tr>
                        <tr>
                            <th>Prijs:</th>
                            <td><input type="text" name="prijs"></td>
                        </tr>
                        <tr>
                            <th>Vooraad:</th>
                            <td><input type="text" name="vooraad"></td>
                        </tr>
                        <tr>
                            <th>Categorie:</th>
                            <td><input type="text" name="categorie"></td>
                        </tr>
                        <tr>
                            <th>Url_afbeelding:</th>
                            <td><input type="text" name="url_afbeelding"></td>
                        </tr>
                        <tr class="center"><td colspan='2'><input type="submit" id="edit-sub" value="voeg toe"></td></tr>
                    </table>    
                </form>

        <?php } else { ?>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Gebruikernaam</th>
                        <td><input type="text" name="gebruiker"></td>
                    </tr>
                    <tr>
                        <th>wachtword</th>
                        <td><input type="password" name="wachtwoord"></td>
                    </tr>
                    <tr class="center">
                        <td colspan='2'><input type="submit" value="login"></td>
                    </tr>
                </table>
            </form>
        <?php } ?>
    </div>
</body>