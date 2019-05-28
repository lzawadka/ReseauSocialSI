<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
<?php
require_once "../global/function.php";
include "../global/header.php";
?>

        <h1>Mon super blog !</h1>
        <p>Derniers posts du blog :</p>
        <a href="newPost.php">Faire un post</a>

 
<?php

// Connexion à la base de données
require "../config/bdd.php";

// On récupère post
$req = $bdd->query('SELECT id, titre_post, contenu_post, user_post , DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_post DESC');

while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre_post']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?> de <?php echo $donnees['user_post'];  ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu_post']));
    ?>
    <br />
    <em><a href="commentaires.php?post=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
</body>
</html>