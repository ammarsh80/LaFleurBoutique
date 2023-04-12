<section id="connexion">
    <img class="banniere_accueil" src="./public/assets/img/baniere.jpg" alt="panier de courses">


    <div id="container_inscription" class="container_contacte">
        <p class="message_inscription">Si vous n'êtes pas encore inscrit, veuillez renseigner le formulaire d'inscription avant de vous connectez</p>
        <form action="" id="formulaire_contact">
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
                        <label for="mail" class="label_connexion">E-mail *</label>
                        <input type="text" name="mail" id="mail" class="input_connexion">
                    </div>
                    <div>
                        <p class="test">* Information obligatoire</p>
                    </div>
                </div>

            </div>
            <div class="message_contacte">

                <label for="message_contacte" class="message_contacte_label">Votre message: *</label>
                <textarea id="message_contacte" name="message_contacte" rows="5" cols="50" maxlength="1000"></textarea>

                <div id="container_btn_contacte">
                    <button type="submit" id="btn_envoyer" class="btn_envoyer">Envoyer</button>
                    <button type="submit" id="btn_annuler_envoyer" class="btn_annuler_envoyer">Annuler</button>
                </div>
            </div>
        </form>

    </div>
</section>