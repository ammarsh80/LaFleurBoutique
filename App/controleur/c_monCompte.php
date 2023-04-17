<?php
include "App/modele/M_Commande.php";
include 'APP/modele/M_Inscription.php';
include 'APP/modele/M_monCompte.php';


switch ($action) {

  case 'loginClient':
    $identifiant = filter_input(INPUT_POST, 'identifiant');
    $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe');
    $client = M_Inscription::checkPassword($identifiant, $mot_de_passe);

  


    if (!$client) {
      afficheErreur("Entrez votre identifiant et votre mot de passe ou enregistrez-vous sur la page 'S'inscrire', merci !");
    } else {
      $_SESSION['id'] = $client;
      // supprimerPanier();
    //   header('index.php?page=v_accueil&action=voirArticlesAccueil');
      header('location: index.php?page=v_accueil&action=voirArticlesAccueil');

    }
    break;
  
  case 'logoutClient':
    // supprimerPanier();
    unset($_SESSION['id']);
    header('location: index.php?page=v_accueil&action=voirArticlesAccueil');
    die();
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
    // $erreurs = '';
    $adresse = filter_input(INPUT_POST, "adresse");
    

    $complement = filter_input(INPUT_POST, "complement");
    $cp = filter_input(INPUT_POST, "cp");
    $ville = filter_input(INPUT_POST, "ville");
    $mail = filter_input(INPUT_POST, "mail");
    $ville_id = M_Inscription::trouveOuCreerVille($ville, $cp);
    $erreurs = M_Inscription::changerInfoClient($_SESSION['id'], $adresse, $complement, $mail);

    $errors = M_monCompte::estValideModification($adresse, $complement, $cp, $ville, $mail);

    if ($erreurs) {
      afficheErreurs($erreurs);
    } else {
      afficheMessage("Vos changements ont bien été enregistrés.");
    }

    $_SESSION['client'] = M_Inscription::trouverClientParId($_SESSION['id']);


    header("Location: index.php?page=v_compte");
    die();
    break;

  default:
    break;
}
