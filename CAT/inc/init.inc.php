<?php
//--------- BDD
$mysqli = new mysqli("localhost", "root", "", "croquetteatemps");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la base de données : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");

//--------- SESSION
session_start();

//--------- CHEMIN
define("RACINE_SITE","/CAT/");

//--------- VARIABLES
$contenu = '';

//--------- AUTRES INCLUSIONS
require_once("fonction.inc.php"); ?>
