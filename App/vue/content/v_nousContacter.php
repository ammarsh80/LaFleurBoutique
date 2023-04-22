<section id="connexion">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière">


    <div id="container_inscription" class="container_contacte">
        <p class="message_inscription">Veuillez renseigner le formulaire de contacte</p>
        <form action="index.php?page=v_nousContacter&uc=contacte&action=nousContacter" id="formulaire_contact" method="POST">
            <div id="container_formaulaire_inscription">
                <div id="container_formaulaire_inscription_left">

                    <?php
                    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                    ?>
                        <div>
                            <label for="nom" class="label_connexion">Nom *</label>
                            <input type="nom" name="nom" id="nom" class="input_connexion" value="<?php echo $InfoUtilisateur[0]['nom_client'] ?>">
                        </div>
                        <div>
                            <label for="prenom" class="label_connexion">Prénom *</label>
                            <input type="text" name="prenom" id="prenom" class="input_connexion" value="<?php echo $InfoUtilisateur[0]['prenom'] ?>">
                        </div>

                        <div>
                            <label for="mail" class="label_connexion">E-mail *</label>
                            <input type="text" name="mail" id="mail" class="input_connexion" value="<?php echo $InfoUtilisateur[0]['email'] ?>">
                        </div>
                        <div>

                        <?php
                    }
                        ?>
                        <?php
                        if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
                        ?>
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

                        <?php
                        }
                        ?>
                        <div>
                            <p class="test">* Information obligatoire</p>
                        </div>
                        </div>

                </div>
                <div class="message_contacte">

                    <label for="message_contacte" class="message_contacte_label">Votre message: *</label>
                    <textarea id="message_contacte" name="message_contacte" rows="5" cols="10" maxlength="1000"></textarea>

                    <div id="container_btn_contacte">
                        <button type="submit" id="btn_envoyer" class="btn_envoyer">Envoyer</button>
                        <button type="reset" id="btn_annuler_envoyer" class="btn_annuler_envoyer">Annuler</button>
                    </div>
                </div>
        </form>

    </div>
</section>