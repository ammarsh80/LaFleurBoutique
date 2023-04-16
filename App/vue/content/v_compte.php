<section id="compte">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière">

    <div id="container_compte">
        <p class="titres_compte">Information personnelles</p>
        <div id="container_info_compte">
            <div class="info_compte">
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Pseudo:</p>
                    <p>réponse</p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Nom:</p>
                    <p>réponse</p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Prénom:</p>
                    <p>réponse</p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">E-mail:</p>
                    <p>réponse</p>
                </div>

            </div>
            <div class="info_compte">
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Adresse:</p>
                    <p>réponse</p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Ville:</p>
                    <p>réponse</p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info_cp">Code postal:</p>
                    <p>réponse</p>
                </div>

            </div>
        </div>
        <div id="ligne_info_compte">
        </div>
        <div id="container_modifier_info">

            <div id="modifier_info">
                <p>
                    Modifier les informations de mon compte
                </p>
            </div>
            <div>
                <div>
                    <label for="adresse" class="label_connexion">Adresse: </label>
                    <input type="text" name="adresse" id="adresse" class="input_connexion modifier_info_input">
                </div>
                <div>
                    <label for="ville" class="label_connexion">Ville: </label>
                    <input type="text" name="ville" id="ville" class="input_connexion modifier_info_input">
                </div>
                <div>
                    <label for="cp" class="label_connexion">Code postal: </label>
                    <input type="text" name="cp" id="cp" class="input_connexion modifier_info_input">
                </div>
                <div>
                    <label for="mail" class="label_connexion">E-mail: </label>
                    <input type="text" name="mail" id="mail" class="input_connexion modifier_info_input">
                </div>
            </div>
        </div>

        <p class="titres_compte">Historique de mes commandes</p>

        <table class="table_commande">
            <thead>
                <tr class="table_commande_entete">
                    <th class="table_commande_ligne">Numéro de commande</th>
                    <th class="table_commande_ligne">Date</th>
                    <th class="table_commande_ligne">Article</th>
                    <th class="table_commande_ligne">Prix (euros)</th>
                    <th class="table_commande_ligne">Adresse de livraison</th>
                    <th class="table_commande_ligne">État</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table_commande_ligne">Ligne 1, Colonne 1</td>
                    <td class="table_commande_ligne">Ligne 1, Colonne 2</td>
                    <td class="table_commande_ligne">Ligne 1, Colonne 3</td>
                    <td class="table_commande_ligne">Ligne 1, Colonne 4</td>
                    <td class="table_commande_ligne">Ligne 1, Colonne 5</td>
                    <td class="table_commande_ligne">Ligne 1, Colonne 6</td>
                </tr>
            </tbody>
        </table>

    </div>

</section>