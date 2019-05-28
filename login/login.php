<?php
session_start();
require_once "../global/function.php";
require "../config/bdd.php";
//Traitement du formulaire de connexion
if (isset($_POST['identifiant']) || isset($_POST['password'])) {
    $req = $bdd->prepare(
        'SELECT * 
        FROM utilisateur
        WHERE 
          email_user = :login
          OR pseudo_user = :login'
    );
    $req->bindParam(':login', $_POST['identifiant']);
    $req->execute();

    $user = $req->fetch(PDO::FETCH_ASSOC);


    if(!$user) {
        // Si aucun utilisateur n'a été trouvé
        echo 'Aucun utilisateur trouvé';
    } elseif(($_POST['password']!== $user['password_user'])) {
        // Si le mot de passe est incorrect
        echo 'Mot de passe incorrect';
    } else {
        // On enregistre l'utilisateur en session
        $_SESSION['pseudo'] = $user['pseudo_user'];
        unset($user['password']);

        // On redirige sur la page d'acceuil
        session_write_close();
        header("Location: ../posts-commentaires/blog.php?user=" . getUserInfo());
    }
}


// Déconnexion de l'utilsateur courant
if (isset($_GET['logout'])) {
    unset($_SESSION['pseudo']);
    echo 'Vous avez bien été déconnecté';
}


?>

<div class="container border nt-4 p-4">
    <h1>Connexion</h1>



    <form action="login.php" method="post">
        <div class="form-group">
            <label>Email / Pseudo</label>
            <input type="text" name="identifiant" class="form-control">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control">
        </div>
        <input type="submit" name="login" class="btn btn-primary">
    </form>
</div>
