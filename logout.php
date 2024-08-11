<?php 
session_destroy();

//récupère la fonction de redirection
require_once(__DIR__ . '/backend/functions.php');

redirectToUrl('index.php');
?>