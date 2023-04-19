window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  //   if (window.innerWidth < 900 ) {
  //     document.getElementById("topBtn").style.display = "none";
  //   }
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {

    document.getElementById("topBtn").style.display = "block";
  } else {
    document.getElementById("topBtn").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth'
  });
}

// let btn = document.querySelector(".btn1");
// let list_nav = document.querySelector(".list_nav");
// let bye = document.querySelectorAll(".bye");
// btn.addEventListener("click", (e) => {
//   btn.classList.toggle("active");
//   bye.forEach((element) => {
//     element.classList.toggle("smallScreen");
//   });
// });


// Checked l'input frais (> 50 euros ou > 50)/////////////////////////////////////////////////////
// Récupérer l'élément HTML avec l'ID "frais_payant"
let frais_offert = document.getElementById('frais_offert');
// Récupérer l'élément HTML avec l'ID "frais_payant"
let frais_payant = document.getElementById('frais_payant');
// Récupérer l'élément HTML avec l'ID "somme_total"
let affiche_somme = document.getElementById('panier_marron');
// affiche_somme.addEventListener('click', (e) => {
  let somme_total = document.getElementById('somme_total');
  // Accéder au contenu de la div
  let contenu_div = somme_total.innerHTML;
  if (parseInt(contenu_div) >= 50) {
    frais_offert.checked = true;
  }
  else if (parseInt(contenu_div) > 0) {
    frais_payant.checked = true;
  }
// })



// Bloquer ou activer la modification du panier pour passer au paiement/////////////////////////////////////////////////////
var valide_panier = document.getElementById('valide_panier');
valide_panier.addEventListener('click', (e) => {
 
var container_paiement = document.getElementById('container_paiement');
var modifier_panier = document.getElementById('modifier_panier');
var valide_articles = document.querySelector('.valide_articles');

  if (parseInt(contenu_div) > 0) {
    container_paiement.style.pointerEvents = 'all';
    container_paiement.style.opacity = '1';
    modifier_panier.style.display = 'block';
    valide_articles.style.pointerEvents = 'none';
    valide_articles.style.opacity = '0.50';
  }
 });


 var modifier_panier = document.getElementById('modifier_panier');
 modifier_panier.addEventListener('click', (e) => {
var container_paiement = document.getElementById('container_paiement');
var modifier_panier = document.getElementById('modifier_panier');
var valide_articles = document.querySelector('.valide_articles');

  if (parseInt(contenu_div) > 0 ) {
    container_paiement.style.pointerEvents = 'none';
    container_paiement.style.opacity = '0.50';
    modifier_panier.style.display = 'none';
    valide_articles.style.pointerEvents = 'all';
    valide_articles.style.opacity = '1';
  }
 });


//  $params = array('page' => 'v_parCouleur', 'couleur' => $idCouleur);
//  $url = 'index.php?' . http_build_query($params);


//  function redirectToUrl(url) {
//   window.location.href = url;
// }

var page = 'v_parCouleur';
var couleur = '<?php echo $idCouleur; ?>';
var params = {'page': page, 'couleur': couleur};
var url = 'index.php?' + new URLSearchParams(params).toString();

function redirectToUrl(url) {
  window.location.href = url;
}

// redirectToUrl(url);

