<?php

$recette = [
    [
        'title' => 'Cassoulet',
        'author' => 'mickael.andrieu@exemple.com',
    ],
    [
        'title' => 'Couscous',
        'author' => 'mickael.andrieu@exemple.com',
    ],
    [
        'title' => 'Escalope milanaise',
        'author' => 'mathieu.nebra@exemple.com',
    ],
    [
        'title' => 'Salade Romaine',
        'author' => 'laurene.castor@exemple.com',
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
    <h2>Page de test</h2>


    <ul>
        <?php for($i = 0; $i <3; $i++ ):?>
        <li > <?php echo 'le '. $recette[$i]['title'] . ' fait par '.$recette[$i]['author'] ?></li>
        <?php endfor ?>
        
    </ul>

    
</body>

</html>