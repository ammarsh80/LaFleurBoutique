<section id="amour">
  <div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);">
    <h1 id="bonne_chance"> Lafleur vous souhaite bonne chance</h1>
  </div>


  <div class="container_cage">
    <img src="./public/assets/img/loto/cage.PNG" alt="Image 1">
    <img src="./public/assets/img/loto/cage.PNG" alt="Image 1">
    <img src="./public/assets/img/loto/cage.PNG" alt="Image 1">
    <img src="./public/assets/img/loto/cage.PNG" alt="Image 1">
    <img src="./public/assets/img/loto/cage.PNG" alt="Image 1">
  </div>


  <div class="container_loto">

    <div class="reel-container">
      <div class="reel" data-speed="2">
        <img src="./public/assets/img/loto/ballon1.PNG" alt="Image 1">

      </div>
      <div class="reel" data-speed="4">
        <img src="./public/assets/img/loto/ballon1.PNG" alt="Image 1">
      </div>
      <div class="reel" data-speed="6">
        <img src="./public/assets/img/loto/ballon1.PNG" alt="Image 1">
      </div>
      <div class="reel" data-speed="6">
        <img src="./public/assets/img/loto/ballon1.PNG" alt="Image 1">
      </div>
      <div class="reel" data-speed="6">
        <img src="./public/assets/img/loto/ballon1.PNG" alt="Image 1">
      </div>
    </div>
    <button class="spin-button">Tirer</button>
    <span class="mb-2">vous avez un seul essai</span>
    <!-- <a href="index.php?page=v_loto">
      <p class="ajout_lot mb-3">Reclamer mon lot</p> 
     </a>  -->
    <?php
    if (isset($_COOKIE['gagne']) && $_COOKIE['gagne'] > 0) {
    ?>

      <a href="index.php?uc=panier&action=monlot&monlot=<?php echo $_COOKIE['gagne'] ?>">
        <p class="ajout_lot mb-5">Ajouter mon lot gagné à ma commande</p>
      </a>

    <?php
    }
    ?>
    <a href="index.php?page=v_compte">
      <p class="mb-3">Voir ma commande</p>
    </a>
  </div>

</section>