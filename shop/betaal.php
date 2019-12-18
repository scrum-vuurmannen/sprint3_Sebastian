<?php 

if (!isset($_SESSION['winkelmand']) && empty($_SESSION['winkelmand'])) {
    header('location: /vuurwerk/vuurwerk');
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
            <img src="/vuurwerk/shop/img/logo.jpg" height="50" width="50">
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
        <div id="betaal">
            <img src="/vuurwerk/shop/img/logo.jpg">
            <h1>Vuurwerk</h1>
            <h2>Factuur</h2>
            <?php //gebruiker(); 
            ?>
            <table>
                <tr>
                    <th>Naam</th>
                    <th>prijs</th>
                    <th>aantal</th>
                    <th>totaal</th>
                </tr>
                <?php
                    $subtotaal = 0;
                    foreach (winkelmand() as $product) {
                        $subtotaal = $subtotaal + ($winkelProduct['prijs'] * $winkelProduct['aantal']);

                ?>
                    <tr class="betaal-table-normaal">
                        <td class="een"><?php echo $product['naam'] ?></td>
                        <td class="twee"><?php echo $product['prijs'] ?></td>
                        <td class="een"><?php echo $product['aantal'] ?></td>
                        <td class="twee">€<?php echo $product['prijs'] * $product['aantal'] ?></td>
                    </tr>

                <?php } ?>

                <?php 
                    $btw = $subtotaal/100*21;
                    $totaal = $subtotaal+$btw;
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="een">
                        <hr>
                    </td>
                    <td class="twee">
                        <hr>
                    </td>
                </tr>
                <tr class='betaal-table-normaal'>
                    <td></td>
                    <td></td>
                    <td id='betaal-table-totaal' class="een"><b>Sub Totaal:</b></td>
                    <td class="twee">€<?php echo number_format($subtotaal, 2); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="een">
                        <hr>
                    </td>
                    <td class="twee">
                        <hr>
                    </td>
                </tr>
                <tr class='betaal-table-normaal'>
                    <td></td>
                    <td></td>
                    <td id='betaal-table-totaal' class="een"><b>21% BTW:</b></td>
                    <td class="twee">€<?php echo number_format($btw, 2); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="een">
                        <hr>
                    </td>
                    <td class="twee">
                        <hr>
                    </td>
                </tr>
                <tr class='betaal-table-normaal'>
                    <td></td>
                    <td></td>
                    <td id='betaal-table-totaal' class="een"><b>Totaal:</b></td>
                    <td class="twee">€<?php echo number_format($totaal, 2); ?></td>
                </tr>
            </table>


            <p>
                Hier bij is de betaling succesvol afgerond. <br>
                Uw producten zullen zo snel mogelijk verstuurd worden. <br>
                En tot de volgende keer.<br>
            </p>
            <?php unset($_SESSION['winkelmand']); ?>
        </div>
    </div>
</body>

</html>