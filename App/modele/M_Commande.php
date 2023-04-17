<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande
{

    /**
     * Crée une commande
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $iddernierclient
     * @param $ville_id
     * @param $listJeux
     */
    public static function creerCommande($iddernierclient, $ville_id, $listJeux)
    {
        $req = "INSERT INTO commande (client_id, ville_id) VALUES (:iddernierclient, :ville_id)";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':iddernierclient', $iddernierclient, PDO::PARAM_INT);
        $statement->bindParam(':ville_id', $ville_id, PDO::PARAM_INT);
        $statement->execute();
        $idDerniereCommande = AccesDonnees::getPdo()->lastInsertId();

        foreach ($listJeux as $jeu) {
            $req = "INSERT INTO ligne_commande (commande_id, exemplaire_id) 
            VALUES (:idDerniereCommande, :jeu)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':idDerniereCommande', $idDerniereCommande, PDO::PARAM_INT);
            $statement->bindParam(':jeu', $jeu, PDO::PARAM_INT);
            $statement->execute();
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
    public static function estValide($nom, $prenom, $rue, $ville, $cp, $mail)
    {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($rue == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }


    /**
     * trouve ou creer une ville
     *
     * @param [chaîne] $ville
     * @param [INT] $cp
     * @return :$id_ville
     */
    public static function trouveOuCreerVille($ville, $cp)
    {
        $pdo = AccesDonnees::getPdo();
        $req = "SELECT ville.id_ville FROM ville WHERE nom_ville = :ville AND cp= :cp";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
        $statement->bindParam(':cp', $cp, PDO::PARAM_INT);
        $statement->execute();
        $id_ville = $statement->fetchColumn();

        if ($id_ville == false) {
            $req = "INSERT INTO ville (nom_ville, cp) VALUES (:ville,:cp)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
            $statement->bindParam(':cp', $cp, PDO::PARAM_INT);
            $statement->execute();
            $id_ville = AccesDonnees::getPdo()->lastInsertId();
        }
        return $id_ville;
    }

    /**
     * crée un nouveau client
     *
     * @param [chaîne] $nom
     * @param [chaîne] $prenom
     * @param [chaîne] $adresse
     * @param [chaîne] $email
     * @param [INT] $ville_id
     * @return :$idclient
     */
    public static function trouveOuCreerClient($nom, $prenom, $adresse, $email, $ville_id)
    {

        $pdo = AccesDonnees::getPdo();
        $req = "SELECT id_client FROM client WHERE nom = :nom AND prenom = :prenom AND adresse = :adresse AND email = :email AND ville_id = :ville_id";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
        $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':ville_id', $ville_id, PDO::PARAM_INT);
        $statement->execute();
        $id_client = $statement->fetchColumn();
        if ($id_client == false) {
            $req = "INSERT INTO client (nom, prenom, adresse, email, ville_id) VALUES (:nom,:prenom,:adresse,:email,:ville_id)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':ville_id', $ville_id, PDO::PARAM_INT);
            $statement->execute();
            $id_client = $statement->fetchColumn();
            $id_client = $pdo->lastInsertId();
        }
        return $id_client;
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
            "SELECT lf_commande_clients.id, lf_commande_clients.etat, lf_commande_clients.commande_le, lf_fleurs.nom_fleur,
            lf_couleurs.couleur, lf_unites.nom_unite, lf_unites.taille, lf_articles.nombre,
        lf_articles.prix_unitaire, lf_adresses.rue, lf_adresses.complement_rue, lf_code_postaux.code_postal, lf_villes.nom_ville
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
            ORDER BY lf_commande_clients.id"
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
}
