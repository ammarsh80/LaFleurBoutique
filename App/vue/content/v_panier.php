<section id="panier">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière">

    <div id="container_panier">
        <p class="titres_compte valide_panier">Je valide mon panier</p>
        <div id="valide_mon_panier">

            <div class="valide_articles">
                <?php
                if (isset($lesArticlesDuPanier)) {
                    foreach ($lesArticlesDuPanier as $unArticle) {
                        $idArticle = $unArticle['id'];
                        $description = $unArticle['description'];
                        $etat = $unArticle['etat'];
                        $prix = $unArticle['prix_unitaire'];
                        $nombre = $unArticle['nombre'];
                        $image = $unArticle['image'];
                        $nom_fleur = $unArticle['nom_fleur'];
                        $couleur = $unArticle['couleur'];
                        $unite = $unArticle['nom_unite'];
                        $taille = $unArticle['taille'];

                ?>
                        <div id="container_article">
                            <img id="image_article" src="./public/assets/img/<?= $image ?>" alt="Image de <?= $description ?>" />
                            <div id="description_article">
                                <p><?= $nom_fleur . " " . $couleur ?></p>
                                <p><?= $nombre . " " . $unite . " " . $taille  ?></p>

                                <div id="prix_panier">
                                    <p><?= $prix ?> Euros</p>
                                    <a href="index.php?page=v_panier&uc=panier&idArticle=<?= $idArticle ?>&action=supprimerUnArticle" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
                                        <?php

                                        ?>

                                        <img src="./public/assets/img/panier_vert.png" title="Ajouter au panier" class="add" />
                                    </a>

                                    </a>


                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <div class="w-100 d-flex justify-content-evenly">
                    <span class="fw-bold">Frais de livraison :</span>
                    <label for="frais_offert">
                        <input type="checkbox" name="frais_offert" id="frais_offert"> Offert
                    </label>
                    <label for="frais_payant">
                        <input type="checkbox" name="frais_payant" id="frais_payant"> 2.99 euros
                    </label>
                </div>
                <p class="mt-5 fw-bold">Total à payer (TTC)</p>

                <div id="somme_total" class="p-3 rounded mt-4 somme_total">
                    <?php

                    if (isset($lesArticlesDuPanier)) {

                        // à garder au cas où////////////////////////////////////////////////////////////////////

                        // $lesPrixUnitaires = array(); // initialisation du tableau des prix unitaires
                        // foreach ($lesArticlesDuPanier as $article) {
                        //     $prix_unitaire = $article['prix_unitaire'];
                        //     array_push($lesPrixUnitaires, $prix_unitaire); // ajout du prix unitaire à la fin du tableau
                        // }

                        $sommePrixUnitaires = 0;
                        foreach ($lesArticlesDuPanier as $article) {
                            $sommePrixUnitaires += $article['prix_unitaire'];
                        }
                        $sommeTTC = number_format($sommePrixUnitaires, 2);
                        if ($sommeTTC >= 50) {
                            echo (number_format($sommePrixUnitaires, 2) . " euros");
                        } else {
                            echo (number_format($sommePrixUnitaires, 2) + 2.99 . " euros");
                        }
                    }
                    ?>

                </div>



                <p class="mt-5">Veuillez valider votre panier pour passer au paiement</p>
                <div id="je_valide" class="py-2 px-5 pr-5 rounded mt-4 mb-4 je_valide">
                    Je valide mon panier
                </div>

            </div>

            <div id="container_paiement" class="container_paiement">
                <p>Veuillez renseigner une adresse de livraison</p>
                <div class="mb-5">
                    <div>
                        <label for="identiteLiv" class="label_connexion fw-bold">Mme / M : </label>
                        <input type="text" name="identiteLiv" id="identiteLiv" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="adresseLiv" class="label_connexion fw-bold">Adresse: </label>
                        <input type="text" name="adresseLiv" id="adresseLiv" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="villeLiv" class="label_connexion fw-bold">Ville: </label>
                        <input type="text" name="villeLiv" id="villeLiv" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="cpLiv" class="label_connexion fw-bold">Code postal: </label>
                        <input type="text" name="cpLiv" id="cpLiv" class="input_connexion modifier_info_input">
                    </div>

                    <div class="container_btn_inscription">
                        <button type="submit" id="btn_valide_livraison" class="btn_valide_livraison">Valider</button>
                        <button type="submit" id="btn_annuler_livraison" class="btn_annuler_livraison">Annuler</button>
                    </div>
                </div>


                <div class="mb-5">
                    <p class="adresse_facturation">Adresse de facturation</p>

                    <div>
                        <label for="identiteFac" class="label_connexion fw-bold">Mme / M : </label>
                        <input type="text" name="identiteFac" id="identiteFac" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="adresseFac" class="label_connexion fw-bold">Adresse: </label>
                        <input type="text" name="adresseFac" id="adresseFac" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="villeFac" class="label_connexion fw-bold">Ville: </label>
                        <input type="text" name="villeFac" id="villeFac" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="cpFac" class="label_connexion fw-bold">Code postal: </label>
                        <input type="text" name="cpFac" id="cpFac" class="input_connexion modifier_info_input">

                        <div class="container_btn_inscription">
                            <button type="submit" id="btn_valide_facturation" class="btn_valide_facturation">Valider</button>
                            <button type="submit" id="btn_annuler_facturation" class="btn_annuler_facturation">Annuler</button>
                        </div>
                    </div>
                </div>
                <p class="info_paiement">Renseigner les informations de votre carte de paiement</p>

                <div>
                    <div>
                        <label for="propritaire" class="label_connexion fw-bold">Nom de propritaire</label>
                        <input type="text" name="propritaire" id="propritaire" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="carte" class="label_connexion fw-bold">Numéro de carte</label>
                        <input type="text" name="carte" id="carte" class="input_connexion modifier_info_input">
                    </div>
                    <div>
                        <label for="expiration" class="label_connexion fw-bold">Date d'expiration</label>
                        <!-- <input type="datetime-local" name="expiration" id="expiration" class="input_connexion modifier_info_input"> -->
                        <input type="text" name="expiration" id="expiration" class="input_connexion modifier_info_input" placeholder="MM/AAAA">

                    </div>
                    <div>
                        <label for="crypto" class="label_connexion fw-bold">Cryptogramme</label>
                        <input type="text" name="crypto" id="crypto" class="input_connexion modifier_info_input">
                    </div>
                    <div class="container_btn_inscription">
                        <button type="submit" id="btn_valide_payement" class="btn_valide_payement">Je paye ma commande</button>
                        <button type="submit" id="btn_annuler_payement" class="btn_annuler_payement">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_loto">
            <h1>À l’occasion de la fête des mères, tentez de gagner un de nos lot surprise </h1>
            <a href="index.php?page=v_loto">
                <p>Je tente ma chance</p>
            </a>
        </div>
    </div>






</section>