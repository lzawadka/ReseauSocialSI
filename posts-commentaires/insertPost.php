
<!DOCTYPE html lang="fr"> 
   <head> 
      
      <meta charset="utf-8" /> 
   </head> 
<body> 
   <?php 
         // Connexion à la base de données
         include "../global/header.php";

         // Prépare la requête
         $prepare = $bdd->prepare('INSERT INTO posts (titre_post, contenu_post, date_post, user_post) VALUES (:titre, :contenu, NOW() , :username)');

         // Bind les valeurs
         $prepare->bindValue(':titre', $_POST['titre_post']);
         $prepare->bindValue(':contenu', $_POST['contenu_post']);
         $prepare->bindValue(':username', $_POST['user_post']);

         // Execute la requête
         $exec = $prepare->execute();

         header('Location: blog.php');
         echo 'Votre message à bien été posté';

   ?>  
</body> 
</html>