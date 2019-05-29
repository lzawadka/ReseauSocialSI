<?php
// Connexion à la base de données
include "../global/header.php";

// Récupération du billet
$req = $bdd->prepare('SELECT id, user_post ,titre_post, contenu_post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id = ?');
$req->execute(array($_GET['post']));
$donnees = $req->fetch();

$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT id, auteur_commentaire, contenu_commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_post = ? ORDER BY date_commentaire');
$req->execute(array($_GET['post']));
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        
    <div class="content__inComments">
        <div class="content__blog--comments">
            <div class="title__page--comments"><?php echo htmlspecialchars($donnees['titre_post']); ?> </div>
            <div class="post__comments--incomments">
                <div class="news">
                    <h3 class="title__comments--comments">
                        <?php echo htmlspecialchars($donnees['titre_post']); ?>  
                    </h3>
                    
                    <p class="contenu__post--onpost">
                    <?php
                        echo nl2br(htmlspecialchars($donnees['contenu_post']));
                    ?>
                    </p>
                    <div class="bottom__ofeachpost">
                        <a href="supprPost.php?post=<?= $_GET['post']?>&user=<?= $donnees['user_post'] ?>" class="button__delete--post">Delete Post </a>
                        <em class="date__publication">le <?php echo $donnees['date_creation_fr']; ?> de <?php echo $donnees['user_post'] ?></em>
                    </div>
                </div>
                
                
                <br><br>
                <form action="insertCommentaire.php?post=<?= $_GET['post'] ?>" method="POST" enctype="multipart/form-data">
                <p><input type="text" name="auteur_commentaire" value="<?php echo getUserInfo() ?>" readOnly="readOnly" class="user_post" /></p> 
                <p>Comment: <br /><textarea name="contenu_commentaire" rows="10" cols="50"></textarea></p>
                <br />
                <div class="button__post--comment">
                <input type="submit" name="ok" value="Send" class="submit__button"> 
                <p class="submit__button"><a href="blog.php" >Back</a></p></div>
                </form> 
                

            <?php
                while ($donnees = $req->fetch()) //Début boucle commentaires
                {
            ?>
                <p><strong><?php echo htmlspecialchars($donnees['auteur_commentaire']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
                <p><?php echo nl2br(htmlspecialchars($donnees['contenu_commentaire']));  echo getUserInfo(); ?></p>
                <a href="supprCommentaire.php?id=<?= $donnees['id']?>&post=<?= $_GET['post']?>&user=<?= $donnees['auteur_commentaire']?>">Delete comments</a>
                <?php
                    } // Fin de la boucle des commentaires
                    $req->closeCursor();
                ?>
            </div>
            
        </div>
        <div class="topComment">
            <?php include '../profile/asideProfile.php';?>
            <?php include '../profile/topComment.php';?>
        </div></div>
    
</body>
</html>