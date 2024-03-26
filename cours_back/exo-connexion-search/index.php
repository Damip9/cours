<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<body>
    <!-- code php -->
    <?php
            require_once('connexion_BDD.php'); 
            $connexion=connect_bd();
            $sql="SELECT * from CARNET";
             if(!$connexion->query($sql))
              echo "Pb d'accès a la base CARNET"; 
            else {
     ?>
             <form action="recherche2.php" method="GET">
              <select name="ID">
          <?php
           foreach ($connexion->query($sql) as $row) 
           if(!empty($row['NOM']))
                  echo "<option value='".$row['ID']."'>" .$row['NOM']." ".$row['NAISSANCE']."</option>\n";
            ?>
               </select>
               <input type="submit" value="Rechercher"> </form>
            <?php
             }
             ?>
</body>
</html>