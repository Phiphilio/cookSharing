<?php
require_once(__DIR__ . '/backend/variables.php');

require_once(__DIR__ . '/backend/functions.php');
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
        /**
         * __DIR__ est une constante magique en PHP qui contient le chemin absolu du répertoire
         *  dans lequel se trouve le script en cours d'exécution. il combine ce chemin avec le relatif
         * mis dans '/header.php'. ça permet de gérer dynamiquement la position du fichier.
         * 
         * Chemins absolus : c'est le chemin qui part de la racine jusqu'au fichier voulu.
         * c'est l'équivalent d'une adresse exacte 17 rue des carnos 75000 paris
         * exemple : C:\Users\user\Documents\developpement\phpOpenclassroom\index.php
         * 
         * chemin relatif : c'est le chemin à partir d'un fichier quelqconque.
         * c'est l'équivalent de vouloir aller quelque par et d'indiqquer' le chemin par:
         * " dans 2 rues plus loin, tu vires à droite et ce que tu cherches est à côté de ce batiment
         * exemple : developpement\phpOpenclassroom\index.php
         */
        ?>
        <h1>site de recettes</h1>

        <?php
        foreach (getRecipes($recette) as $recetteValues) : ?>
            <section>
                <div> <?php echo $recetteValues['title']; ?></div>
                <i> <?php echo displayAuthor($users, $recetteValues); ?></i>
            </section> <br />
        <?php endforeach; ?>

    </div>
    <!-- inclusion du footer -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>