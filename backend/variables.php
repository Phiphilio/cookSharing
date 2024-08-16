<?php
require_once(__DIR__ . "/../connexionDB.php");
// petite explication
/**
 * le secret avec __DIR__ cest que le chemin absolu qu'il contient
 * est concatené avec le chemin relatif que j'ajoute.
 * ça veut dire que si j'avais écrit /phpOpenclassroom/connexionDB.php
 * php aurait cherché dans le répertoire où __DIR__ se termine puis
 * aurait cherché un sous répertoire nommé : phpOpenclassroom.
 * 
 * pour rappel __DIR__ = chemin depuis la racine du système de jusqu'au ficher
 * où je l'ai écrit donc ici
 * __DIR__ = C:\Users\monNom\Documents\developpement\phpOpenclassroom\backend
 * et c'est toute cette chaine qui est collée à /../connexionDB.php
 */


