<?php
include_once "./App/controleur/c_moncompte.php";

?>

<section id="compte">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière">

    <div id="container_compte">
        <p class="titres_compte">Information personnelles</p>
        <div id="container_info_compte">
            <div class="info_compte mb-3">
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Pseudo:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['pseudo'];
                        ?>
                    </p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Nom:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['nom_client'];
                        ?>
                    </p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Prénom:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['prenom'];
                        ?>
                    </p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">E-mail:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['email'];
                        ?>
                    </p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Téléphone:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['telephone'];
                        ?>
                    </p>
                </div>

            </div>
            <div class="info_compte mb-3">
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Adresse:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['rue'];
                        ?>
                    </p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Complément:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['complement_rue'];
                        ?>
                    </p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Ville:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['nom_ville'];
                        ?>
                    </p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Code postal:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['code_postal'];
                        ?>
                    </p>
                </div>
            </div>

            <div id="container_modifier_info">
                <div id="modifier_info">
                    <p>
                        Modifier les informations de mon compte
                    </p>
                </div>

                <form action="index.php?page=v_compte&uc=administrer&action=changerProfil" method="POST">
                    <div style="display: flex; flex-wrap: wrap;">

                        <div class="container_form_modif">

                            <p class="label_modif"> <label for="adresse">Adresse *</label>
                                <input type="text" id="adresse" name="adresse" value="<?php echo $InfoUtilisateur[0]['rue']; ?>" minlength="2" maxlength="44" required>
                            </p>
                            <p class="label_modif"><label for="complement">Complement *</label>
                                <input type="text" id="complement" name="complement" value="<?php echo $InfoUtilisateur[0]['complement_rue']; ?>" minlength="2" maxlength="44" required>
                            </p>
                            <p class="label_modif"><label for="ville">Ville *</label>
                                <input type="text" id="ville" name="ville" value="<?php echo $InfoUtilisateur[0]['nom_ville']; ?>" minlength="2" maxlength="44" required>
                            </p>
                            <p class="label_modif"> <label for="cp">Code postal *</label>
                                <input type="text" id="cp" name="cp" value="<?php echo $InfoUtilisateur[0]['code_postal']; ?>" minlength="5" maxlength="5" required>
                            </p>
                            <p class="label_modif"> <label for="mail">E-mail *</label>
                                <input type="text" id="mail" name="mail" value="<?php echo $InfoUtilisateur[0]['email']; ?>" minlength="2" maxlength="44" required>
                            </p>
                            <p class="label_modif"> <label for="telephone">Telephone *</label>
                                <input type="tel" id="telephone" name="telephone" maxlength="10" size="10" value="<?php echo $InfoUtilisateur[0]['telephone']; ?>" required>
                            </p>
                        </div>

                        <p class="btn_modif">
                            <button type="submit" id="btn_valide_modif">Valider</button>
                            <button type="reset" id="btn_annule_modif">Annuler</button>
                        </p>
                    </div>
                </form>
                <div>
                    <p class="mt-3 fs-6 fw-light">* Information obligatoire</p>
                </div>
            </div>
        </div>

        <div id="ligne_info_compte">
        </div>

        <p class="titres_compte">Historique de mes commandes</p>
        <?php
        if (isset($commandesClient) && !empty($commandesClient)) {
        ?>
            <table class="table_commande">
                <thead>
                    <tr class="table_commande_entete">
                        <th class="table_commande_ligne">Numéro de commande</th>
                        <th class="table_commande_ligne">Date</th>
                        <th class="table_commande_ligne">Article</th>
                        <th class="table_commande_ligne">Détail</th>
                        <th class="table_commande_ligne">Prix (euros)</th>
                        <th class="table_commande_ligne">Adresse de livraison</th>
                        <th class="table_commande_ligne">État</th>
                        <th class="table_commande_ligne">Lot gagné</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($commandesClient as $key => $commande) : ?>
                        <tr>
                            <?php foreach ($commande as $value) : ?>
                                <td class="table_commande_ligne">
                                    <?= $value ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php

        }

        ?>
    <a href="index.php?page=v_paiement&uc=payer">
        <p class="payer_derniere">payer ma dernière commande</p>
    </a>
</div>
</section>