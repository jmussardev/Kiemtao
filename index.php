 <?php
 session_start();

// On inclut le fichier des fonctions
include 'inc/functions.php';

$kiemtaos = loadKiemtaos();




// print_r($kiemtaos); // Debug

// Rendu visuel
include 'inc/templates/header.tpl.php';
include 'inc/templates/home.tpl.php';
include 'inc/templates/footer.tpl.php';