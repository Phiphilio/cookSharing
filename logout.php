<?php

session_start(); // Démarrez la session si ce n'est pas déjà fait
//et surtout, récupère la superglobal $_SESSION

require_once(__DIR__ . '/backend/functions.php');

// Détruire la session
session_unset();//détruit toute les variables stockées dans $_SESSION mais pas la superglobal elle-même
session_destroy();

// Rediriger l'utilisateur vers la page d'accueil
redirectToUrl('index.php'); 
?>