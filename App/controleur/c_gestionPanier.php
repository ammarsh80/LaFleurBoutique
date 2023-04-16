<?php



include_once 'App/modele/M_Article.php';



/**
 * Controleur pour la gestion du panier
 * @author Loic LOG
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
}
