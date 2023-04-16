<section id="connexion">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière">

    <div id="container_connexion">
        <form action="">
            <div>

                <label for="pseudo" class="label_connexion">Pseudo *</label>
                <input type="text" name="pseudo" id="pseudo" class="input_connexion input_identification">
            </div>
            <div>
                <label for="mdp" class="label_connexion">Mot de passe *</label>
                <input type="text" name="mdp" id="mdp" class="input_connexion input_identification">
            </div>
            <button type="submit" id="btn_se_connecter" class="btn_se_connecter">Me connecter</button>
        </form>
    </div>

    <div id="container_inscription">
            <p class="message_inscription">Si vous n'êtes pas encore inscrit, veuillez renseigner le formulaire d'inscription avant de vous connectez</p>
        <div id="container_formaulaire_inscription">
            <div id="container_formaulaire_inscription_left">
                <div>
                    <label for="nom" class="label_connexion">Nom *</label>
                    <input type="nom" name="nom" id="nom" class="input_connexion">
                </div>
                <div>
                    <label for="prenom" class="label_connexion">Prénom *</label>
                    <input type="text" name="prenom" id="prenom" class="input_connexion">
                </div>
                <div>
                    <label for="pseudo" class="label_connexion">Pseudo *</label>
                    <input type="text" name="pseudo" id="pseudo" class="input_connexion">
                </div>
                <div>
                    <label for="mdp" class="label_connexion">Mot de passe *</label>
                    <input type="text" name="mdp" id="mdp" class="input_connexion">
                </div>
                <div>
                    <label for="confirm_mdp" class="label_connexion">Confirmation de Mot de passe *</label>
                    <input type="text" name="confirm_mdp" id="confirm_mdp" class="input_connexion">
                </div>
            </div>
            <div id="container_formaulaire_inscription_right">
                <div>
                    <label for="rue" class="label_connexion">Rue *</label>
                    <input type="text" name="rue" id="rue" class="input_connexion">
                </div>
                <div>
                    <label for="complement" class="label_connexion">Complément </label>
                    <input type="text" name="complement" id="complement" class="input_connexion">
                </div>
                <div>
                    <label for="code_postal" class="label_connexion">Code postal *</label>
                    <input type="text" name="code_postal" id="code_postal" class="input_connexion">
                </div>
                <div>
                    <label for="ville" class="label_connexion">Ville *</label>
                    <input type="text" name="ville" id="ville" class="input_connexion">
                </div>
                <div>
                    <label for="mail" class="label_connexion">E-mail *</label>
                    <input type="text" name="mail" id="mail" class="input_connexion">
                </div>
            </div>
        </div>
        <div classe="container_btn_inscription" style="display: flex;">
            <button type="submit" id="btn_valide_inscription"  class="btn_envoyer">Valider</button>
            <button type="submit" id="btn_annuler_inscription" class="btn_annuler_envoyer">Annuler</button>
        </div>
        <div>
            <p class="mt-3">* Information obligatoire</p>
        </div>

    </div>
</section>