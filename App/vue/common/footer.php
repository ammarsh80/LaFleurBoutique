<?php
if ((isset($_SESSION['Articles'])) && (count($_SESSION['Articles']) !== 0)) {
    $nArticles = count($_SESSION['Articles']);

?>


    <span class="nArticles"><?php echo $nArticles ?></span>
<?php
}
?>
<footer>
    <div id="btn_scrole">
        <img src="./public/assets/img/vector-haut.png" onclick="topFunction()" id="topBtn" alt="bouton retour en haut de page">

    </div>
    <div id="devise">
        <h1 class="mx-1">Lafleur</h1>
        <p> prend soin de la nature, la sublime et la partage avec vous au quotidien !</p>
    </div>
    <div class="ligne_banniere"></div>

    <div id="footer_container">
        <div id="a_propos">
            <a href="index.php?page=v_aPropos">
                <p class="propos">À propos</p>
            </a>
            <a href="index.php?page=v_aPropos">
                <p>Qui sommes-nous ?</p>
            </a>
            <a href="index.php?page=v_aPropos">
                <p>Notre engagement</p>
            </a>
        </div>
        <div id="reseaux_sociaux">
            <div id="logo_reseaux_sociaux">
                <a href="https://www.facebook.com/"> <img src="./public/assets/img/facebook.png" alt="logo facebook"></a>
                <a href="https://twitter.com/"> <img src="./public/assets/img/twitter.png" alt="logo twitter"></a>
                <a href="https://shihan.needemand.com/projets_web/la_fleur_wordpress/"> <img src="./public/assets/img/blog.png" alt="logo blog"></a>
            </div>
            <div id="livraison">
                <a href="index.php?page=v_livraison">
                    <p>Zone de livraison</p>
                </a>
                <a href="index.php?page=v_livraison">
                    <p>Conditions de livraison</p>
                </a>
            </div>
        </div>
        <div id="nous_contacter">
            <a href="index.php?page=v_nousContacter">
                <p class="contacter">Nous-contacter</p>
            </a>
            <a href="index.php?page=v_nousContacter">
                <p>lafleur-labelle@gmail.com</p>
            </a>
            <p>110 Rue Juiverie, 84160 Lourmarin</p>
            <div id="telephone">
                <img src="./public/assets/img/telephone.png" alt="logo telephone">
                <p class="numero_telephone">04 90 90 90 90</p>
            </div>
        </div>
    </div>

</footer>