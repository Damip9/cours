<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation suppression</title>
</head>
<?php
    require_once("connection.php");
    $connection=connect_bd();
    $result = array();
    $sql="SELECT nom FROM Editeur WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id',$_GET['id']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $row) {
        $result[] = $row;
    }
?>
<body>
    <h1>Confirmation suppression</h1>
    <form action="delete.php?id=<?php $_GET['id'] ?>" method="post">
        Confirmer la suppression de <?php echo $result[0]["nom"] ?>?
        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']?>">
        <input type="hidden" id="nom" name="nom" value="<?php echo $result[0]['nom']?>">
        <input type="submit" value="Oui">
    </form>
</body>
</html>