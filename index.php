<?php
  // Include du fichier d'en-tête (header.php) :
  require('./header.php'); ?>
  <h1>Les films Utopia</h1>
  <?php
    //Exécution d'une requête SQL pour récupérer tous les films de la base de données :
    $sql = "SELECT * FROM `movies`;";
    //Permet d'envoyer une requête sql en utilisant l'objet PDO:
    $requete = $db->query($sql);
    //Permet de mettre le résultat de la requête sql sous forme de tableaux associatifs:
    $films = $requete->fetchAll();
  ?>
  
  <?php 
  // Boucle foreach pour afficher chaque film :
  foreach ($films as $film) { ?>
    <p>
      <a href="http://localhost:8000/mapage.php?id=<?= $film['id'] ?>"><?= $film['title'] ?></a>
    </p>
  <?php } ?>
</body>
</html>