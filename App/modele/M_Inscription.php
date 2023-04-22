<?php

class M_Inscription
{

    /**
     * Fonction qui vérifie que l'identification saisie est correcte.
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
     * enregister un utilisateur (mot de passe cripté)
     *
     * @param String $pseudo
     * @param String $psw
     * @return boolean
     */
    function register(String $pseudo, String $psw): bool
    {
        $conn = AccesDonnees::getPdo();
        $psw = password_hash($psw, PASSWORD_BCRYPT);
        $sql = "INSERT INTO utilisateur (identifiant, mot_de_passe)
        VALUES(:pseudo, :psw);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":pseudo", $pseudo);
        $stmt->bindParam(":psw", $psw);
        return $stmt->execute();
    }

    /**
     * vérifie le mdp pour la connexion
     *
     * @param String $pseudo
     * @param String $psw
     * @return boolean
     */
    public static function checkPassword(String $pseudo, String $psw)
    {
        $conn = AccesDonnees::getPdo();
        $sql = "SELECT lf_clients.id, lf_clients.mot_de_passe, lf_clients.pseudo FROM lf_clients 
        WHERE lf_clients.pseudo = :pseudo";
        // prepare and bind
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":pseudo", $pseudo);
        // Exécution
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch();
            $psw_bdd = $data['mot_de_passe'];
            // Le reste du code ici
        }
        if ($stmt->rowCount() == 0) {
           
            header('Location: index.php?page=v_connexion');
            afficheMessage("L'identifiant ou le mot de passe est incorrecte, Entrez votre identifiant et votre mot de passe Correctement ou enregistrez-vous sur la page 'S'inscrire', merci !");
            die;
        }

        if (password_verify($psw, $psw_bdd)) {
            $id_clients = $data['id'];
            $identifiant = $data['pseudo'];
            // header('Location: index.php?page=v_compte');
            // echo "Bonjour " . "$identifiant" . " vous êtes connecté";
            // afficheMessageConnexion("Bonjour " . "$identifiant" . " vous êtes connecté");
            return $id_clients;
        }

        return false;
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
    public static function estValideInscription($nom, $prenom, $pseudo, $psw, $confirm_psw, $rue, $ville, $cp, $mail, $telephone)
    {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }

        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prénom";
        }
        if ($pseudo == "") {
            $erreurs[] = "Il faut saisir le champ pseudo";
        }
        if ($psw == "") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
        } else if (!estUnPwd($psw)) {
            $erreurs[] = "Votre mot de passe doit contenir au moins 8 caractères dont: 1 lettre, 1 chiffre et 1 caractère spécial";
        }
        if ($confirm_psw == "") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
        } 
       
        else if ($confirm_psw !== $psw) {
            $erreurs[] = "Le mot de passe et sa confirmation doivent être indentiques ";
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
        } 
        else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        if ($telephone == "") {
            $erreurs[] = "Il faut saisir le champ téléphone";
        } 
        return $erreurs;
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
    public static function estValideContact($nom, $prenom, $mail, $message_contacte)
    {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }

        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prénom";
        }
        
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } 
        else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        if ($message_contacte == "") {
            $erreurs[] = "Veuillez  saisir votre message";
        } 
        return $erreurs;
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
    public static function estValideIdentifiant($identifiant, $mot_de_passe)
    {
       
        $erreurs = [];
        if ($identifiant == "t") {
            $erreurs[] = "Il faut saisir le pseudo";
        }
      
        if ($mot_de_passe == "t") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
           
            
        }
        
        // if ($mail == "") {
        //     $erreurs[] = "Il faut saisir le champ mail";
        // } 
        // else if (!estUnMail($mail)) {
        //     $erreurs[] = "erreur de mail";
        // }
     
        
        return $erreurs;
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
     * trouve ou creer une ville
     *
     * @param [chaîne] $ville
     * @param [INT] $cp
     * @return :$id_ville
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

    public static function trouveOuCreerCp($cp)
    {
        // $pdo = AccesDonnees::getPdo();
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
     * @param [chaîne] $nom
     * @param [chaîne] $prenom
     * @param [chaîne] $adresse
     * @param [chaîne] $email
     * @param [INT] $ville_id
     * @return :$idclient
     */
    public static function trouveOuCreerClient($nom, $prenom, $pseudo, $telephone, $mail, $psw, $adresses_id)
    {

        $pdo = AccesDonnees::getPdo();
        $req = "SELECT lf_clients.id FROM lf_clients WHERE nom_client = :nom AND prenom = :prenom AND pseudo = :pseudo AND telephone = :telephone AND email = :mail AND mot_de_passe = :psw";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
        $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $statement->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        $statement->bindParam(':mail', $mail, PDO::PARAM_STR);
        $statement->bindParam(':psw', $psw, PDO::PARAM_STR);
        $statement->execute();
        $id_client = $statement->fetchColumn();
        if ($id_client == false) {
            $psw = password_hash($psw, PASSWORD_BCRYPT);

            $req = "INSERT INTO lf_clients (nom_client, prenom, pseudo, telephone, email, mot_de_passe) VALUES (:nom,:prenom,:pseudo,:telephone,:mail, :psw)";
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

            $req = "INSERT INTO lf_adresse_client (clients_id, adresses_id) VALUES (:id_client,:adresses_id)";
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
     * creer un nouveau utilisateur
     *
     * @param [chaîne] $pseudo
     * @param [chaîne] $psw
     * @return void
     */
    public static function creerUtilisateur($pseudo, $psw, $id_client)
    {

        $pdo = AccesDonnees::getPdo();
        $req = "SELECT id_utilisateur FROM utilisateur WHERE identifiant = :pseudo";
        $statement = AccesDonnees::getPdo()->prepare($req);
        $statement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $statement->execute();
        $id_Utilisateur = $statement->fetchColumn();

        if ($id_Utilisateur == false) {
            $psw = password_hash($psw, PASSWORD_BCRYPT);
            $req = "INSERT INTO utilisateur (identifiant, mot_de_passe, client_id) VALUES (:pseudo,:psw, :client_id)";
            $statement = AccesDonnees::getPdo()->prepare($req);
            $statement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $statement->bindParam(':psw', $psw, PDO::PARAM_STR);
            $statement->bindParam(':client_id', $id_client, PDO::PARAM_INT);
            $statement->execute();
            $id_Utilisateur = $statement->fetchColumn();
            $id_Utilisateur = $pdo->lastInsertId();
        }
        return $id_Utilisateur;
    }

    public static function changerInfoClient($id_client, $adresse,$complement, $mail, $telephone, $new_ville_id, $new_cp_id)
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

    public static function estProfilValide($rue,  $mail)
    {
        $erreurs = [];

        if ($rue == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } 
        // else if (!estUnMail($mail)) {
        //     $erreurs[] = "erreur de 1111mail";
        // }
        return $erreurs;
    }

    /**
     * cherche le client dont l'id = l'id utilisateur
     *
     * @param [type] $id_client
     * @return $client
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
