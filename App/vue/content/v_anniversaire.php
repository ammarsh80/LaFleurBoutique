<section id="amour">
    <div class="banniere" style="background-image: url(./public/assets/img/anniversaire/baniere_anniversaire.jpg);">
       <h1> Anniversaire</h1>
    </div>
    <?php
      include './App/vue/common/recherche_couleur.php';
    ?>
    <div id="container_all_article">


    <?php
        foreach ($lesArticlesAnniversaire as $unArticle) {
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
                <img  id="image_article" src="./public/assets/img/<?= $image ?>" alt="Image de <?= $description ?>" />
                <div id="description_article">
                    <p><?= $nom_fleur. " " .$couleur ?></p>
                    <p><?= $nombre. " ".$unite. " ".$taille  ?></p>
                    
                    <div id="prix_panier">
                        <p><?= $prix ?> Euros</p>

                        <a href="index.php?page=v_anniversaire&idArticle=<?php echo $idArticle ?>&categorie=Anniversaire&action=ajouterAuPanierAnniversaire">
                        <img src="./public/assets/img/panier_vert.png" title="Ajouter au panier" class="add" />
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <div id="container_all_article_repture">
            <?php
       if (isset($lesArticlesEnReptureAnniversaire)) {
        foreach ($lesArticlesEnReptureAnniversaire as $unArticle) {
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
                        <p><?= $prix ?> Euros &nbsp;</p> <br>
                      <p>(Article en repture de stock)</p>
                        
                    </a> 

                    </div>
                </div>
            </div>
        <?php
        }
    }

        ?>
    </div>
    <div id="container_blog">
    <p>Journal Lafleur</p>
    <div id="container_articles">

        <div id="article">
            <a href="https://shihan.needemand.com/projets_web/la_fleur_wordpress/?p=53">
                <img src="./public/assets/img/blog/paysages.jpg" alt="phoho paysages"></a>
            <p>Les magnifiques paysages de notre Région</p>
        </div>
        <div id="article">
            <a href="https://shihan.needemand.com/projets_web/la_fleur_wordpress/?p=41">
                <img src="./public/assets/img/blog/vera.jpg" alt="phoho aloé vera"> </a>
            <p>L’aloé vera</p>
        </div>
    </div>
</div>
</section>