<section id="amour">
    <div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);">
        <!-- <h1> Amour et sentiments</h1> -->
    </div>

    <?php
    include './App/vue/common/recherche_couleur.php';
?>
    <!-- <img class="banniere" src="./public/assets/img/amour/baniere_amour.jpg" alt="image fleurs amour"> -->
    <div id="container_all_article">
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
                        <a href="index.php?page=v_accueil&idArticle=<?php echo $idArticle ?>&categorie=Accueil&action=ajouterAuPanier">
                            <img src="./public/assets/img/panier_vert.png" title="Ajouter au panier" class="add" />
                        </a>
                        
                    </a> 

                    </div>
                </div>
            </div>
        <?php
        }


        ?>
    </div>

<?php
        include("./App/vue/common/articleBlog.php");

?>
</section>
