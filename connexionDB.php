<?php
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', '');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
$sqlQuery ="SELECT * FROM `recipes` WHERE is_enabled = true";
$recipesStatement = $mysqlClient->prepare($sqlQuery);
/**prepare est la methode de l'objet $mysqlClient. cette methode renvoie un objet
 PDOStatement qui est ensuite stocké dans $recipesStatement*/

$recipesStatement->execute();
 /**execute() methode de l'objet stocké dans $recipesStatement a pour rôle d'envoyer
  * la requête sql qui était stockée dans la constante $sqlQuery.
  * par contre après que la methode ait rempli son rôle, la réponse de la base de donnée
  *est temporairement stockée dans l'objet PDOStatement et donc dans $recipesStatement
  *les informations attendent d'être rendu exploitables
*/

$recipes = $recipesStatement->fetchAll();
/**
 *à travers la methode fetchAll, les données stockées dans $recipesStatement
 *sont mises dans un tableau associatif
 
 */

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
    <p><?php var_dump($recipe["recipe"]) ?></p>
<?php
}
?>