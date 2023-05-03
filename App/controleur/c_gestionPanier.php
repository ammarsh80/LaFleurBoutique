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


        // $_SESSION['Panier'][$idArticle]['quantite'] = 0;

        $index = array_search($idArticle, $_SESSION['Articles']);
        if ($_SESSION['Panier'][$idArticle]['quantite'] == 0) {
            unset($_SESSION['Articles'][$index]);
        }
        header('location: index.php?page=v_panier&uc=panier&action=voirPanier');

    case 'voirPanier':
        $n = nbArticlesDuPanier();
        if ($n > 0) {
            $desIdArticle = getLesIdArticlesDuPanier();
            $lesArticlesDuPanier = M_Article::trouveLesArticlesDuTableau($desIdArticle);

            $sommePrixUnitaires = array_sum(array_map(function ($article) {
                return $article['prix_unitaire'] * $_SESSION['Panier'][$article['id']]['quantite'];
            }, $lesArticlesDuPanier));
        
            $sommeTTC = number_format($sommePrixUnitaires, 2, '.', '');
            $lesFraisLivraison = M_Consultation::trouveLesFraisLivraison();

            if ($sommePrixUnitaires >= 50) {
                $total_a_payer = $sommePrixUnitaires + ($lesFraisLivraison[0]['somme']);

                $_SESSION['total_a_payer'] = $total_a_payer;
                $total_payer = $_SESSION['total_a_payer'];
                $_SESSION['total_payer'] = $total_payer;

            } else {
 
                $total_a_payer = $sommePrixUnitaires  + ($lesFraisLivraison[1]['somme']);
                $_SESSION['total_a_payer'] = $total_a_payer;
                $total_payer = $_SESSION['total_a_payer'];
                $_SESSION['total_payer'] = $total_payer;             
            }
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
