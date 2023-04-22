<?php
include_once "App/controleur/c_commande.php";

if (!isset($_SESSION["id"])) { ?>

    <header id="header">
        <a href="index.php?page=v_accueil&action=voirArticlesAccueil">
            <img src="./public/assets/img/logo/logo_lafleur-figma.png" alt="logo"></a>
        <div id="lafleur">
            <a href="index.php?page=v_accueil&action=voirArticlesAccueil">
                <h1>Lafleur</h1>
            </a>
        </div>
        <div id="nav_right" class="mt-3">

            <!-- <a href=""><img id="loop" src="./public/assets/img/loop.png" alt="loop de recherche"></a> -->
     
            <!-- <span>Rechercher</span> -->
            <!-- <a href="index.php?page=v_connexion&uc=inscription&action=demandeInscription"><span>Connectez-vous</span></a> -->
            <a href="index.php?page=v_connexion"><span>Connectez-vous</span></a>

            <a href="index.php?page=v_panier&uc=panier&action=voirPanier"><img id="panier_marron" src="./public/assets/img/panier-marron.png" alt="panier de courses"></a>
           
           
         

        </div>


    </header>

<?php

}

if (isset($_SESSION["id"])) { ?>
    <header id="header">
        <a href="index.php?page=v_accueil&action=voirArticlesAccueil">
            <img src="./public/assets/img/logo/logo_lafleur-figma.png" alt="logo"></a>
        <div id="lafleur">
            <a href="index.php?page=v_accueil&action=voirArticlesAccueil">
                <h1>Lafleur</h1>
            </a>
        </div>
        <div id="nav_right" class="mt-3">

            <!-- <a href=""><img id="loop" src="./public/assets/img/loop.png" alt="loop de recherche"></a>
            <span>Rechercher</span> -->
          
            <!-- <a href="index.php?page=v_connexion&uc=inscription&action=demandeInscription"><span>Connectez-vous</span></a> -->
            <!-- <li><a href="index.php?uc=inscription&action=demandeInscription"> S'inscrire</a></li> -->
            <form action="index.php?uc=deconnexion&action=logoutClient" method="post">
                <input type="submit" name="deconnexion" id="input_deconnexion" value="Déconnexion" />
            </form>
            <a href="index.php?page=v_panier&uc=panier&action=voirPanier"><img id="panier_marron" src="./public/assets/img/panier-marron.png" alt="panier de courses"></a>
        </div>
    </header>

    <div id="div_connexion">
        <span id="deconnexion_info">Bonjour <?php echo $InfoUtilisateur[0]['prenom'] . " " ?>! vous êtes connecté</span>
        <!-- <form action="index.php?page=v_compte" id="form_mon_compte">
            </form> -->
        <a href="index.php?page=v_compte&action=passerCommande">
            <!-- <a href="index.php?page=v_compte&uc=administrer"> -->

            <button type="submit" id="btn_mon_compte">Mon compte</span></a>
    </div>
<?php

}
?>