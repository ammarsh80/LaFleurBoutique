<section id="panier">
    <div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);"></div>

    <div id="container_panier">

        <div id="valide_mon_panier">

            <div id="container_paiement" class="container_paiement">
                <div class="container_livraison">

                    <form class="ml-3 p-2" name="btn_valide_facturation" action="index.php?page=v_adresseLivraison&uc=commander&action=confirmerCommande" method="POST">

                        <p class="adresse_facturation fs-6 mb-2">Veuillez renseigner une adresse de livraison</p>
                        <div class="mb-3">
                            <div>
                                <label for="identiteLiv" class="label_livraison fw-bold">Mme / M : *</label>
                                <input type="text" name="identiteLiv" id="identiteLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['nom_client']; ?>" minlength="2" maxlength="44" requiried>
                            </div>
                            <div>
                                <label for="prenomLiv" class="label_livraison fw-bold">Prénom : * </label>
                                <input type="text" name="prenomLiv" id="prenomLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['prenom']; ?>" minlength="2" maxlength="44" requiried>
                            </div>
                            <div>
                                <label for="adresseLiv" class="label_livraison fw-bold">Adresse: * </label>
                                <input type="text" name="adresseLiv" id="adresseLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['rue']; ?>" minlength="2" maxlength="44" requiried>
                            </div>
                            <div>
                                <label for="complementLiv" class="label_livraison fw-bold">Complément: </label>
                                <input type="text" name="complementLiv" id="complementLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['complement_rue']; ?>" minlength="2" maxlength="44">
                            </div>
                            <div>
                                <p class="fs-6 fw-light mb-2 mt-2">Nous ne livrons que cette liste de villages, veillez en choisir une:</p>
                            </div>
                            <div>
                                <label for="villeLiv" class="label_livraison fw-bold">Ville: * </label>
                                <select name="villeLiv" id="villeLiv" class="mb-2">
                                    <?php
                                    foreach ($lesVilles as $ville) {
                                    ?>

                                        <option value="<?php echo $ville['nom_ville'] ?>"><?php echo $ville['nom_ville'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="cpLiv" class="label_livraison fw-bold">Code postal: * </label>
                                <select name="cpLiv" id="cpLiv" class="mb-2">
                                    <?php
                                    foreach ($lesCPs as $cp) {
                                    ?>

                                        <option value="<?php echo $cp['code_postal'] ?>"><?php echo $cp['code_postal'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="d-flex justify-center align-center flex-column">
                                <p class="mt-3 mb-0 p-1 text-bg-danger fs-5 text-center fw-light">Toutes les livraisons sont assurées sous 24 heures</p>
                                <p class="mt-2 mb-2 p-1 text-bg-danger fs-5 text-center fw-light">Mais vous pouvez aussi programmer une livraison, à vous !</p>
                                <label for="date_livraison_progamme" class="label_livraison label_livraison_progamme fw-bold">Livraison souhaitée le : (optionel)</label>
                                <input type="date" name="date_livraison_progamme" id="date_livraison_progamme" class="input_connexion modifier_info_input">
                            </div>


                        </div>


                        <div class="mb-2">
                            <p class="mb-2 fs-6">Adresse de facturation</p>

                            <div>
                                <label for="identiteFac" class="label_livraison fw-bold">Mme / M : *</label>
                                <input type="text" name="identiteFac" id="identiteFac" class=" modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['nom_client']; ?>" minlength="2" maxlength="44" requiried>
                            </div>
                            <div>
                                <label for="prenomFac" class="label_livraison fw-bold">Prénom : *</label>
                                <input type="text" name="prenomFac" id="prenomFac" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['prenom']; ?>" minlength="2" maxlength="44" requiried>
                            </div>
                            <div>
                                <label for="adresseFac" class="label_livraison fw-bold">Adresse: *</label>
                                <input type="text" name="adresseFac" id="adresseFac" class=" modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['rue']; ?>" minlength="2" maxlength="44" requiried>
                            </div>
                            <div>
                                <label for="complementFac" class="label_livraison fw-bold">Complément: *</label>
                                <input type="text" name="complementFac" id="complementFac" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['complement_rue']; ?>" minlength="2" maxlength="44" requiried>
                            </div>
                            <div>
                                <label for="villeFac" class="label_livraison fw-bold">Ville: *</label>
                                <input type="text" name="villeFac" id="villeFac" class=" modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['nom_ville']; ?>" minlength="2" maxlength="44" requiried>
                            </div>
                            <div>
                                <label for="cpFac" class="label_livraison fw-bold">Code postal: *</label>
                                <input type="text" name="cpFac" id="cpFac" class=" modifier_info_input" maxlength="5" size="5" value="<?php echo  $InfoUtilisateur[0]['code_postal']; ?>" minlength="5" maxlength="5" requiried>

                                <div class="container_btn_facturation">
                                    <button type="submit" id="btn_valide_facturation" class="btn_valide_facturation">Valider</button>
                                    <button type="reset" id="btn_annuler_facturation" class="btn_annuler_facturation">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div>
                        <p class="mt-3 fs-6 fw-light m-5">* Information obligatoire</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>
</section>