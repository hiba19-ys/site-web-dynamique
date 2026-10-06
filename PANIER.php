<?php
session_start();
include "connex_bd.php";
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id_a_supprimer = $_GET['id'];
    $type_a_supprimer = $_GET['type'];
    if (isset($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $key => $produit) {
            if ($produit['id'] == $id_a_supprimer && $produit['type'] == $type_a_supprimer) {
                unset($_SESSION['panier'][$key]);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AYALYSS - Votre Panier</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php include "head.php"; ?>
        <div>
            <h2>Votre panier</h2>
            <table border="1">
                <tr>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantite</th>
                    <th>Taille</th>
                    <th>Action</th>
                </tr>
                <?php
                $total_produit = 0;
                if (!empty($_SESSION['panier'])) {
                    foreach ($_SESSION['panier'] as $produit) {
                        $prix = $produit['prix'] * $produit['quantite'];
                        $total_produit += $prix;
                        echo "<tr>";
                        echo "<td align='center'><img src='".$produit['image']."' width='50'></td>";
                        echo "<td>".$produit['nom']."</td>";
                        echo "<td>".$produit['prix']." DH</td>";
                        echo "<td>".$produit['quantite']."</td>";
                        echo "<td>".$produit['taille']."</td>";
                        echo "<td ><a href='PANIER.php?id=".$produit['id']."&type=".$produit['type']."'>Supprimer</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p> Votre panier est vide.</p>";
                }
                ?>
            </table>
            <div class="prix">
                <strong>Prix Total: <?= $total_produit; ?> DH</strong>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>