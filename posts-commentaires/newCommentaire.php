<!DOCTYPE html> 
<html lang="fr"> 
   <head> 
      <title>New post</title> 
      <meta charset=utf-8" /> 
   </head> 
<body> 
   <?php include_once "../global/function.php" ?>
   <h2>Nouveau commentaire</h2> 
   <form action="insertCommentaire.php?post=<?= $_GET['post'] ?>" method="POST" enctype="multipart/form-data">
      <p>Auteur: <input type="text" name="auteur_commentaire" value="<?php echo getUserInfo() ?>" readOnly="readOnly"/></p> 
      <p>Contenu: <br /><textarea name="contenu_commentaire" rows="10" cols="50"></textarea></p>
      <br />
      <input type="submit" name="ok" value="Envoyer"> 
   </form> 
   <br />
</body> 
</html>