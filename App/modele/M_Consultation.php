<?php

class M_Consultation
{
    /**
     * Retourne toutes les villes livrable sous forme d'un tableau associatif
     *
     * @return le tableau associatif des villes
     */
    public static function trouveLesVillesLivrable()
    {
        $req = "SELECT * FROM lf_villes
        WHERE lf_villes.livrable = :livrable";

        $livrable = 1;
        $statement = AccesDonnees::getPdo()->prepare($req);

        $statement->bindParam(":livrable", $livrable);
        $statement->execute();
        $lesLignes = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    /**
     * Retourne toutes les codes posteaux sous forme d'un tableau associatif
     *
     * @return le tableau associatif des codes posteaux
     */
    public static function trouveLesCp()
    {
        $req = "SELECT * FROM lf_code_postaux";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne toutes les Frais de Livraison sous forme d'un tableau associatif
     *
     * @return le tableau associatif Frais de Livraison
     */
    public static function trouveLesFraisLivraison()
    {
        $req = "SELECT * FROM lf_frais_livraisons";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
}
