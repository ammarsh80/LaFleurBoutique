<?php


/**
 * Paiement
 *
 * @author Ammar SHIHAN
 */
class M_Payer
{
/**
 * Calcule la somme total à payer pour affichage dans panier et paiement
 *
 * @return :total_a_payer
 */
    public static function calculePanier() {
        $desIdArticle = getLesIdArticlesDuPanier();
        $lesArticlesDuPanier = M_Article::trouveLesArticlesDuTableau($desIdArticle);
        $sommePrixUnitaires = array_sum(array_map(function ($article) {
            return $article['prix_unitaire'] * $_SESSION['Panier'][$article['id']]['quantite'];
        }, $lesArticlesDuPanier));
        $sommeTTC = number_format($sommePrixUnitaires, 2, '.', '') . "00";
        $lesFraisLivraison = M_Consultation::trouveLesFraisLivraison();

        if ($sommeTTC >= 50) {
            $total_a_payer = number_format($sommeTTC + ($lesFraisLivraison[0]['somme']), 2, '.', '');
            $_SESSION['total_a_payer'] = $total_a_payer;
            $total_payer = $_SESSION['total_a_payer'];
            $_SESSION['total_payer'] = $total_payer;
     
        } else {
            $total_a_payer = number_format($sommeTTC + ($lesFraisLivraison[1]['somme']), 2, '.', '');
            $_SESSION['total_a_payer'] = $total_a_payer;
            $total_payer = $_SESSION['total_a_payer'];
            $_SESSION['total_payer'] = $total_payer;
        }
        return $total_a_payer;
    }

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
