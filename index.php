<!DOCTYPE html>
<html lang="fr">



<?php


// date_default_timezone_set('Europe/Paris');

session_start();
ini_set('date.timezone', 'Europe/Paris');

// // Pour afficher les erreurs PHP
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
// // Attention : A supprimer en production !!!

require("./util/functions.inc.php");
require('./util/validateurs.inc.php');
require("./App/modele/AccesDonnees.php");

$clientSession = [];
if (!empty($_SESSION['client'])) {
    $clientSession = $_SESSION['client'];
}
if (!isset($_SESSION['clientIP'])  && (empty($_SESSION['clientIP']))) {
    $clientIP = $_SESSION['clientIP'];
    $clientIP = ($_SERVER['REMOTE_ADDR']);
    $_SESSION['clientIP'][]=$clientIP; 
    
}

?>


<!-- <h1>Html géolocalisation</h1>
  Latitude : <span id="latitude">Loading...</span><br>
  Longitude : <span id="longitude">Loading...</span> -->

<?php


// if (isset($_SESSION['latitude']) && isset($_SESSION['longitude'])) {
//   // Les valeurs de latitude et de longitude ont déjà été stockées dans des variables de session
//   // Ne rien faire
// } else if (isset($_GET['latitude']) && isset($_GET['longitude'])) {
//   // Les valeurs de latitude et de longitude ont été envoyées en tant que paramètres GET
//   // Stocker les valeurs dans des variables de session
//   $_SESSION['latitude'] = $_GET['latitude'];
//   $_SESSION['longitude'] = $_GET['longitude'];
// } else {
//   // Les valeurs de latitude et de longitude n'ont pas encore été stockées
//   // Rediriger vers une page qui envoie les valeurs en tant que paramètres GET
// //   header('Location: get_coordinates.php');
// //   exit();
// }




$uc = filter_input(INPUT_GET, "uc", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Use Case
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Action
$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // page
$recherche_mot = filter_input(INPUT_GET, "recherche_mot", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // recherche_mot
initPanier();


if ($recherche_mot) {
    include 'App/controleur/c_consultation.php';
}


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

