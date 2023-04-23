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

let btn = document.querySelector(".btn1");
let list_nav = document.querySelector(".list_nav");
let bye = document.querySelectorAll(".bye");
btn.addEventListener("click", (e) => {
  btn.classList.toggle("active");
  bye.forEach((element) => {
    element.classList.toggle("smallScreen");
  });
});




//  $params = array('page' => 'v_parCouleur', 'couleur' => $idCouleur);
//  $url = 'index.php?' . http_build_query($params);


//  function redirectToUrl(url) {
//   window.location.href = url;
// }

var page = 'v_parCouleur';
var couleur = '<?php echo $idCouleur; ?>';
var params = { 'page': page, 'couleur': couleur };
var url = 'index.php?' + new URLSearchParams(params).toString();

function redirectToUrl(url) {
  window.location.href = url;
}

// redirectToUrl(url);

// Bloquer ou activer la modification du panier pour passer au paiement/////////////////////////////////////////////////////
var btn_valide_facturation = document.querySelector('.btn_valide_payement');
btn_valide_facturation.addEventListener('click', (e) => {
  var container_livraison = document.querySelector('.container_livraison');
  var cadre_paiement = document.querySelector('.cadre_paiement');
   container_livraison.style.pointerEvents = 'none';
  container_livraison.style.opacity = '0.5';
  cadre_paiement.style.pointerEvents = 'all';
  cadre_paiement.style.opacity = '1';
  // }
});



// Checked l'input frais (> 50 euros ou > 50)/////////////////////////////////////////////////////
// Accéder au contenu de la div
let contenu_div = somme_total.innerHTML;
if (parseInt(contenu_div) >= 50) {
    frais_offert.checked = true;
  }
  else if (parseInt(contenu_div) > 0) {
    frais_payant.checked = true;
  }








// Checked l'input frais (> 50 euros ou > 50)/////////////////////////////////////////////////////
// Accéder au contenu de la div

// document.addEventListener('DOMContentLoaded', function () {
//   let sommeTotal = document.getElementById('somme_Total');
//   let fraisOffert = document.getElementById('frais_offert');
//   let fraisPayant = document.getElementById('frais_payant');
//   if (sommeTotal) {
//     if (parseInt(contenu_div) >= 50) {
//       fraisOffert.checked = true;
//     }
//     else if (parseInt(contenu_div) > 0) {
//       fraisPayant.checked = true;
//     }
//   }
// });


  










// // Stocke les éléments HTML dans des variables
// const frais_offert = document.getElementById('frais-offert');
// const frais_payant = document.getElementById('frais-payant');

// // Envoie une requête AJAX pour récupérer la valeur de "somme_total"
// let xhr = new XMLHttpRequest();
// xhr.open('GET', 'index.php', true);
// xhr.onload = function() {
//     // Vérifie si la requête s'est bien passée
//     if (xhr.status === 200) {
//         // Analyse la réponse de la page PHP pour récupérer la valeur de "somme_total"
//         const contenu_div = parseInt(xhr.responseText);
//         console.log(contenu_div);
//         // Vérifie la valeur de "somme_total" et coche les cases correspondantes
//         if (contenu_div >= 50) {
//             frais_offert.checked = true;
//         }
//         else if (contenu_div > 0) {
//             frais_payant.checked = true;
//         }
//     } else {
//         console.error('La requête a échoué avec une erreur ' + xhr.status);
//     }
// };
// xhr.send();




















// window.onload = function () {
//   var modifier_panier = document.getElementById('modifier_panier');
//   modifier_panier.addEventListener('click', (e) => {
//     var container_paiement = document.getElementById('container_paiement');
//     var modifier_panier = document.getElementById('modifier_panier');
//     var valide_articles = document.querySelector('.valide_articles');

//     if (parseInt(contenu_div) > 0) {
//       container_paiement.style.pointerEvents = 'none';
//       container_paiement.style.opacity = '0.50';
//       modifier_panier.style.display = 'none';
//       valide_articles.style.pointerEvents = 'all';
//       valide_articles.style.opacity = '1';
//     }
//   });
// };











