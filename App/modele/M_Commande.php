<?php

/**
 * Requetes sur les commandes
 *
 * @author Ammar SHIHAN
 */
class M_Commande
{
    /**
     * crée une commande
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param [int] $idclient
     * @param [int] $id_adresse_livraison
     * @param [int] $id_adresse_facturation
     * @param [int] $listArticles
     * @param boolean $commande_cree
     * @return : id Derniere Commande
     */
    // public static function creerCommande($idclient, $id_adresse_livraison, $id_adresse_facturation, $listArticles, $commande_cree = false)
    // {
    //     if (!$commande_cree) {
    //         $req = "INSERT INTO lf_commande_clients (clients_id, adresses_livraison_id, adresses_facturation_id) 
    //     VALUES (:idclient, :id_adresse_livraison, :id_adresse_facturation)";
    //         $statement = AccesDonnees::getPdo()->prepare($req);
    //         $statement->bindParam(':idclient', $idclient, PDO::PARAM_INT);
    //         $statement->bindParam(':id_adresse_livraison', $id_adresse_livraison, PDO::PARAM_INT);
    //         $statement->bindParam(':id_adresse_facturation', $id_adresse_facturation, PDO::PARAM_INT);
    //         $statement->execute();
    //         $idDerniereCommande = AccesDonnees::getPdo()->lastInsertId();

    //         foreach ($listArticles as $article) {
    //             $req = "INSERT INTO lf_ligne_commande_client (commande_client_id, article_id) 
    //         VALUES (:idDerniereCommande, :article)";
    //             $statement = AccesDonnees::getPdo()->prepare($req);
    //             $statement->bindParam(':idDerniereCommande', $idDerniereCommande, PDO::PARAM_INT);
    //             $statement->bindParam(':article', $article, PDO::PARAM_INT);
    //             $statement->execute();
    //             return $idDerniereCommande;
    //         }
    //     }
    // }

    public static function creerCommande($idclient, $id_adresse_livraison, $id_adresse_facturation, $listArticles, $commande_cree = false)
    {
        if (!$commande_cree) {
            $req = "INSERT INTO lf_commande_clients (clients_id, adresses_livraison_id, adresses_facturation_id) 
            VALUES (:idclient, :id_adresse_livraison, :id_adresse_facturation)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':idclient', $idclient, PDO::PARAM_INT);
            $statement->bindParam(':id_adresse_livraison', $id_adresse_livraison, PDO::PARAM_INT);
            $statement->bindParam(':id_adresse_facturation', $id_adresse_facturation, PDO::PARAM_INT);
            $statement->execute();
            $idDerniereCommande = AccesDonnees::getPdo()->lastInsertId();

            foreach ($listArticles as $article) {
                $req = "INSERT INTO lf_ligne_commande_client (commande_client_id, article_id) 
                VALUES (:idDerniereCommande, :article)";
                $statement = AccesDonnees::getPdo()->prepare($req);
                $statement->bindParam(':idDerniereCommande', $idDerniereCommande, PDO::PARAM_INT);
                $statement->bindParam(':article', $article, PDO::PARAM_INT);
                $statement->execute();

                $req = "SELECT quantite_stock FROM lf_articles 
                WHERE id = :article";
                $statement = AccesDonnees::getPdo()->prepare($req);
                $statement->bindParam(':article', $article, PDO::PARAM_INT);
                $statement->execute();
                $quantiteStock = $statement->fetchColumn();

                $quantiteStock--;
                $req = "UPDATE lf_articles SET quantite_stock = :quantiteStock WHERE id = :article";
                $statement = AccesDonnees::getPdo()->prepare($req);
                $statement->bindParam(':quantiteStock', $quantiteStock, PDO::PARAM_INT);
                $statement->bindParam(':article', $article, PDO::PARAM_INT);
                $statement->execute();
            }
            if (isset($_COOKIE['block'])) {
                unset($_COOKIE['block']);
                setcookie('gagne', '', time() - 3600); // définit une date d'expiration passée pour le cookie
            }

            return $idDerniereCommande;
        }
    }


    /**
     * Crée une commande Prorgramer
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $iddernierclient
     * @param $ville_id
     * @param $listArticles
     * @return : id Derniere Commande

     */
    public static function creerCommandeProrgramer($idclient, $date_livraison_progamme, $id_adresse_livraison, $id_adresse_facturation, $listArticles, $commande_cree = false)
    {
        if (!$commande_cree) {
            $req = "INSERT INTO lf_commande_clients (clients_id, date_livraison_progamme, adresses_livraison_id, adresses_facturation_id) 
        VALUES (:idclient, :date_livraison_progamme, :id_adresse_livraison, :id_adresse_facturation)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':idclient', $idclient, PDO::PARAM_INT);
            $statement->bindParam(':date_livraison_progamme', $date_livraison_progamme, PDO::PARAM_STR);
            $statement->bindParam(':id_adresse_livraison', $id_adresse_livraison, PDO::PARAM_INT);
            $statement->bindParam(':id_adresse_facturation', $id_adresse_facturation, PDO::PARAM_INT);
            $statement->execute();
            $idDerniereCommande = AccesDonnees::getPdo()->lastInsertId();

            foreach ($listArticles as $article) {
                $req = "INSERT INTO lf_ligne_commande_client (commande_client_id, article_id) 
            VALUES (:idDerniereCommande, :article)";
                $statement = AccesDonnees::getPdo()->prepare($req);
                $statement->bindParam(':idDerniereCommande', $idDerniereCommande, PDO::PARAM_INT);
                $statement->bindParam(':article', $article, PDO::PARAM_INT);
                $statement->execute();
                $req = "SELECT quantite_stock FROM lf_articles 
                WHERE id = :article";
                $statement = AccesDonnees::getPdo()->prepare($req);
                $statement->bindParam(':article', $article, PDO::PARAM_INT);
                $statement->execute();
                $quantiteStock = $statement->fetchColumn();

                $quantiteStock--;
                $req = "UPDATE lf_articles SET quantite_stock = :quantiteStock WHERE id = :article";
                $statement = AccesDonnees::getPdo()->prepare($req);
                $statement->bindParam(':quantiteStock', $quantiteStock, PDO::PARAM_INT);
                $statement->bindParam(':article', $article, PDO::PARAM_INT);
                $statement->execute();
            }

            if (isset($_COOKIE['block'])) {

                unset($_COOKIE['block']);
                setcookie('gagne', '', time() - 3600); // définit une date d'expiration passée pour le cookie
            }
            return $idDerniereCommande;
        }
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param [chaine] $nom
     * @param [chaine] $prenom
     * @param [chaine] $rue
     * @param [chaine] $complement
     * @param [chaine] $nomFac
     * @param [chaine] $prenomFac
     * @param [chaine] $rueFac
     * @param [chaine] $complementFac
     * @param [chaine] $villeFac
     * @param [chaine] $cpFac
     * @return : array
     */
    public static function estValide($nom, $prenom, $rue, $complement, $nomFac, $prenomFac, $rueFac, $complementFac, $villeFac, $cpFac)

    {
        $erreurs = [];
        if ($nom === "") {
            $erreurs[] = "Il faut saisir le champ nom";
        } else if (!estUntext($nom)) {
            $erreurs[] = "erreur de nom, veuillez saisir du text seulement (accents acceptés)";
        }
        if ($prenom === "") {
            $erreurs[] = "Il faut saisir le champ prenom";
        } else if (!estUntext($prenom)) {
            $erreurs[] = "erreur de prénom, veuillez saisir du text seulement (accents acceptés)";
        }
        if ($rue === "") {
            $erreurs[] = "Il faut saisir le champ rue";
        } else if (!estUntextEtChiffre($rue)) {
            $erreurs[] = "erreur d'adresse, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }
        if ($complement === "") {
            $erreurs[] = "Il faut saisir le champ complement";
        } else if (!estUntextEtChiffre($complement)) {
            $erreurs[] = "erreur de complément d'adresse, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }

        // if ($ville == "") {
        //     $erreurs[] = "Il faut saisir le champ ville";
        // }
        // else if (!estUntextEtChiffre($ville)) {
        //     $erreurs[] = "erreur de ville, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        // }
        // if ($cp == "") {
        //     $erreurs[] = "Il faut saisir le champ Code postal";
        // }
        //  else if (!estUnCp($cp)) {
        //     $erreurs[] = "erreur de code postal";
        // }
        if ($nomFac === "") {
            $erreurs[] = "Il faut saisir le champ nom adresse de facturation";
        } else if (!estUntext($nomFac)) {
            $erreurs[] = "erreur de nom adresse de facturation, veuillez saisir du text seulement (accents acceptés)";
        }
        if ($prenomFac === "") {
            $erreurs[] = "Il faut saisir le champ prenom";
        } else if (!estUntext($prenomFac)) {
            $erreurs[] = "erreur de prénom adresse de facturation, veuillez saisir du text seulement (accents acceptés)";
        }
        if ($rueFac === "") {
            $erreurs[] = "Il faut saisir le champ rue";
        } else if (!estUntextEtChiffre($rueFac)) {
            $erreurs[] = "erreur d'adresse de facturation, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }
        if ($complementFac === "") {
            $erreurs[] = "Il faut saisir le champ complement";
        } else if (!estUntextEtChiffre($complementFac)) {
            $erreurs[] = "erreur de complémentd'adresse de facturation, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }

        if ($villeFac == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        } else if (!estUntextEtChiffre($villeFac)) {
            $erreurs[] = "erreur de ville adresse de facturation, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }
        if ($cpFac == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cpFac)) {
            $erreurs[] = "erreur de code postal adresse de facturation";
        }

        return $erreurs;
    }

    /**
     *    Affiche toutes les informations des articles achetés par un client
     *
     * @param [type] $id_client
     * @return $lesCommandes
     */
    public static function afficherCommandes($id_client)
    {
        $pdo = Accesdonnees::getPdo();
        $stmt = $pdo->prepare(
            "SELECT lf_commande_clients.id, 
            DATE_ADD(lf_commande_clients.commande_le, INTERVAL 2 HOUR) AS plus_2h, 
            
        CONCAT(lf_fleurs.nom_fleur) AS fleur,        
        CONCAT(lf_articles.nombre, ' ', lf_unites.nom_unite) AS detail,        
        lf_articles.prix_unitaire, 
        CONCAT(lf_adresses.rue, ' ', lf_adresses.complement_rue, ' ', lf_code_postaux.code_postal, ' ', lf_villes.nom_ville) AS adresse, 
        lf_commande_clients.etat, 
        lf_gain_loteries.lot
       FROM lf_commande_clients
       JOIN lf_clients ON lf_commande_clients.clients_id = lf_clients.id 
       JOIN lf_ligne_commande_client ON lf_commande_clients.id = lf_ligne_commande_client.commande_client_id
       JOIN lf_articles ON lf_ligne_commande_client.article_id = lf_articles.id
       JOIN lf_fleurs ON lf_articles.fleurs_id = lf_fleurs.id
       JOIN lf_unites ON lf_articles.unites_id = lf_unites.id
       JOIN lf_couleurs ON lf_articles.couleurs_id = lf_couleurs.id
       JOIN lf_adresses ON lf_commande_clients.adresses_livraison_id = lf_adresses.id
       JOIN lf_code_postaux ON lf_adresses.code_postaux_id = lf_code_postaux.id
       JOIN lf_villes ON lf_adresses.villes_id = lf_villes.id
       LEFT JOIN lf_gain_loteries ON lf_commande_clients.gain_loteries_id = lf_gain_loteries.id
            WHERE lf_clients.id = :id_client
            ORDER BY lf_commande_clients.commande_le"
        );
        $stmt->bindParam(":id_client", $id_client);
        $stmt->execute();
        $lesCommandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesCommandes;
    }

    /**
     * Affiche toutes les informations de l'utilisateur pour affichage dans page compte
     *
     * @param [type] $id_utilisateur
     * @return $InfoUtilisateur
     */
    public static function afficherInfoUtilisateur($id_client)
    {
        $pdo = Accesdonnees::getPdo();
        $stmt = $pdo->prepare("SELECT DISTINCT lf_clients.id, lf_clients.nom_client, lf_clients.prenom, 
        lf_clients.pseudo, lf_clients.telephone, lf_clients.email , lf_clients.mot_de_passe, 
         lf_adresses.rue, lf_adresses.complement_rue, lf_code_postaux.code_postal, lf_villes.nom_ville
            FROM lf_clients
            JOIN lf_adresse_client ON lf_clients.id = lf_adresse_client.clients_id
            JOIN lf_adresses ON lf_adresse_client.adresses_id = lf_adresses.id
            JOIN lf_code_postaux ON lf_adresses.code_postaux_id = lf_code_postaux.id
            JOIN lf_villes ON lf_adresses.villes_id = lf_villes.id
            WHERE lf_clients.id = :id_client");

        $stmt->bindParam(":id_client", $id_client);
        $stmt->execute();
        $InfoClients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $InfoClients;
    }

    /**
     * trouve une adresse selon les paramètres passées en arguments
     *
     * @param [chaine] $rue
     * @param [chaine] $complement
     * @param [int] $id_ville
     * @param [int] $id_cp
     * @return void
     */
    public static function trouveAdresse($rue, $complement, $id_ville, $id_cp)
    {
        $req = "SELECT lf_adresses.id FROM lf_adresses
        JOIN lf_code_postaux ON lf_adresses.code_postaux_id = lf_code_postaux.id
        JOIN lf_villes ON lf_adresses.villes_id = lf_villes.id
        WHERE lf_code_postaux.id = :id_cp AND lf_villes.id = :id_ville AND lf_adresses.rue = :rue AND lf_adresses.complement_rue = :complement";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':rue', $rue, PDO::PARAM_STR);
        $statement->bindParam(':complement', $complement, PDO::PARAM_STR);
        $statement->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
        $statement->bindParam(':id_cp', $id_cp, PDO::PARAM_INT);
        $statement->execute();
        $id_adresse = $statement->fetchColumn();

        return $id_adresse;
    }

    /**
     * trouve ou crée une adresse selon les paramètres passées en arguments
     *
     * @param [chaine] $rue
     * @param [chaine] $complement
     * @param [int] $id_ville
     * @param [int] $id_cp
     * @return void
     */
    public static function trouveOuCreerAdresse($rue, $complement, $id_ville, $id_cp)
    {
        $req = "SELECT lf_adresses.id FROM lf_adresses
        JOIN lf_code_postaux ON lf_adresses.code_postaux_id = lf_code_postaux.id
        JOIN lf_villes ON lf_adresses.villes_id = lf_villes.id
        WHERE lf_code_postaux.id = :id_cp AND lf_villes.id = :id_ville AND lf_adresses.rue = :rue AND lf_adresses.complement_rue = :complement";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':rue', $rue, PDO::PARAM_STR);
        $statement->bindParam(':complement', $complement, PDO::PARAM_STR);
        $statement->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
        $statement->bindParam(':id_cp', $id_cp, PDO::PARAM_INT);
        $statement->execute();
        $id_adresse = $statement->fetchColumn();

        if ($id_adresse == false) {
            $req = "INSERT INTO lf_adresses (rue, complement_rue, villes_id, code_postaux_id) 
            VALUES (:rue, :complement, :id_ville, :id_cp)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':rue', $rue, PDO::PARAM_STR);
            $statement->bindParam(':complement', $complement, PDO::PARAM_STR);
            $statement->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
            $statement->bindParam(':id_cp', $id_cp, PDO::PARAM_INT);
            $statement->execute();
            $id_adresse = AccesDonnees::getPdo()->lastInsertId();
        }
        return $id_adresse;
    }
}
