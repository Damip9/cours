<?php
                $wanted=$_GET['ID'];
             if (!empty($wanted)) 
             {
               echo "<h1>Recherche de $wanted </h1>";
               require_once('connexion_BDD.php');
               $connexion=connect_bd();
               $sql="SELECT * from CARNET where ID='".$wanted."'";
                    if(!$connexion->query($sql))
                   echo "Pb de requete";
                else{
                    foreach ($connexion->query($sql) as $row)
                    echo $row['NOM']." ".$row['PRENOM']."</br>\n";
                }
             } 
            ?> 