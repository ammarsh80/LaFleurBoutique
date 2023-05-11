<?php
include("./App/vue/common/head.php");
include_once './App/controleur/c_consultation.php';

?>

<body>
  <?php
  include("./App/vue/common/header.php");

  include("./App/vue/common/navigation.php");
  ?>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <script src="public/assets/monjs/jquery.spritely.js"></script>
  <script src="public/assets/monjs/jquery.backgroundposition.js"></script>
  <script src="public/assets/monjs/slot.js"></script>

  <script src="public/assets/monjs/external-api.js"></script>
  <script src="public/assets/monjs/single-file-hooks-frames.js"></script> -->

  <main>
    <?php



    $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $uc = filter_input(INPUT_GET, "uc", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $couleur = filter_input(INPUT_GET, "couleur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $recherche_mot = filter_input(INPUT_GET, "recherche_mot", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // if (isset($recherche_mot)) {
    //   include 'content/v_parMot.php';
    // }

    if (!isset($page) || (($page !== 'v_accueil')
      && ($page !== 'v_amour')
      && ($page !== 'v_anniversaire')
      &&  ($page !== 'v_aPropos')
      && ($page !== 'v_compte')
      && ($page !== 'v_connexion')
      && ($page !== 'v_livraison')
      && ($page !== 'v_mariage')
      && ($page !== 'v_naissance')
      && ($page !== 'v_nousContacter')
      && ($page !== 'v_panier')
      && ($page !== 'v_remerciement')
      && ($page !== 'v_loto')
      && ($page !== 'v_adresseLivraison')
      && ($page !== 'v_parCouleur')
      && ($page !== 'v_paiement')
      && ($page !== 'v_confirmationPayement')
      && ($page !== 'v_parMot')
    )) {


      include 'content/v_accueil.php';
      // include 'content/error.php';
      // die;
    } else {


      include './App/vue/content/' . $page . '.php';
    }

    if (
      isset($action)
      && ($action !== 'voirArticlesAccueil')
      && ($action !== 'voirArticlesAmour')
      &&  ($action !== 'voirArticlesMariage')
      && ($action !== 'voirArticlesNaissance')
      && ($action !== 'voirArticlesRemerciement')
      && ($action !== 'voirArticlesAnniversaire')
      && ($action !== 'voirArticlesCouleur')
      && ($action !== 'voirArticlesDeCategorie')
      && ($action !== 'ajouterAuPanier')
      && ($action !== 'v_remerciement')
      && ($action !== 'ajouterAuPanierDepuisCouleur')
      && ($action !== 'passerCommande')
      && ($action !== 'confirmerCommande')
      && ($action !== 'nousContacter')
      && ($action !== 'supprimerUnArticle')
      && ($action !== 'voirPanier')
      && ($action !== 'demandeInscription')
      && ($action !== 'confirmerInscription')
      && ($action !== 'loginClient')
      && ($action !== 'logoutClient')
      && ($action !== 'changerProfil')
      && ($action !== 'payerCommande')
      && ($action !== 'ajouterAuPanierDepuisRechercheMot')
    ) {

      include 'content/v_accueil.php';
      // include 'content/error.php';
      // die;
    }
    include './App/vue/common/footer.php';
    ?>
  </main>
  <script src="public/assets/monjs/main.js"></script>
  <!-- <script src="public/assets/bootstrap/js/bootstrap.min.js"></script> -->
</body>

</html>