<section id="amour">
    <div class="banniere" style="background-image: url(./public/assets/img/naissance/baniere_naissance.jpg);">
       <h1 style="color:#2c3138;"> Naissance</h1>
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
                <img  id="image_article" src="./public/assets/img/<?= $image ?>" alt="Image de <?= $description ?>" />
                <div id="description_article">
                    <p><?= $nom_fleur. " " .$couleur ?></p>
                    <p><?= $nombre. " ".$unite. " ".$taille  ?></p>
                    
                    <div id="prix_panier">
                        <p><?= $prix ?> Euros</p>

                        <a href="index.php?page=v_naissance&idArticle=<?php echo $idArticle ?>&categorie=Naissance&action=ajouterAuPanier">
                        <img src="./public/assets/img/panier_vert.png" title="Ajouter au panier" class="add" />
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div id="container_blog">
        <p>Journal Lafleur</p>
        <div id="container_articles">

            <div id="article">
                <a href="https://shihan.needemand.com/projets_web/la_fleur_wordpress/?p=111">
                    <img src="./public/assets/img/blog/zoom_miel.jpg" alt="phoho paysages"></a>
                <p>Zoom sur le miel de fleurs & les plantes mellifères</p>
            </div>
            <div id="article">
                <a href="https://shihan.needemand.com/projets_web/la_fleur_wordpress/?p=130">
                    <img src="./public/assets/img/blog/remedes.jpg" alt="phoho mimosa"> </a>
                <p>10 remèdes de grand-mère à connaître</p>
            </div>
        </div>
    </div>
</section>