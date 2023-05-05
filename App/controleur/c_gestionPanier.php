<?php
include_once "./App/modele/M_Article.php";
include_once "./App/modele/M_Consultation.php";
include_once "./App/modele/M_Payer.php";

/**
 * Controleur pour la gestion du panier
 * @author Ammar SHIHAN
 */
switch ($action) {
    case 'supprimerUnArticle':
        $idArticle = filter_input(INPUT_GET, 'idArticle');
        retirerDuPanier($idArticle);
        afficheMessage("cet article a été retiré du panier!!");

        $index = array_search($idArticle, $_SESSION['Articles']);
        if ($_SESSION['Panier'][$idArticle]['quantite'] == 0) {
            unset($_SESSION['Articles'][$index]);
        }
        header('location: index.php?page=v_panier&uc=panier&action=voirPanier');

    case 'voirPanier':
        $n = nbArticlesDuPanier();
        if ($n > 0) {
            $total_a_payer = M_Payer::calculePanier();
            $desIdArticle = getLesIdArticlesDuPanier();
            $lesArticlesDuPanier = M_Article::trouveLesArticlesDuTableau($desIdArticle);

        } else {
            afficheMessagePanierVide("Panier Vide !!");
            $uc = '';
        }

        break;
    case 'monlot':

        $monlot = filter_input(INPUT_GET, 'monlot');
        $idcommande = ($_SESSION["idDerniereCommande"]);
        if (isset($monlot) && (!empty($monlot))) {
            if (isset($idcommande) && (!empty($idcommande))) {
                $id_lot = M_Article::recupererMonlot($monlot, $idcommande);
            }
        }
        break;

    default:
        break;
}

$lesFraisLivraison = M_Consultation::trouveLesFraisLivraison();
