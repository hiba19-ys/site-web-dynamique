<?php
if (isset($_GET['modifier'])) {
    $id = $_GET['id'];
    $nom = $_GET['nom'];
    $prix = $_GET['prix'];
    $image = $_GET['image'];
    $prod = $_GET["type"];
    $table = "produit_" . $prod;
    $sql = $pdo->prepare("update $table set nom = ?, prix = ?, image = ? where id = ?");
    $sql->execute([$nom, $prix, $image, $id]);
    header('Location: ADMIN_CRUD.php');
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
        <h2>Modifier le Produit :</h2>
        <form method="GET">
            <input type="text" name="nom" value="<?= $_GET['nom'] ; ?>" required>
            <input type="number" name="prix" value="<?= $_GET['prix'] ; ?>" required>
            <input type="text" name="image" value="<?= $_GET['image'] ; ?>" required>
            <button type="submit" name="modifier">Modifier</button>
        </form>
    </body>
</html>