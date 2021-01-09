<?php
session_start();

if (empty($_SESSION['connectedUser'])) {
    header('location: index.php');
    exit;
}

// On inclut le fichier des fonctions
include 'inc/functions.php';

// Formulaire soumis
if (!empty($_POST)) {
    // Le code ne rentre dans cette condition QUE si des données ont été envoyées en POST
    // Donc, à l'affichage du formulaire, le code ne rentre pas dans ce "if"

    // récupération des données envoyées
    // if (isset($_POST['username'])) {
    //     $username = $_POST['username'];
    // } else {
    //     $username = '';
    // }
    //$username = filter_input(INPUT_POST, 'username');
    //Autre façon d'écrire la même chose avec une condition ternaire :
    $username = isset($_POST['username']) ?  $_POST['username'] : '';
    $email = isset($_POST['email']) ?  $_POST['email'] : '';
    $title = isset($_POST['title']) ?  $_POST['title'] : '';
    $message = isset($_POST['message']) ?  $_POST['message'] : '';

    // On récupère tous les kiemtaos
    $kiemtaos = loadKiemtaos();
    $newKiemtao = [
          'username' => $username,
          'email' => $email,
          'title' => $title, 
          'message' => $message,
          'responses' => []
    ];
    // On ajoute le nouveau kiemtao dans le tableau de tous les kiemtaos
    $kiemtaos[]= $newKiemtao;

    // print_r($kiemtaos);
    // On sauve le nouveau tableau dans le fichier data/kiemtaos.php
    saveKiemtaos($kiemtaos);

    // On crée un cookie pour stocker le username et l'email
    //attention setcookie indique sans ca demande au navigateur
    //de créer un cookie 'username' avec la valeur de $username
    //mais cela ne créé pas immédiatement la valeur qu'à la prochaine requête HTTP
    //lorsque les données du cookie seronttransmises dans les headers
    //de la requête
    // setcookie('username',$username);
    // setcookie('email',$email);
    //pour éviter le bug, soit on force la valeur dans $_COOKIE
    //$_COOKIE['username'] = $username;
    //Soit on remplace les cookies par les sessions
    //$_SESSION['username'] = $username
    //il faudra aussi utiliser les sessions pour récupérer les valeurs
    // de $username et $email ci dessous
}
//$_COOKIE est un tableau associatif comme $_POST
// var_dump($_COOKIE);

// exit;

// On récupère les informations contenues dans le cookie
$username = isset($_SESSION['connectedUser']) ? $_SESSION['connectedUser'] : '';
$email = isset($_SESSION['connectedUserDetails']['email']) ? $_SESSION['connectedUserDetails']['email'] : '';


// Rendu visuel
include 'inc/templates/header.tpl.php';
include 'inc/templates/add.tpl.php';
include 'inc/templates/footer.tpl.php';