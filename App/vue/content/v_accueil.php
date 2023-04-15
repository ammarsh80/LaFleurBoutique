<section id="accueil">
    <!-- <div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);">
        <h1 style="color:white;"> Bienvenue</h1>
    </div> -->
    <!-- <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="panier de courses"> -->
    <div id="container_all_article">

        <!-- <div id="container_article">
            <img src="./public/assets/img/naissance/naissance1.jpg" alt="bouquet de fleurs pour une naissance">
            <div id="description_article">
                <p>Bouquet de Lys Oriental</p>
                <div id="prix_panier">
                    <p>39.00 &euro;</p>
                    <img src="./public/assets/img/panier_vert.png" alt="ajouter au panier">
                </div>
            </div>
        </div> -->


        <?php


        foreach ($lesArticles as $unArticle) {

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
                        <a href="index.php?uc=accueil&idArticle=<?= $idArticle ?>&action=ajouterAuPanierDepuisAccueil">
                            <img src="./public/assets/img/panier_vert.png" title="Ajouter au panier" class="add" />
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>

</section>

<?php
include './App/vue/common/footer.php';

?>