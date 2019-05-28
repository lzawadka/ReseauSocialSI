<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="blog.php">Retour à la liste des posts</a></p>
 
<?php
// Connexion à la base de données
require "../config/bdd.php";

// Récupération du billet
$req = $bdd->prepare('SELECT id, user_post ,titre_post, contenu_post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id = ?');
$req->execute(array($_GET['post']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre_post']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?> de <?php echo $donnees['user_post'] ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu_post']));
    ?>
    </p>
</div>

<a href="supprPost.php?post=<?= $_GET['post']?>&user=<?= $donnees['user_post'] ?>">Supprimer le post</a>
<br><br>
<a href="newCommentaire.php?post=<?= $_GET['post']?>">Poster un commentaire</a>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT id, auteur_commentaire, contenu_commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_post = ? ORDER BY date_commentaire');
$req->execute(array($_GET['post']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur_commentaire']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['contenu_commentaire'])); ?></p>
<a href="supprCommentaire.php?id=<?= $donnees['id']?>&post=<?= $_GET['post']?>&user=<?= $donnees['auteur_commentaire']?>">Supprimer le commentaire</a>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
</body>
</html>