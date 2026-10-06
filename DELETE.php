<html>
    <head>
        <meta charset="utf-8">
        <title>AYALYSS</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        include "connex_bd.php";
        $id = $_GET["id"] ;
        $prod = $_GET["type"] ;
        $type = ["jabador", "djellaba", "caftan"];
        if ($id && in_array($prod, $type)) {
            $table = "produit_" . $prod;
            $sql = $pdo->prepare("delete from $table where id = ?");
            $sql->execute([$id]);
        }
        header('Location: ADMIN_CRUD.php');
        ?>
    </body>
</html>