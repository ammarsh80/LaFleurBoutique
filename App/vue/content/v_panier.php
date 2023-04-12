<section id="panier">
    <img class="banniere_accueil" src="./public/assets/img/baniere.jpg" alt="panier de courses">

    <div id="container_panier">
        <p class="titres_compte valide_panier">Je valide mon panier</p>
        <div id="valide_mon_panier">

            <div class="valide_articles">
                <div id="container_article">
                    <img src="./public/assets/img/naissance/naissance1.jpg" alt="bouquet de fleurs pour une naissance">
                    <div id="description_article">
                        <p>Bouquet de Lys Oriental</p>
                        <div id="prix_panier">
                            <p>39.00 &euro;</p>
                        </div>
                    </div>
                </div>

                <div id="container_article">
                    <img src="./public/assets/img/fleur_3.jpg" alt="bouquet de fleurs pour une naissance">
                    <div id="description_article">
                        <p>Bouquet de Lys Oriental</p>
                        <div id="prix_panier">
                            <p>39.00 &euro;</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container_paiement">
                <p>Veuillez renseigner une adresse de livraison</p>
                <div class="mb-5">
                    <div>
                        <label for="mail" class="label_connexion fw-bold">Mme / M : </label>
                        <input type="text" name="mail" id="mail" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="adresse" class="label_connexion fw-bold">Adresse: </label>
                        <input type="text" name="adresse" id="adresse" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="ville" class="label_connexion fw-bold">Ville: </label>
                        <input type="text" name="ville" id="ville" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="cp" class="label_connexion fw-bold">Code postal: </label>
                        <input type="text" name="cp" id="cp" class="input_connexion modifier_info_input">
                    </div>

                    <div id="container_btn_inscription">
                        <button type="submit" id="btn_valide_inscription" class="btn_se_connecter">Valider</button>
                        <button type="submit" id="btn_annuler_inscription" class="btn_se_connecter">Annuler</button>
                    </div>
                </div>


                <div class="mb-5">
                    <p class="adresse_facturation">Adresse de facturation</p>

                    <div>
                        <label for="identite" class="label_connexion fw-bold">Mme / M : </label>
                        <input type="text" name="identite" id="identite" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="adresse" class="label_connexion fw-bold">Adresse: </label>
                        <input type="text" name="adresse" id="adresse" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="ville" class="label_connexion fw-bold">Ville: </label>
                        <input type="text" name="ville" id="ville" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="cp" class="label_connexion fw-bold">Code postal: </label>
                        <input type="text" name="cp" id="cp" class="input_connexion modifier_info_input">

                        <div id="container_btn_inscription">
                            <button type="submit" id="btn_valide_inscription" class="btn_se_connecter">Valider</button>
                            <button type="submit" id="btn_annuler_inscription" class="btn_se_connecter">Annuler</button>
                        </div>
                    </div>
                </div>
                <p class="info_paiement">Renseigner les informations de votre carte de paiement</p>

                <div>
                    <div>
                        <label for="mail" class="label_connexion fw-bold">Nom de propritaire</label>
                        <input type="text" name="mail" id="mail" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="adresse" class="label_connexion fw-bold">Numéro de carte</label>
                        <input type="text" name="adresse" id="adresse" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="ville" class="label_connexion fw-bold">Date d'expiration</label>
                        <input type="text" name="ville" id="ville" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="cp" class="label_connexion fw-bold">Cryptogramme</label>
                        <input type="text" name="cp" id="cp" class="input_connexion modifier_info_input">
                    </div>
                    <div id="container_btn_inscription">
                        <button type="submit" id="btn_valide_inscription w-5" class="btn_se_connecter">Je paye ma commande</button>
                        <button type="submit" id="btn_annuler_inscription" class="btn_se_connecter">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>