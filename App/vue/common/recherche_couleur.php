<?php
include_once 'App/controleur/c_consultation.php';


?>

<div id="container_recherche_couleur">

    <div id="recherche_couleur">

    <!-- <form action="index.php?page=v_parMot" method="GET">
    <input type="text" name="recherche_mot" placeholder="Rechercher une fleur" value="">
    <input type="submit">OK</input>
</form> -->


      
      
        <form method="GET">
            <input type="text" name="recherche_mot" placeholder="Rechercher une fleur">
            <input type="submit" value="ok"></input>
        </form>

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
        } 
        ?>
     
    </div>
</div>