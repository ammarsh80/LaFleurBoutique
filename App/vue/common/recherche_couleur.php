<?php
include_once 'App/controleur/c_consultation.php';


?>

<div id="container_recherche_couleur">

    <div id="recherche_couleur">

    <form action="index.php?page=v_ParMot&uc=visite&ajouterAuPanierDepuisRechercheMot" method="GET">
            <input type="text" name="recherche_mot" placeholder="Rechercher une fleur">
            <input type="submit" value="ok"></button>
        </form>

        <!-- <form action="index.php?page=v_ParMot&uc=visite&ajouterAuPanierDepuisRechercheMot" method="GET">
            <input type="text" name="recherche_mot" id="recherche_mot" placeholder="Rechercher une fleur">
            <input type="submit">Ok</input>
        </form> -->
        <!-- <p id="rechercher_par_couleur">Rechercher par couleur</p> -->
        <!-- <div id="rechercher_par_couleur">Rechercher par couleur</div> -->
        <!-- <p id="rechercher_par_couleur">Rechercher par couleur</p> -->
        <!-- <a href=index.php?page=v_parCouleur.php&&couleur=rouge&action=voirArticlesCouleurs> -->
        <!-- <div id="recherche_couleur1" class="rechercher_couleur"></div> -->
        <!-- </a> -->
        <!-- <div id="recherche_couleur6" class="rechercher_couleur"></div>
        <div id="recherche_couleur4" class="rechercher_couleur"></div>
        <div id="recherche_couleur2" class="rechercher_couleur"></div>
        <div id="recherche_couleur5" class="rechercher_couleur"></div>
        <div id="recherche_couleur7" class="rechercher_couleur"></div>
        <div id="recherche_couleur3" class="rechercher_couleur"></div> -->


        <!-- <form action="index.php?uc=visite&action=selonEtat" method="POST"> -->
        <!-- <form action="index.php?page=v_accueil&action=voirArticlesAccueil" method="POST" id="form_couleur"> -->

        <?php
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($user_agent, 'Firefox') !== false) {
        ?>
            <div>
                <select name="couleur" id="couleur">
                    <option class="option_couleur">Rechercher par couleur</option>
                    <?php foreach ($lesCouleurs as $uneCouleur) {
                        $idCouleur = $uneCouleur['id'];
                        $NomCouleur = $uneCouleur['couleur'];

                        $params = array('page' => 'v_parCouleur', 'uc' => 'visite', 'couleur' => $idCouleur, 'action' => 'voirArticlesCouleur');
                        $url = 'index.php?' . http_build_query($params);

                    ?>
                        <option class="option_couleur" value="<?php echo $url ?>" onclick="redirectToUrl(this.value)"><?php echo $NomCouleur ?></option>

                    <?php }
                    ?>
                </select>
            </div>

        <?php
        } elseif (strpos($user_agent, 'Chrome') !== false) {
        ?>
            <div>
                <select name="couleur" id="couleur" onchange="window.location.href=this.value;">
                    <option class="option_couleur">Rechercher par couleur</option>
                    <?php foreach ($lesCouleurs as $uneCouleur) {
                        $idCouleur = $uneCouleur['id'];
                        $NomCouleur = $uneCouleur['couleur'];

                        $params = array('page' => 'v_parCouleur', 'uc' => 'visite', 'couleur' => $idCouleur, 'action' => 'voirArticlesCouleur');
                        $url = 'index.php?' . http_build_query($params);
                    ?>
                        <option class="option_couleur" value="<?php echo $url ?>"><?php echo $NomCouleur ?></option>
                    <?php }
                    ?>
                </select>
            </div>

        <?php

        } elseif (strpos($user_agent, 'Microsoft Edge') !== false) {
            echo "Bienvenue sur notre site avec Microsoft Edge !";
        ?>
            <div>
                <select name="couleur" id="couleur" onchange="window.location.href=this.value;">
                    <option class="option_couleur">Rechercher par couleur</option>
                    <?php foreach ($lesCouleurs as $uneCouleur) {
                        $idCouleur = $uneCouleur['id'];
                        $NomCouleur = $uneCouleur['couleur'];

                        $params = array('page' => 'v_parCouleur', 'uc' => 'visite', 'couleur' => $idCouleur, 'action' => 'voirArticlesCouleur');
                        $url = 'index.php?' . http_build_query($params);
                    ?>
                        <option class="option_couleur" value="<?php echo $url ?>"><?php echo $NomCouleur ?></option>
                    <?php }
                    ?>
                </select>
            </div>
        <?php
        } elseif (strpos($user_agent, 'Safari') !== false) {
            // afficher du contenu spécifique pour Safari
        } elseif (strpos($user_agent, 'MSIE') !== false || strpos($user_agent, 'Trident') !== false) {
            // afficher du contenu spécifique pour Internet Explorer
        } else {
            // afficher un contenu par défaut pour les autres navigateurs
        ?>
            <div>
                <select name="couleur" id="couleur" onchange="window.location.href=this.value;">
                    <option class="option_couleur">Rechercher par couleur</option>
                    <?php foreach ($lesCouleurs as $uneCouleur) {
                        $idCouleur = $uneCouleur['id'];
                        $NomCouleur = $uneCouleur['couleur'];

                        $params = array('page' => 'v_parCouleur', 'uc' => 'visite', 'couleur' => $idCouleur, 'action' => 'voirArticlesCouleur');
                        $url = 'index.php?' . http_build_query($params);
                    ?>
                        <option class="option_couleur" value="<?php echo $url ?>"><?php echo $NomCouleur ?></option>
                    <?php }
                    ?>
                </select>
            </div>
        <?php
        }
        ?>
    </div>
</div>