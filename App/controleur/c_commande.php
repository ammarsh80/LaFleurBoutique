<?php
include "App/modele/M_Commande.php";
include 'APP/modele/M_Inscription.php';
include 'APP/modele/M_monCompte.php';



$InfoUtilisateur = [];

$InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
if (!empty($_SESSION['id'])) {
    $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
}




/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
switch ($action) {
    case 'passerCommande':
        $n = nbArticlesDuPanier();
        if ($n > 0) {
            $identiteLiv = '';
            $adresseLiv = '';
            $complementLiv = '';
            $villeLiv = '';
            $cpLiv = '';
            $identiteFac = '';
            $adresseFac = '';
            $complementFac = '';
            $villeFac = '';
            $cpFac = '';

            $InfoUtilisateur = [];

            $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
            if (!empty($_SESSION['id'])) {
                $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
            }

            // $InfoUtilisateurPourCommander=(M_Commande::infoUtilisateurPourCommander($_SESSION['id']));

        } else {
            afficheMessage("Panier vide !!");
            $uc = '';
        }
        break;
    case 'confirmerCommande':
        $nom = filter_input(INPUT_POST, 'identiteLiv');
        $prenom = filter_input(INPUT_POST, 'prenomLiv');
        $rue = filter_input(INPUT_POST, 'adresseLiv');
        $complement = filter_input(INPUT_POST, 'complementLiv');
        $ville = filter_input(INPUT_POST, 'villeLiv');
        $cp = filter_input(INPUT_POST, 'cpLiv');

        $nomFac = filter_input(INPUT_POST, 'identiteFac');
        $prenomFac = filter_input(INPUT_POST, 'prenomFac');
        $rueFac = filter_input(INPUT_POST, 'adresseFac');
        $complementFac = filter_input(INPUT_POST, 'complementFac');
        $villeFac = filter_input(INPUT_POST, 'villeFac');
        $cpFac = filter_input(INPUT_POST, 'cpFac');

        $errors = M_Commande::estValide($nom, $prenom, $rue, $complement, $ville, $cp, $nomFac, $prenomFac, $rueFac, $complementFac, $villeFac, $cpFac);
        if (count($errors) > 0) {
            // Si une erreur, on recommence
            afficheErreurs($errors);
        } else {

            $id_ville = M_Inscription::trouveOuCreerVille($ville);
            $id_cp = M_Inscription::trouveOuCreerCp($cp);
            $id_adresse_livraison = M_Commande::trouveOuCreerAdresse($rue, $complement, $id_ville, $id_cp);
            $id_adresse_facturation = M_Commande::trouveOuCreerAdresse($rueFac, $complementFac, $id_ville, $id_cp);

            // $idclient = M_Commande::trouveOuCreerClient($nom, $prenom, $rue, $mail, $id_ville);
            $idclient = $_SESSION['id'];

            $listArticles = getLesIdArticlesDuPanier();
            M_Commande::creerCommande($idclient, $id_adresse_livraison, $id_adresse_facturation, $listArticles);

            supprimerPanier();
            afficheMessage("Commande enregistrée");
            $uc = '';
        }
        break;
}
