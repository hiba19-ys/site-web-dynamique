<?php
include "connex_bd.php";
if (isset($_GET["enregistrer"])) {
    $nom = $_GET['nom'];
    $prix = $_GET['prix'];
    $image = $_GET['image'];
    $type = $_GET["type"];
    $prod = ["jabador", "djellaba", "caftan"];
    if (in_array($type, $prod)) {
        $table = "produit_" . $type;
        $sql = $pdo->prepare("insert into $table (nom, prix, image) values (?, ?, ?)");
        $sql->execute([$nom, $prix, $image]);
        header('Location: ADMIN_CRUD.php');
    } else {
        echo "type invalide.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AYALYSS</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Ajouter un Produit</h2>
        <form method="GET">
            <label for="categorie">Catégorie du produit :</label>
            <select name="type" required>
                <option value="caftan">Caftan</option>
                <option value="djellaba">Djellaba</option>
                <option value="jabador">Jabador</option>
            </select>
            <input type="text" name="nom" placeholder="Nom du produit" required>
            <input type="number" name="prix" placeholder="Prix (DH)" required>
            <input type="text" name="image" placeholder="Lien de l'image" required>
            <button type="submit" name="enregistrer">Enregistrer</button>
        </form>
    </body>
</html>