<?php

/**requettes pour inscription et vérifications si les paramètres passées en arguments sont valides 
 *  @author Ammar SHIHAN
 */
class M_Inscription
{

    /**
     *Fonction qui vérifie que l'identification saisie est correcte.

     *
     * @param [int] $identifiant
     * @param [int] $mot_de_passe
     * @return boolean
     */
    function utilisateur_existe($identifiant, $mot_de_passe): bool
    {
        $conn = AccesDonnees::getPdo();
        $sql = 'SELECT 1 FROM utilisateur ';
        $sql .= 'WHERE identifiant = :login AND mot_de_passe = :mdp';
        // prepare and bind
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":login", $identifiant);
        $stmt->bindParam(":mdp", $mot_de_passe);
        // Exécution
        $stmt->execute();
        // L'identification est bonne si la requête a retourné
        // une ligne (l'utilisateur existe et le mot de passe
        // est bon).
        // Si c'est le cas $existe contient 1, sinon elle est
        // vide. Il suffit de la retourner en tant que booléen.
        if ($stmt->rowCount() > 0) {
            // ok, il existe
            $existe = true;
        } else {
            $existe = false;
        }
        return (bool) $existe;
    }

    /**
     * vérifie le mot de passe et le pseudo pour la connexion
     *
     * @param String $pseudo
     * @param String $psw
     * @return boolean
     */
    public static function checkPassword(String $pseudo, String $psw)
    {
        $conn = AccesDonnees::getPdo();
        $sql = "SELECT lf_clients.id, lf_clients.mot_de_passe, lf_clients.pseudo 
        FROM lf_clients 
        WHERE lf_clients.pseudo = :pseudo";
        // prepare and bind
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":pseudo", $pseudo);
        // Exécution
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch();
            $psw_bdd = $data['mot_de_passe'];
        }
        if ($stmt->rowCount() == 0) {
            header('Location: index.php?page=v_connexion');
            afficheMessage("Entrez correctement votre identifiant et votre mot de passe 
            ou veuillez renseigner le formulaire d'inscription avant de vous connectez");
            die;
        }
        if (password_verify($psw, $psw_bdd)) {
            $id_clients = $data['id'];
            $identifiant = $data['pseudo'];
            return $id_clients;
        }
        return false;
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a *
     * @param [chaine] $nom
     * @param [chaine] $prenom
     * @param [chaine] $pseudo
     * @param [chaine] $psw
     * @param [chaine] $confirm_psw
     * @param [chaine] $rue
     * @param [chaine] $complement
     * @param [chaine] $ville
     * @param [int] $cp
     * @param [chaine] $mail
     * @param [int] $telephone
     * @return : array
     */
    public static function estValideInscription($nom, $prenom, $pseudo, $psw, $confirm_psw, $rue, $complement, $ville, $cp, $mail, $telephone)
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

        if ($pseudo === "") {
            $erreurs[] = "Il faut saisir le champ pseudo";
        } else if (!estUnPseudo($pseudo)) {
            $erreurs[] = "erreur de pseudo, 40 caractères maximume (sont acceptés, majuscules, miniscules et chiffres)";
        }


        if ($psw == "") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
        } else if (!estUnPwd($psw)) {
            $erreurs[] = "Votre mot de passe doit contenir (8 à 14) caractères dont: 1 lettre majuscule, 1 lettre minuscule, 1 chiffre et 1 caractère spécial";
        }
        if ($confirm_psw == "") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
        } else if ($confirm_psw !== $psw) {
            $erreurs[] = "Le mot de passe et sa confirmation doivent être indentiques ";
        }
        if ($rue === "") {
            $erreurs[] = "Il faut saisir le champ adresse";
        } else if (!estUntextEtChiffre($rue)) {
            $erreurs[] = "erreur d'adresse, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }
        if (!estUntextEtChiffre($complement)) {
            $erreurs[] = "erreur de complement d'adresse, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        } else if (!estUntextEtChiffre($ville)) {
            $erreurs[] = "erreur de ville, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
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
        if ($telephone == "") {
            $erreurs[] = "Il faut saisir le champ telephone";
        } else if (!estTelephone($telephone)) {
            $erreurs[] = "erreur de telephone, veuillez saisir des chiffres entiers";
        }
        return $erreurs;
    }



    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param [type] $nom
     * @param [type] $prenom
     * @param [type] $mail
     * @param [type] $message_contacte
     * @return : array
     */
    public static function estValideContact($nom, $prenom, $mail, $message_contacte)
    {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        } else if (!estUntext($nom)) {
            $erreurs[] = "erreur de nom, veuillez saisir du text seulement (accents acceptés)";
        }

        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prénom";
        } else if (!estUntext($prenom)) {
            $erreurs[] = "erreur de prenom, veuillez saisir du text seulement (accents acceptés)";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        if ($message_contacte == "") {
            $erreurs[] = "Veuillez saisir votre message";
        } else if (!estUntextEtChiffre($message_contacte)) {
            $erreurs[] = "erreur de message, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }
        return $erreurs;
    }


    /**
     *     Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param [chaine] $propritaire
     * @param [int] $carte
     * @param [int] $expiration
     * @param [int] $crypto
     * @return : array
     */
    public static function estValideCarte($propritaire, $carte, $expiration, $crypto)
    {
        $erreurs = [];
        if ($propritaire === "") {
            $erreurs[] = "Il faut saisir le champ Nom de propritaire";
        } else if (!estUntext($propritaire)) {
            $erreurs[] = "erreur de Nom de propritaire, veuillez saisir du text seulement (accents acceptés)";
        }

        if ($carte == "") {
            $erreurs[] = "Il faut saisir le champ Numéro de carte";
        } else if (!estEntierCarte($carte)) {
            $erreurs[] = "erreur de Numéro de carte";
        }
        if ($expiration == "") {
            $erreurs[] = "Il faut saisir le champ Date d'expiration ";
        } else if (!estDateExpiration($expiration)) {
            $erreurs[] = "erreur de Date d'expiration ";
        }
        if ($crypto == "") {
            $erreurs[] = "Il faut saisir le champ Cryptogramme  ";
        } else if (!estCrypto($crypto)) {
            $erreurs[] = "erreur de Cryptogramme  ";
        }

        return $erreurs;
    }
    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a *
     * @param [chaine] $identifiant
     * @param [chaine] $mot_de_passe
     * @return : array
     */
    public static function estValideIdentifiant($identifiant, $mot_de_passe)
    {

        $erreurs = [];
        if ($identifiant == "") {
            $erreurs[] = "Il faut saisir le pseudo";
        } else if (!estUnPseudo($identifiant)) {
            $erreurs[] = "erreur de pseudo";
        }
        if ($mot_de_passe == "") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
        } else if (!estUnPwd($mot_de_passe)) {
            $erreurs[] = "erreur de mot de passe";
        }
        return $erreurs;
    }


    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a *
     * @param [type] $recherche_mot
     * @return : array
     */
    public static function estValideMot($recherche_mot)
    {
        $erreurs = [];
        if (!estUnMot($recherche_mot)) {
            $erreurs[] = "Veuillez saisir du texte en lettre majuscule au miniscule";
            header('location: index.php?page=v_accueil&action=voirArticlesAccueil');
        }

        return $erreurs;
    }

    /**
     * trouve id d'une ville
     *
     * @param [chaine] $ville
     * @return : id_ville
     */
    public static function trouveVille($ville)
    {
        $req = "SELECT lf_villes.id FROM lf_villes WHERE nom_ville = :ville";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
        $statement->execute();
        $id_ville = $statement->fetchColumn();
        return $id_ville;
    }
    /**
     * trouve ou creer une ville
     *
     * @param [chaine] $ville
     * @return : id_ville
     */
    public static function trouveOuCreerVille($ville)
    {
        // $pdo = AccesDonnees::getPdo();
        $req = "SELECT lf_villes.id FROM lf_villes WHERE nom_ville = :ville";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
        $statement->execute();
        $id_ville = $statement->fetchColumn();

        if ($id_ville == false) {
            $req = "INSERT INTO lf_villes (nom_ville) VALUES (:ville)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
            $statement->execute();
            $id_ville = AccesDonnees::getPdo()->lastInsertId();
        }
        return $id_ville;
    }


    /**
     * trouve code postal
     *
     * @param [int] $cp
     * @return : id_cp
     */
    public static function trouveCp($cp)
    {
        $req = "SELECT lf_code_postaux.id FROM lf_code_postaux WHERE code_postal = :cp";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':cp', $cp, PDO::PARAM_INT);
        $statement->execute();
        $id_cp = $statement->fetchColumn();
        return $id_cp;
    }

    /**
     * trouve ou crée code postal
     *
     * @param [int] $cp
     * @return : id_cp
     */
    public static function trouveOuCreerCp($cp)
    {
        $req = "SELECT lf_code_postaux.id FROM lf_code_postaux WHERE code_postal = :cp";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':cp', $cp, PDO::PARAM_INT);
        $statement->execute();
        $id_cp = $statement->fetchColumn();

        if ($id_cp == false) {
            $req = "INSERT INTO lf_code_postaux (code_postal) VALUES (:cp)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':cp', $cp, PDO::PARAM_INT);
            $statement->execute();
            $id_cp = AccesDonnees::getPdo()->lastInsertId();
        }
        return $id_cp;
    }

    /**
     * crée un nouveau client
     *
     * @param [chaine] $nom
     * @param [chaine] $prenom
     * @param [chaine] $pseudo
     * @param [int] $telephone
     * @param [chaine] $mail
     * @param [chiane] $psw
     * @param [int] $adresses_id
     * @return : id_client
     */
    public static function trouveOuCreerClient($nom, $prenom, $pseudo, $telephone, $mail, $psw, $adresses_id)
    {
        $pdo = AccesDonnees::getPdo();
        $req = "SELECT lf_clients.id FROM lf_clients WHERE pseudo = :pseudo AND email = :mail";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $statement->bindParam(':mail', $mail, PDO::PARAM_STR);
        $statement->execute();
        $id_client = $statement->fetchColumn();
        if ($id_client == true) {
            afficheErreur('Client (E-mail et pseudo) est déjà enregistré, 
            veuillez vous connecter à votre compte !!');
            return $id_client;
        } else if ($id_client == false) {
            $psw = password_hash($psw, PASSWORD_BCRYPT);
            $req = "INSERT INTO lf_clients (nom_client, prenom, pseudo, telephone, email, mot_de_passe) 
            VALUES (:nom,:prenom,:pseudo,:telephone,:mail, :psw)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $statement->bindParam(':telephone', $telephone, PDO::PARAM_STR);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR);
            $statement->bindParam(':psw', $psw, PDO::PARAM_STR);
            $statement->execute();
            $id_client = $statement->fetchColumn();
            $id_client = $pdo->lastInsertId();
            $req = "INSERT INTO lf_adresse_client (clients_id, adresses_id) 
            VALUES (:id_client,:adresses_id)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':id_client', $id_client, PDO::PARAM_INT);
            $statement->bindParam(':adresses_id', $adresses_id, PDO::PARAM_INT);
            $statement->execute();
            $adresses_id = $statement->fetchColumn();
            $adresses_id = $pdo->lastInsertId();
        }
        return $id_client;
    }

    /**
     * après vérification Modifie info personnelles du client selon paramètrtes passées en argument
     *
     * @param [int] $id_client
     * @param [chaine] $adresse
     * @param [chaine] $complement
     * @param [chaine] $mail
     * @param [int] $telephone
     * @param [int] $new_ville_id
     * @param [int] $new_cp_id
     * @return void
     */
    public static function changerInfoClient($id_client, $adresse, $complement, $mail, $telephone, $new_ville_id, $new_cp_id)
    {
        $erreurs = M_Inscription::estProfilValide($adresse, $mail);
        if (count($erreurs) > 0) {
            return $erreurs;
        }
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("UPDATE lf_clients 
        SET email = :mail, telephone = :telephone 
        WHERE lf_clients.id = :id_client");

        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":telephone", $telephone);
        $stmt->bindParam(":id_client", $id_client);
        $stmt->execute();

        $stmt2 = $pdo->prepare("UPDATE lf_adresses 
        JOIN lf_adresse_client ON lf_adresses.id = lf_adresse_client.adresses_id
        JOIN lf_clients ON lf_adresse_client.clients_id = lf_clients.id
        JOIN lf_code_postaux ON lf_adresses.code_postaux_id = lf_code_postaux.id
        JOIN lf_villes ON lf_adresses.villes_id = lf_villes.id
        SET rue = :adresse, complement_rue = :complement, villes_id = :new_ville_id, code_postaux_id = :new_cp_id 
        WHERE lf_clients.id = :id_client");
        $stmt2->bindParam(":adresse", $adresse);
        $stmt2->bindParam(":complement", $complement);
        $stmt2->bindParam(":new_ville_id", $new_ville_id);
        $stmt2->bindParam(":new_cp_id", $new_cp_id);
        $stmt2->bindParam(":id_client", $id_client);
        $stmt2->execute();
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a *
     * @param [chaine] $rue
     * @param [chaine] $mail
     * @return : array
     */
    public static function estProfilValide($rue,  $mail)
    {
        $erreurs = [];

        if ($rue === "") {
            $erreurs[] = "Il faut saisir le champ adresse";
        } else if (!estUntextEtChiffre($rue)) {
            $erreurs[] = "erreur d'adresse, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }

        return $erreurs;
    }

    /**
     * cherche le client selon paramètre (id) passé en argument 
     *
     * @param [type] $id_client
     * @return : array
     */
    public static function trouverClientParId($id_client)
    {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM lf_clients WHERE lf_clients.id = :id_client");
        $stmt->bindParam(":id_client", $id_client);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        return $client;
    }
}
