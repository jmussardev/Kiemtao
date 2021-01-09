<?php
// Pour pouvoir accéder aux session, on doit les activer
//Cette instruction doit être faite avant toute sortie HTML ou envoie 
// de header HTTP
session_start();



// On inclut le fichier des fonctions
include 'inc/functions.php';

// Formulaire soumis ?
if (!empty($_POST)) {

    // récupérer les données envoyées par le formulaire
    $username = isset($_POST['username']) ?  $_POST['username'] : '';
    $password = isset($_POST['password']) ?  $_POST['password'] : '';

    // On récupère les utilisateurs
    include 'data/users.php';

    //on teste si le username existe
    if (array_key_exists($username, $users)) {
         // on vérifie que le mot de passe est bon
         if ($password == $users[$username]['password']) {
            // echo 'ok !';
            // Les sessions sont représentées par un tableau associatifs
            //$_SESSION est une super globabale accessible n'importe où
            //comme $_POST
            // on peut y stocker des chaines de caractères, mais aussi 
            //des tableaux ou tout autre type de données
            $_SESSION['connectedUser'] = $username;
            $_SESSION['connectedUserDetails'] = $users[$username];

            //redirection vers la page d'accueil
            header('Location: index.php');
            //Par sécurité, pour éviter que le script continue
            //on fait généralement un exit pour quitterle script
            exit;

            // var_dump($_SESSION);  
         } else {
             echo 'erreur de password';
         }
    } else {
        echo 'erreur de login';
    }
    

}
$username = isset($_SESSION['connectedUser']) ? $_SESSION['connectedUser'] : "";



// Rendu visuel
include 'inc/templates/header.tpl.php';
include 'inc/templates/login.tpl.php';
include 'inc/templates/footer.tpl.php'; 