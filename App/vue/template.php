<!DOCTYPE html>
<html lang="fr">



<?php
  include("./App/vue/common/head.php");
  include("./App/vue/common/header.php");
  include("./App/vue/common/navigation.php");
  ?>



<body>
  <main>



  <?php
  // include("./App/vue/content/v_accueil.php");
  // include("./App/vue/content/v_connexion.php");
  // include("./App/vue/content/v_compte.php");
  // include("./App/vue/content/v_nousContacter.php");
  // include("./App/vue/content/v_aPropos.php");
  // include("./App/vue/content/v_livraison.php");
  include("./App/vue/content/v_panier.php");
  include("App/controleur/c_connexion.php");
  include("./App/vue/common/footer.php");

  ?>
  </main>

</body>
<script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
</html>