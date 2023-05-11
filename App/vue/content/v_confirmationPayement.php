<section id="panier">
<div class="banniere" style="background-image: url(./public/assets/img/baniere.jpg);"></div>
    <p class="mb-2 fw-bold">Confirmation de paiement : nous avons réçu votre paiement </p>
    <p class="mb-4">Vous pouvez visualiser votre commande et suivre son état depuis votre compte</p>
    <div class="cadre_paiement">
        <div>
            <p style="width: 100%; text-align: center; margin-top: 10px; margin-bottom: 10px;">Reste à payer <?php echo $_SESSION['total_a_payer'] ?> euros</p>


        </div>
    </div>

    </div>

    <!-- <div class="container_loto">
        <h1>À l’occasion de la fête des mères, tentez de gagner un de nos lot surprise </h1>
        <a href="index.php?page=v_loto">
            <p>Je tente ma chance</p>
        </a>
    </div> -->


    <?php
    $today = date('Y-m-d'); // Obtenir la date actuelle au format YYYY-MM-DD
    $start_date = date('Y') . '-05-01'; // Date de début de la plage de dates
    $end_date = date('Y') . '-06-10'; // Date de fin de la plage de dates

    // Vérifier si la date actuelle est comprise entre les deux dates spécifiées
    if ($today >= $start_date && $today <= $end_date) {
        include './App/vue/common/pub.feteDesMeres.php'; // Inclure le fichier si la condition est vraie
    ?>
        <div class="container_loto">
            <a href="index.php?page=v_loto">
                <p>Je tente ma chance</p>
            </a>
        </div>

    <?php
    } else {
    ?>
            <div class="container_loto">

        <a href="index.php?page=v_compte">
            <p class="mb-3">Voir ma commande</p>
        </a>
            </div>
    <?php
    }
    ?>

    </div>
</section>