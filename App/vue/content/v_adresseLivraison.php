<section id="panier">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière" style="margin-bottom: 25px;">

    <div id="container_panier">
        <div id="modifier_panier">
            Modifier mon panier
        </div>
        <div id="valide_mon_panier">

            <div id="container_paiement" class="container_paiement">
                <div>

                    <form name="btn_valide_facturation" action="index.php?page=v_adresseLivraison&uc=commander&action=confirmerCommande" method="POST">

                        <p class="adresse_facturation fs-6 mb-2">Veuillez renseigner une adresse de livraison</p>
                        <div class="mb-3">
                            <div>
                                <label for="identiteLiv" class="label_livraison fw-bold">Mme / M : </label>
                                <input type="text" name="identiteLiv" id="identiteLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['nom_client'];?>" requiried>
                            </div>
                            <div>
                                <label for="prenomLiv" class="label_livraison fw-bold">Prénom : </label>
                                <input type="text" name="prenomLiv" id="prenomLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['prenom'];?>" requiried>
                            </div>
                            <div>
                                <label for="adresseLiv" class="label_livraison fw-bold">Adresse: </label>
                                <input type="text" name="adresseLiv" id="adresseLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['rue'];?>" requiried>
                            </div>
                            <div>
                                <label for="complementLiv" class="label_livraison fw-bold">Complément: </label>
                                <input type="text" name="complementLiv" id="complementLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['complement_rue'];?>" requiried>
                            </div>
                            <div>
                                <label for="villeLiv" class="label_livraison fw-bold">Ville: </label>
                                <input type="text" name="villeLiv" id="villeLiv" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['nom_ville'];?>" requiried>
                            </div>
                            <div>
                                <label for="cpLiv" class="label_livraison fw-bold">Code postal: </label>
                                <input type="text" name="cpLiv" id="cpLiv" class="input_connexion modifier_info_input" maxlength="5" size="5" value="<?php echo  $InfoUtilisateur[0]['code_postal'];?>" requiried>
                            </div>
                            <div class="d-flex justify-center align-center">
                                <label for="date_livraison_progamme" class="label_livraison fw-bold">Livraison souhaitée le : (optionel)</label>
                                <input type="date" name="date_livraison_progamme" id="date_livraison_progamme" class="input_connexion modifier_info_input">
                            </div>


                        </div>


                        <div class="mb-2">
                            <p class="mb-2 fs-6">Adresse de facturation</p>

                            <div>
                                <label for="identiteFac" class="label_livraison fw-bold">Mme / M : </label>
                                <input type="text" name="identiteFac" id="identiteFac" class=" modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['nom_client'];?>" requiried>
                            </div>
                            <div>
                                <label for="prenomFac" class="label_livraison fw-bold">Prénom : </label>
                                <input type="text" name="prenomFac" id="prenomFac" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['prenom'];?>" requiried>
                            </div>
                            <div>
                                <label for="adresseFac" class="label_livraison fw-bold">Adresse: </label>
                                <input type="text" name="adresseFac" id="adresseFac" class=" modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['rue'];?>" requiried>
                            </div>
                            <div>
                                <label for="complementFac" class="label_livraison fw-bold">Complément: </label>
                                <input type="text" name="complementFac" id="complementFac" class="input_connexion modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['complement_rue'];?>" requiried>
                            </div>
                            <div>
                                <label for="villeFac" class="label_livraison fw-bold">Ville: </label>
                                <input type="text" name="villeFac" id="villeFac" class=" modifier_info_input" value="<?php echo  $InfoUtilisateur[0]['nom_ville'];?>" requiried>
                            </div>
                            <div>
                                <label for="cpFac" class="label_livraison fw-bold">Code postal: </label>
                                <input type="text" name="cpFac" id="cpFac" class=" modifier_info_input" maxlength="5" size="5" value="<?php echo  $InfoUtilisateur[0]['code_postal'];?>" requiried>

                                <div class="container_btn_facturation">
                                    <button type="submit" id="btn_valide_facturation" class="btn_valide_facturation">Valider</button>
                                    <button type="reset" id="btn_annuler_facturation" class="btn_annuler_facturation">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="cadre_paiement">

                    <p class="info_paiement">Renseigner les informations de votre carte de paiement</p>

                    <div style="padding-left: 40px;">
                        <div>
                            <label for="propritaire" class="label_livraison fw-bold">Nom de propritaire</label>
                            <input type="text" name="propritaire" id="propritaire" class=" modifier_info_input">
                        </div>
                        <div>
                            <label for="carte" class="label_livraison fw-bold">Numéro de carte</label>
                            <input type="text" name="carte" id="carte" class=" modifier_info_input">
                        </div>
                        <div>
                            <label for="expiration" class="label_livraison fw-bold">Date d'expiration</label>
                            <input type="text" name="expiration" id="expiration" class=" modifier_info_input" placeholder="MM/AAAA">

                        </div>
                        <div>
                            <label for="crypto" class="label_livraison fw-bold">Cryptogramme</label>
                            <input type="text" name="crypto" id="crypto" class=" modifier_info_input">
                        </div>
                        <div class="container_btn_facturation">
                            <button type="submit" name="btn_valide_payement" id="btn_valide_payement" value="valider" class="btn_valide_payement">Je paye ma commande</button>
                            <button type="reset" id="btn_annuler_payement" class="btn_annuler_payement">Annuler</button>
                        </div>
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