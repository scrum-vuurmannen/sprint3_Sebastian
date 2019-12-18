<!DOCTYPE html>
<html lang="en">

<head>
    <title>vuurwerk</title>
    <link rel="stylesheet" href="/vuurwerk/shop/css/style.css">
</head>

<body>
    <div id="shop">
        <div id="head-text">
            <a href=""><img src="/vuurwerk/shop/img/logo.jpg" height="50" width="50"></a>
            <h1>Vuurwerk</h1>
        </div>
        <div id="nav">
            <nav id="head-nav">
                <ul>
                    <li><a class="normaal" href="/vuurwerk/">Home</a></li>
                    <li><a class="normaal" href="/vuurwerk/vuurwerk">Vuurwerk</a>
                        <ul>
                            <?php foreach(categorien() as $categorie) { ?>
                                <li><a href="/vuurwerk/vuurwerk/<?= $categorie['titel']; ?>"><?= $categorie['titel']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a class="normaal" href="/vuurwerk/informatie">informatie</a></li>
                    <li>
                        <label for="winkelmand-toggle" class="winkelmand-toggle-label">
                            <span><img src="/vuurwerk/shop/img/winkel.png" width="40" height="40" style="margin-top: 5px;"></span>
                        </label>
                        <input type="checkbox" id="winkelmand-toggle" class="winkelmand-toggle">
                        <div id="winkelmand">
                            <h1>
                                winkelmand
                            </h1>
                            
                            <?php if (checkWinkelMand()) {?>
                                <table> 
                                <?php
                                    $totaal = 0;
                                    foreach(winkelmand() as $winkelProduct){ 
                                    $totaal = $totaal + ($winkelProduct['prijs'] * $winkelProduct['aantal']);
                                ?>
                                    <tr>
                                    <td class="table-winkelmand-normaal"><?php echo $winkelProduct['naam']; ?></td>
                                    <td class="table-winkelmand-normaal">&euro;<?php echo $winkelProduct['prijs']; ?></td>
                                    <td class="table-winkelmand-normaal"><?php echo $winkelProduct['aantal']; ?></td>
                                    <td class="table-winkelmand-normaal">&euro;<?php echo $winkelProduct['prijs'] * $winkelProduct['aantal']; ?> </td>
                                    <td class="table-winkelmand-img">
                                        <a href="vuurwerk/verwijderWinkelMandProduct?id=<?= $winkelProduct['naam']; ?>">
                                        <img src="/vuurwerk/shop/img/close.png"></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3"><b>Totaal</b></td>
                                    <td colspan="2">&euro;<?php echo $totaal; ?></td>
                                </tr>
                                </table>
                            <?php } ?>

                            <input type="button" id="betaal-knop" onclick="window.location.href = '/vuurwerk/betaal'" value="Afrekenen">
                            <div id="space"></div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="producten">
            <img src="/vuurwerk/shop/img/logo.jpg">
            <h2>U kunt ons bereiken via:</h2>
            <h3>E-Mail: Vuurwerk@outlook.com</h3>
            <h3>Tel: 06-12345678</h3>
        </div>
    </div>
</body>

</html>