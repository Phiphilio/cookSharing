<?php
session_start();

require_once(__DIR__ . "/isconnected.php");
require_once(__DIR__ . "/connexionDB.php");
require_once(__DIR__ . "/backend/functions.php");

$postData = $_POST;

//on teste les informations envoyées, on ne peut pas faire confiance à l'utilisateur

if ( !isset($postData["id"]) || !is_numeric($postData["id"])) {
    echo "selectionné un élément avec un id valide";
};

//convertir la valeur en entier sinon le champ correspondant ne sera pas retrouvé
$id = (int)$postData["id"];

$requete = "DELETE FROM recipes WHERE recipe_id = :recipe_id";
$deletStatement = $mysqlClient->prepare($requete);

$deletStatement->execute([
    "recipe_id" => $id,
]);
redirectToUrl('index.php');