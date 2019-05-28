<!DOCTYPE html> 
<html lang="fr"> 
   <head> 
      <title>New post</title> 
      <meta charset=utf-8" /> 
   </head> 
<body> 
   <?php require_once "../global/function.php" ?>
   <h2>Nouveau post</h2> 
   <form action="insertPost.php" method="POST" enctype="multipart/form-data"> 
      <p>Auteur : <input type="text" name="user_post" value="<?php echo getUserInfo() ?>" readOnly="readOnly"/></p>
      <p>Titre du post: <input type="text" name="titre_post" /></p> 
      <p>Contenu: <br /><textarea name="contenu_post" rows="10" cols="50"></textarea></p>
      <br />
      <input type="submit" name="ok" value="Envoyer"> 
   </form> 
   <br />
</body> 
</html>