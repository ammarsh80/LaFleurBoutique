<?php
include 'APP/controleur/c_monCompte.php';

$adresse = '';
$complement = '';
$ville = '';
$cp = '';
$mail = '';
?>

<section id="compte">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière">

    <div id="container_compte">
        <p class="titres_compte">Information personnelles</p>
        <div id="container_info_compte">
            <div class="info_compte">
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

            </div>
            <div class="info_compte">
                <div class="info_compte_ligne">
                    <p class="info_compte_info">Adresse:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['rue'];
                        ?>
                    </p>
                </div>
                <div class="info_compte_ligne">
                    <p class="info_compte_info" style="font-size: 15px;">Complément:</p>
                    <p style="font-size: 15px;">
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
                    <p class="info_compte_info_cp">Code postal:</p>
                    <p>
                        <?php
                        echo  $InfoUtilisateur[0]['code_postal'];
                        ?>
                    </p>
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




            <!-- <script>
    function submitForm() {
        document.getElementById("myForm").submit();
    }
</script> -->

            <form id="myForm" action="index.php?page=v_compte&uc=administrer&action=changerProfil" method="POST">
                <div>
                    <div>
                        <label for="adresse" class="label_connexion">Adresse: </label>
                        <input type="text" name="adresse" id="adresse" class="input_connexion modifier_info_input" value="<?= $adresse ?>" maxlength="90">
                    </div>
                    <div>
                        <label for="adresse" class="label_connexion">Complement: </label>
                        <input type="text" name="adresse" id="adresse" class="input_connexion modifier_info_input" value="<?= $complement ?>" maxlength="90">
                    </div>
                    <div>
                        <label for="ville" class="label_connexion">Ville: </label>
                        <input type="text" name="ville" id="ville" class="input_connexion modifier_info_input" value="<?= $ville ?>" maxlength="90">
                    </div>
                    <div>
                        <label for="cp" class="label_connexion">Code postal: </label>
                        <input type="text" name="cp" id="cp" class="input_connexion modifier_info_input" value="<?= $cp ?>" size="5" maxlength="5">
                    </div>
                    <div>
                        <label for="mail" class="label_connexion">E-mail: </label>
                        <input type="text" name="mail" id="mail" class="input_connexion modifier_info_input" value="<?= $mail ?>" maxlength="150">
                    </div>
                </div>

                <div classe="container_btn_modifie" style="display: flex;">
                    <button type="submit" id="btn_valide_modification" class="btn_envoyer_modification">Valider</button>
                    <button type="reset" id="btn_annuler_modification" class="btn_annuler_modification">Annuler</button>
                </div>
            </form>

   

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
                    <td class="table_commande_ligne">
                        <p>
                            <?php
                            echo  $commandesClient[0]['id'];
                            ?>
                        </p>
                    </td>
                    <td class="table_commande_ligne">
                        <p>
                            <?php
                            echo  $commandesClient[0]['commande_le'];
                            ?>
                        </p>
                    </td>
                    <td class="table_commande_ligne">
                        <p>
                            <?php
                            echo  $commandesClient[0]['nom_fleur'] . ' ' . $commandesClient[0]['couleur'] . ' ' . $commandesClient[0]['nombre'] . ' ' . $commandesClient[0]['nom_unite'] . ' ' . $commandesClient[0]['taille'];
                            ?>
                        </p>
                    </td>
                    <td class="table_commande_ligne">
                        <p>
                            <?php
                            echo  $commandesClient[0]['prix_unitaire'];
                            ?>
                        </p>
                    </td>
                    <td class="table_commande_ligne">
                        <p>
                            <?php
                            echo  $commandesClient[0]['rue'] . '<br>' . $commandesClient[0]['nom_ville'] . ' ' . $commandesClient[0]['code_postal'];
                            ?>
                        </p>
                    </td>
                    <td class="table_commande_ligne">
                        <p>
                            <?php
                            echo  $commandesClient[0]['etat'];
                            ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</section>