<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
    require("connexion_BDD.php");
    $connexion=connect_bd();
    $sql= "UPDATE editeur set nom=:nom,localite=:localite, site_web=:site_web, email=:email where id=:id";
    $stmt=$connexion->prepare($sql);
    $stmt->bindParam(":nom",$_POST["nom"]);  
    $stmt->bindParam(":localite",$_POST["localite"]);
    $stmt->bindParam(":site_web",$_POST["site_web"]);
    $stmt->bindParam(":email",$_POST["email"]);
    $stmt->bindParam(":id",$_POST["id"]); 
    try{
      $stmt->execute(); echo "L'éditeur a été modifié avec succès.";}
    catch (PDOException $e) {  echo "<p>Pb de mise à jour de la BDD</p>". $e->getMessage();
     }  
?>  
</body>
</html>
