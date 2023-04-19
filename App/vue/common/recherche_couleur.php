<?php
include_once 'App/controleur/c_consultation.php';


?>

<div id="container_recherche_couleur">

    <div id="recherche_couleur">
        <p id="rechercher_par_couleur">Rechercher par couleur</p>
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
        <select name="couleur" id="couleur">
            <option>Choisir une couleur</option>
            <?php foreach ($lesCouleurs as $uneCouleur) {
                $idCouleur = $uneCouleur['id'];
                $NomCouleur = $uneCouleur['couleur'];

                $params = array('page' => 'v_parCouleur', 'couleur' => $idCouleur);
                $url = 'index.php?' . http_build_query($params);
                
            ?>
                <option value="<?php echo $url ?>" onclick="redirectToUrl(this.value)"><?php echo $NomCouleur ?></option>
            <?php } 
            
          
                ?>
        </select>

        <!-- <button type="submit" id="btn_par_couleur">ok</button> -->

        <!-- <script>
            function redirectToUrl(url) {
                window.location.href = url;
            }
        </script> -->



    </div>
</div>