<?php
session_start();
$session = $_SESSION["LOGGED_USER"];
?>

<form action="recipes_create.php" method="post">
    <label> Nom de la recette</label>
    <input type="text" name="recipeName">
    <label> Desccription de la recette</label>
    <textarea name="recipeDescription"></textarea>
    <button> soumettre</button>
</form>

<?php 
$newRecipe = $_POST;
if(empty($newRecipe["recipeName"]) || empty($newRecipe["recipeDescription"])){
    echo "vous dever remplir les deux champs";
    
}

try{
    $sql = new PDO(
        "mysql:host=localhost;dbname=partage_de_recettes;charset=utf8",
        "root",
        "",
    );

}catch(Exception $e){
    die('erreur'. $e->getMessage());
}

$slqRequest = ' INSERT INTO recipes (title, recipe, author, is_enabled) VALUES (:title,:recipe,:author, :is_enabled)';
$recipeStatement = $sql->prepare($slqRequest);
$recipeStatement->execute([
    ':title' => $newRecipe["recipeName"],
    ':recipe'=> $newRecipe["recipeDescription"],
    ':author'=> $session['email'],
    ':is_enabled'=> 1,
])
?>