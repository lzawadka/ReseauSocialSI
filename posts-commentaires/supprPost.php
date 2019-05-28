<!DOCTYPE html lang="fr"> 
   <head> 
      <title>PHP</title> 
      <meta charset="utf-8" /> 
   </head> 
<body> 
<?php 
// Connexion à la base de données
require "../config/bdd.php";
require "../global/function.php";

if(getUserInfo() === $_GET['user']){
   // Prépare la requête
   $prepare = $bdd->prepare('DELETE FROM posts WHERE id= :post');
   $prepare2 = $bdd->prepare('DELETE FROM commentaires WHERE id_post= :idpost');

   // Bind les valeurs
   $prepare->bindValue(':post', $_GET['post']);
   $prepare2->bindValue(':idpost', $_GET['post']);

   // Execute la requête
   $exec = $prepare->execute();
   $exec2 = $prepare2->execute();

   echo 'Votre post à bien été supprimé';
} else {
   echo 'Vous ne pouvez pas supprimer ce post';
}



?> 
<a href="blog.php">retour aux posts</a> 
</body> 
</html>