<?php
session_start();
include "connex_bd.php";
if (isset($_POST["connecter"])){
    $sql=$pdo->prepare("select * from admin");
    $sql->execute();
    while($row=$sql->fetch()){
        if($row["nom"]==$_POST["nom"] and $row["prenom"]==$_POST["prenom"] and $row["password"]==$_POST["password"]){
            $_SESSION["prenom"]=$row["prenom"];
            $_SESSION["password"]=$row["password"];    
            header("Location: ADMIN_CRUD.php");
        }
    }
    echo "tes donnees sont incorects ";
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
        <?php
        include "head.php";
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input type="text" id="nom" name="nom"></td>
                </tr>
                <tr>
                    <td><label for="prenom">Prenom</label></td>
                    <td><input type="text" id="prenom" name="prenom"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><button type="submit" value="connecter" name="connecter">Connecter</button></td>
                </tr>
            </table>
        </form>
        <?php include "footer.php"; ?>
    </body>
</html>