<?php

include_once "./App/modele/M_Inscription.php";

/**
 * Controleur pour les inscriptions
 * @author AS
 */
switch ($action) {

    case 'nousContacter':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les valeurs des inputs
            $nom = filter_input(INPUT_POST, 'nom');
            $prenom = filter_input(INPUT_POST, 'prenom');
            $mail = filter_input(INPUT_POST, 'mail');
            $message_contacte = filter_input(INPUT_POST, 'message_contacte');

            $errors = M_Inscription::estValideContact($nom, $prenom, $mail, $message_contacte);
            if (count($errors) > 0) {
                // Si une erreur, on recommence
                afficheErreurs($errors);
            } else {
                // Préparation des informations de l'email
                $to = 'ammarsh80@hotmail.com';
                $subject = 'Envoi depuis page Contact';
                $message = '<h1 style="font-size:1.2em; color:green;">Message envoyé depuis la page Contact de Lafleur.fr</h1>
                <p><b>Nom : </b>' . htmlspecialchars($nom) . '<br>
                <p><b>Prenom : </b>' . htmlspecialchars($prenom) . '<br>
                <b>Email : </b>' . htmlspecialchars($mail) . '<br>
                <b>Message : </b>' . htmlspecialchars($message_contacte) . '</p>';
                $headers = "From: webmaster@monsite.fr\r\n";
                $headers .= "Reply-To: " . $mail . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                // Envoi du message
                if (mail($to, $subject, $message, $headers)) {
                    afficheMessage("Votre message a été envoyé avec succès !");
                } else {
                    afficheMessage("Une erreur est survenue lors de l'envoi du message.");
                }
            }
            break;
        }
    default:
        break;
}
