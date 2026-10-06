<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>AYALYSS</title>
    </head>
    <body>
        <?php include "head.php";
        include "connex_bd.php";
        ?>
        <form action="" method="get">
            <section class="product-grid">
                <?php 
                $sql=$pdo->prepare("select * from produit_djellaba");
                $sql->execute();
                while ($row=$sql->fetch()){
                    echo "<div class='product-card'>";
                    echo "<img src='".$row["image"]."' alt='".$row["nom"]."'>";
                    echo "<h5>{$row['nom']}</h5>";
                    echo "<h5>{$row['prix']} DH</h5>";
                    echo "<a class='btn' href='PAGE_DETAILS.php?id={$row['id']}&type=caftan'>VOIR PLUS DE DETAILS</a>";
                    echo "</div>";
                }
                ?>
            </section>
        </form>
        <?php include "footer.php"; ?>
    </body>
</html>