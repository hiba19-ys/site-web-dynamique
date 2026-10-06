<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AYALYSS</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php include "connex_bd.php"; ?>
        <header>
            <h1>AYALYSS</h1>
            <h3>Moroccan traditional clothes</h3>
        </header>
        <nav>
            <ul>
                <li><a href="DJELLABA.php">DJELLABA</a></li>
                <li><a href="JABADOR.php">JABADOR</a></li>
                <li><a href="CAFTAN.php">CAFTAN</a></li>
                <li><a href="ADMIN_LOGIN.php">PAGE ADMIN</a></li>
                <li><a href="PANIER.php"><img src="PANIER.jpg" id="imgs"></a></li>
            </ul>
        </nav>
        <section>
            <article>
                <p>Darling,<br>
                AYALYSS is inspired by the soft hues of a Moroccan sunset and the delicate charm of
                traditional hand-work, our brand is also a love letter to your classic femininity. We believe 
                that every woman deserves to feel like a princess in our designs.<br>
                <p>Elegant, luxurious and Unique. </p>
            </article>
        </section>
        <section id="section">
            <div>
                <?php 
                $sql=$pdo->prepare("select * from produit_caftan");
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
            </div>
            <div>
                <?php 
                $sql=$pdo->prepare("select * from produit_jabador");
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
            </div>
            <div>
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
            </div>
        </section>
        <?php include "footer.php"; ?>
    </body>
</html>