<?php
include "../global/header.php";

//echo '<pre>' . print_r($_POST, true) . '</pre>';

// Vérifier l'envoi du formulaire
if (!isset($_POST['ajouter'])){
    echo 'Formulaire non envoyé!';
} else {
    // Le pseudo ne doit pas être vide
    if (empty($_POST['pseudo']) || empty($_POST['password']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['repeatpassword'])) {
        echo 'Un champ est vide !';

    } elseif (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 15) {
        echo 'Le pseudo doit contenir entre 3 & 15 caractères';

        // Caractères non-autorisés MDP
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])) {
        echo 'Caractères non autorisés dans le mot de passe !';

        // Caractères non-autorisés
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])) {
        echo 'Caractères non autorisés dans le pseudo !';

        // Caractères non-autorisés MDP
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])) {
        echo 'Caractères non autorisés dans le pseudo !';

        // Validité de l'email
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'Adresse Email invalide';

    } elseif ($_POST['password']!==$_POST['repeatpassword']) {
        echo 'Mot de passe différent';
        //Si tout va bien...

    } else {

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $req = $bdd->prepare('INSERT INTO utilisateur(name_user, surname_user, pseudo_user, email_user, password_user) VALUES(:name, :surname, :pseudo, :email, :password)');

        $req->bindValue(':name', $_POST['nom']);
        $req->bindValue(':surname', $_POST['prenom']);
        $req->bindValue(':pseudo', $_POST['pseudo']);
        $req->bindValue(':email', $_POST['email']);
        $req->bindValue(':password', $password);

        $exec = $req->execute();

       echo 'Utilisateur enregistré !';

        session_write_close();
        header('Location: login.php');
    }
}
?>


<a href="inscription.php">Retour</a>
