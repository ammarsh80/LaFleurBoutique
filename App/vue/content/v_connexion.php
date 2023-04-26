<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section id="connexion">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière">
<div class="message">Entrez correctement votre identifiant et votre mot de passe ou veuillez renseigner le formulaire d'inscription avant de vous connectez</div>
    <div id="container_connexion">
        <form action="index.php?page=v_connexion&uc=inscription&action=loginClient" method="POST">

            <div>
                <label for="identifiant" class="label_connexion">Pseudo *</label>
                <input type="text" name="identifiant" id="identifiant" class="input_connexion input_identification" required>
            </div>
            <div>
                <label for="mot_de_passe" class="label_connexion">Mot de passe *</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" class="input_connexion input_identification" required>
            </div>
            <button type="submit" id="btn_se_connecter" class="btn_se_connecter">Me connecter</button>
        </form>
    </div>

    <div id="container_inscription">
        <p class="message_inscription">Si vous n'êtes pas encore inscrit, veuillez renseigner le formulaire d'inscription avant de vous connectez</p>

        <form class="container_formaulaire_inscription" method="POST" action="index.php?page=v_connexion&uc=inscription&action=confirmerInscription">
            <div id="container_formaulaire_inscription_left">
                <div>
                    <label for="nom" class="label_connexion">Nom *</label>
                    <input type="nom" name="nom" id="nom" class="input_connexion" required>
                </div>
                <div>
                    <label for="prenom" class="label_connexion">Prénom *</label>
                    <input type="text" name="prenom" id="prenom" class="input_connexion" required>
                </div>
                <div>
                    <label for="pseudo" class="label_connexion">Pseudo *</label>
                    <input type="text" name="pseudo" id="pseudo" class="input_connexion" required>
                </div>
                <div>
                    <label for="psw" class="label_connexion">Mot de passe *</label>
                    <input type="password" name="psw" id="psw" class="input_connexion" placeholder="8 caractères Aa1)" required>
                </div>
                <div>
                    <label for="confirm_psw" class="label_connexion">Confirmation de Mot de passe *</label>
                    <input type="password" name="confirm_psw" id="confirm_psw" class="input_connexion" placeholder="8 caractères Aa1)" required>
                </div>
            </div>
            <div id="container_formaulaire_inscription_right">
                <div>
                    <label for="rue" class="label_connexion">Rue *</label>
                    <input type="text" name="rue" id="rue" class="input_connexion" required>
                </div>
                <div>
                    <label for="complement" class="label_connexion">Complément </label>
                    <input type="text" name="complement" id="complement" class="input_connexion" required>
                </div>
                <div>
                    <label for="ville" class="label_connexion">Ville *</label>
                    <input type="text" name="ville" id="ville" class="input_connexion" required>
                </div>
                <div>
                    <label for="cp" class="label_connexion">Code postal *</label>
                    <input type="text" name="cp" id="cp" class="input_connexion" required>
                </div>

                <div>
                    <label for="mail" class="label_connexion">E-mail *</label>
                    <input type="text" name="mail" id="mail" class="input_connexion" required>
                </div>

                <div class="d-flex">
                    <label for="telephone" class="label_connexion">Téléphone *</label>
                    <input type="text" name="telephone" id="telephone" class="input_connexion" placeholder="0630303030" maxlength="10" size="10" required>
                </div>
            </div>

            <div class="container_btn_inscription" style="display: flex;">
                <button type="submit" id="btn_valide_inscription" class="btn_envoyer">Valider</button>
                <button type="reset" id="btn_annuler_inscription" class="btn_annuler_envoyer">Annuler</button>
            </div>
        </form>
        <div>
            <p class="mt-3">* Information obligatoire</p>
        </div>
    </div>
</section>
</body>
</html>