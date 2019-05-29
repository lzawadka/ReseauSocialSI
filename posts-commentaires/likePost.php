<?php
include "../global/header.php";

//Prépare la requete
$prepare1 = $bdd->prepare('SELECT COUNT(*) FROM likePost WHERE user_postLike = :user AND id_postLike = :id');

//Bind les valeurs
$prepare1->bindValue(':user', getUserInfo());
$prepare1->bindValue(':id', $_GET['id']);

//Execute la requete
$prepare1->execute();

//Récupère la valeur
$nbLike = $prepare1->fetchColumn();

//Limiter le nb de like à 30 par personne
if($nbLike > 30){
  echo "Vous ne pouvez plus liké  ce post";
?>

<a href="blog.php">retour</a>

<?php
} else {
  //Prépare la requète
  $prepare = $bdd->prepare('INSERT INTO likePost (id_postLike, user_postLike, like_postLike ) VALUES (:id, :user, true)');

  //Bind les valeurs

  $prepare->bindValue(':user', getUserInfo());
  $prepare->bindValue(':id', $_GET['id']);

  //Execute la requète
  $exec = $prepare->execute();

  header("Location: blog.php");
}
?>
