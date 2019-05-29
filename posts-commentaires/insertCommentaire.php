<?php 
// Connexion à la base de données
include "../global/header.php";

// Prépare la requête
$prepare = $bdd->prepare('INSERT INTO commentaires (id_post ,auteur_commentaire, contenu_commentaire, date_commentaire) VALUES ( :idPost , :auteurCom ,:contenuCom, NOW() )');

// Bind les valeurs
$prepare->bindValue(':contenuCom', $_POST['contenu_commentaire']);
$prepare->bindValue(':auteurCom', $_POST['auteur_commentaire']);
$prepare->bindValue(':idPost', $_GET['post']);

// Execute la requête
$exec = $prepare->execute();

header('Location: blog.php');
echo 'Votre commentaire à bien été posté';

?> 
