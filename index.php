<?php
require_once(__DIR__ .'/backend/variables.php');

require_once(__DIR__ . '/backend/functions.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ceci est une page de test avec des balises PHP</title>
    <meta charset="utf-8" />
</head>

<body>
    <header>
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
         * c'est l'équivalent de vouloir aller quelque par et de chercher le chemin par rapport
         * à où je suis.
         * exemple : developpement\phpOpenclassroom\index.php
         */
        ?>
    </header>
    <h2>affichage des recettes</h2>

    <?php
    foreach (getRecipes($recette) as $recetteValues) : ?>
        <section>
            <div> <?php echo $recetteValues['title']; ?></div>
            <i> <?php echo displayAuthor($users, $recetteValues); ?></i>
        </section> <br />
    <?php endforeach;
    ?>
    <footer id="pied_de_page">
        <?php require_once(__DIR__ . '/footer.php');?>
    </footer>
</body>

</html>