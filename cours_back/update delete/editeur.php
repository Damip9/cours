<!--Formulaire-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire</h1>
    <?php
require("connection.php");
    $result = array();
    $wanted = $_GET["id"];
  if(!empty($wanted))
    {
  try{
  $connection = connect_bd();
 }
  catch(PDOException $e)
  {
  die ("Connexion à la BDD impossible!!!<br>".$e->getMessage());
  }
  try{
  $sql="SELECT * FROM Editeur WHERE id = :id";
    $stmt= $connection->prepare($sql);
   $stmt->bindParam(':id',$wanted);

  $stmt->execute();

  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  
  foreach( $stmt->fetchAll() as $row )
  {
  $result[]=$row;
  }    }
  catch(PDOException $e)
  {
  die("Une erreur est survenue lors de la recherche, veuillez verifier et essayer à nouveau.<br>".
  $e->getMessage());
  }
;  }
    ?>
  <form action="update.php" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $result[0]["id"]?>">
  <label for="nom">Nom</label><br>
  <input type="text" id="nom" name="nom" value="<?php echo $result[0]["nom"]; ?>"><br>
  <label for="localite">Localite</label><br>
  <input type="text" id="localite" name="localite" value="<?=$result[0]["localite"];  ?>"><br>
  <label for="site web">Site web</label><br>
  <input type="text" id="site_web" name="site_web" value="<?php echo $result[0]["site_web"]?>"><br><br>
  <input type="submit" value="Modifier">
</form>
    
</body>
</html>