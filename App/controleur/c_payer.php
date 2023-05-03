<?php

include_once "./App/modele/M_Payer.php";
include_once "./App/modele/M_Inscription.php";



switch ($action) {
    case 'payerCommande':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les valeurs des inputs
            $propritaire = filter_input(INPUT_POST, 'propritaire');
            $carte = filter_input(INPUT_POST, 'carte');
            $expiration = filter_input(INPUT_POST, 'expiration');
            $crypto = filter_input(INPUT_POST, 'crypto');

            $errors = M_Inscription::estValideCarte($propritaire, $carte, $expiration, $crypto);
            if (count($errors) > 0) {
                // Si une erreur, on recommence
                afficheErreurs($errors);
                break;
            } else {
                $idCommande = ($_SESSION['idDerniereCommande']);
                $idClient = ($_SESSION['id']);
                $commandesClient = M_Payer::payerCommande($idCommande, $idClient);

                $total_payer = $_SESSION['total_a_payer'];

                $_SESSION['total_payer'] = $total_payer;
                $_SESSION['total_a_payer'] = 0;


                // $index = array_search($idProduit, $_SESSION['Articles']);
                // unset($_SESSION['Articles'][$index]);
                unset($_SESSION['Articles']);
                unset($_SESSION['Panier']);

               
                

                // unset($_SESSION['Articles']);

                header('location: index.php?page=v_confirmationPayement&uc=payer');
                break;
            }
        }
    default:
        break;
}
