<!DOCTYPE html>
<html lang="fr">

<body>
  <main>
    <?php
    include("./App/vue/common/head.php");
    include("./App/vue/common/header.php");
    include './App/controleur/c_consultation.php';
    include("./App/vue/common/navigation.php");


    $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $uc = filter_input(INPUT_GET, "uc", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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
    )) {

      include 'content/v_accueil.php';
      // include 'content/error.php';
      die;

    } 

    // if (isset($uc) && ($uc == 'visite')) {
    //   include './App/vue/content/' . $page . '.php';
    //   include './App/vue/common/footer.php';
    // } 

    else {
      include './App/vue/content/' . $page . '.php';
    }
    include './App/vue/common/footer.php';
    ?>


    <?php
    // include("./App/vue/content/v_accueil.php");
    // include("./App/vue/content/v_connexion.php");
    // include("./App/vue/content/v_compte.php");
    // include("./App/vue/content/v_nousContacter.php");
    // include("./App/vue/content/v_aPropos.php");
    // include("./App/vue/content/v_livraison.php");
    // include("./App/vue/content/v_panier.php");
    // include("./App/vue/common/footer.php");
    // include("App/controleur/c_connexion.php");

    ?>
  </main>

</body>
<script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="public/assets/monjs/main.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="public/assets/monjs/jquery.spritely.js"></script>
<script src="public/assets/monjs/jquery.backgroundPosition.js"></script>
<script src="public/assets/monjs/slot.js"></script>

</html>