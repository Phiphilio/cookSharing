<?php 
session_start();
require_once(__DIR__ . '/backend/variables.php');
require_once(__DIR__ . '/backend/functions.php');


$postData = $_POST;

if (isset($postData['email']) && isset($postData['password'])) {

    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['ERROR_MESSAGE'] = "L'adresse email n'est pas valide";
        var_dump($postData['email']); // Débogage pour vérifier l'email
    } else {
        foreach ($users as $user) {
            if (
                $postData['email'] === $user['email']
                && $postData['password'] === $user['password']
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'user_id' => $user['user_id'],
                ];
                break; // Stopper la boucle une fois l'utilisateur trouvé
            }
        }

        if (!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['ERROR_MESSAGE'] = "Les informations envoyées ne vous permettent pas de vous identifier";
        }
    }
    redirectToUrl('index.php');
}
