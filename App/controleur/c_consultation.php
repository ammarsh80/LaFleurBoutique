<?php
include_once 'App/modele/M_Article.php';
include_once 'App/modele/M_categorie.php';

/**
 * Controleur pour la consultation des exemplaires
 * @author Loic LOG
 */
switch ($action) {

    case 'voirArticlesAccueil':
        // $voirTousLesJeux = filter_input(INPUT_GET, 'voirArticlesAccueil');
        $lesArticles = M_Article::trouveLesArticleAccueil();
        break;
    case 'voirArticlesAmour':
        // $voirTousLesJeux = filter_input(INPUT_GET, 'voirArticlesAmour');
        $lesArticles = M_Article::trouveLesArticleAmour();
        break;
    case 'voirArticlesMariage':
        // $voirTousLesJeux = filter_input(INPUT_GET, 'voirArticlesMariage');
        $lesArticles = M_Article::trouveLesArticleMariage();
        break;
    case 'voirArticlesNaissance':
        // $voirTousLesJeux = filter_input(INPUT_GET, 'voirArticlesNaissance');
        $lesArticles = M_Article::trouveLesArticleNaissance();
        break;
    case 'voirArticlesRemerciement':
        // $voirTousLesJeux = filter_input(INPUT_GET, 'voirArticlesRemerciement');
        $lesArticles = M_Article::trouveLesArticleRemerciement();
        break;
    case 'voirArticlesAnniversaire':
        // $voirTousLesJeux = filter_input(INPUT_GET, 'voirArticlesAnniversaire');
        $lesArticles = M_Article::trouveLesArticleAnniversaire();
        break;


    case 'voirAll':
        $voirTousLesJeux = filter_input(INPUT_GET, 'voirAll');
        $lesArticles = M_Article::trouverAllArticle();
        break;
        
    case 'voirArticlesDeCategorie':
        // $idArticle = filter_input(INPUT_GET, 'id');
        $idCategorie = filter_input(INPUT_GET, 'categorie');

        $lesArticles = M_Article::trouveLesArticlesDeCategorie($idCategorie);
        $LeNomDeLaCategorie = M_Article::trouveLeNomDeLaCategorie($idCategorie);
        // var_dump($LeNomDeLaCategorie[0][0]);
        // die;


        // $lesArticles = M_Article::trouverAllArticle($categorie);
        // header('Location: index.php?uc=accueil&action=voirAll');

        break;
    case 'voirJeuxConsole':
        $console = filter_input(INPUT_GET, 'console');
        $lesJeux = M_Article::trouveLesJeuxDeConsole($console);
        break;


    case 'ajouterAuPanier':
        $nom_Categorie = filter_input(INPUT_GET, 'categorie');
        $idArticle = filter_input(INPUT_GET, 'idArticle');

        // var_dump($idArticle);
        // die;

        if (!ajouterAuPanier($idArticle)) {
            afficheErreurs(["Cet article est déjà dans le panier !!"]);
        } 
        else {
            afficheMessage("Cet article a été ajouté au panier ");
        }
        $lesArticles = M_Article::trouveLesArticlesDeCategorieNom($nom_Categorie);
        break;

    case "ajouterAuPanierCat":
        $idexemplaire = filter_input(INPUT_GET, 'idexemplaire');
        if (!ajouterAuPanier($idexemplaire)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        } else {
            afficheMessage("Ce jeu a été ajouté");
        }
        $categorie = filter_input(INPUT_GET, 'categorie');
        $lesJeux = M_Article::trouveLesArticlesDeCategorie($categorie);
        break;
    case "ajouterAuPanierCon":
        $idexemplaire = filter_input(INPUT_GET, 'idexemplaire');
        if (!ajouterAuPanier($idexemplaire)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        } else {
            afficheMessage("Ce jeu a été ajouté");
        }
        $console = filter_input(INPUT_GET, 'console');
        $lesJeux = M_Article::trouveLesJeuxDeConsole($console);
        break;
    case "ajouterAuPanierEtat":
        $idexemplaire = filter_input(INPUT_GET, 'idexemplaire');
        if (!ajouterAuPanier($idexemplaire)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        } else {
            afficheMessage("Ce jeu a été ajouté");
        }
        // $etat = filter_input(INPUT_POST, 'etat');
        /* Normlement je dois mettre INPUT_POST, sauf que si je fais ça je perd l'affichage des jeux selon état une fois je rajoute un article dans le panier!!  */
        $etat = filter_input(INPUT_GET, 'etat');
        $lesJeux = M_Article::trouverLesEtat($etat);
        break;
    case 'ajouterAuPanierDepuisAccueil':
        $idexemplaire = filter_input(INPUT_GET, 'idexemplaire');
        if (!ajouterAuPanier($idexemplaire)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        } else {
            afficheMessage("Ce jeu a été ajouté");
        }
        $lesJeux = M_Article::trouverAllArticle();
        break;

    case 'selonEtat':
        $etat = filter_input(INPUT_POST, 'etat');
        $lesJeux = M_Article::trouverLesEtat($etat);
        break;
    default:
        $lesJeux = [];
        break;
}

$lesCategories = M_Categorie::trouveLesCategories();
$lesCouleurs = M_Categorie::trouveLesCouleurs();


// $lesConsoles = M_Categorie::trouveLesConsoles();
