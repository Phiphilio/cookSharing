<?php
session_start(); // session générée

//récupère les infos
require_once(__DIR__ . '/backend/variables.php');
require_once(__DIR__ . '/backend/functions.php');

//récupère les données du formulaire
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion du footer -->
        <?php
        require_once(__DIR__ . '/header.php');
        ?>
        <h1>site de recettes</h1>
        <!--on récupère le formulaire-->
        <?php require_once(__DIR__ . '/login.php'); ?>

        <?php foreach (getRecipes($recipe) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
            </article>
        <?php endforeach ?>
        <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
            <?php echo $_SESSION['LOGGED_USER']['email'] ?>
        <?php endif ?>
    </div>
    <!-- inclusion du footer -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>
