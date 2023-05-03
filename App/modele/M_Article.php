<?php

/**
 * Requetes sur les articles (fleurs) de boutique LaFleur
 *
 * @author Ammar SHIHAN
 */
class M_Article
{

    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticlesDeCategorie($idCategorie)
    {
        $req = "SELECT * FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`id` = :idCategorie";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':idCategorie', $idCategorie, PDO::PARAM_INT);
        $statement->execute();
        $lesLignes = $statement->fetchAll();
        return $lesLignes;
    }


    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * couleur passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticleDeCouleur($id_couleur)
    {
        $req = "SELECT DISTINCT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_couleurs`.`id` = :id_couleur AND lf_articles.quantite_stock > 0
        group by lf_articles.id";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':id_couleur', $id_couleur, PDO::PARAM_INT);
        $statement->execute();
        $lesLignes = $statement->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles en repture de la
     * couleur passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticleDeCouleurEnRepture($id_couleur)
    {
        $req = "SELECT DISTINCT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_couleurs`.`id` = :id_couleur AND `lf_articles`.`quantite_stock` = 0
        GROUP BY lf_articles.id";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':id_couleur', $id_couleur, PDO::PARAM_INT);
        $statement->execute();
        $lesLignes = $statement->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param $idArticle
     * @return un tableau associatif
     */
    public static function trouveLaCategorieArticle($idArticle)
    {


        $req = "SELECT lf_categories.nom_categorie FROM lf_categories
        JOIN lf_article_categorie ON `lf_categories`.`id` = `lf_article_categorie`.`categorie_id`
        JOIN lf_articles ON `lf_article_categorie`.`article_id` = `lf_articles`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_article_categorie`.`article_id` = :idArticle";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
        $statement->execute();
        $laCategorie = $statement->fetchAll();
        return $laCategorie;
    }
    /**
     * Retourne le nom de la catégorie passée en argument
     *
     * @param $idCategorie
     * @return : nom catégorie
     */
    public static function trouveLeNomDeLaCategorie($idCategorie)
    {
        $req = "SELECT lf_categories.nom_categorie FROM lf_categories
        WHERE `lf_categories`.`id` = :idCategorie";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':idCategorie', $idCategorie, PDO::PARAM_INT);
        $statement->execute();
        $LeNomDeLaCategorie = $statement->fetchAll();
        return $LeNomDeLaCategorie;
    }

    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param string $nom_categorie Le nom de la catégorie
     * @return array Un tableau associatif contenant les articles de la catégorie
     */
    public static function trouveLesArticlesDeCategorieNom($nom_categorie)
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat,lf_articles.quantite_stock,  lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur  
        FROM lf_articles
    JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
    JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
    JOIN lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
    JOIN lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
    JOIN lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
    WHERE `lf_categories`.`nom_categorie` = :nom_categorie AND lf_articles.quantite_stock > 0";

        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':nom_categorie', $nom_categorie, PDO::PARAM_STR);
        $statement->execute();
        $lesArticles = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $lesArticles;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param string $nom_categorie Le nom de la catégorie
     * @return array Un tableau associatif contenant les articles de la catégorie
     */
    public static function trouveLesArticlesDeCategorieNomEnRepture($nom_categorie)
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur  
        FROM lf_articles
    JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
    JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
    JOIN lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
    JOIN lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
    JOIN lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
    WHERE `lf_categories`.`nom_categorie` = :nom_categorie AND lf_articles.quantite_stock =0";

        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':nom_categorie', $nom_categorie, PDO::PARAM_STR);
        $statement->execute();
        $lesArticles = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $lesArticles;
    }

    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie Accueil
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleAccueil()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'accueil' AND lf_articles.quantite_stock > 0 ";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();

        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles En Repture de la
     * catégorie Accueil
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleAccueilEnRepture()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_articles`.`quantite_stock` = 0
        GROUP BY lf_fleurs.nom_fleur";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();

        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie Amour
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleAmour()
    {


        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur  
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'amour et sentiments' AND lf_articles.quantite_stock >0";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles En Repture de la
     * catégorie Amour En Repture
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleAmourEnRepture()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, lf_articles.image, lf_articles.etat, 
        lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur  
        FROM lf_articles
        JOIN lf_article_categorie ON lf_articles.id = lf_article_categorie.article_id
        JOIN lf_categories ON lf_article_categorie.categorie_id = lf_categories.id 
        JOIN lf_fleurs ON lf_articles.fleurs_id = lf_fleurs.id
        JOIN lf_unites ON lf_articles.unites_id = lf_unites.id
        JOIN lf_couleurs ON lf_articles.couleurs_id = lf_couleurs.id
        WHERE lf_categories.nom_categorie = 'amour et sentiments' 

        AND lf_articles.quantite_stock = 0
        GROUP BY lf_fleurs.nom_fleur";

        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie Mariage
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleMariage()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur  
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'mariage' AND lf_articles.quantite_stock >0";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles En Repture de la
     * catégorie Mariage
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleMariageEnRepture()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur  
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'mariage'
         AND lf_articles.quantite_stock = 0
         GROUP BY lf_fleurs.nom_fleur";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie Naissance
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleNaissance()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
         FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'naissance' AND lf_articles.quantite_stock >0";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles En Repture de la
     * catégorie Naissance
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleNaissanceEnRepture()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat,lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
         FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'naissance'
        AND lf_articles.quantite_stock = 0
         GROUP BY lf_fleurs.nom_fleur";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie Remerciement
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleRemerciement()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
         FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'remerciement' AND lf_articles.quantite_stock >0";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles En Repturede la
     * catégorie Remerciement
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleRemerciementEnRepture()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
         FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'remerciement'
        AND lf_articles.quantite_stock = 0
         GROUP BY lf_fleurs.nom_fleur";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie Anniversaire
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleAnniversaire()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'anniversaire' AND lf_articles.quantite_stock >0";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles En Repture de la
     * catégorie Anniversaire
     *
     * @return un tableau associatif
     */
    public static function trouveLesArticleAnniversaireEnRepture()
    {
        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
        lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
        FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
        WHERE `lf_categories`.`nom_categorie` = 'anniversaire'
        AND lf_articles.quantite_stock = 0
         GROUP BY lf_fleurs.nom_fleur";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }


    /**
     * Retourne sous forme d'un tableau associatif tous les articles
     *
     * @return un tableau associatif
     */
    public static function trouverAllArticle()
    {

        $req = "SELECT * FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`";

        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }


    /**
     * Retourne sous forme d'un tableau associatif tous les articles dont le nom contien les lettre saisis
     *
     * @param [type] $recherche_mot
     * @return un tableau associatif
     */
    public static function trouveLesArticleParMot($recherche_mot)
    {


        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
    lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
    lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
    FROM lf_articles
    JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
    JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
    Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
    Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
    Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
    WHERE nom_fleur LIKE :recherche_mot AND lf_articles.quantite_stock >0
            GROUP BY lf_articles.id";

        // SELECT * FROM lf_fleurs WHERE nom_fleur LIKE :recherche_mot";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $recherche_mot = '%' . $recherche_mot . '%'; // Ajouter les caractères de joker % avant et après la recherche_mot
        $statement->bindParam(':recherche_mot', $recherche_mot, PDO::PARAM_STR);

        $statement->execute();
        $lesLignes = $statement->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les lignes
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles dont le nom contien les lettre saisis
     *
     * @param [type] $recherche_mot
     * @return un tableau associatif
     */
    public static function trouveLesArticleParMotEnRepture($recherche_mot)
    {


        $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
    lf_articles.image, lf_articles.etat, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
    lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur 
    FROM lf_articles
    JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
    JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
    Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
    Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
    Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
    WHERE nom_fleur LIKE :recherche_mot AND lf_articles.quantite_stock = 0
    GROUP BY lf_articles.id";

        // SELECT * FROM lf_fleurs WHERE nom_fleur LIKE :recherche_mot";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $recherche_mot = '%' . $recherche_mot . '%'; // Ajouter les caractères de joker % avant et après la recherche_mot
        $statement->bindParam(':recherche_mot', $recherche_mot, PDO::PARAM_STR);

        $statement->execute();
        $lesLignes = $statement->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les lignes
        return $lesLignes;
    }

    /**
     * Retourne les articles concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdArticles tableau d'idProduits
     * @return : tableau associatif $lesProduits
     */
    public static function trouveLesArticlesDuTableau($desIdArticles)
    {
        $nbProduits = count($desIdArticles);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdArticles as $unIdProduit) {
                $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
                lf_articles.image, lf_articles.etat, lf_articles.quantite_stock, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
                lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur
                
                 FROM lf_articles 
                   JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`

        WHERE lf_articles.id = :unIdProduit";
                $statement = AccesDonnees::getPdo()->prepare($req);
                $statement->bindParam(':unIdProduit', $unIdProduit, PDO::PARAM_INT);
                $statement->execute();
                $unProduit = $statement->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }
    /**
     * insert l'id de lot gagné (passé en argument) dans la commande dont l'id est passé en argument
     *
     * @param [int] $idlot
     * @param [int] $idcommande
     * @return void
     */
    public static function recupererMonlot($idlot, $idcommande)
    {
        $req = "UPDATE lf_commande_clients SET gain_loteries_id = :idlot WHERE id = :idcommande";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':idlot', $idlot, PDO::PARAM_STR);
        $statement->bindParam(':idcommande', $idcommande, PDO::PARAM_INT);
        $statement->execute();

        $req = "SELECT quantite_disponible FROM lf_gain_loteries 
        WHERE id = :idlot";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':idlot', $idlot, PDO::PARAM_INT);
        $statement->execute();
        $quantiteDisponible = $statement->fetchColumn();
        $quantiteDisponible--;
       
        $req = "UPDATE lf_gain_loteries SET quantite_disponible = :quantiteDisponible WHERE id = :idlot";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':quantiteDisponible', $quantiteDisponible, PDO::PARAM_INT);
        $statement->bindParam(':idlot', $idlot, PDO::PARAM_INT);
        $statement->execute();

            if (isset($_COOKIE['gagne'])) {
                unset($_COOKIE['gagne']);
                setcookie('gagne', '', time() - 3600); // définit une date d'expiration passée pour le cookie
            }

        header('location: index.php?page=v_compte');
    }
}
