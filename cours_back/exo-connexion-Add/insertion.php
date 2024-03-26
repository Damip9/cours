<?php
 
 require_once ("connexion_BDD.php");
     $connexion=connect_bd();
     
     $sql="INSERT INTO editeur ( nom, localite, site_web, email)";
     $sql.="VALUES( :nom, :localite, :site_web, :email)";
     $stmt=$connexion->prepare($sql);
     $stmt->bindParam(":nom", $_POST["nom"]);  
     $stmt->bindParam(":localite",$_POST["localite"]);
     $stmt->bindParam(":site_web",$_POST["site_web"]);
     $stmt->bindParam(":email",$_POST["email"]); 
     
      try{
                $stmt->execute();
                 echo "L'éditeur a été ajouté avec succès.";
                }

     catch(PDOExeption $e){
        echo "<p>Pb d'insertion  dans la BDD</p></br>".$e->getMessage();
    }
    
?>