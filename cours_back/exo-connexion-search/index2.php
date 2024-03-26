<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Inserer dans la BDD </h2>

    <!-- code php pour insere dans la BDD -->

    <input type="text" name="nom" placeholder="NOM"></input>
    <input type="text" name="prenom" placeholder="PRENOM"></input>
    <input type="date" name="date_naissance" placeholder="date Naissance DD/MM/YYYY"></input>

    <?php
    require_once('connexion_BDD.php');
    $connexion=connect_bd();
    $sql= "INSERT INTO CARNET("
    ?>

</body>
</html>