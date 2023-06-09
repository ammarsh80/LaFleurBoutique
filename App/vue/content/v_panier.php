<section id="panier">
    <div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);"></div>

    <div id="container_panier">
        <p class="titres_compte valide_panier">Je valide mon panier</p>
        <!-- <div id="modifier_panier">
            Modifier mon panier
        </div> -->
        <div id="valide_mon_panier">

            <div class="valide_articles">

                <?php
                if (isset($lesArticlesDuPanier)) {
                ?>

                    <div id="container_article_panier">

                        <?php foreach ($lesArticlesDuPanier as $unArticle) {
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
                            $quantite_stock = $unArticle['quantite_stock'];

                        ?>
                            <div id="article_panier">
                                <img id="image_article_panier" src="./public/assets/img/<?= $image ?>" alt="Image de <?= $description ?>">
                                <div id="description_article_panier">
                                    <p><?= $nom_fleur . " " . $couleur ?></p>
                                    <p><?= $nombre . " " . $unite . " " . $taille  ?></p>

                                    <div class="prix_panier">
                                        <p><?= $prix ?> Euros</p>
                                        <a href="index.php?page=v_panier&uc=panier&idArticle=<?= $idArticle ?>&action=supprimerUnArticle" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
                                            <?php
                                            ?>
                                            <img src="./public/assets/img/panier_delete.jpg" title="enlever du panier" class="add panier_delete">
                                        </a>
                                    </div>
                                    <div>
                                        <form method="POST" action="index.php?page=v_panier&idArticle=<?php echo $idArticle ?>&action=ajouterAuPanierPanier">
                                            <div class="container_modifier_quantite">

                                                <label for="quantite">Quantité :</label>
                                                <input type="number" name="quantite" value="<?php echo $_SESSION['Panier'][$idArticle]['quantite'] ?>" max="<?php echo $quantite_stock ?>" min="0" style="width: 40px;">
                                                <button name="submit" id="submit-button" type="submit">Ok</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>

                <?php
                }
                ?>

                <?php
                if (isset($lesArticlesDuPanier)) {
                    if ($total_a_payer >= 50) {
                ?>
                        <div class="w-100 d-flex justify-content-evenly mt-2" style="pointer-events: none !important;">
                            <span class="fw-bold">Frais de livraison :</span>
                            <label for="frais_offert">
                                <input type="checkbox" name="frais_offert" id="frais_offert" checked> <?php echo $lesFraisLivraison[0]['nom_frais']; ?>
                            </label>
                            <label for="frais_payant">
                                <input type="checkbox" name="frais_payant" id="frais_payant"> <?php echo $lesFraisLivraison[1]['somme']; ?>
                            </label>
                        </div>

                    <?php
                    } else {
                    ?>
                        <div class="w-100 d-flex justify-content-evenly mt-2" style="pointer-events: none !important;">
                            <span class="fw-bold">Frais de livraison :</span>
                            <label for="frais_offert">
                                <input type="checkbox" name="frais_offert" id="frais_offert"> <?php echo $lesFraisLivraison[0]['nom_frais']; ?>
                            </label>
                            <label for="frais_payant">
                                <input type="checkbox" name="frais_payant" id="frais_payant" checked>
                                <?php echo $lesFraisLivraison[1]['somme']; ?>
                                euros
                            </label>
                        </div>
                <?php
                    }
                }
                ?>

                <p class="mt-3 fs-6">(Les frais de livraison son offert à partir de 50 euros d'achat)</p>
                <?php
                if (isset($total_a_payer)) {
                ?>

                    <p class="mt-3 fw-bold">Total à payer (TTC)</p>
                    <p class="somme_total">
                    <?php
                    echo ($total_a_payer);
                }

                    ?>
                    </p>

                    <?php
                    if (!isset($_SESSION['id']) && (isset($lesArticlesDuPanier))) {
                    ?>
                        <a href="index.php?page=v_connexion&uc=inscription&action=demandeInscription">
                            <div id="valide_panier" class="py-2 px-5 pr-5 rounded mt-1 mb-4 je_valide">
                                Je valide mon panier
                            </div>
                        </a>
                    <?php
                    }

                    if (isset($_SESSION['id']) && (isset($lesArticlesDuPanier))) {
                    ?>
                        <a href="index.php?page=v_adresseLivraison&uc=commander&action=passerCommande">
                            <!-- <form action="index.php?page=v_adresseLivraison&uc=commander&action=passerCommande" method="POST"> -->

                            <div id="valide_panier" class="py-2 px-5 pr-5 rounded mt-1 mb-4 je_valide">
                                Je valide mon panier
                            </div>
                        </a>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </div>
</section>