<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
<?php
require("connexion_BDD.php");// inclusion des fonctinnalités de la BDD
  $result = array();// déclaration d'' un array pour contenir le résultat de la recherche
$wanted = $_GET["id"]; // récupération de id de l''editeur à afficher
  if(!empty($wanted))//vérification que la valeur fournit id ne soit pas vide
    {
  try{
  $connexion = connect_bd(); // demande de conection  à la BDD
 }
  catch(PDOException $e)
  {
  die ("Connexion à la BDD impossible!!!<br>".$e->getMessage());
  }
  try{
  $sql="SELECT * FROM editeur WHERE id = :id";// declaration de la requète de recherhe 
    $stmt= $connexion->prepare($sql);// déclaration de la requète préparée
   $stmt->bindParam(':id',$wanted); // liaison de la valeur $wanted avec la balise :id

  $stmt->execute();// execution de la requète préparée

  $stmt->setFetchMode(PDO::FETCH_ASSOC);// configuration du retour de données dans un tableau associatif
  
  foreach( $stmt->fetchAll() as $row )
  {
  $result[]=$row;// récuperation de la ligne (row) d''un enregistrement de la BDD
  }    }
  catch(PDOException $e)
  {
  die("Une erreur est survenue lors de la recherche, veuillez verifier et essayer à nouveau.<br>".
  $e->getMessage());
  }
;  }
    ?>
  <form action="update.php" method="post">
  <label for="nom">nom</label><br>
  <input type="text" id="nom" name="nom" value="<?php echo $result[0]["nom"]; ?>"><br>
  <label for="localite">localite</label><br>
  <input type="text" id="localite" name="localite" value="<?=$result[0]["localite"];  ?>"><br>
  <label for="site web">site web</label><br>
  <input type="text" id="site_web" name="site_web" value="<?php echo $result[0]["site_web"]?>"><br>
  <label for="site web">email</label><br>
  <input type="text" id="email" name="email" value="<?php echo $result[0]["email"]?>"><br>
  <label for="id">id&nbsp;:</label>
  <input type="hidden" id="id" name="id" value="<?php echo $result[0]["id"]?>"><br>><br>
  <input type="submit" value="submit">
</form>
    
    
</body>
</html>