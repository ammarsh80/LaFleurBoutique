<?php

/**
 * Les articles sont rangés par catégorie
 *
 * @author Ammar SHIHAN
 */
class M_Categorie {

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesCategories() {
        $req = "SELECT * FROM lf_categories";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesCouleurs() {
        $req = "SELECT * FROM lf_couleurs";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
}