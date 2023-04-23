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

                // Récupérer les valeurs des inputs du formulaire
                // $nom = filter_input(INPUT_POST, 'nom');
                // $prenom = filter_input(INPUT_POST, 'prenom');
                // $mail = filter_input(INPUT_POST, 'mail');
                // $message_contacte = filter_input(INPUT_POST, 'message_contacte');




                // // Paramètres SMTP
                // $smtp_server = 'tls://smtp.yahoo.com'; // ou 'tls://smtp.gmail.com' si vous utilisez TLS
                // $smtp_port = 587; // ou 587 si vous utilisez TLS
                // $smtp_username = 'ammarsh80@yahoo.com'; // votre adresse Gmail
                // $smtp_password = 'ADi(18048124'; // votre mot de passe Gmail

                // // Adresse email de l'expéditeur
                // $from = $mail;

                // // Adresse email du destinataire
                // $to = 'ammarsh80@yahoo.com';

                // // Sujet du message
                // $subject = 'Message de ' . $nom . ' ' . $prenom;

                // // Corps du message
                // $body = 'De: ' . $nom . ' ' . $prenom . ' (' . $mail . ')' . "\r\n\r\n" . $message_contacte;

                // // En-têtes du message
                // $headers = "From: $from" . "\r\n" . "Reply-To: $mail" . "\r\n" . "X-Mailer: PHP/" . phpversion();

                // // Configuration du protocole SMTP
                // ini_set('SMTP', $smtp_server);
                // ini_set('smtp_port', $smtp_port);
                // ini_set('username', $smtp_username);
                // ini_set('password', $smtp_password);



                // Préparation des informations de l'email
                $to = 'ammarsh80@hotmail.com';
                $subject = 'Envoi depuis page Contact';
                $message = '<h1>Message envoyé depuis la page Contact de monsite.fr</h1>
                <p><b>Nom : </b>' . htmlspecialchars($_POST['nom']) . '<br>
                <p><b>Prenom : </b>' . htmlspecialchars($_POST['prenom']) . '<br>
                <b>Email : </b>' . htmlspecialchars($_POST['mail']) . '<br>
                <b>Message : </b>' . htmlspecialchars($_POST['message_contacte']) . '</p>';
                $headers = "From: webmaster@monsite.fr\r\n";
                $headers .= "Reply-To: " . $_POST['mail'] . "\r\n";
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
