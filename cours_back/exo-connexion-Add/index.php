<!-- formulaire d'ajout a la BDD -->

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
   
    ?>
  <form action="insertion.php" method="post">
  <label for="nom">nom</label><br>
  <input type="text" id="nom" name="nom"><br>

  <label for="localite">localite</label><br>
  <input type="text" id="localite" name="localite"><br>

  <label for="site web">site web</label><br>
  <input type="text" id="site_web" name="site_web"><br><br>

  <label for="email">email</label><br>
  <input type="text" id="email" name="email"><br><br>

  <input type="submit" value="submit">
</form>
    
</body>
</html>
