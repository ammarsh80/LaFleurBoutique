<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande
{
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
                return $idDerniereCommande;
            }
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
                return $idDerniereCommande;
            }
        }
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $prenom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : INT
     * @param $mail : chaîne
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
     *    Affiche toutes les informations des jeux achetés par un client
     *
     * @param [type] $id_utilisateur
     * @return $lesCommandes
     */
    public static function afficherCommandes($id_client)
    {
        $pdo = Accesdonnees::getPdo();
        $stmt = $pdo->prepare(
            "SELECT lf_commande_clients.id, lf_commande_clients.commande_le, 
            
CONCAT(lf_fleurs.nom_fleur) AS fleur,        
CONCAT(lf_articles.nombre, ' ', lf_unites.nom_unite) AS detail,        
lf_articles.prix_unitaire, 
CONCAT(lf_adresses.rue, ' ', lf_adresses.complement_rue, ' ', lf_code_postaux.code_postal, ' ', lf_villes.nom_ville) AS adresse, lf_commande_clients.etat
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
     * Affiche toutes les informations de l'utilisateur dans le formulaire de commande
     *
     * @param [type] $moiUtilisateur
     * @return $InfoUtilisateurPourCommander
     */
    public static function infoUtilisateurPourCommander($moiUtilisateur)
    {
        $moiUtilisateur = $_SESSION['id'];
        $pdo = Accesdonnees::getPdo();
        $stmt = $pdo->prepare("SELECT DISTINCT client.nom, client.prenom, client.adresse,  ville.cp, ville.nom_ville, client.email
                FROM utilisateur
                JOIN client
                ON utilisateur.client_id=client.id_client
                JOIN ville
                ON client.ville_id = ville.id_ville
                WHERE utilisateur.id_utilisateur = :id_utilisateur");
        $stmt->bindParam(":id_utilisateur", $moiUtilisateur);
        $stmt->execute();
        $InfoUtilisateurPourCommander = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $InfoUtilisateurPourCommander;
    }

    public static function trouveAdresse($rue, $complement, $id_ville, $id_cp)
    {
        // $pdo = AccesDonnees::getPdo();
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
    public static function trouveOuCreerAdresse($rue, $complement, $id_ville, $id_cp)
    {
        // $pdo = AccesDonnees::getPdo();
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
