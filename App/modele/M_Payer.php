<?php


/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Payer
{
    /**
     * Crée une commande
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $iddernierclient
     * @param $ville_id
     * @param $listArticles
     */
    public static function payerCommande($idCommande, $idClient)
    {
        $etat = 'payée';
        // $req = "UPDATE lf_commande_clients SET etat = :etat WHERE clients_id = :idClient";
        $req = "UPDATE lf_commande_clients SET etat = :etat WHERE id = :idCommande AND clients_id = :idClient";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':idClient', $idClient, PDO::PARAM_INT);
        $statement->bindParam(':idCommande', $idCommande, PDO::PARAM_INT);
        $statement->bindParam(':etat', $etat, PDO::PARAM_STR);
        $statement->execute();
        // $idDerniereCommandePaye = AccesDonnees::getPdo()->lastInsertId();
    
        // // if ((isset($_SESSION['id']) && (isset($lesArticlesDuPanier)))) {
        // $_SESSION['idDerniereCommandePaye'] = $idDerniereCommandePaye;
    
        // var_dump($_SESSION['idDerniereCommandePaye']);
        // die;

        // return $idDerniereCommandePaye;
    
        // }
    }
    
}
