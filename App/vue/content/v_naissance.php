<section id="amour">
    <div class="banniere" style="background-image: url(./public/assets/img/naissance/baniere_naissance.jpg);">
       <h1 style="color:#2c3138;"> Naissance</h1>
    </div>
    <?php
      include './App/vue/common/recherche_couleur.php';
    ?>
    <div id="container_all_article">


    <?php
        foreach ($lesArticlesNaissance as $unArticle) {
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
                <img  class="image_article" src="./public/assets/img/<?= $image ?>" alt="Image de <?= $description ?>">
                <div class="description_article">
                    <p><?= $nom_fleur. " " .$couleur ?></p>
                    <p><?= $nombre. " ".$unite. " ".$taille  ?></p>
                    
                    <div class="prix_panier">
                        <p><?= $prix ?> Euros</p>

                        <a href="index.php?page=v_naissance&idArticle=<?php echo $idArticle ?>&categorie=Naissance&action=ajouterAuPanierNaissance">
                        <img src="./public/assets/img/panier_vert.png" title="Ajouter au panier" class="add">
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
        $today = date('Y-m-d'); // Obtenir la date actuelle au format YYYY-MM-DD
        $start_date = date('Y') . '-05-01'; // Date de début de la plage de dates
        $end_date = date('Y') . '-06-10'; // Date de fin de la plage de dates

        // Vérifier si la date actuelle est comprise entre les deux dates spécifiées
        if ($today >= $start_date && $today <= $end_date) {
            include './App/vue/common/pub.feteDesMeres.php'; // Inclure le fichier si la condition est vraie
        }
        ?>
    <div id="container_all_article_repture">
            <?php
       if (isset($lesArticlesEnReptureNaissance)) {
        foreach ($lesArticlesEnReptureNaissance as $unArticle) {
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
    <div id="container_blog">
        <p>Journal Lafleur</p>
        <div id="container_articles">

            <div class="article">
                <a href="https://shihan.needemand.com/projets_web/la_fleur_wordpress/?p=111">
                    <img src="./public/assets/img/blog/zoom_miel.jpg" alt="phoho paysages"></a>
                <p>Zoom sur le miel de fleurs & les plantes mellifères</p>
            </div>
            <div class="article">
                <a href="https://shihan.needemand.com/projets_web/la_fleur_wordpress/?p=130">
                    <img src="./public/assets/img/blog/remedes.jpg" alt="phoho mimosa"> </a>
                <p>10 remèdes de grand-mère à connaître</p>
            </div>
        </div>
    </div>
</section>