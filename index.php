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


$users = [
    [
        'full_name' => 'Mickaël Andrieu',
        'email' => 'mickael.andrieu@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Mathieu Nebra',
        'email' => 'mathieu.nebra@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Laurène Castor',
        'email' => 'laurene.castor@exemple.com',
        'age' => 28,
    ],
];

function displayAuthor(array $tab1, array $tab2){

    for($index = 0; $index < 3; $index++) {
        if($tab1[$index]['email']=== $tab2['author']){
            return $tab1[$index]['full_name'] . '('.$tab1[$index]['age'] . ')';

        }
    }
}

function isValidRecipe(array $state): bool
{

    if (array_key_exists("is_enabled", $state) && ($state['is_enabled'] === true)) {
        return true;
    } else {
        return false;
    }
};

function getRecipes( array $testRecipes) : array {

    $valideRecipes = [];

    foreach($testRecipes as $testRecipesValue)
     if (isValidRecipe($testRecipesValue)){
        $valideRecipes[] = $testRecipesValue;
     }
     return $valideRecipes;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Ceci est une page de test avec des balises PHP</title>
    <meta charset="utf-8" />
</head>

<body>
    <h2>affichage des recettes</h2>

   <?php
    foreach(getRecipes($recette) as $recetteValues) : ?>
    <section>
        <div> <?php echo $recetteValues['title']; ?></div>
     <i> <?php echo displayAuthor($users,$recetteValues); ?></i>
     </section> <br/>
   <?php endforeach;
    ?>
</body>

</html>