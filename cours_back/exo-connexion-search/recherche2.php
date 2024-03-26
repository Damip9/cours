<?php

$wanted=$_GET['ID']; 
if (!empty($wanted)){
            echo "<h1>Recherche de $wanted </h1>"; 
            require_once('connexion_BDD.php');
            $connexion=connect_bd();
          $sql="SELECT * from CARNET where ID=:ID";
          $stmt=$connexion->prepare($sql);
          $stmt->bindParam(':ID', $_GET['ID']);
          $stmt->execute();
   
            if (!$stmt) echo "Pb d'accès au CARNET"; 
                
             else{
                      
                   if ($stmt->rowCount()==0){

                          echo "Inconnu !<br/>";
                   } 
        
                       else{
                         foreach ($stmt as $row)
                         echo $row['PRENOM']." ".$row['NOM']."né(e) le ".$row['NAISSANCE']."<br/>";

                       }
                        
                }

}


?>