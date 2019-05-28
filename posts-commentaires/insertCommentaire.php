<!DOCTYPE html lang="fr"> 
   <head> 
      <title>PHP</title> 
      <meta charset="utf-8" /> 
   </head> 
<body> 
<?php 
// Connexion à la base de données
require "../config/bdd.php";

// Prépare la requête
$prepare = $bdd->prepare('INSERT INTO commentaires (id_post ,auteur_commentaire, contenu_commentaire, date_commentaire) VALUES ( :idPost , :auteurCom ,:contenuCom, NOW() )');

// Bind les valeurs
$prepare->bindValue(':contenuCom', $_POST['contenu_commentaire']);
$prepare->bindValue(':auteurCom', $_POST['auteur_commentaire']);
$prepare->bindValue(':idPost', $_GET['post']);

// Execute la requête
$exec = $prepare->execute();

echo 'Votre commentaire à bien été posté';

?> 
<a href="commentaires.php?post= <?= $_GET['post'] ?>">retour au post</a> 
</body> 
</html>