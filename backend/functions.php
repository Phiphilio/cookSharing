<?php function displayAuthor(array $tab1, array $tab2): string
{

    for ($index = 0; $index < 3; $index++) {
        if ($tab1[$index]['email'] === $tab2['author']) {
            return $tab1[$index]['full_name'] . '(' . $tab1[$index]['age'] . ')';
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
function getRecipes(array $testRecipes): array
{

    $valideRecipes = [];

    foreach ($testRecipes as $testRecipesValue)
        if (isValidRecipe($testRecipesValue)) {
            $valideRecipes[] = $testRecipesValue;
        }
    return $valideRecipes;
}
