<?php
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
        <?php if (!isset($loggedUser)) : ?>
            <?php
            require_once(__DIR__ . '/login.php');
            ?>
        <?php endif ?>

        <?php if (isset($loggedUser)) : ?>
            <?php
            foreach (getRecipes($recette) as $recetteValues) : ?>
                <section>
                    <div> <?php echo $recetteValues['title']; ?></div>
                    <i> <?php echo displayAuthor($users, $recetteValues); ?></i>
                </section> <br />
            <?php endforeach; ?>
        <?php endif ?>
    </div>
    <!-- inclusion du footer -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>