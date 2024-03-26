<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
<?php
            require_once('connexion_BDD.php'); 
            $connexion=connect_bd();
            $sql="SELECT * from editeur";
             if(!$connexion->query($sql))
              echo "Pb d'accès a la base periodique"; 
            else {
     ?>
             <form action="rename.php" method="GET">
              <select name="id">
          <?php
           foreach ($connexion->query($sql) as $row) 
           if(!empty($row['nom']))
                  echo "<option value='".$row['id']."'>" .$row['nom']." ".$row['localite']."</option>\n";
            ?>
               </select>
               <input type="submit" value="Rechercher"> </form>
            <?php
             }
             ?>
</body>
</html>