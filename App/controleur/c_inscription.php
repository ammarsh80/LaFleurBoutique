<?php

// include_once 'App/modele/M_Inscription.php';

/**
 * Controleur pour les inscriptions
 * @author AS
 */
switch ($action) {
    case 'demandeInscription':
               {
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
        $errors = M_Inscription::estValideInscription($nom, $prenom, $pseudo, $psw, $confirm_psw, $rue, $ville, $cp, $mail, $telephone);
        

        if (count($errors) > 0) {
            // Si une erreur, on recommence
            afficheErreurs($errors);
        } else {

            $id_ville = M_Inscription::trouveOuCreerVille($ville);
            $id_cp = M_Inscription::trouveOuCreerCp($cp);
            $id_client = M_Inscription::trouveOuCreerClient($nom, $prenom, $pseudo, $telephone, $mail, $confirm_psw);
            // $idUtilisateur = M_Inscription::creerUtilisateur($pseudo, $psw, $id_client);
            afficheMessage("Vous venez de vous inscrire avec succès!<br> Veuillez vous-connecter grâce à votre pseudo (identifiant) et le mot de passe que vous venez de créer !");
            $uc = '';
        }
        break;
}
