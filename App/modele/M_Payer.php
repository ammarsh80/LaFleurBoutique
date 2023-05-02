<?php


/**
 * Paiement
 *
 * @author Ammar SHIHAN
 */
class M_Payer
{
  /**
   * passe l'état d'une commande à Payée à partir des arguments validés passés en paramètre
   *
   * @param [int] $idCommande
   * @param [int] $idClient
   * @return void
   */
    public static function payerCommande($idCommande, $idClient)
    {
        $etat = 'payée';
        $req = "UPDATE lf_commande_clients SET etat = :etat WHERE id = :idCommande AND clients_id = :idClient";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':idClient', $idClient, PDO::PARAM_INT);
        $statement->bindParam(':idCommande', $idCommande, PDO::PARAM_INT);
        $statement->bindParam(':etat', $etat, PDO::PARAM_STR);
        $statement->execute();

        if (isset($_COOKIE['block'])) {
            unset($_COOKIE['block']);
            setcookie('gagne', '', time() - 3600); // définit une date d'expiration passée pour le cookie
        }
    }
}
