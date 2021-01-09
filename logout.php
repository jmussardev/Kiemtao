<?php
//Même pour une déconnection il faut activer session_start(); 
session_start();

//on souhaite supprimer la session
//attention, session_destroy() ne supprime pas les données présentes dans
//$_SESSION
session_unset();

 //redirection vers la page d'accueil
 header('Location: index.php');
 //Par sécurité, pour éviter que le script continue
 //on fait généralement un exit pour quitterle script
 exit;
