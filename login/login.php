<?php

require __DIR__ . '/../config/bootstrap.php';
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
    } elseif(password_verify($_POST['password']!== $user['password_user'])) {
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

<head>
<link href="../style/reset.css" rel="stylesheet"/>
<link href="../style/login.css" rel="stylesheet"/>
</head>
    <div class="page__login">
        <div class="container__login">
            <div class="form_title">
                <h1>LOGIN</h1>
            </div>
            <form class="login__form" action="/../Projets/reseauSocial/login/login.php" method="post">
                <div class="form-group">
                    <label>Email or Username :</label>
                    <input type="text" name="identifiant" class="form-control" maxlength="10">
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" name="password" class="form-control">
                </div>
                    <input type="submit" name="login" class="btn btn-primary">
                </form>
                <div>
                    <p class="signin">Not member yet ? <a href="/../Projets/reseauSocial/login/inscription.php">Sign in</a></p>
                </div>
        </div>
    </div>



        
   