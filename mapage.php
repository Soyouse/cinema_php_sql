

<?php 
    require('./header.php'); 
    //Cela récupère l'identifiant du film depuis les paramètres de l'URL en utilisant $_GET['id'].
    $currentId = $_GET['id'];

    $sql = "SELECT 
    m.id, m.title, m.rating, m.year_released, 
    m.box_office, m.budget, m.duration, 
    d.name AS director,
    dc.name AS distributeur
    -- movie = m
    FROM `movies` AS m 
    -- Se référer aux indentifiants de la table director pour mettre le bon nom dans la table movie.
    INNER JOIN director d ON m.directorID = d.id
    -- Se référer aux indentifiants de la table distribution_company pour mettre le bon nom dans la table movie.
    INNER JOIN distribution_company dc ON m.companyID = dc.id
    -- Filtre les résultats pour ne prendre que les films ayant l'identifiant égal à la variable $currentId.
    WHERE m.id = $currentId";
    //Permet d'envoyer une requête sql en utilisant l'objet PDO:
    $requete = $db->query($sql);
    //Permet de mettre le résultat de la requête sql sous forme de tableaux associatifs:
    $film = $requete->fetch();
?>

  <h1>Detail du film</h1>
  <h2><?= $film['title'] ?></h2>
  <p>année de réalisation : <?= $film['year_released'] ?></p>
  <p>par : <?= $film['director'] ?></p>
  <p>de : <?= $film['distributeur'] ?></p>
  <p>note des spéctateurs : <?= $film['rating'] ?></p>
  <p>nbr d'entrés : <?= $film['box_office'] ?></p>
  <p>durée : <?= $film['duration'] ?></p>
  <p>coût de production : <?= $film['budget'] ?></p>
</body>
</html>