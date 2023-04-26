<?php
include_once "./App/modele/M_Article.php";
include_once "./App/modele/M_Categorie.php";
include_once "./App/modele/M_Inscription.php";
include_once "./App/modele/M_Consultation.php";

/**
 * Controleur pour la consultation des articles
 * @author Ammar SHIHAN
 */


switch ($action) {

    case 'voirArticlesAccueil':
        $voirTousLesArticles = filter_input(INPUT_GET, 'voirArticlesAccueil');
        $lesArticles = M_Article::trouveLesArticleAccueil();
        break;
    case 'voirArticlesAmour':
        $voirTousLesArticles = filter_input(INPUT_GET, 'voirArticlesAmour');
        $lesArticles = M_Article::trouveLesArticleAmour();
        break;
    case 'voirArticlesMariage':
        $voirTousLesArticles = filter_input(INPUT_GET, 'voirArticlesMariage');
        $lesArticles = M_Article::trouveLesArticleMariage();
        break;
    case 'voirArticlesNaissance':
        $voirTousLesArticles = filter_input(INPUT_GET, 'voirArticlesNaissance');
        $lesArticles = M_Article::trouveLesArticleNaissance();
        break;
    case 'voirArticlesRemerciement':
        $voirTousLesArticles = filter_input(INPUT_GET, 'voirArticlesRemerciement');
        $lesArticles = M_Article::trouveLesArticleRemerciement();
        break;
    case 'voirArticlesAnniversaire':
        $voirTousLesArticles = filter_input(INPUT_GET, 'voirArticlesAnniversaire');
        $lesArticles = M_Article::trouveLesArticleAnniversaire();
        break;
    case 'voirArticlesCouleur':
        $id_couleur = filter_input(INPUT_GET, 'couleur');
        $lesArticles = M_Article::trouveLesArticleDeCouleur($id_couleur);
        break;


    case 'voirAll':
        $voirTousLesArticles = filter_input(INPUT_GET, 'voirAll');
        $lesArticles = M_Article::trouverAllArticle();
        break;

    case 'voirArticlesDeCategorie':
        $idCategorie = filter_input(INPUT_GET, 'categorie');

        $lesArticles = M_Article::trouveLesArticlesDeCategorie($idCategorie);
        $LeNomDeLaCategorie = M_Article::trouveLeNomDeLaCategorie($idCategorie);

    case 'ajouterAuPanier':
        $nom_Categorie = filter_input(INPUT_GET, 'categorie');
        $idArticle = filter_input(INPUT_GET, 'idArticle');
        $quantite = filter_input(INPUT_GET, 'quantite');

        if (!ajouterAuPanier($idArticle)) {
            afficheErreurs(["Cet article est déjà dans le panier !!"]);
        } else {
            afficheMessage("Cet article a été ajouté au panier ");
        }
        $lesArticles = M_Article::trouveLesArticlesDeCategorieNom($nom_Categorie);
        break;

    case 'ajouterAuPanierDepuisCouleur':
        $id_couleur = filter_input(INPUT_GET, 'couleur');
        $idArticle = filter_input(INPUT_GET, 'idArticle');
        if (!ajouterAuPanier($idArticle)) {
            afficheErreurs(["Cet article est déjà dans le panier !!"]);
        } else {
            afficheMessage("Cet article a été ajouté au panier ");
        }
        $lesArticles = M_Article::trouveLesArticleDeCouleur($id_couleur);
        break;

    default:
        break;
}

$lesCategories = M_Categorie::trouveLesCategories();
$lesCouleurs = M_Categorie::trouveLesCouleurs();
$lesVilles = M_Consultation::trouveLesVillesLivrable();
$lesCPs = M_Consultation::trouveLesCp();

if (($_SERVER['REQUEST_METHOD'] === 'GET') && (isset($recherche_mot))) {
    // Récupérer les valeurs des inputs
    $recherche_mot = filter_input(INPUT_GET, "recherche_mot", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $errors = M_Inscription::estValideMot($recherche_mot);
    if (count($errors) > 0) {
        // Si une erreur, on recommence
        afficheErreurs($errors);
    } else {
        $lesArticles = M_Article::trouveLesArticleParMot($recherche_mot);
    }
}
