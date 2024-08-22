<?php
session_start();
require_once(__DIR__  . "/connexionDB.php");
require_once(__DIR__ . "/isconnected.php");

$postData = $_POST;
// toujours tester les informations reçu de l'utilisateur
if (
    !isset($postData['id'])
    || !is_numeric($postData['id'])
    || empty($postData['title'])
    || empty($postData['recipe'])
    || trim(strip_tags($postData['title'])) === ''
    || trim(strip_tags($postData['recipe'])) === ''
) {
    echo 'Il manque des informations pour permettre l\'édition du formulaire.';
    return;
}
//
$id = (int)$postData['id'];
/**
 * toutjours convertir l'id en entier parce qu'il devient un string
 *  quand il est mis dans un tableau associatif
 */
$title = trim(strip_tags($postData['title']));
/**
 * rappel:
 * trim permet de supprimer les espaces en début et fin de phrases
 * strip_tags permet toutes les balises html pour éviter des attaques xss
 */
$recipe = trim(strip_tags($postData['recipe']));
//on envoie la requête sql de modifications

$requete = "UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :recipe_id";

$postUpdateStatement = $mysqlClient->prepare($requete);

$postUpdateStatement->execute([
    ":title" => $title ,
    ":recipe" => $recipe ,
    ":recipe_id" => $id,
]);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Recette modifiée avec succès !</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title"><?php echo($title); ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo $recipe; ?></p>
            </div>
        </div>
    </div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>