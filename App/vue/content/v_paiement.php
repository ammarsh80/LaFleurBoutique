<section id="panier">
<div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);"></div>
    <?php
   
    if (!isset($_SESSION['idDerniereCommande']) && (!isset($_SESSION['total_a_payer']))) {
      
    ?>

        <p class="a_jour">Si vous avez une commande en état (enregistrée) et que vous n'avez pas encore payé, veuillez renouvler votre commande, votre commande étant considérée comme annulée.</p>
      <a href="index.php?page=v_compte"> <p class="a_jour_retour">Retour à Mon compte</p></a> 
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['idDerniereCommande']) && (isset($_SESSION['total_a_payer'])) && $_SESSION['total_a_payer'] === 0) {
    ?>

        <p class="a_jour">Vous n'avez pas de commande à payer ! </p>
      <a href="index.php?page=v_compte"> <p class="a_jour_retour">Retour à Mon compte</p></a> 
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['idDerniereCommande']) && (isset($_SESSION['total_a_payer'])) && $_SESSION['total_a_payer'] > 0) {
    ?>
        <p class="mb-2">Commande enregistrée !!</p>
        <p class="mb-4 p-3 text-center">Une fois la commande payée, nous procéderons à sa préparation, À vous !</p>


        <div class="cadre_paiement">
            <p class="info_paiement">Renseigner les informations de votre carte de paiement</p>
            <div style="padding-left: 40px;">
                <p style="width: 100%; text-align: center; margin-top: 10px; margin-bottom: 10px;">Total à payer (TTC) <?php echo $_SESSION['total_a_payer'] ?> euros</p>
                <form action="index.php?page=v_paiement&uc=payer&action=payerCommande" method="POST">
                    <div>
                        <label for="propritaire" class="label_livraison fw-bold">Titulaire de carte *</label>
                        <input type="text" name="propritaire" id="propritaire" class=" modifier_info_input" minlength="2" maxlength="44" required>
                    </div>
                    <div>
                        <label for="carte" class="label_livraison fw-bold">Numéro de carte *</label>
                        <input type="text" name="carte" id="carte" class=" modifier_info_input" minlength="15" maxlength="16" required>
                    </div>
                    <div>
                        <label for="expiration" class="label_livraison fw-bold">Date d'expiration *</label>
                        <input type="text" name="expiration" id="expiration" class=" modifier_info_input" minlength="5" maxlength="7" placeholder="MM/AAAA" required>

                    </div>
                    <div>
                        <label for="crypto" class="label_livraison fw-bold">Cryptogramme *</label>
                        <input type="text" name="crypto" id="crypto" class=" modifier_info_input" minlength="3" maxlength="4" required>
                    </div>
                    <div class="container_btn_facturation">
                        <button type="submit" name="btn_valide_payement" id="btn_valide_payement" value="valider" class="btn_valide_payement">Je paye ma commande</button>
                        <button type="reset" id="btn_annuler_payement" class="btn_annuler_payement">Annuler</button>
                    </div>
                </form>
                <div>
                    <p class="mt-3 fs-6 fw-light">* Information obligatoire</p>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</section>