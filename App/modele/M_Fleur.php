<?php

/**
 * Trouve le nom d'un article
 *
 * @author Ammar SHIHAN
 */
class M_Fleur
{

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     * @param int $idArticle l'identifiant de l'article
     * @return array le nom de la fleur
     */
    public static function trouveLesFleurs()
    {

        // $req = "SELECT lf_fleurs.nom_fleur FROM lf_fleurs 
        // JOIN lf_articles ON lf_articles.fleurs_id = lf_fleurs.id 
        // WHERE lf_articles.id = :idArticle";
        // $statement = AccesDonnees::getPdo()->prepare($req);
        // $statement->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
        // $statement->execute();
        // $laFleur = $statement->fetchAll();
        // return $laFleur;
    
    
        $req = "SELECT * FROM lf_fleurs";
        $res = AccesDonnees::query($req);
        $lesFleurs = $res->fetchAll();
        return $lesFleurs;
    }

}
