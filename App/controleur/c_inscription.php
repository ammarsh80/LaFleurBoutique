<?php

include_once "./App/modele/M_Inscription.php";
include_once "./App/modele/M_Commande.php";

/**
 * Controleur pour les inscriptions
 * @author AS
 */
switch ($action) {
    case 'demandeInscription': {
            $nom = '';
            $prenom = '';
            $pseudo = '';
            $psw = '';
            $confirm_psw = '';
            $rue = '';
            $complement = '';
            $ville = '';
            $cp = '';
            $mail = '';
            $telephone = '';
        }
        break;
    case 'confirmerInscription':
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $pseudo = filter_input(INPUT_POST, 'pseudo');
        $psw = filter_input(INPUT_POST, 'psw');
        $confirm_psw = filter_input(INPUT_POST, 'confirm_psw');
        $rue = filter_input(INPUT_POST, 'rue');
        $complement = filter_input(INPUT_POST, 'complement');
        $ville = filter_input(INPUT_POST, 'ville');
        $cp = filter_input(INPUT_POST, 'cp');
        $mail = filter_input(INPUT_POST, 'mail');
        $telephone = filter_input(INPUT_POST, 'telephone');
        $errors = M_Inscription::estValideInscription($nom, $prenom, $pseudo, $psw, $confirm_psw, $rue, $complement, $ville, $cp, $mail, $telephone);

        if (count($errors) > 0) {
            // Si une erreur, on recommence
            afficheErreurs($errors);
        } else {
            $id_ville = M_Inscription::trouveOuCreerVille($ville);
            $id_cp = M_Inscription::trouveOuCreerCp($cp);
            $id_adresse = M_Commande::trouveOuCreerAdresse($rue, $complement, $id_ville, $id_cp);
            $id_client = M_Inscription::trouveOuCreerClient($nom, $prenom, $pseudo, $telephone, $mail, $confirm_psw, $id_adresse);
            // afficheMessage("<br><br>Vous venez de vous inscrire avec succès! Veuillez vous-connecter grâce à votre pseudo et mot de passe que vous venez de créer !");
            $uc = '';
        }
        break;
    case 'loginClient':


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupérer les valeurs des inputs
            $identifiant = filter_input(INPUT_POST, 'identifiant');
            $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe');

            $errors = M_Inscription::estValideIdentifiant($identifiant, $mot_de_passe);
            if (count($errors) > 0) {
                // Si une erreur, on recommence
                afficheErreurs($errors);
                header('location: index.php?page=v_connexion');
            }

            $client = M_Inscription::checkPassword($identifiant, $mot_de_passe);

            if (!$client) {
                afficheErreur("Pour vous connecter, veuillez saisir correctement votre pseudo et votre mot de passe ou veuillez renseigner le formulaire d'inscription avant de vous connectez, merci !");
            } else {
                $_SESSION['id'] = $client;
                // supprimerPanier();

                if (isset($_SESSION['id'])) {
                    $InfoUtilisateur = [];
                    $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
                }
                header('location: index.php?page=v_accueil&action=voirArticlesAccueil');
            }
        }
        break;
    default:
        break;
}
