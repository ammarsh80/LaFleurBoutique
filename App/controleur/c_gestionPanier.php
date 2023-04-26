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

        
        $idArticle =126;
        // var_dump($idArticle);
        // die;
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
    default:
        break;
}

$lesFraisLivraison = M_Consultation::trouveLesFraisLivraison();
