<section id="panier">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière" style="margin-bottom: 25px;">

    <div id="container_panier">
        <p class="titres_compte valide_panier">Je valide mon panier</p>
        <div id="modifier_panier">
            Modifier mon panier
        </div>
        <div id="valide_mon_panier">

            <div class="valide_articles">
                <div id="container_article_panier">

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
                            <div id="article_panier">
                                <img id="image_article_panier" src="./public/assets/img/<?= $image ?>" alt="Image de <?= $description ?>" />
                                <div id="description_article_panier">
                                    <p><?= $nom_fleur . " " . $couleur ?></p>
                                    <p><?= $nombre . " " . $unite . " " . $taille  ?></p>

                                    <div id="prix_panier">
                                        <p><?= $prix ?> Euros</p>
                                        <a href="index.php?page=v_panier&uc=panier&idArticle=<?= $idArticle ?>&action=supprimerUnArticle" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
                                            <?php
                                            ?>
                                            <img src="./public/assets/img/panier_delete.jpg" title="Ajouter au panier" class="add panier_delete" />
                                        </a>
                                        </a>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="w-100 d-flex justify-content-evenly mt-2">
                    <span class="fw-bold">Frais de livraison :</span>
                    <label for="frais_offert">
                        <input type="checkbox" name="frais_offert" id="frais_offert"> Offert
                    </label>
                    <label for="frais_payant">
                        <input type="checkbox" name="frais_payant" id="frais_payant"> 2.99 euros
                    </label>
                </div>
                <p class="mt-3 fw-bold">Total à payer (TTC)</p>
                <div id="somme_total" class="p-2 rounded mt-2 somme_total">

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
                <p class="mt-3">Veuillez valider votre panier pour passer au paiement</p>

                <?php
                if (!isset($_SESSION['id'])) {
                ?>
                    <a href="index.php?page=v_connexion&uc=inscription&action=demandeInscription">
                        <div id="valide_panier" class="py-2 px-5 pr-5 rounded mt-1 mb-4 je_valide">
                            Je valide mon panier
                        </div>
                    </a>
                <?php
                }

                if (isset($_SESSION['id'])) {
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