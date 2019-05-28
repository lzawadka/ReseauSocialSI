<?php
session_start();

// Un utilisateur est-il connecté ?
function isLoggedIn() : bool
{
    //echo $_SESSION['pseudo'];
    return isset($_SESSION['pseudo']);
}

function getUserInfo() : ?string
{
    return $_SESSION['pseudo'] ?? null;
}

