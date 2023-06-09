<?php
include_once "./App/modele/M_Commande.php";
include_once "./App/modele/M_Inscription.php";
include_once "./App/modele/M_monCompte.php";

// include_once "App/modele/M_Commande.php";
// include_once "App/modele/M_Inscription.php";
// include_once 'APP/modele/M_monCompte.php';


if (isset($_SESSION['id'])) {
    $InfoUtilisateur = [];
    $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
    if (!empty($_SESSION['id'])) {
        $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
    }
}


switch ($action) {
    case 'passerCommande':

        
        $n = nbArticlesDuPanier();
        if ($n > 0) {
            $InfoUtilisateur = [];
          
            $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
            if (!empty($_SESSION['id'])) {
                $InfoUtilisateur = M_Commande::afficherInfoUtilisateur($_SESSION['id']);
            }
        } else {
            afficheMessage("Panier vide !!");
            $uc = '';
        }
        break;
    case 'confirmerCommandeNationalle':
        $nom = filter_input(INPUT_POST, 'identiteLiv');
        $prenom = filter_input(INPUT_POST, 'prenomLiv');
        $rue = filter_input(INPUT_POST, 'adresseLiv');
        $complement = filter_input(INPUT_POST, 'complementLiv');
        $ville = filter_input(INPUT_POST, 'villeLiv');
        $cp = filter_input(INPUT_POST, 'cpLiv');
        $date_livraison_progamme = filter_input(INPUT_POST, 'date_livraison_progamme');

        $nomFac = filter_input(INPUT_POST, 'identiteFac');
        $prenomFac = filter_input(INPUT_POST, 'prenomFac');
        $rueFac = filter_input(INPUT_POST, 'adresseFac');
        $complementFac = filter_input(INPUT_POST, 'complementFac');
        $villeFac = filter_input(INPUT_POST, 'villeFac');
        $cpFac = filter_input(INPUT_POST, 'cpFac');
        $btn_valide_payement = filter_input(INPUT_POST, 'btn_valide_payement');
        $valider = filter_input(INPUT_POST, 'valider');
        $btn_name = filter_input(INPUT_POST, 'btn_valide_payement');

        $errors = M_Commande::estValide($nom, $prenom, $rue, $complement, $ville, $cp, $nomFac, $prenomFac, $rueFac, $complementFac, $villeFac, $cpFac);
        if (count($errors) > 0) {
            // Si une erreur, on recommence
            afficheErreurs($errors);
            break;
        }

        if ((!isset($_SESSION['Articles'])) || (empty($_SESSION['Articles']))) {

            return;
        }

        if (isset($date_livraison_progamme) && !empty($date_livraison_progamme)) {
            $id_ville_livraison = M_Inscription::trouveOuCreerVille($ville);
            $id_ville_facturation = M_Inscription::trouveOuCreerVille($villeFac);
            $id_cp_livraison = M_Inscription::trouveOuCreerCp($cp);
            $id_cp_facturation = M_Inscription::trouveOuCreerCp($cpFac);

            $id_adresse_livraison = M_Commande::trouveOuCreerAdresse($rue, $complement, $id_ville_livraison, $id_cp_livraison);
            $id_adresse_facturation = M_Commande::trouveOuCreerAdresse($rueFac, $complementFac, $id_ville_facturation, $id_cp_facturation);

            $idclient = $_SESSION['id'];

            $listArticles = getLesIdArticlesDuPanier();
            $idDerniereCommande =  M_Commande::creerCommande($idclient, $id_adresse_livraison, $id_adresse_facturation, $listArticles);

            supprimerPanier();
            afficheMessage("Commande enregistrée !! une fois la commande payée, nous procéderons à sa préparation, À VOUS !");

            $uc = '';
            $_SESSION['idDerniereCommande']  = $idDerniereCommande;
            header('location: index.php?page=v_paiement&uc=payer');
            return $idDerniereCommande;
        } else {
            $id_ville_livraison = M_Inscription::trouveOuCreerVille($ville);
            $id_ville_facturation = M_Inscription::trouveOuCreerVille($villeFac);
            $id_cp_livraison = M_Inscription::trouveOuCreerCp($cp);
            $id_cp_facturation = M_Inscription::trouveOuCreerCp($cpFac);
            $id_adresse_livraison = M_Commande::trouveOuCreerAdresse($rue, $complement, $id_ville_livraison, $id_cp_livraison);
            $id_adresse_facturation = M_Commande::trouveOuCreerAdresse($rueFac, $complementFac, $id_ville_facturation, $id_cp_facturation);

            $idclient = $_SESSION['id'];

            $listArticles = getLesIdArticlesDuPanier();
            $idDerniereCommande =  M_Commande::creerCommande($idclient, $id_adresse_livraison, $id_adresse_facturation, $listArticles);

            supprimerPanier();
            afficheMessage("Commande enregistrée !! une fois la commande payée, nous procéderons à sa préparation, À VOUS !");

            $uc = '';
            $_SESSION['idDerniereCommande']  = $idDerniereCommande;

            header('location: index.php?page=v_paiement&uc=payer');
            return $idDerniereCommande;
            // }
            break;
        }
    case 'confirmerCommande':


      
        $nom = filter_input(INPUT_POST, 'identiteLiv');
        $prenom = filter_input(INPUT_POST, 'prenomLiv');
        $rue = filter_input(INPUT_POST, 'adresseLiv');
        $complement = filter_input(INPUT_POST, 'complementLiv');
        $ville = filter_input(INPUT_POST, 'villeLiv');
        $cp = filter_input(INPUT_POST, 'cpLiv');
        $date_livraison_progamme = filter_input(INPUT_POST, 'date_livraison_progamme');

        $nomFac = filter_input(INPUT_POST, 'identiteFac');
        $prenomFac = filter_input(INPUT_POST, 'prenomFac');
        $rueFac = filter_input(INPUT_POST, 'adresseFac');
        $complementFac = filter_input(INPUT_POST, 'complementFac');
        $villeFac = filter_input(INPUT_POST, 'villeFac');
        $cpFac = filter_input(INPUT_POST, 'cpFac');

        $btn_valide_payement = filter_input(INPUT_POST, 'btn_valide_payement');
        $valider = filter_input(INPUT_POST, 'valider');
        $btn_name = filter_input(INPUT_POST, 'btn_valide_payement');
       
        $errors = M_Commande::estValide($nom, $prenom, $rue, $complement, $nomFac, $prenomFac, $rueFac, $complementFac, $villeFac, $cpFac);
       
        if (count($errors) > 0) {
            // Si une erreur, on recommence
            afficheErreurs($errors);
            break;
        }
     
        if ((!isset($_SESSION['Articles'])) || (empty($_SESSION['Articles']))) {
         
            return;
        }
       
       
        if (isset($date_livraison_progamme) && !empty($date_livraison_progamme)) {
      
            $id_ville_livraison = M_Inscription::trouveVille($ville);

            $id_ville_facturation = M_Inscription::trouveOuCreerVille($villeFac);
            $id_cp_livraison = M_Inscription::trouveCp($cp);
            $id_cp_facturation = M_Inscription::trouveOuCreerCp($cpFac);
            $id_adresse_livraison = M_Commande::trouveOuCreerAdresse($rue, $complement, $id_ville_livraison, $id_cp_livraison);
            $id_adresse_facturation = M_Commande::trouveOuCreerAdresse($rueFac, $complementFac, $id_ville_facturation, $id_cp_facturation);

            $idclient = $_SESSION['id'];

            $listArticles = getLesIdArticlesDuPanier();
            // M_Commande::creerCommandeProrgramer($idclient, $date_livraison_progamme, $id_adresse_livraison, $id_adresse_facturation, $listArticles);
            $idDerniereCommande =  M_Commande::creerCommandeProrgramer($idclient, $date_livraison_progamme, $id_adresse_livraison, $id_adresse_facturation, $listArticles);

            supprimerPanier();
            afficheMessage("Commande enregistrée !! une fois la commande payée, nous procéderons à sa préparation, À VOUS !");

            $uc = '';
            $_SESSION['idDerniereCommande']  = $idDerniereCommande;
    
         

            header('location: index.php?page=v_paiement&uc=payer');
            return $idDerniereCommande;
        } else {

            $id_ville_livraison = M_Inscription::trouveVille($ville);
            $id_ville_facturation = M_Inscription::trouveOuCreerVille($villeFac);
            $id_cp_livraison = M_Inscription::trouveCp($cp);
            $id_cp_facturation = M_Inscription::trouveOuCreerCp($cpFac);
            $id_adresse_livraison = M_Commande::trouveOuCreerAdresse($rue, $complement, $id_ville_livraison, $id_cp_livraison);
            $id_adresse_facturation = M_Commande::trouveOuCreerAdresse($rueFac, $complementFac, $id_ville_facturation, $id_cp_facturation);
           
            $idclient = $_SESSION['id'];
            $listArticles = getLesIdArticlesDuPanier();


            // var_dump($listArticles);
        //     // die;
        //     $quantiteArticles = getLesQuantiteArticlesDuPanier();
        //   var_dump($quantiteArticles);
        //   die;



            $idDerniereCommande =  M_Commande::creerCommande($idclient, $id_adresse_livraison, $id_adresse_facturation, $listArticles);
          
            supprimerPanier();
            afficheMessage("Commande enregistrée !! une fois la commande payée, nous procéderons à sa préparation, À VOUS !");

            $uc = '';
            $_SESSION['idDerniereCommande']  = $idDerniereCommande;
          
            header('location: index.php?page=v_paiement&uc=payer');
            return $idDerniereCommande;
            // }
            break;
        }
    default:
        break;
}
