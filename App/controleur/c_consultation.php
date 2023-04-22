<?php
include_once "./App/modele/M_Article.php";
include_once "./App/modele/M_Categorie.php";
include_once "./App/modele/M_Inscription.php";

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
    case 'voirArticlesCouleur':
        $id_couleur = filter_input(INPUT_GET, 'couleur');
        $lesArticles = M_Article::trouveLesArticleDeCouleur($id_couleur);
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



    case 'ajouterAuPanier':
        $nom_Categorie = filter_input(INPUT_GET, 'categorie');
        $idArticle = filter_input(INPUT_GET, 'idArticle');

        if (!ajouterAuPanier($idArticle)) {
            afficheErreurs(["Cet article est déjà dans le panier !!"]);
        } else {
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
}

$lesCategories = M_Categorie::trouveLesCategories();
$lesCouleurs = M_Categorie::trouveLesCouleurs();

if (($_SERVER['REQUEST_METHOD'] === 'GET') && (isset($recherche_mot))){
    // Récupérer les valeurs des inputs
    $recherche_mot = filter_input(INPUT_GET, "recherche_mot", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Action

    $errors = M_Inscription::estValideMot($recherche_mot);
    if (count($errors) > 0) {
        // Si une erreur, on recommence
        afficheErreurs($errors);
    } else {
        // header('location: index.php?page=v_accueil&action=voirArticlesAccueil');
        $lesArticles = M_Article::trouveLesArticleParMot($recherche_mot);

    }
}
