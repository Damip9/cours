<?php
    require_once ("connection.php");
    $connection=connect_bd();

    $sql="DELETE FROM Editeur WHERE id = :id";
    $stmt=$connection->prepare($sql);
    $stmt->bindParam(":id",$_POST["id"]); 
    try{
      $stmt->execute(); echo $_POST['nom']." a été supprimé";}
    catch (PDOException $e) {
        echo "<p>Suppression de l'éditeur'". $e->getMessage();
    }
?>