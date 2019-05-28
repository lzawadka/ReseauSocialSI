<!DOCTYPE html lang="fr"> 
   <head> 
      <title>PHP</title> 
      <meta charset="utf-8" /> 
   </head> 
<body> 
<?php 
// Connexion à la base de données
require "../config/bdd.php";
require_once "../global/function.php";

if (getUserInfo() === $_GET['user']) {
   // Prépare la requête
   $prepare = $bdd->prepare('DELETE FROM commentaires WHERE id= :idPost');

   // Bind les valeurs
   $prepare->bindValue(':idPost', $_GET['id']);

   // Execute la requête
   $exec = $prepare->execute();

   echo 'Votre commentaire à bien été supprimé';
} else {
   echo "Vous ne pouvez pas supprimer ce commentaire";
}




?> 
<a href="commentaires.php?post=<?= $_GET['post'] ?>" >retour au post</a> 
</body> 
</html>