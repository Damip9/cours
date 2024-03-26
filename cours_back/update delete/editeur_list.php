<!doctype html>
<html>
    <head>
        <title>Connexion à MySQL avec PDO</title>
        <meta charset="utf-8">
        <style>
            td:has(form) {
                display: flex;
            }
            
        </style>
    </head>
    <body>
        <h1>List éditeurs</h1>
        <?php require_once("connection.php");
        $connection=connect_bd();
        $sql="SELECT * FROM Editeur";
        if(!$connection->query($sql)) echo "Pb d'accès aux éditeurs";
        else{
            ?>
           <table><tr><td> Nom</td> <td> Localite </td> <td> Site Web </td><td>Actions</td></tr>
           <?php
                foreach ($connection->query($sql) as $row){
                    echo "<tr><td>".$row['nom']."</td>
                    <td>".$row['localite']."</td>
                    <td>".$row['site_web']."</td>
                    <td><form action=\"editeur.php?id=".$row['id']."\" method=\"post\"><input type=\"submit\" value=\"Modifier\"></form>
                    <form action=\"delete_confirm.php?id=".$row['id']."\" method=\"post\"><input type=\"submit\" value=\"Supprimer\"></form></td></tr><br/>\n";
                    ;
                }
                ?>
        </table>
        <?php } ?>
    </body>
</html>