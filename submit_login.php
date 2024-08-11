<?php
require_once(__DIR__ . '/backend/variables.php');

require_once(__DIR__ . '/backend/functions.php');
$postData = $_POST;
/**
 * !!IMPORTANT!!
 * je constate qu'à chaque fois que des informations sont testées
 * on vérifie plu^tot le cas où elles n'ont pas la forme attendue.
 * ça parait logique comme ça, mais je trouve intérêssant de le noter
 */
if (isset($postData['email']) && isset($postData['password'])) {

    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['ERROR_MESSAGE'] = "l'adresse email n'est pas valide";
        var_dump(filter_var(isset($postData['email']), FILTER_VALIDATE_EMAIL));
    } else {
        foreach ($users as $user) {
            if (
                $postData['email'] === $user['email']
                &&
                $postData['password'] === $user['password']
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'user_id' => $user['user_id'],
                ];
            }

            if (!isset($_SESSION['LOGGED_USER'])) {
                $_SESSION['ERROR_MESSAGE'] = "les informations envoyés ne vous permettent pas de vous identifier";
            }
        }
    }
    redirectToUrl('index.php');
}
