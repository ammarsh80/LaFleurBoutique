<section id="amour">
    <div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);">
    </div>

    <?php
    include './App/vue/common/recherche_couleur.php';
?>
        <?php
        
        if (isset($lesArticles)) {
            ?>
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
            <div class="container_article">
            <div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);"></div>
                <div class="description_article">
                    <p><?= $nom_fleur . " " . $couleur ?></p>
                    <p><?= $nombre . " " . $unite . " " . $taille  ?></p>

                    <div class="prix_panier">
                        <p><?= $prix ?> Euros</p>
                        <a href="index.php?page=v_parMot&idArticle=<?php echo $idArticle ?>&action=ajouterAuPanierDepuisRechercheMot">

                            <img src="./public/assets/img/panier_vert.png" title="Ajouter au panier" class="add">
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
    }
       
    ?>
    </div>

            <div id="container_all_article_repture">
            <?php
       if (isset($lesArticlesEnRepture)) {
        foreach ($lesArticlesEnRepture as $unArticle) {
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
            <div class="container_article">
                <img class="image_article" src="./public/assets/img/<?= $image ?>" alt="Image de <?= $description ?>">
                <div class="description_article">
                    <p><?= $nom_fleur . " " . $couleur ?></p>
                    <p><?= $nombre . " " . $unite . " " . $taille  ?></p>

                    <div class="prix_panier">
                        <p><?= $prix ?> Euros &nbsp;</p> <br>
                      <p>(Article en repture de stock)</p>
                    </div>
                </div>
            </div>
        <?php
        }
    }

        ?>
    </div>

<?php
        include("./App/vue/common/articleBlog.php");

?>
</section>
