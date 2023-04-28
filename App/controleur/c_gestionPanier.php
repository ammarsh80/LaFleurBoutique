<?php



include_once "./App/modele/M_Article.php";
include_once "./App/modele/M_Consultation.php";



/**
 * Controleur pour la gestion du panier
 * @author Ammar SHIHAN
 */
switch ($action) {
    case 'supprimerUnArticle':
        $idArticle = filter_input(INPUT_GET, 'idArticle');
        retirerDuPanier($idArticle);
        afficheMessage("cet article a été retiré du panier!!");

    case 'voirPanier':
        $n = nbArticlesDuPanier();
        if ($n > 0) {
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
        if (isset($monlot) && (!empty($monlot))){
        if (isset($idcommande) && (!empty($idcommande))){
            $id_lot = M_Article::recupererMonlot($monlot, $idcommande);
        }
    }
        break;

    default:
        break;
}

$lesFraisLivraison = M_Consultation::trouveLesFraisLivraison();
