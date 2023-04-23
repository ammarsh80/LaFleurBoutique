<!DOCTYPE html>
<html lang="fr">

<?php
// $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// $recherche_mot = filter_input(INPUT_GET, "recherche_mot", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

session_start();




// Pour afficher les erreurs PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Attention : A supprimer en production !!!

require("./util/functions.inc.php");
require('./util/validateurs.inc.php');
require("./App/modele/AccesDonnees.php");

$clientSession = [];
if (!empty($_SESSION['client'])) {
    $clientSession = $_SESSION['client'];
}

$uc = filter_input(INPUT_GET, "uc", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Use Case
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Action
$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Action
$recherche_mot = filter_input(INPUT_GET, "recherche_mot", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Action
initPanier();


if ($recherche_mot) {
    include 'App/controleur/c_consultation.php';
}
// if (!$uc) {
//     $uc = 'v_accueil';
// }

// Controleur principale
switch ($uc) {
    case 'v_accueil':
        include 'App/controleur/c_consultation.php';
        break;

    case 'visite':
        include 'App/controleur/c_consultation.php';
        break;

    case 'panier':
        include 'App/controleur/c_gestionPanier.php';

        break;

    case 'commander':
        include 'App/controleur/c_commande.php';

        break;

    case 'inscription':
        include 'App/controleur/c_inscription.php';

        break;

    case 'administrer':
        include_once "App/controleur/c_moncompte.php";


        break;

    case 'deconnexion':
        include 'App/controleur/c_deconnexion.php';
        break;

    case 'contacte':
        include 'App/controleur/c_contact.php';
        break;
    case 'payer':
        include 'App/controleur/c_payer.php';
        break;

    default:
        break;
}


include_once("./App/vue/template.php");
