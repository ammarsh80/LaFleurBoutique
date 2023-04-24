<?php
include_once "./App/modele/M_Commande.php";
include_once "App/modele/M_Inscription.php";
include_once "./App/modele/M_monCompte.php";
include_once "./App/modele/M_Commande.php";




switch ($action) {



  case 'logoutClient':
    // supprimerPanier();
    unset($_SESSION['id']);
    header('location: index.php?page=v_accueil&action=voirArticlesAccueil');
    die();
    break;
  default:
    break;
}

$_SESSION['client'] = M_Inscription::trouverClientParId($_SESSION['id']);



$commandesClient = [];

$commandesClient = M_Commande::afficherCommandes($_SESSION['id']);


if (!empty($_SESSION['id'])) {
  $commandesClient = M_Commande::afficherCommandes($_SESSION['id']);
}
$InfoUtilisateur = [];

$InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
if (!empty($_SESSION['id'])) {
  $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
}


// switch ($action) {
//   case 'demandChangerProfil': {
//       $adresse = '';
//       $complement = '';
//       $cp = '';
//       $ville = '';
//       $mail = '';
//       $erreurs = '';
//     }
// }
switch ($action) {
  case "changerProfil":


    // $adresse = '';
    // $complement = '';
    // $cp = '';
    // $ville = '';
    // $mail = '';
    // $telephone = '';
    // $erreurs = '';
    $adresse = filter_input(INPUT_POST, "adresse");
    $complement = filter_input(INPUT_POST, "complement");
    $cp = filter_input(INPUT_POST, "cp");
    $ville = filter_input(INPUT_POST, "ville");
    $mail = filter_input(INPUT_POST, "mail");
    $telephone = filter_input(INPUT_POST, "telephone");


    $erreurs = M_monCompte::estValideModification($adresse, $complement, $cp, $ville, $mail, $telephone);
    if ($erreurs) {
      afficheErreurs($erreurs);
      break;
    } else {

      $new_ville_id = M_Inscription::trouveOuCreerVille($ville);
      $new_cp_id = M_Inscription::trouveOuCreerCp($cp);
      $erreurs = M_Inscription::changerInfoClient($_SESSION['id'], $adresse, $complement, $mail, $telephone, $new_ville_id, $new_cp_id);
      afficheMessage("Vos changements ont bien été enregistrés.");
    }

    $_SESSION['client'] = M_Inscription::trouverClientParId($_SESSION['id']);

    header("Location: index.php?page=v_compte");
    die();
    break;

  default:
    break;
}
