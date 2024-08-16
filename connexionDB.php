<?php
require_once(__DIR__ . "/config/mysql.php");
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO(
        $hoteName.';'.$databaseName.';charset=utf8',//premier paramètre
        $dbId,//deuxième
        $dbPassword,//troisième
          [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
          /**
           * paramètre à mettre au pdo pour qu'il affiche les erreurs dans la requête sql
          */
        );
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}



$recipesStatement = $mysqlClient->prepare($sqlQueryRecipes);
/**prepare est la methode de l'objet $mysqlClient. cette methode a  pour but
 * de préparer la requête et de la sécurier afin d'éviter des attaques.
 *  la methode renvoie un objet PDOStatement qui est ensuite stocké dans $recipesStatement*/

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


// on envoie la requête pour le deuxième tableau
$usersStatement = $mysqlClient -> prepare($sqlQueryUsers);

$usersStatement-> execute();

$users = $usersStatement -> fetchAll();
?>