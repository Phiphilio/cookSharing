<?php
$recette = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets !',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : de la semoule',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Ceci est une page de test avec des balises PHP</title>
    <meta charset="utf-8" />
</head>

<body>
    <h2>affichage des recettes</h2>

    <?php foreach ($recette as $recetteValue) : ?>
        <?php if (array_key_exists('is_enabled', $recetteValue) && ($recetteValue['is_enabled'] === true)) : ?>
            <h2><?php echo $recetteValue['title'] ?></h2>
            <p><?php echo $recetteValue['recipe'] ?></p>
            <p><?php echo $recetteValue['author'] ?></p>
        <?php endif ?>
    <?php endforeach ?>
</body>

</html>