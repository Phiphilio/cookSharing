<?php
session_start();
require_once(__DIR__ . '/isconnected.php');
require_once(__DIR__ .'/connexionDB.php');
$session = $_SESSION["LOGGED_USER"];
?>


<?php 
$newRecipe = $_POST;


$slqRequest = ' INSERT INTO recipes (title, recipe, author, is_enabled) VALUES (:title,:recipe,:author, :is_enabled)';
$recipeStatement = $mysqlClient->prepare($slqRequest);
 $recipeStatement->execute([
    ':title' => $newRecipe["title"],
    ':recipe'=> $newRecipe["recipe"],
    ':author'=> $session['email'],
    ':is_enabled'=> 1,
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
        <!-- MESSAGE DE SUCCES -->
        <h1>Recette ajoutée avec succès !</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title"><?php echo $newRecipe["title"] ; ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo $session['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo $newRecipe["recipe"]; ?></p>
            </div>
        </div>
    </div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>