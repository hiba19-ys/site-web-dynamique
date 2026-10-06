<?php
session_start();
include "connex_bd.php";
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
if (isset($_GET['dtls'])) {
    $type = $_GET["type"];
    $id = $_GET["id"];
    $prod = ["jabador", "djellaba", "caftan"];
    if (in_array($type, $prod)) {
        $table = "produit_" . $type;
        $sql = $pdo->prepare("select * from $table where id = ?");
        $sql->execute([$id]);
        $row = $sql->fetch();
        $_SESSION['panier'][] = array(
            'id'=> $id,
            'type'=> $type,
            'quantite'=> $_GET["quantite"],
            'taille'=> $_GET["taille"],
            'nom'=> $row["nom"],
            'prix'=> $row["prix"],
            'image'=> $row["image"]
        );
        header("Location: PANIER.php");
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
        <?php include "head.php"; ?>
        <form action="" method="get">
            <?php
            if (isset($_GET["id"]) && isset($_GET["type"])) {
                $id = $_GET["id"];
                $type = $_GET["type"];
                $prod = ["jabador", "djellaba", "caftan"];
                if (in_array($type, $prod)) {
                    $table = "produit_" . $type;
                    $sql = $pdo->prepare("select * from $table where id = ?");
                    $sql->execute([$id]);
                    while ($row = $sql->fetch()){
                        echo "<div>";
                        echo "<table>";
                        echo "<tr>";
                        echo "<td><img src='".$row["image"]."' width='200'></td>";
                        echo "<td></td>";
                        echo "<td>";
                        echo "<h5>" .$row["nom"]. "</h5>";
                        echo "<h5>" .$row["prix"]. " DH</h5>";
                        echo "<input type='hidden' name='id' value='".$id."'>";
                        echo "<input type='hidden' name='type' value='".$type."'>";
                        echo "<label>Quantite :</label>
                        <select name='quantite'>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                        </select><br>";
                        echo "<label>Taille :</label>
                        <select name='taille'>
                            <option value='xs'>xs</option>
                            <option value='s'>s</option>
                            <option value='m'>m</option>
                            <option value='l'>l</option>
                            <option value='xl'>xl</option>
                            <option value='xxl'>xxl</option>
                        </select><br>";
                        echo "<button type='submit' name='dtls'>Ajouter au panier</button><br>";
                        if (isset($_SESSION["prenom"]) && isset($_SESSION["password"])){
                            echo "<button type='button'><a href='UPDATE.php?id=".$id."&type=".$type."&nom=".$row["nom"]."&image=".$row["image"]."&prix=".$row["prix"]."'>Modifier</a></button><br>";
                            echo "<button type='button'><a href='DELETE.php?id=".$id."&type=".$type."'>Supprimer</a></button>";
                        }
                        echo "</td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</div>";
                    }
                }
            }
            ?>
        </form>
    </body>
</html>