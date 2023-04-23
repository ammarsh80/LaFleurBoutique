<section id="panier">
    <img class="image_banniere" src="./public/assets/img/baniere.jpg" alt="image bannière" style="margin-bottom: 25px;">
    <p class="mb-2 fw-bold">Confirmation de paiement : nous avons réçu votre paiement </p>
    <p class="mb-4">Vous pouvez visualiser votre commande et suivre son état depuis votre compte</p>
    <div class="cadre_paiement">
        <div>
            <p style="width: 100%; text-align: center; margin-top: 10px; margin-bottom: 10px;">Reste à payer <?php echo $_SESSION['total_a_payer'] ?> euros</p>
  

        </div>
    </div>

    </div>
    <div class="container_loto">
        <h1>À l’occasion de la fête des mères, tentez de gagner un de nos lot surprise </h1>
        <a href="index.php?page=v_loto">
            <p>Je tente ma chance</p>
        </a>
    </div>
    </div>
</section>