<?php
include "../global/header.php";

switch ($_GET['tri'] ?? null) {
    case 'date':
    $req = $bdd->query('SELECT id, titre_post, contenu_post, user_post , like_post , DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_creation_fr DESC');
        break;
    
    case 'nbLike':
    $req = $bdd->query('SELECT id, titre_post, contenu_post, user_post , like_post , DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY like_post DESC');
        break;
    
    default:
    $req = $bdd->query('SELECT id, titre_post, contenu_post, user_post , like_post , DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_creation_fr DESC');
        break;
}
?>
    </head>
        
    <body>  
        <div class="content__blog">
        
            <div class="trending">
                <div class="title__post">
                    <h1 class="title__post--h1">Feed</h1>
                    <div class="tri__date__like">
                        <a href="blog.php?tri=date" class="tri__like">By date</a><br>
                        <a href="blog.php?tri=nbLike" class="tri__like">Per like</a><br>
                    </div>
                </div>

                 
                    <?php
                        while ($donnees = $req->fetch())
                        {
                    ?>
                <div class="news">
                
                <div class="title__content"><br>

                    <h3 class="content__news">
                    
                        <?php echo htmlspecialchars($donnees['titre_post']); ?><br><br>
                        
                    </h3>
                        <p  class="content__news">
                       
                            <?php
                            // On affiche le contenu du billet
                            echo nl2br(htmlspecialchars($donnees['contenu_post']));
                            ?><br> </div>
                            <?php //On récupère le nombre de likes
                                $req1 = $bdd->prepare('SELECT COUNT(*) FROM likePost WHERE id_postLike = :idPostLike AND like_postLike = 1');

                                //On bind les valeurs
                                $req1->bindValue(':idPostLike', $donnees['id']);

                                //On exécute la requète
                                $req1->execute();

                                //On récupère le résultat
                                $resultatLike = $req1->fetchColumn();

                                //Requete
                                $req3 = $bdd->prepare('UPDATE posts SET like_post = :likesPost WHERE id = :idPostLike');
                                //BindValue
                                $req3->bindValue(':likesPost', $resultatLike);
                                $req3->bindValue(':idPostLike', $donnees['id']);
                                //Execute la requete
                                $req3->execute(); 
                            ?>

                        <br />
                        <div class="likeAndcomments"><a href="likePost.php?id=<?= $donnees['id']?>">Like <?= $resultatLike?></a><br>
                        <em><a href="commentaires.php?post=<?php echo $donnees['id']; ?>" class="button__comments">Comments</a><br></div><br></em>
                        <em class="date__publication"> From <?php echo $donnees['user_post']; ?> the <?php echo $donnees['date_creation_fr']; ?> <br><br> </em>
                        </p>
                </div>

                
        <?php
            
           } // Fin de la boucle des billets 
            $req->closeCursor();
        ?>
        </div>
        <div class="topComment">
            <?php include '../profile/asideProfile.php';?>
            <?php include '../profile/topComment.php';?>
        </div>

    </div>
</body>
</html>