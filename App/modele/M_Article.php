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
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
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
        lf_articles.image, lf_articles.etat, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
        lf_unites.nom_unite, lf_unites.taille, lf_couleurs.couleur  
        FROM lf_articles
    JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
    JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
    JOIN lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
    JOIN lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
    JOIN lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`
    WHERE `lf_categories`.`nom_categorie` = :nom_categorie";

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
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticleAccueil()
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
        WHERE `lf_categories`.`nom_categorie` = 'accueil'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        // $lesLignes = $res->fetchAll(PDO::FETCH_ASSOC);

        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticleAmour()
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
        WHERE `lf_categories`.`nom_categorie` = 'amour et sentiments'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticleMariage()
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
        WHERE `lf_categories`.`nom_categorie` = 'mariage'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticleNaissance()
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
        WHERE `lf_categories`.`nom_categorie` = 'naissance'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticleRemerciement()
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
        WHERE `lf_categories`.`nom_categorie` = 'remerciement'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les articles de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesArticleAnniversaire()
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
        WHERE `lf_categories`.`nom_categorie` = 'anniversaire'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne sous forme d'un tableau associatif tous les Articles de la
     * console passée en argument
     *
     * @param $idConsole
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeConsole($idConsole)
    {
        $req = "SELECT * FROM exemplaire
         JOIN jeu ON `exemplaire`.`jeu_id` = `jeu`.`id_jeu` 
        JOIN categorie ON `jeu`.`categorie_id` = `categorie`.`id_categorie` 
        JOIN console ON `exemplaire`.`console_id` = `console`.`id_console`
        WHERE `console`.`id_console` = :idConsole";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':idConsole', $idConsole, PDO::PARAM_INT);
        $statement->execute();
        $lesLignes = $statement->fetchAll();
        return $lesLignes;
    }

    /**
     * affiche tous les jeux
     *
     * @return $voirTousLesJeux
     */
    public static function trouverAllArticle()
    {
        //     $reqSQL = "SELECT * FROM exemplaire
        //    JOIN jeu ON `exemplaire`.`jeu_id` = `jeu`.`id_jeu` 
        //     JOIN categorie ON `jeu`.`categorie_id` = `categorie`.`id_categorie` 
        //     JOIN console ON `exemplaire`.`console_id` = `console`.`id_console`";
        //     $statement = AccesDonnees::getPdo()->prepare($reqSQL);
        //     $statement->execute();
        //     $voirTousLesJeux = $statement->fetchAll();
        //     return $voirTousLesJeux;

        $req = "SELECT * FROM lf_articles
        JOIN lf_article_categorie ON `lf_articles`.`id` = `lf_article_categorie`.`article_id`
        JOIN lf_categories ON `lf_article_categorie`.`categorie_id` = `lf_categories`.`id` 
        Join lf_fleurs ON `lf_articles`.`fleurs_id` = `lf_fleurs`.`id`
        Join lf_unites ON `lf_articles`.`unites_id` = `lf_unites`.`id`
        Join lf_couleurs ON `lf_articles`.`couleurs_id` = `lf_couleurs`.`id`";

        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
        var_dump($lesLignes);
        die;
    }


    /**
     * affiche les jeux selon leurs etat
     *
     * @param [type] $etat
     * @return $voirJeuxSelonEtat
     */
    public static function trouverLesEtat($etat)
    {
        $reqSQL = "SELECT * FROM exemplaire 
        JOIN jeu ON `exemplaire`.`jeu_id` = `jeu`.`id_jeu` 
        JOIN categorie ON `jeu`.`categorie_id` = `categorie`.`id_categorie`
        JOIN console ON `exemplaire`.`console_id` = `console`.`id_console` 
        WHERE `exemplaire`.`etat` = :etat";
        $statement = AccesDonnees::getPdo()->prepare($reqSQL);
        $statement->bindParam(':etat', $etat, PDO::PARAM_STR);
        $statement->execute();
        $voirJeuxSelonEtat = $statement->fetchAll();
        return $voirJeuxSelonEtat;
    }

    /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif $lesProduits
     */
    public static function trouveLesArticlesDuTableau($desIdArticles)
    {
        $nbProduits = count($desIdArticles);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdArticles as $unIdProduit) {
                $req = "SELECT lf_articles.id, lf_articles.nombre, lf_articles.description, lf_articles.prix_unitaire, 
                lf_articles.image, lf_articles.etat, lf_categories.nom_categorie, lf_fleurs.nom_fleur, 
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
}
