<section id="navigation">
    <div id="nav_bar">
        <!-- <a href="index.php?page=v_accueil&action=voirArticlesAccueil">
            <h1>Accueil</h1>
        </a>
        <a href="index.php?page=v_amour&action=voirArticlesAmour">
            <h1>Amour et sentiments</h1>
        </a>
        <a href="index.php?page=v_mariage&action=voirArticlesMariage">
            <h1>Mariage</h1>
        </a>
        <a href="index.php?page=v_naissance&action=voirArticlesNaissance">
            <h1>Naissance</h1>
        </a>
        <a href="index.php?page=v_remerciement&action=voirArticlesRemerciement">
            <h1>Remerciement</h1>
        </a>
        <a href="index.php?page=v_anniversaire&action=voirArticlesAnniversaire">
            <h1>Anniversaire</h1>
        </a> -->

        <?php
        foreach ($lesCategories as $uneCategorie) {
            $idCategorie = $uneCategorie['id'];

            $nomCategorie = $uneCategorie['nom_categorie'];
        ?>
            <a href=index.php?uc=visite&categorie=<?php echo $idCategorie ?>&action=voirArticlesDeCategorie>
                <h1><?php echo $nomCategorie ?></h1>
            </a>
        <?php
        }
        ?>
    </div>
    <div class="ligne_banniere"></div>


    <?php


    if ($LeNomDeLaCategorie[0][0] === 'Accueil') {
    ?>
        <div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);">
        </div>
    <?php

    } elseif ($LeNomDeLaCategorie[0][0] == 'Naissance') {
    ?>
        <div class="banniere" style="background-image: url(./public/assets/img/naissance/baniere_naissance.jpg);">
            <h1 style="color:#2c3138;"> Naissance</h1>
        </div>
    <?php
    } elseif ($LeNomDeLaCategorie[0][0] == 'Mariage') {
    ?>
        <div class="banniere" style="background-image: url(./public/assets/img/mariage/baniere_mariage.jpg);">
            <h1 style="color:#2c3138;"> Mariage</h1>
        </div>
    <?php

    } elseif ($LeNomDeLaCategorie[0][0] == 'Amour et sentiments') {
    ?>
        <div class="banniere" style="background-image: url(./public/assets/img/amour/baniere_amour.jpg);">
            <h1> Amour et sentiments</h1>
        </div>
    <?php

    } elseif ($LeNomDeLaCategorie[0][0] == 'Anniversaire') {
    ?>
        <div class="banniere" style="background-image: url(./public/assets/img/anniversaire/baniere_anniversaire.jpg);">
            <h1> Anniversaire</h1>
        </div>
    <?php
    } elseif ($LeNomDeLaCategorie[0][0] == 'Remerciement') {
    ?>
        <div class="banniere" style="background-image: url(./public/assets/img/remerciement/baniere_remerciement.jpg);">
            <h1 style="color:#2c3138;"> Remerciement</h1>
        </div>
    <?php
    }

    ?>

    <div id="container_recherche_couleur">

        <div id="recherche_couleur">
            <!-- <div id="rechercher_par_couleur">Rechercher par couleur</div> -->
            <p id="rechercher_par_couleur">Rechercher par couleur</p>
            <div id="recherche_couleur1" class="rechercher_couleur"></div>
            <div id="recherche_couleur2" class="rechercher_couleur"></div>
            <div id="recherche_couleur3" class="rechercher_couleur"></div>
            <div id="recherche_couleur4" class="rechercher_couleur"></div>
            <div id="recherche_couleur5" class="rechercher_couleur"></div>

        </div>
    </div>

</section>